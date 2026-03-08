<section class="hero" id="top" aria-labelledby="hero-title">
  <div class="hero__content">
    <p class="hero__eyebrow text-heading">Tech Lead · Webplattformen · Team Enablement</p>
    <h1 id="hero-title">Ich mache skalierbare Webplattformen zuverlässig lieferbar.</h1>
    <p>
      Architektur-Entscheidungen, die später nicht wehtun, plus Teams, die sie umsetzen können. Fokus: Developer
      Experience, Qualität, Performance.
    </p>
    <div class="ctas">
      <a href="/#projects" class="button" aria-label="Zum Projektebereich springen">
        Projekte ansehen
      </a>
      <a href="/#contact" class="button primary" aria-label="Zur Kontaktsektion springen">
        Kontakt aufnehmen
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
      <img src="/assets/images/Selfimage-transparent.png" alt="Bild von Christina Busacker" />
    </div>
  </div>
</section>

<section id="about" aria-labelledby="about-title">
  <h2 id="about-title">Wer ich bin</h2>
  <p>
    Ich bin Softwareentwicklerin mit Fokus auf Webplattformen im Bereich E-Commerce und SaaS und arbeite seit über 10
    Jahren an Produkt- und Plattformprojekten, sowohl im Team als auch selbstständig.
  </p>
  <p>
    Ich arbeite gerne an Systemen, die lange leben müssen: klare Grenzen, gute Defaults, wenig Magie. In Teams
    fokussiere ich auf Enablement: gute Reviews, nachvollziehbare Entscheidungen und Tooling, das niemand hasst.
  </p>
  <p>
    Verantwortung habe ich früh übernommen, auch ohne formalen Lead-Titel: Standards eingeführt, Refactorings
    vorangetrieben und Observability über OpenTelemetry aufgebaut, damit Probleme schneller gefunden und Releases
    verlässlicher werden.
  </p>
</section>

<section id="skills" aria-labelledby="skills-title">
  <h2 id="skills-title">Was ich liefere</h2>
  <div class="grid">
    <article class="card">
      <h3>Team Enablement</h3>
      <p>Ich bringe Teams in eine Arbeitsweise, die dauerhaft liefert.</p>
      <ul>
        <li>Reviews, Standards, Mentoring</li>
        <li>DX: Tooling, Build-/Test-Setup, klare Defaults</li>
        <li>Technische Entscheidungen nachvollziehbar dokumentiert</li>
      </ul>
    </article>

    <article class="card">
      <h3>Plattform-Architektur</h3>
      <p>Strukturen, die skalieren, ohne dass jede Änderung weh tut.</p>
      <ul>
        <li>Modulare Architektur, klare Boundaries</li>
        <li>API-Design, Versionierung, Migrationsstrategien</li>
        <li>Monorepo/Nx, wiederverwendbare Libraries</li>
      </ul>
    </article>

    <article class="card">
      <h3>Qualität & Observability</h3>
      <p>Probleme werden früh sichtbar und Releases bleiben kontrollierbar.</p>
      <ul>
        <li>OpenTelemetry Tracing, Logging, Monitoring</li>
        <li>Teststrategie und CI/CD als “Default”, nicht als Projekt</li>
        <li>Performance-Budgets und pragmatische Optimierung</li>
      </ul>
    </article>

    <article class="card">
      <h3>Stack (Auswahl)</h3>
      <ul>
        <li>TypeScript · Angular · NestJS · Node.js</li>
        <li>SSR · REST · SSE · TypeORM</li>
        <li>Docker · Pipelines · Deployments</li>
      </ul>
    </article>
  </div>
</section>

<section id="projects" aria-labelledby="projects-title">
  <h2 id="projects-title">Projekte</h2>

  <article class="project-card" id="project-solarsystem" aria-labelledby="project-solarsystem-title">
    <h3 id="project-solarsystem-title">SolarSystem</h3>
    <p class="subline">WebGL-basierter Solar-System-Renderer</p>
    <p>
      Eine leichtgewichtige TypeScript-Anwendung auf Basis von Three.js mit realistischen Größenverhältnissen,
      Orbitalbahnen, eigenen GLSL-Shadern, dezenten cineastischen Effekten und ergänzenden Informationen zu den
      Planeten.
    </p>

    <div class="card-grid">
      <section aria-labelledby="project-solarsystem-tech-title">
        <h4 id="project-solarsystem-tech-title">Technologien</h4>
        <ul>
          <li>WebGL</li>
          <li>Three.js</li>
          <li>TypeScript</li>
        </ul>
      </section>

      <section aria-labelledby="project-solarsystem-focus-title">
        <h4 id="project-solarsystem-focus-title">Schwerpunkte</h4>
        <ul>
          <li>Performante Implementierung</li>
          <li>Gutes Benutzergefühl</li>
          <li>Saubere visuelle Darstellung</li>
        </ul>
      </section>
    </div>

    <a href="/projekte/solarsystem" class="button" aria-label="Projektseite SolarSystem ansehen">
      Projekt ansehen
    </a>
  </article>

  <article class="project-card" id="project-lmstudio" aria-labelledby="project-lmstudio-title">
    <h3 id="project-lmstudio-title">LMstudio-web</h3>
    <p class="subline">Eine Local-First-LAN-Anwendung auf Basis von LM Studio</p>
    <p>
      Dieses Projekt bietet eine browserbasierte Benutzeroberfläche, um LM Studio im lokalen Netzwerk komfortabel
      zugänglich zu machen. Der Fokus liegt auf einer sauberen Systemarchitektur, Tool-Use und komplexeren Workflows.
    </p>

    <div class="card-grid">
      <section aria-labelledby="project-lmstudio-tech-title">
        <h4 id="project-lmstudio-tech-title">Technologien</h4>
        <ul>
          <li>Angular</li>
          <li>NestJS</li>
          <li>TypeORM</li>
          <li>Server-Sent Events</li>
        </ul>
      </section>

      <section aria-labelledby="project-lmstudio-focus-title">
        <h4 id="project-lmstudio-focus-title">Schwerpunkte</h4>
        <ul>
          <li>Saubere Architektur</li>
          <li>Warteschlange für Anfragen</li>
          <li>Workflows über Node-Diagramme</li>
          <li>LLM-Tools</li>
        </ul>
      </section>
    </div>

    <a href="/projekte/lmstudio-web" class="button" aria-label="Projektseite LMstudio-web ansehen">
      Projekt ansehen
    </a>
  </article>

  <article class="project-card" id="project-editron" aria-labelledby="project-editron-title">
    <h3 id="project-editron-title">Editron CMS</h3>
    <p class="subline">Modulares CMS-System für flexible Webplattformen</p>
    <p>
      Ein vollständig modular aufgebautes CMS mit Angular-Frontend und NestJS-Backend. Das System ermöglicht dynamische
      Inhaltsstrukturen, modulare Erweiterungen und serverseitiges Rendering.
    </p>

    <div class="card-grid">
      <section aria-labelledby="project-editron-tech-title">
        <h4 id="project-editron-tech-title">Technologien</h4>
        <ul>
          <li>Angular</li>
          <li>NestJS</li>
          <li>Nx Monorepo</li>
          <li>TypeORM</li>
        </ul>
      </section>

      <section aria-labelledby="project-editron-focus-title">
        <h4 id="project-editron-focus-title">Schwerpunkte</h4>
        <ul>
          <li>Modulare Architektur</li>
          <li>Dynamisches Content-Modell</li>
          <li>SSR-Rendering</li>
        </ul>
      </section>
    </div>

    <a href="/projekte/editron-cms" class="button" aria-label="Projektseite Editron CMS ansehen">
      Projekt ansehen
    </a>
  </article>
</section>

<section id="workflow" aria-labelledby="workflow-title">
  <h2 id="workflow-title">Arbeitsweise</h2>

  <div class="grid">
    <article class="card">
      <h3>1. Ziel & Constraints</h3>
      <p>Ich kläre Scope, Risiken und was “fertig” bedeutet, bevor wir Architektur diskutieren.</p>
    </article>

    <article class="card">
      <h3>2. Entscheidungen, die man wiederfindet</h3>
      <p>Trade-offs kurz dokumentiert, damit das Team später nicht dieselbe Debatte wiederholt.</p>
    </article>

    <article class="card">
      <h3>3. Enablement statt Heldentum</h3>
      <p>Standards, Reviews und Tooling so, dass das Team ohne Bottleneck liefern kann.</p>
    </article>

    <article class="card">
      <h3>4. Betrieb als Teil des Produkts</h3>
      <p>Tracing, Logs und Tests sind kein “später”, sondern Voraussetzung für verlässliche Releases.</p>
    </article>
  </div>
</section>

<section id="principles" aria-labelledby="principles-title">
  <h2 id="principles-title">Technische Prinzipien</h2>
  <p>Einige Grundprinzipien, die meine Arbeit prägen:</p>
  <ul>
    <li>Boring Tech, solange kein messbarer Gewinn dagegen spricht.</li>
    <li>Beobachtbarkeit ist Teil des Produkts.</li>
    <li>Verbindliche Commitments sind wichtiger als unverbindliche Versprechen.</li>
  </ul>
</section>

<section id="contact" aria-labelledby="contact-title">
  <h2 id="contact-title">Kontakt</h2>
  <p>
    Ich bin offen für Positionen im Bereich technische Leitung, Softwarearchitektur sowie für ausgewählte
    Beratungsprojekte.
  </p>

  <div class="contact-grid">
    <section class="card" aria-labelledby="contact-form-title">
      <h3 id="contact-form-title">Kontaktformular</h3>
      <form aria-label="Kontaktformular">
        <!-- Kontaktformular folgt -->
      </form>
    </section>

    <section class="card" aria-labelledby="contact-other-title">
      <h3 id="contact-other-title">Weitere Kontaktwege</h3>
      <address>
        <ul>
          <li>
            <a href="mailto:email@christina-busacker.de" aria-label="E-Mail an Christina Busacker senden">
              email@christina-busacker.de
            </a>
          </li>
          <li>
            <a href="https://www.linkedin.com/in/christina-busacker/" rel="me noopener noreferrer" target="_blank"
              aria-label="LinkedIn-Profil von Christina Busacker öffnen">
              LinkedIn
            </a>
          </li>
        </ul>
      </address>
    </section>
  </div>
</section>