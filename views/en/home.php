<section class="hero" id="top" aria-labelledby="hero-title">
  <div class="hero__content">
    <p class="hero__eyebrow text-heading">Tech Lead · Web Platforms · Team Enablement</p>
    <h1 id="hero-title">I make scalable web platforms reliably deliverable.</h1>
    <p>
      Architecture decisions that won’t hurt later, plus teams that can execute them. Focus: Developer Experience,
      Quality, Performance.
    </p>
    <div class="ctas">
      <a href="/en/#projects" class="button" aria-label="Jump to projects section">
        View projects
      </a>
      <a href="/en/#contact" class="button primary" aria-label="Jump to contact section">
        Get in touch
      </a>
    </div>
  </div>

  <div class="hero__visual" aria-hidden="true">
    <div class="hero__diagram">
      <span class="line line--a"></span>
      <span class="line line--b"></span>
      <span class="line line--c"></span>
      <span class="line line--d"></span>
      <span class="line line--e"></span>
      <span class="node node--a"></span>
      <span class="node node--b"></span>
      <span class="node node--c"></span>
      <span class="node node--d"></span>
      <span class="node node--e"></span>
    </div>
    <div class="hero__photo-frame">
      <img src="/assets/images/Selfimage-transparent.png" alt="Photo of Christina Busacker" />
    </div>
  </div>
</section>

<section id="about" aria-labelledby="about-title">
  <h2 id="about-title">Who I am</h2>
  <p>
    I’m a software engineer focused on web platforms in e-commerce and SaaS, with 10+ years of experience building
    product and platform systems, both in teams and independently.
  </p>
  <p>
    I enjoy working on systems that need to live for a long time: clear boundaries, strong defaults, minimal magic.
    In teams, I focus on enablement: solid reviews, transparent decisions, and tooling nobody hates.
  </p>
  <p>
    I’ve taken ownership early, even without a formal lead title: introducing standards, driving refactorings, and
    establishing observability with OpenTelemetry so issues are found faster and releases become more reliable.
  </p>
</section>

<section id="skills" aria-labelledby="skills-title">
  <h2 id="skills-title">What I deliver</h2>
  <div class="grid">
    <article class="card">
      <h3>Team Enablement</h3>
      <p>I help teams adopt ways of working that keep delivering long-term.</p>
      <ul>
        <li>Reviews, standards, mentoring</li>
        <li>DX: tooling, build/test setup, strong defaults</li>
        <li>Technical decisions documented and easy to find</li>
      </ul>
    </article>

    <article class="card">
      <h3>Platform Architecture</h3>
      <p>Structures that scale without every change becoming painful.</p>
      <ul>
        <li>Modular architecture, clear boundaries</li>
        <li>API design, versioning, migration strategies</li>
        <li>Monorepo/Nx, reusable libraries</li>
      </ul>
    </article>

    <article class="card">
      <h3>Quality & Observability</h3>
      <p>Problems become visible early and releases stay controlled.</p>
      <ul>
        <li>OpenTelemetry tracing, logging, monitoring</li>
        <li>Testing strategy and CI/CD as defaults, not “later” projects</li>
        <li>Performance budgets and pragmatic optimization</li>
      </ul>
    </article>

    <article class="card">
      <h3>Stack (selection)</h3>
      <ul>
        <li>TypeScript · Angular · NestJS · Node.js</li>
        <li>SSR · REST · SSE · TypeORM</li>
        <li>Docker · Pipelines · Deployments</li>
      </ul>
    </article>
  </div>
</section>

<section id="projects" aria-labelledby="projects-title">
  <h2 id="projects-title">Projects</h2>

  <article class="project-card" id="project-solarsystem" aria-labelledby="project-solarsystem-title">
    <div class="project-card__content">
      <div>
        <div class="project-card__header">
          <div class="project-card__meta">
            <h3 id="project-solarsystem-title">SolarSystem</h3>
            <p class="subline">WebGL-based solar system renderer</p>
          </div>
        </div>

        <p>
          A lightweight TypeScript application based on Three.js featuring realistic scaling, orbital paths, custom GLSL
          shaders, subtle cinematic effects, and additional information about the planets.
        </p>
      </div>

      <div class="project-media" aria-hidden="true">
        <figure class="mockup mockup--desktop">
          <img src="/assets/images/solar1-thumb.jpg" alt="" loading="lazy" width="1200" height="750" />
        </figure>

        <figure class="mockup mockup--phone">
          <img src="/assets/images/solar-mobile-2-thumb.jpg" alt="" loading="lazy" width="450" height="900" />
        </figure>
      </div>
    </div>

    <div class="project-card__tags" aria-label="SolarSystem project details">
      <section aria-labelledby="project-solarsystem-tech-title">
        <h4 id="project-solarsystem-tech-title">Tech</h4>
        <ul class="tags">
          <li>WebGL</li>
          <li>Three.js</li>
          <li>TypeScript</li>
        </ul>
      </section>

      <section aria-labelledby="project-solarsystem-focus-title">
        <h4 id="project-solarsystem-focus-title">Focus</h4>
        <ul class="tags">
          <li>Performance</li>
          <li>UX</li>
          <li>Shaders</li>
        </ul>
      </section>
    </div>

    <a href="/projects/solarsystem" class="button" aria-label="Open SolarSystem project page">
      View project
    </a>
  </article>

  <article class="project-card" id="project-lmstudio" aria-labelledby="project-lmstudio-title">
    <div class="project-card__content">
      <div>
        <div class="project-card__header">
          <div class="project-card__meta">
            <h3 id="project-lmstudio-title">LMstudio-web</h3>
            <p class="subline">A local-first LAN UI for LM Studio</p>
          </div>
        </div>

        <p>
          A browser-based UI to make LM Studio comfortably accessible within a local network. Focus: clean system
          architecture, tool use, and advanced workflows.
        </p>
      </div>

      <div class="project-media" aria-hidden="true">
        <figure class="mockup mockup--desktop">
          <img src="/assets/images/lmstudio-web-2-thumb.jpg" alt="" loading="lazy" width="1200" height="750" />
        </figure>

        <figure class="mockup mockup--phone">
          <img src="/assets/images/lmstudio-web-mobile-1-thumb.jpg" alt="" loading="lazy" width="450" height="900" />
        </figure>
      </div>
    </div>

    <div class="project-card__tags" aria-label="LMstudio-web project details">
      <section aria-labelledby="project-lmstudio-tech-title">
        <h4 id="project-lmstudio-tech-title">Tech</h4>
        <ul class="tags">
          <li>Angular</li>
          <li>NestJS</li>
          <li>TypeORM</li>
          <li>SSE</li>
        </ul>
      </section>

      <section aria-labelledby="project-lmstudio-focus-title">
        <h4 id="project-lmstudio-focus-title">Focus</h4>
        <ul class="tags">
          <li>Queue</li>
          <li>Node workflows</li>
          <li>Tool use</li>
          <li>Architecture</li>
        </ul>
      </section>
    </div>

    <a href="/projects/lmstudio-web" class="button" aria-label="Open LMstudio-web project page">
      View project
    </a>
  </article>
</section>

<section id="workflow" aria-labelledby="workflow-title">
  <h2 id="workflow-title">How I work</h2>

  <div class="grid">
    <article class="card">
      <h3>1. Goals & Constraints</h3>
      <p>I clarify scope, risks, and what “done” means before we debate architecture.</p>
    </article>

    <article class="card">
      <h3>2. Decisions you can find later</h3>
      <p>Trade-offs documented briefly, so the team doesn’t repeat the same debate.</p>
    </article>

    <article class="card">
      <h3>3. Enablement over heroics</h3>
      <p>Standards, reviews, and tooling so the team can deliver without a bottleneck.</p>
    </article>

    <article class="card">
      <h3>4. Operations as part of the product</h3>
      <p>Tracing, logs, and tests aren’t “later”, they’re prerequisites for reliable releases.</p>
    </article>
  </div>
</section>

<section id="principles" aria-labelledby="principles-title">
  <h2 id="principles-title">Technical principles</h2>
  <p>Some principles that guide my work:</p>
  <ul>
    <li>Boring tech unless there’s a measurable win against it.</li>
    <li>Observability is part of the product.</li>
    <li>Clear commitments matter more than vague promises.</li>
  </ul>
</section>

<section id="contact" aria-labelledby="contact-title">
  <h2 id="contact-title">Contact</h2>
  <p>
    I’m open to roles in technical leadership and software architecture, as well as selected consulting projects.
  </p>

  <div class="contact-grid">
    <section class="card" aria-labelledby="contact-form-title">
      <h3 id="contact-form-title">Contact form</h3>
      <?php
        $formOld = is_array($flash) && isset($flash['old']) && is_array($flash['old']) ? $flash['old'] : [];
        $formErrors = is_array($flash) && isset($flash['errors']) && is_array($flash['errors']) ? $flash['errors'] : [];
        $formType = is_array($flash) && isset($flash['type']) ? (string)$flash['type'] : '';
        $formMessage = is_array($flash) && isset($flash['message']) ? (string)$flash['message'] : '';
        $action = ($currentLang ?? 'de') === 'en' ? '/en/contact' : '/contact';
      ?>

      <div
        id="contact-feedback"
        class="form-feedback <?= ($formType === 'success' || $formType === 'error') ? 'form-feedback--' . htmlspecialchars($formType, ENT_QUOTES, 'UTF-8') : '' ?>"
        role="status"
        aria-live="polite"
        <?= ($formMessage === '') ? 'hidden' : '' ?>
      >
        <?= htmlspecialchars($formMessage, ENT_QUOTES, 'UTF-8') ?>
      </div>

      <form id="contact-form" class="contact-form" action="<?= htmlspecialchars($action, ENT_QUOTES, 'UTF-8') ?>" method="post" novalidate>
        <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrfToken ?? '', ENT_QUOTES, 'UTF-8') ?>" />

        <!-- Honeypot (bots fill this, humans don't) -->
        <div class="hp" aria-hidden="true">
          <label for="website">Website</label>
          <input id="website" name="website" type="text" tabindex="-1" autocomplete="off" />
        </div>

        <div class="form-row">
          <label for="name">Name <span aria-hidden="true">*</span></label>
          <input
            id="name"
            name="name"
            type="text"
            autocomplete="name"
            required
            value="<?= htmlspecialchars((string)($formOld['name'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
            <?= isset($formErrors['name']) ? 'aria-invalid="true" aria-describedby="err-name"' : '' ?>
          />
          <?php if (isset($formErrors['name'])): ?>
            <p class="field-error" id="err-name"><?= htmlspecialchars((string)$formErrors['name'], ENT_QUOTES, 'UTF-8') ?></p>
          <?php endif; ?>
        </div>

        <div class="form-row">
          <label for="company">Company (optional)</label>
          <input
            id="company"
            name="company"
            type="text"
            autocomplete="organization"
            value="<?= htmlspecialchars((string)($formOld['company'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
          />
        </div>

        <div class="form-row">
          <label for="email">Email <span aria-hidden="true">*</span></label>
          <input
            id="email"
            name="email"
            type="email"
            autocomplete="email"
            inputmode="email"
            required
            value="<?= htmlspecialchars((string)($formOld['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
            <?= isset($formErrors['email']) ? 'aria-invalid="true" aria-describedby="err-email"' : '' ?>
          />
          <?php if (isset($formErrors['email'])): ?>
            <p class="field-error" id="err-email"><?= htmlspecialchars((string)$formErrors['email'], ENT_QUOTES, 'UTF-8') ?></p>
          <?php endif; ?>
        </div>

        <div class="form-row">
          <label for="message">Message <span aria-hidden="true">*</span></label>
          <textarea
            id="message"
            name="message"
            rows="6"
            required
            <?= isset($formErrors['message']) ? 'aria-invalid="true" aria-describedby="err-message"' : '' ?>
          ><?= htmlspecialchars((string)($formOld['message'] ?? ''), ENT_QUOTES, 'UTF-8') ?></textarea>
          <?php if (isset($formErrors['message'])): ?>
            <p class="field-error" id="err-message"><?= htmlspecialchars((string)$formErrors['message'], ENT_QUOTES, 'UTF-8') ?></p>
          <?php endif; ?>
        </div>

        <div class="form-row">
          <div class="checkbox-row">
            <input
              id="consent"
              name="consent"
              type="checkbox"
              value="1"
              required
              <?= ((string)($formOld['consent'] ?? '')) === '1' ? 'checked' : '' ?>
              <?= isset($formErrors['consent']) ? 'aria-invalid="true" aria-describedby="err-consent"' : '' ?>
            />
            <label for="consent">
              I have read the <a href="/privacy" target="_blank" rel="noopener noreferrer">privacy policy</a> and agree
              that my details will be processed to respond to my inquiry.
              <span class="req">*</span>
            </label>
          </div>
          <?php if (isset($formErrors['consent'])): ?>
            <p class="field-error" id="err-consent"><?= htmlspecialchars((string)$formErrors['consent'], ENT_QUOTES, 'UTF-8') ?></p>
          <?php endif; ?>
          <p class="form-hint">
            GDPR notice: Only the data you provide is processed to respond to your request. No sharing with third parties.
          </p>
        </div>

        <div class="form-actions">
          <button type="submit" class="button primary">Send message</button>
        </div>
      </form>
    </section>

    <section class="card" aria-labelledby="contact-other-title">
      <h3 id="contact-other-title">Other ways to reach me</h3>
      <address>
        <ul>
          <li>
            <a href="mailto:email@christina-busacker.de" aria-label="Send email to Christina Busacker">
              email@christina-busacker.de
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/christina-busacker/" rel="me noopener noreferrer" target="_blank"
              aria-label="Open Christina Busacker's LinkedIn profile">
              LinkedIn
            </a>
          </li>
        </ul>
      </address>
    </section>
  </div>
</section>