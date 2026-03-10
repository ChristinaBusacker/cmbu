<?php
$pageTitle = 'Projects';
$pageDescription = 'A list of Projects made bei the author';
?>
<section id="projects" aria-labelledby="projects-title">
    <h1>Projects</h1>

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
                    A lightweight TypeScript application based on Three.js featuring realistic scaling, orbital paths,
                    custom GLSL shaders, subtle cinematic effects, and additional information about the planets.
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

        <a href="/projects/solarsystem" class="button" data-vt="project-solarsystem"
            aria-label="Open SolarSystem project page">
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
                    A browser-based UI to make LM Studio comfortably accessible within a local network. Focus: clean
                    system
                    architecture, tool use, and advanced workflows.
                </p>
            </div>

            <div class="project-media" aria-hidden="true">
                <figure class="mockup mockup--desktop">
                    <img src="/assets/images/lmstudio-web-2-thumb.jpg" alt="" loading="lazy" width="1200"
                        height="750" />
                </figure>

                <figure class="mockup mockup--phone">
                    <img src="/assets/images/lmstudio-web-mobile-1-thumb.jpg" alt="" loading="lazy" width="450"
                        height="900" />
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

        <a href="/projects/lmstudio-web" data-vt="project-lmstudio" class="button"
            aria-label="Open LMstudio-web project page">
            View project
        </a>
    </article>
</section>