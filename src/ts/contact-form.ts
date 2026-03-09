let isInitialized = false;

function getEls() {
  const contactForm = document.querySelector<HTMLFormElement>("#contact-form");
  const contactFeedback =
    document.querySelector<HTMLElement>("#contact-feedback");
  return { contactForm, contactFeedback };
}

function setFeedback(
  contactFeedback: HTMLElement | null,
  type: "success" | "error",
  message: string,
) {
  if (!contactFeedback) return;
  contactFeedback.hidden = false;
  contactFeedback.classList.remove(
    "form-feedback--success",
    "form-feedback--error",
  );
  contactFeedback.classList.add(`form-feedback--${type}`);
  contactFeedback.textContent = message;
}

function clearFieldErrors(form: HTMLFormElement) {
  const fields = form.querySelectorAll<HTMLInputElement | HTMLTextAreaElement>(
    "input, textarea",
  );
  fields.forEach((f) => {
    f.removeAttribute("aria-invalid");
    const describedBy = f.getAttribute("aria-describedby");
    if (describedBy && describedBy.startsWith("err-")) {
      f.removeAttribute("aria-describedby");
    }
  });
  form
    .querySelectorAll<HTMLElement>(".field-error")
    .forEach((el) => el.remove());
}

function setFieldError(
  form: HTMLFormElement,
  fieldName: string,
  message: string,
) {
  const field = form.querySelector<HTMLInputElement | HTMLTextAreaElement>(
    `[name='${fieldName}']`,
  );
  if (!field) return;

  const id = `err-${fieldName}`;
  field.setAttribute("aria-invalid", "true");
  field.setAttribute("aria-describedby", id);

  const p = document.createElement("p");
  p.className = "field-error";
  p.id = id;
  p.textContent = message;

  const row = field.closest<HTMLElement>(".form-row") ?? field.parentElement;
  if (row) row.appendChild(p);
}

async function submitContactAjax(
  form: HTMLFormElement,
  contactFeedback: HTMLElement | null,
) {
  const submitButton = form.querySelector<HTMLButtonElement>(
    "button[type='submit']",
  );
  const action = form.getAttribute("action") || "/contact";

  clearFieldErrors(form);

  if (submitButton) submitButton.disabled = true;
  form.setAttribute("aria-busy", "true");

  try {
    const res = await fetch(action, {
      method: "POST",
      body: new FormData(form),
      headers: {
        Accept: "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
    });

    const data = (await res.json()) as {
      ok: boolean;
      message: string;
      errors?: Record<string, string>;
    };

    if (data.ok) {
      setFeedback(contactFeedback, "success", data.message);
      form.reset();
      return;
    }

    setFeedback(
      contactFeedback,
      "error",
      data.message || "Bitte prüfe das Formular.",
    );

    const errors = data.errors || {};
    const entries = Object.entries(errors);
    for (const [field, msg] of entries) {
      setFieldError(form, field, msg);
    }

    const firstInvalid = form.querySelector<HTMLElement>(
      "[aria-invalid='true']",
    );
    if (firstInvalid) firstInvalid.focus();
  } catch (e) {
    // Fallback: submit normally if AJAX fails.
    form.submit();
  } finally {
    form.removeAttribute("aria-busy");
    if (submitButton) submitButton.disabled = false;
  }
}

/**
 * Initializes the contact form AJAX handler (idempotent).
 * Call this after DOM swaps (e.g. ViewTransition navigation).
 */
export function initContactForm(): void {
  const { contactForm, contactFeedback } = getEls();
  if (!contactForm) return;

  if (contactForm.dataset.ajaxBound === "true") return;
  contactForm.dataset.ajaxBound = "true";

  contactForm.addEventListener("submit", (ev) => {
    ev.preventDefault();
    submitContactAjax(contactForm, contactFeedback);
  });
}

if (!isInitialized) {
  isInitialized = true;
  initContactForm();
}
