<?php
$pageTitle = 'SolarSystem';
$pageDescription = 'Framework-free solar system renderer with Three.js + TypeScript: real scale & orbits, custom GLSL shaders, and subtle cinematic polish.';
$pageCanonical = '/projects/solarsystem';
?>

<section class="project-detail" aria-labelledby="project-title" style="view-transition-name: project-solarsystem;">
  <header class="project-detail__hero">
    <div class="project-detail__intro">
      <p class="project-detail__kicker">Three.js · TypeScript · WebGL</p>
      <h1 id="project-title">SolarSystem</h1>
      <p class="project-detail__lead">
        A lightweight, framework-free Solar System renderer focused on real scale & orbit data,
        custom GLSL shaders, and subtle cinematic polish.
      </p>

      <div class="project-detail__actions">
        <a class="button primary" href="https://cmbu.de/" target="_blank" rel="noopener noreferrer">Live demo</a>
        <a class="button github" href="https://github.com/ChristinaBusacker/SolarSystem" target="_blank"
          rel="noopener noreferrer"><img src="/assets/images/github-fill.svg" alt="Github Logo">GitHub</a>
        <a class="button ghost" href="/projects">Back</a>
      </div>

      <div class="project-detail__tags" aria-label="Technologies">
        <ul class="tags">
          <li>Framework-free</li>
          <li>Custom GLSL</li>
          <li>Post-processing</li>
          <li>Mobile controls</li>
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
      <h2 id="section-why">Why this exists</h2>
      <p>
        SolarSystem started as a deep dive into modern web 3D: shaders, post-processing, camera/orbit controls,
        UI overlays, and performance trade-offs without hiding behind a framework.
      </p>
      <p>
        It’s a learning project, but built like something I’d actually ship: typed, modular, and maintainable.
      </p>
    </section>

    <section class="card" aria-labelledby="section-highlights">
      <h2 id="section-highlights">Highlights</h2>
      <ul>
        <li>Real scale & orbits (with small pragmatic adjustments for usability).</li>
        <li>Custom shader pipeline incl. multi-caster shadowing for believable occlusion/eclipses.</li>
        <li>Optional cinematic polish: bloom, lens flare, procedural starfield.</li>
        <li>Mobile-friendly controls (orbit + pinch zoom) and responsive UI.</li>
      </ul>
    </section>

    <section class="card" aria-labelledby="section-controls">
      <h2 id="section-controls">Controls</h2>
      <h3>Desktop</h3>
      <ul>
        <li>Orbit: left mouse drag</li>
        <li>Zoom: mouse wheel</li>
        <li>Pan: intentionally not supported</li>
      </ul>
      <h3>Mobile</h3>
      <ul>
        <li>Orbit: 1 finger drag</li>
        <li>Zoom: 2 finger pinch</li>
      </ul>
    </section>

  </div>
</section>