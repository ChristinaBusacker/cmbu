<?php
declare(strict_types=1);

$pageTitle = 'Lebenslauf';
$pageDescription = 'Lebenslauf von Christina Busacker';
$bodyClass = 'page--cv';

/**
 * Render rating dots (filled/total).
 */
function cvDots(int $filled, int $total = 6): string
{
  $filled = max(0, min($total, $filled));
  $html = '<span class="cv-dots" aria-hidden="true">';
  for ($i = 1; $i <= $total; $i++) {
    $html .= '<span class="cv-dot ' . ($i <= $filled ? 'is-on' : 'is-off') . '"></span>';
  }
  $html .= '</span>';
  return $html;
}
?>

<section class="cv-wrapper" aria-labelledby="cv-title">
  <h1 id="cv-title" class="sr-only">Lebenslauf</h1>

  <!-- Sheet 1 -->
  <article class="cv-sheet" aria-label="Lebenslauf Seite 1">
    <header class="cv-header">
      <div class="cv-header__left">
        <img class="cv-logo" src="/assets/images/CMB_logoRose_480px.svg" alt="Logo" />
        <div class="cv-contact">
          <div><strong>+49 178 91 92 728</strong></div>
          <div><a href="mailto:email@christina-busacker.de">email@christina-busacker.de</a></div>
        </div>
      </div>

      <div class="cv-header__right">
        <div class="cv-name">Christina Marie Busacker</div>
        <div>Im Birkenkamp 19</div>
        <div>47166 Duisburg</div>
      </div>
    </header>

    <div class="cv-grid">
      <div class="cv-main">
        <div class="spacer"></div>
        <h2 class="cv-h2">Über mich</h2>
        <p>
          Durch meine Erfahrungen als Head of Webentwicklung und Senior Entwicklerin verbinde ich technische Expertise
          mit strategischem Geschäftssinn. Das während meiner Selbstständigkeit erworbene Know-how und meine
          betriebliche
          Praxis in der Leitung und Umsetzung komplexer Projekte ermöglicht es mir, mich gut in neuen Situationen
          einzufinden und mein Team zum Erfolg zu führen.
        </p>
        <p>
          Mein Hauptziel für die nähere Zukunft ist, in einem Unternehmen anzukommen. Ich wünsche mir eine langfristige
          Zusammenarbeit, die mich menschlich und beruflich wachsen lässt.
        </p>

        <h2 class="cv-h2">Berufserfahrungen</h2>

        <section class="cv-entry" aria-label="Deichmann SE">
          <div class="cv-entry__when">06/2024 – aktuell</div>
          <div class="cv-entry__role">Senior Software Developer / Tech Lead</div>
          <div class="cv-entry__org">Deichmann SE, Essen</div>
          <p>
            Bei der Deichmann SE bin ich derzeit an der Entwicklung verschiedener Webshops mit Angular und NestJS in
            NX-Monorepos beteiligt. Seit Januar 2025 arbeite ich als Tech-Lead am Relaunch des neuen Ochsner
            Sport-Webshops. Dabei bringe ich mich auch außerhalb der Programmierung in die Optimierung von Prozessen
            und die Zusammenarbeit mit anderen Abteilungen ein.
          </p>
        </section>

        <section class="cv-entry" aria-label="ITinchen">
          <div class="cv-entry__when">01/2019 – aktuell</div>
          <div class="cv-entry__role">ITinchen</div>
          <div class="cv-entry__org">Selbständig, bundesweit</div>
          <p>
            Als Selbstständige habe ich neben Kundenakquise und -beratung verschiedene Projekte für Kleinunternehmer
            umgesetzt. Dabei ging es nicht nur um die Erstellung und Umsetzung von Designs in Figma oder Adobe XD,
            sondern auch um die Implementierung der Backend- und Frontend-Anforderungen mittels PHP, MySQL, JavaScript
            oder Angular. Oft habe ich hier vor allem die Integration von Ticketsystemen und Webshops übernommen. Die
            Umsetzung entsprechender SEO-Anforderungen ist dabei immer selbstverständlich.
          </p>
        </section>

        <section class="cv-entry" aria-label="evrbit GmbH">
          <div class="cv-entry__when">06/2022 – 05/2024</div>
          <div class="cv-entry__role">Head of Web- and Frontend Development</div>
          <div class="cv-entry__org">evrbit GmbH, Köln</div>
          <p>
            Bei evrbit verantwortete ich als Head die technische und projektbezogene Leitung, einschließlich der
            Entwicklung und Umsetzung von Projekten mit Angular, React, PHP und Node.js. Ich baute ein leistungsstarkes
            Team auf, übernahm die disziplinarische Führung, förderte die Weiterentwicklung jedes Teammitglieds und …
          </p>
        </section>
      </div>

      <aside class="cv-side" aria-label="Profil und Kompetenzen">
        <figure class="cv-photo">
          <img src="/assets/images/selfimage-rosa-bg.png" alt="Porträtfoto von Christina Busacker" />
          <figcaption>*03. 01. 1992, Aachen</figcaption>
        </figure>

        <section class="cv-side-block" aria-label="Sprachen">
          <h3 class="cv-h3">Sprachen</h3>
          <div class="cv-row">
            <span>Deutsch</span>
            <?= cvDots(6) ?>
          </div>
          <div class="cv-row">
            <span>Englisch</span>
            <?= cvDots(5) ?>
          </div>
        </section>

        <section class="cv-side-block" aria-label="Kenntnisse">
          <h3 class="cv-h3">Kenntnisse</h3>

          <div class="cv-row"><span>Leitung Software</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Software Architektur</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Teamführung</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Leadership</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Projektmanagement</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Jira-Cloud</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Scrum</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>SEO</span><?= cvDots(4) ?></div>
          <div class="cv-row"><span>UX</span><?= cvDots(4) ?></div>
          <div class="cv-row"><span>Wordpress</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>AI</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>Figma</span><?= cvDots(4) ?></div>
          <div class="cv-row"><span>Adobe XD</span><?= cvDots(4) ?></div>
        </section>

        <section class="cv-side-block" aria-label="Softskills">
          <h3 class="cv-h3">Softskills</h3>
          <div class="cv-row"><span>Teamfähigkeit</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Kommunikation</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Auffassungsgabe</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Organisation</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Zeitmanagement</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Konfliktlösung</span><?= cvDots(5) ?></div>
        </section>
      </aside>
    </div>
  </article>

  <!-- Sheet 2 -->
  <article class="cv-sheet" aria-label="Lebenslauf Seite 2">
    <header class="cv-header">
      <div class="cv-header__left">
        <img class="cv-logo" src="/assets/images/CMB_logoRose_480px.svg" alt="Logo" />
        <div class="cv-contact">
          <div><strong>+49 178 91 92 728</strong></div>
          <div><a href="mailto:email@christina-busacker.de">email@christina-busacker.de</a></div>
        </div>
      </div>

      <div class="cv-header__right">
        <!-- bewusst leer wie im PDF -->
      </div>
    </header>

    <div class="cv-grid">
      <div class="cv-main">
        <p class="cv-continuation">
          … optimierte die teamübergreifende Effizienz durch die Einführung agiler Methoden wie Scrum und Tools wie
          Jira.
          Meine Rolle umfasste zudem die Ressourcenplanung, wie auch die Implementierung von Workflows, um
          Projektmanagementprozesse zu verbessern und die Produktivität zu steigern. Dazu kam Design von
          Software-Architekturen und Integration von verteilten Systemen und Microservices.
        </p>

        <section class="cv-entry" aria-label="KPS Digital">
          <div class="cv-entry__when">10/2019 – 05/2022</div>
          <div class="cv-entry__role">Senior Frontend Entwicklerin</div>
          <div class="cv-entry__org">KPS Digital GmbH, Dortmund</div>
          <p>
            Bei der KPS habe ich primär mit Angular und Vue, sowie NodeJS und SCSS gearbeitet. Im Fokus stand hier die
            Zusammenarbeit mit dem UX Team und die Umsetzung von responsiven Designs, Optimierung von vorhandenem Code,
            sowie das Ausarbeiten von Coding Guidelines, um die Wartbarkeit und Sauberkeit im Quellcode zu
            gewährleisten.
            Außerdem habe ich hier im Requirement Engineering und beim Gestalten der Software Architektur unterstützt.
          </p>
        </section>

        <section class="cv-entry" aria-label="Iucon GmbH">
          <div class="cv-entry__when">12/2018 – 10/2019</div>
          <div class="cv-entry__role">Fullstack Entwicklerin</div>
          <div class="cv-entry__org">Iucon GmbH, Hattingen</div>
          <p>
            Bei der Iucon GmbH habe ich bereits bestehende Projekte mit C# unter ASP.NET und JQuery gewartet und
            weiterentwickelt. Dazu kam die eigenständige Entwicklung einer E-Commerce Plattform unter C#, mit
            Unterstützung von ECMAScript6 und SCSS unter Webpack 4. Außerdem habe ich ein Framework entwickelt, das die
            JQuery Syntax in bestehenden Projekten mit ECMAScript6 Methoden überspielt, um die Performance der
            Anwendungen
            zu verbessern.
          </p>
        </section>

        <section class="cv-entry" aria-label="ObjectCode GmbH">
          <div class="cv-entry__when">09/2017 – 11/2018</div>
          <div class="cv-entry__role">Fullstack Entwicklerin</div>
          <div class="cv-entry__org">ObjectCode GmbH, Lünen</div>
          <p>
            Bei ObjectCode war ich an der Entwicklung unterschiedlicher 3D Webapplikationen / 3D Konfiguratoren in
            ECMAScript6 und THREEJS beteiligt.
          </p>
        </section>

        <h2 class="cv-h2">Ausbildung</h2>
        <section class="cv-entry" aria-label="Ausbildung">
          <div class="cv-entry__when">06/2015 – 06/2017</div>
          <div class="cv-entry__role">Fachinformatiker Anwendungsentwicklung</div>
          <div class="cv-entry__org">IHK Dortmund</div>
          <p>
            Schulische Ausbildung mit einer größeren Praxisphase bei LPConcept in Essen. Dort habe ich sowohl an
            Wordpress
            Seiten gearbeitet als auch an neuen Seiten mit JQuery und CSS.
          </p>
          <p class="cv-small"><strong>Abschlussnote:</strong> 2 &nbsp;&nbsp;/&nbsp;&nbsp; <strong>Projektnote:</strong>
            1</p>
        </section>
      </div>

      <aside class="cv-side" aria-label="Kenntnisse und Interessen">
        <section class="cv-side-block" aria-label="Kenntnisse Entwicklung">
          <h3 class="cv-h3">Kenntnisse-Entwicklung</h3>

          <div class="cv-row"><span>HTML5</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>CSS3 / SCSS</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>JavaScript</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>TypeScript</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Angular</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Vue</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>React</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>GraphQL</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>THREEJS</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>PHP</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>C#</span><?= cvDots(2) ?></div>
          <div class="cv-row"><span>MySQL</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>ExpressJS</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Sequelize</span><?= cvDots(3) ?></div>
        </section>

        <section class="cv-side-block" aria-label="Weiterbildungen">
          <h3 class="cv-h3">Weiterbildungen</h3>
          <ul class="cv-list">
            <li>Führungstraining</li>
            <li>Kommunikationstraining</li>
            <li>Präsentationstraining</li>
            <li>Jira Workshops</li>
          </ul>
        </section>

        <section class="cv-side-block" aria-label="Interessen">
          <h3 class="cv-h3">Interessen</h3>
          <ul class="cv-list">
            <li>Kabarett</li>
            <li>Gaming</li>
            <li>Katzen</li>
            <li>Physik / Wissenschaft</li>
            <li>Kochen / Backen</li>
          </ul>
        </section>

        <p class="cv-print-hint cv-print-hide">
          Tipp: Mit <kbd>Strg</kbd> + <kbd>P</kbd> kannst du diese Seite direkt als Lebenslauf drucken.
        </p>
      </aside>
    </div>
  </article>
</section>