function isModifiedEvent(ev: MouseEvent): boolean {
  return (
    ev.metaKey || ev.ctrlKey || ev.shiftKey || ev.altKey || ev.button !== 0
  );
}

function sameOrigin(url: URL): boolean {
  return url.origin === window.location.origin;
}

function clearVTNames(): void {
  document
    .querySelectorAll<HTMLElement>("[style*='view-transition-name']")
    .forEach((el) => {
      el.style.viewTransitionName = "";
    });
}

function setVTName(el: HTMLElement | null, name: string): void {
  if (!el) return;
  el.style.viewTransitionName = name;
}

async function fetchDoc(url: string): Promise<Document> {
  const res = await fetch(url, {
    headers: {
      "X-Requested-With": "XMLHttpRequest",
      Accept: "text/html",
    },
    credentials: "same-origin",
  });
  if (!res.ok) throw new Error(`HTTP ${res.status}`);
  const html = await res.text();
  return new DOMParser().parseFromString(html, "text/html");
}

function swapMain(nextDoc: Document): void {
  const nextMain = nextDoc.querySelector("main");
  const curMain = document.querySelector("main");
  if (!nextMain || !curMain)
    throw new Error("Missing <main> in current or next document");

  curMain.replaceWith(nextMain);

  window.scrollTo({ top: 0, left: 0, behavior: "instant" as ScrollBehavior });

  const nextTitle = nextDoc.querySelector("title")?.textContent;
  if (nextTitle) document.title = nextTitle;
}

export function initProjectTransitions(): void {
  if (!("startViewTransition" in document)) return;

  document.addEventListener("click", async (ev) => {
    const e = ev as MouseEvent;
    if (isModifiedEvent(e)) return;

    const target = e.target as HTMLElement | null;
    const a = target?.closest?.("a[data-vt]") as HTMLAnchorElement | null;
    if (!a) return;

    const href = a.getAttribute("href");
    if (!href) return;

    const url = new URL(href, window.location.href);
    if (!sameOrigin(url)) return;

    if (url.pathname === window.location.pathname && url.hash) return;

    e.preventDefault();

    const vtName = a.getAttribute("data-vt") || "project";
    const sourceCard = a.closest(".project-card") as HTMLElement | null;

    clearVTNames();
    setVTName(sourceCard, vtName);

    if ("scrollRestoration" in history) {
      history.scrollRestoration = "manual";
    }

    history.replaceState(
      { ...(history.state ?? {}), __vt: true, scrollY: window.scrollY },
      "",
      window.location.href,
    );

    history.pushState(
      { __vt: true, __vtProject: true, vtName, scrollY: 0 },
      "",
      url.href,
    );

    const nextDoc = await fetchDoc(url.href);

    const run = async () => {
      swapMain(nextDoc);

      const targetEl = document.querySelector<HTMLElement>(
        `[data-vt-target="${vtName}"]`,
      );
      setVTName(targetEl, vtName);
    };

    const vt = (document as any).startViewTransition(run);

    vt.finished.finally(() => clearVTNames());
  });

  window.addEventListener("popstate", async (ev: PopStateEvent) => {
    const state = (ev.state ?? {}) as {
      __vtProject?: boolean;
      vtName: string;
      scrollY: number;
      __vt: boolean;
    };

    console.log(ev);

    if (!state.__vt) {
      return;
    }

    try {
      const nextDoc = await fetchDoc(window.location.href);

      const vt = (document as any).startViewTransition(() => {
        swapMain(nextDoc);
      });

      await vt.finished;

      window.scrollTo(0, state.scrollY);
    } catch {
      window.location.reload();
    }
  });
}
