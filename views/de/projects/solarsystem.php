<?php
$pageTitle = 'SolarSystem';
$pageDescription = 'Framework-freier Solar-System-Renderer mit Three.js + TypeScript: echte Größenverhältnisse, Orbitdaten, GLSL-Shader und cineastischer Feinschliff.';
$pageCanonical = '/projects/solarsystem';
?>

<section class="project-detail" aria-labelledby="project-title" style="view-transition-name: project-solarsystem;">
  <header class="project-detail__hero">
    <div class="project-detail__intro">
      <p class="project-detail__kicker">Three.js · TypeScript · WebGL</p>
      <h1 id="project-title">SolarSystem</h1>
      <p class="project-detail__lead">
        Ein leichtgewichtiger, framework-freier Solar-System-Renderer mit Fokus auf reale Skalierung & Orbitdaten,
        eigene GLSL-Shader und dezenten cineastischen Feinschliff.
      </p>

      <div class="project-detail__actions">
        <a class="button primary" href="https://cmbu.de/" target="_blank" rel="noopener noreferrer">Live Demo</a>
        <a class="button github" href="https://github.com/ChristinaBusacker/SolarSystem" target="_blank"
          rel="noopener noreferrer"><img src="/assets/images/github-fill.svg" alt="Github Logo">GitHub</a>
        <a class="button ghost" href="/projects">Zurück</a>
      </div>

      <div class="project-detail__tags" aria-label="Technologien">
        <ul class="tags">
          <li>Framework-free</li>
          <li>Custom GLSL</li>
          <li>Postprocessing</li>
          <li>Mobile Controls</li>
          <li>Performance</li>
        </ul>
      </div>
    </div>

    <div class="project-detail__media" aria-hidden="true">
      <figure class="mockup mockup--desktop">
        <img src="/assets/images/solar1-thumb.jpg" alt="" loading="lazy" width="1200" height="750" />
      </figure>
      <figure class="mockup mockup--phone">
        <img src="/assets/images/solar-mobile-2-thumb.jpg" alt="" loading="lazy" width="450" height="900" />
      </figure>
    </div>
  </header>

  <div class="project-detail__grid">
    <section class="card" aria-labelledby="section-why">
      <h2 id="section-why">Warum dieses Projekt?</h2>
      <p>
        SolarSystem ist als Deep Dive in modernes Web-3D entstanden: Shader, Postprocessing, Kamera-/Orbit-Steuerung,
        UI-Overlays und Performance-Tradeoffs, ohne Framework-Magie.
      </p>
      <p>
        Es ist ein Lernprojekt, aber so gebaut, wie ich es shippen wollen würde: typisiert, modular und gut
        test-/wartbar.
      </p>
    </section>

    <section class="card" aria-labelledby="section-highlights">
      <h2 id="section-highlights">Highlights</h2>
      <ul>
        <li>Echte Größenverhältnisse & Orbitdaten (mit pragmatischen Anpassungen für Usability).</li>
        <li>Eigene Shader-Pipeline: u. a. Mehrfach-Shadow-Caster für Occlusion/Eklipsen.</li>
        <li>Cinematic Optional: Bloom, Lens Flare, prozedurales Starfield.</li>
        <li>Mobile-friendly Controls (Orbit + Pinch Zoom) + responsive UI.</li>
      </ul>
    </section>

    <section class="card" aria-labelledby="section-controls">
      <h2 id="section-controls">Controls</h2>
      <h3>Desktop</h3>
      <ul>
        <li>Orbit: Linksklick ziehen</li>
        <li>Zoom: Mausrad</li>
        <li>Pan: bewusst nicht unterstützt</li>
      </ul>
      <h3>Mobile</h3>
      <ul>
        <li>Orbit: 1 Finger</li>
        <li>Zoom: Pinch (2 Finger)</li>
      </ul>
    </section>

  </div>
</section>