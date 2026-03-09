import { initContactForm } from "./contact-form";
console.log("[main] loaded");
/**
 * Same-document navigation with View Transitions (progressive enhancement).
 *
 * Goal:
 * - Clicking a project card link morphs the .project-card into the .project-detail
 *   on the destination page, as if the container opens.
 *
 * Notes:
 * - Works even if the browser supports cross-document transitions, but does not
 *   rely on them.
 * - Only intercepts same-origin, left-click navigations without modifier keys.
 */

const TRANSITION_NAME = "project";

function isModifiedEvent(ev: MouseEvent): boolean {
  return (
    ev.metaKey || ev.ctrlKey || ev.shiftKey || ev.altKey || ev.button !== 0
  );
}

function isSameOrigin(url: URL): boolean {
  return url.origin === window.location.origin;
}

function shouldHandleLink(a: HTMLAnchorElement): boolean {
  const href = a.getAttribute("href") || "";
  if (!href || href.startsWith("#")) return false;
  if (a.target && a.target !== "_self") return false;
  if (a.hasAttribute("download")) return false;

  // Only handle project detail navigation.
  // Supports /projects/<slug>, /en/projects/<slug>, and the legacy /projekte/<slug>.
  const url = new URL(a.href);
  const path = url.pathname;
  return (
    /^\/projects\/[^/]+$/.test(path) ||
    /^\/en\/projects\/[^/]+$/.test(path) ||
    /^\/projekte\/[^/]+$/.test(path)
  );
}

function getSourceCard(a: HTMLAnchorElement): HTMLElement | null {
  return a.closest<HTMLElement>(".project-card");
}

function setTransitionName(el: HTMLElement | null, name: string | null): void {
  if (!el) return;
  (el.style as any).viewTransitionName = name ?? "";
}

async function fetchDocument(url: string): Promise<Document> {
  const res = await fetch(url, {
    headers: {
      "X-Requested-With": "XMLHttpRequest",
      Accept: "text/html",
    },
    credentials: "same-origin",
  });

  const html = await res.text();
  const doc = new DOMParser().parseFromString(html, "text/html");

  // If the server redirected, update to the final URL.
  // (fetch follows redirects; res.url is final)
  if (res.url && res.url !== url) {
    history.replaceState({ __vt: true }, "", res.url);
  }

  return doc;
}

function swapMainFrom(doc: Document): void {
  const newMain = doc.querySelector("main");
  const curMain = document.querySelector("main");
  if (!newMain || !curMain) return;

  // Replace the entire <main> to keep it simple and predictable.
  curMain.replaceWith(newMain);

  // Update title
  if (doc.title) document.title = doc.title;

  // Optional: update meta description
  const newDesc = doc.querySelector<HTMLMetaElement>(
    "meta[name='description']",
  );
  const curDesc = document.querySelector<HTMLMetaElement>(
    "meta[name='description']",
  );
  if (newDesc && curDesc) {
    curDesc.setAttribute("content", newDesc.getAttribute("content") || "");
  }

  // Re-init scripts that depend on DOM nodes inside <main>
  initContactForm();
}

function getDestinationTarget(): HTMLElement | null {
  // The detail templates use .project-detail as the main wrapper.
  return document.querySelector<HTMLElement>(".project-detail") ?? null;
}

async function navigateWithTransition(
  url: string,
  sourceCard: HTMLElement | null,
) {
  const doc = await fetchDocument(url);

  const doSwap = () => {
    swapMainFrom(doc);
  };

  // If VT API is available, morph source -> destination.
  const startVT = (document as any).startViewTransition as
    | ((cb: () => void | Promise<void>) => { finished: Promise<void> })
    | undefined;

  if (!startVT) {
    doSwap();
    window.scrollTo({ top: 0, behavior: "instant" as ScrollBehavior });
    return;
  }

  setTransitionName(sourceCard, TRANSITION_NAME);

  const vt = startVT(() => {
    doSwap();
    const target = getDestinationTarget();
    setTransitionName(target, TRANSITION_NAME);
  });

  try {
    await vt.finished;
  } finally {
    // Cleanup
    setTransitionName(sourceCard, null);
    setTransitionName(getDestinationTarget(), null);
    window.scrollTo({ top: 0, behavior: "instant" as ScrollBehavior });
  }
}

function onDocumentClick(ev: MouseEvent): void {
  console.log("Click");
  if (isModifiedEvent(ev)) return;

  const target = ev.target as HTMLElement | null;
  const a = target?.closest?.("a") as HTMLAnchorElement | null;
  if (!a) return;
  if (!shouldHandleLink(a)) return;

  const url = new URL(a.href);
  if (!isSameOrigin(url)) return;

  ev.preventDefault();

  history.pushState({ __vt: true }, "", url.href);

  const sourceCard = getSourceCard(a);
  navigateWithTransition(url.href, sourceCard).catch(() => {
    window.location.href = url.href;
  });
}

function onPopState(): void {
  // Back/forward: fetch and swap without a source card morph.
  const url = window.location.href;
  navigateWithTransition(url, null).catch(() => {
    window.location.href = url;
  });
}

export function initViewTransitions(): void {
  console.log("a");
  document.addEventListener("click", onDocumentClick);
  window.addEventListener("popstate", onPopState);
}

initViewTransitions();
