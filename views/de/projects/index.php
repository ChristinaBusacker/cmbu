<?php
$pageTitle = 'Projekte';
$pageDescription = 'Eine auflistung der Projekte der Autorin';
?>
<section id="projects" aria-labelledby="projects-title">
    <h1>Projekte</h1>

    <article class="project-card" id="project-solarsystem" aria-labelledby="project-solarsystem-title">
        <div class="project-card__content">
            <div>
                <div class="project-card__header">
                    <div class="project-card__meta">
                        <h3 id="project-solarsystem-title">SolarSystem</h3>
                        <p class="subline">WebGL-basierter Solar-System-Renderer</p>
                    </div>

                </div>

                <p>
                    Eine leichtgewichtige TypeScript-Anwendung auf Basis von Three.js mit realistischen
                    Größenverhältnissen,
                    Orbitalbahnen, eigenen GLSL-Shadern, dezenten cineastischen Effekten und ergänzenden Informationen
                    zu den
                    Planeten.
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

        <div class="project-card__tags" aria-label="Projekt SolarSystem Details">
            <section aria-labelledby="project-solarsystem-tech-title">
                <h4 id="project-solarsystem-tech-title">Technologien</h4>
                <ul class="tags">
                    <li>WebGL</li>
                    <li>Three.js</li>
                    <li>TypeScript</li>
                </ul>
            </section>

            <section aria-labelledby="project-solarsystem-focus-title">
                <h4 id="project-solarsystem-focus-title">Schwerpunkte</h4>
                <ul class="tags">
                    <li>Performance</li>
                    <li>UX</li>
                    <li>Shader</li>
                </ul>
            </section>
        </div>

        <a href="/projects/solarsystem" data-vt="project-solarsystem" class="button"
            aria-label="Projektseite SolarSystem ansehen">
            Projekt ansehen
        </a>
    </article>

    <article class="project-card" id="project-lmstudio" aria-labelledby="project-lmstudio-title">

        <div class="project-card__content">
            <div>
                <div class="project-card__header">
                    <div class="project-card__meta">
                        <h3 id="project-lmstudio-title">LMstudio-web</h3>
                        <p class="subline">Eine Local-First-LAN-Anwendung auf Basis von LM Studio</p>
                    </div>
                </div>

                <p>
                    Dieses Projekt bietet eine browserbasierte Benutzeroberfläche, um LM Studio im lokalen Netzwerk
                    komfortabel
                    zugänglich zu machen. Der Fokus liegt auf einer sauberen Systemarchitektur, Tool-Use und komplexeren
                    Workflows.
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



        <div class="project-card__tags" aria-label="Projekt LMstudio-web Details">
            <section aria-labelledby="project-lmstudio-tech-title">
                <h4 id="project-lmstudio-tech-title">Technologien</h4>
                <ul class="tags">
                    <li>Angular</li>
                    <li>NestJS</li>
                    <li>TypeORM</li>
                    <li>SSE</li>
                </ul>
            </section>

            <section aria-labelledby="project-lmstudio-focus-title">
                <h4 id="project-lmstudio-focus-title">Schwerpunkte</h4>
                <ul class="tags">
                    <li>Queue</li>
                    <li>Node-Workflows</li>
                    <li>Tool Use</li>
                    <li>Architektur</li>
                </ul>
            </section>
        </div>

        <a href="/projects/lmstudio-web" data-vt="project-lmstudio" class="button"
            aria-label="Projektseite LMstudio-web ansehen">
            Projekt ansehen
        </a>
    </article>
</section>