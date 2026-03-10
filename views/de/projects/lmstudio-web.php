<?php
$pageTitle = 'LMstudio-web';
$pageDescription = 'Local-first Web UI für LM Studio: LAN-zugänglich, deterministischer Tool-Loop, Angular Frontend + NestJS Backend, REST + SSE.';
$pageCanonical = '/projects/lmstudio-web';
?>

<section class="project-detail" data-vt-target="project-lmstudio" aria-labelledby="project-title"
  style="view-transition-name: project-lmstudio;">
  <header class="project-detail__hero">
    <div class="project-detail__intro">
      <p class="project-detail__kicker">Angular · NestJS · SQLite · SSE</p>
      <h1 id="project-title">LMstudio-web</h1>
      <p class="project-detail__lead">
        Eine local-first, LAN-zugängliche Web-UI für LM Studio.
        Kein Cloud-Service, keine gehosteten Modelle – alles läuft auf deiner eigenen Maschine.
      </p>

      <div class="project-detail__actions">
        <a class="button github" href="https://github.com/ChristinaBusacker/lmstudio-web" target="_blank"
          rel="noopener noreferrer"><img src="/assets/images/github-fill.svg" alt="Github Logo">GitHub</a>
        <a class="button ghost" href="/projects">Zurück</a>
      </div>

      <div class="project-detail__tags" aria-label="Schwerpunkte">
        <ul class="tags">
          <li>Local-first</li>
          <li>Deterministische Runs</li>
          <li>Tool-Orchestrierung</li>
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
      <h2 id="section-what">Was das ist (und was nicht)</h2>
      <ul>
        <li><strong>Ist:</strong> lokale Web-Oberfläche für LM Studio, im Heimnetz erreichbar (Phone/Tablet/Desktop).
        </li>
        <li><strong>Ist nicht:</strong> Cloud-Account-System, hosted LLM, Vendor Lock-in,
          „Black-Magic“-Agent-Ausführung.</li>
      </ul>
      <p class="muted">
        Motivation: LM Studio ist super fürs lokale Modell-Running – eine robuste, netzwerkfähige UI macht lokale
        Nutzung deutlich angenehmer.
      </p>
    </section>

    <section class="card" aria-labelledby="section-arch">
      <h2 id="section-arch">Architektur</h2>
      <ul>
        <li><strong>Frontend:</strong> Angular (SPA)</li>
        <li><strong>Backend:</strong> NestJS</li>
        <li><strong>Persistenz:</strong> SQLite (lokale Datei)</li>
        <li><strong>Kommunikation:</strong> REST + SSE (Live Updates)</li>
      </ul>
    </section>

    <section class="card" aria-labelledby="section-features">
      <h2 id="section-features">Core Features</h2>
      <ul>
        <li>Chats & Runs: deterministisches Run-Konzept (traceable/inspectable).</li>
        <li>Settings Profiles: import/export als JSON, Defaults, schnelles Switching.</li>
        <li>Workflows: node-basierte Steps inkl. Tool-Nodes.</li>
        <li>Service Health: Live Status (LM Studio / optional SearXNG) via SSE.</li>
        <li>Theming: mehrere Themes via CSS-Variablen.</li>
        <li>Lokalisierung: u. a. DE/EN/FR (per User-Preference).</li>
      </ul>
    </section>


  </div>
</section>