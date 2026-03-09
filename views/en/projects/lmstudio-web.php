<?php
$pageTitle = 'LMstudio-web';
$pageDescription = 'Local-first web UI for LM Studio: LAN-accessible, deterministic tool-driven loop, Angular frontend + NestJS backend, REST + SSE.';
$pageCanonical = '/projects/lmstudio-web';
?>

<section class="project-detail" aria-labelledby="project-title" style="view-transition-name: project-lmstudio;">
  <header class="project-detail__hero">
    <div class="project-detail__intro">
      <p class="project-detail__kicker">Angular · NestJS · SQLite · SSE</p>
      <h1 id="project-title">LMstudio-web</h1>
      <p class="project-detail__lead">
        A local-first, LAN-accessible web UI for LM Studio.
        No cloud service, no hosted models – everything runs on your own machine.
      </p>

      <div class="project-detail__actions">
        <a class="button github" href="https://github.com/ChristinaBusacker/lmstudio-web" target="_blank"
          rel="noopener noreferrer"><img src="/assets/images/github-fill.svg" alt="Github Logo">GitHub</a>
        <a class="button ghost" href="/projects">Back</a>
      </div>

      <div class="project-detail__tags" aria-label="Focus areas">
        <ul class="tags">
          <li>Local-first</li>
          <li>Deterministic runs</li>
          <li>Tool orchestration</li>
          <li>Workflows</li>
          <li>Themes & i18n</li>
        </ul>
      </div>
    </div>

    <div class="project-detail__media" aria-hidden="true">
      <figure class="mockup mockup--desktop">
        <img src="/assets/images/lmstudio-web-2-thumb.jpg" alt="" loading="lazy" width="1200" height="750" />
      </figure>
      <figure class="mockup mockup--phone">
        <img src="/assets/images/lmstudio-web-mobile-1-thumb.jpg" alt="" loading="lazy" width="450" height="900" />
      </figure>
    </div>
  </header>

  <div class="project-detail__grid">
    <section class="card" aria-labelledby="section-what">
      <h2 id="section-what">What this is (and is not)</h2>
      <ul>
        <li><strong>Is:</strong> a local web interface for LM Studio, accessible in your home network
          (phone/tablet/desktop).</li>
        <li><strong>Is not:</strong> a cloud account system, hosted models, vendor lock-in, or “black magic” agent
          execution.</li>
      </ul>
      <p class="muted">
        Motivation: LM Studio is great for running local models. A robust network-friendly UI makes local usage much
        more convenient.
      </p>
    </section>

    <section class="card" aria-labelledby="section-arch">
      <h2 id="section-arch">Architecture</h2>
      <ul>
        <li><strong>Frontend:</strong> Angular (SPA)</li>
        <li><strong>Backend:</strong> NestJS</li>
        <li><strong>Persistence:</strong> SQLite (local file)</li>
        <li><strong>Transport:</strong> REST + SSE (live updates)</li>
      </ul>
    </section>

    <section class="card" aria-labelledby="section-features">
      <h2 id="section-features">Core features</h2>
      <ul>
        <li>Chats & runs: deterministic run concept (traceable and inspectable).</li>
        <li>Settings profiles: import/export as JSON bundles, defaults, quick switching.</li>
        <li>Workflows: node-based steps including tool nodes.</li>
        <li>Service health: live status (LM Studio / optional SearXNG) via SSE.</li>
        <li>Theming: multiple themes via CSS variables (semantic tokens).</li>
        <li>Localization: e.g. DE/EN/FR (stored in user preferences).</li>
      </ul>
    </section>
  </div>
</section>