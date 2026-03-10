<?php
declare(strict_types=1);

$pageTitle = 'CV';
$pageDescription = 'Curriculum vitae of Christina Busacker';
$bodyClass = 'page--cv';

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
  <h1 id="cv-title" class="sr-only">CV</h1>

  <article class="cv-sheet" aria-label="CV page 1">
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
        <h2 class="cv-h2">About</h2>
        <p>
          With experience as Head of Web & Frontend Development and as a senior engineer, I combine technical expertise
          with a strong product and business mindset. My freelance work and leadership experience in complex projects
          help me adapt quickly and enable teams to succeed.
        </p>
        <p>
          My goal for the near future is to grow within a company long-term in a role that supports both personal and
          professional development.
        </p>

        <h2 class="cv-h2">Experience</h2>

        <section class="cv-entry" aria-label="Deichmann SE">
          <div class="cv-entry__when">06/2024 – present</div>
          <div class="cv-entry__role">Senior Software Developer / Tech Lead</div>
          <div class="cv-entry__org">Deichmann SE, Essen</div>
          <p>
            Working on multiple webshops built with Angular and NestJS in Nx monorepos. Since January 2025 I’ve been
            Tech Lead for the relaunch of the Ochsner Sport webshop, contributing beyond coding to process improvements
            and cross-team collaboration.
          </p>
        </section>

        <section class="cv-entry" aria-label="ITinchen">
          <div class="cv-entry__when">01/2019 – present</div>
          <div class="cv-entry__role">ITinchen (Freelance)</div>
          <div class="cv-entry__org">Self-employed, Germany</div>
          <p>
            Delivered projects for small businesses: consulting, design implementation (Figma/Adobe XD), and fullstack
            implementation using PHP, MySQL, JavaScript, Angular. Frequent focus: ticketing systems, webshops, and SEO.
          </p>
        </section>

        <section class="cv-entry" aria-label="evrbit GmbH">
          <div class="cv-entry__when">06/2022 – 05/2024</div>
          <div class="cv-entry__role">Head of Web & Frontend Development</div>
          <div class="cv-entry__org">evrbit GmbH, Cologne</div>
          <p>
            Led technical delivery and projects across Angular, React, PHP and Node.js. Built and managed a strong team,
            owned people leadership and team development and introduced agile workflows and tooling.
          </p>
        </section>
      </div>

      <aside class="cv-side" aria-label="Profile and skills">
        <figure class="cv-photo">
          <img src="/assets/images/selfimage-rosa-bg.png" alt="Portrait photo of Christina Busacker" />
          <figcaption>*03 Jan 1992, Aachen</figcaption>
        </figure>

        <section class="cv-side-block" aria-label="Languages">
          <h3 class="cv-h3">Languages</h3>
          <div class="cv-row"><span>German</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>English</span><?= cvDots(5) ?></div>
        </section>

        <section class="cv-side-block" aria-label="Core skills">
          <h3 class="cv-h3">Core skills</h3>
          <div class="cv-row"><span>Software leadership</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Architecture</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Team leadership</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Leadership</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Project management</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Jira Cloud</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Scrum</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>SEO</span><?= cvDots(4) ?></div>
          <div class="cv-row"><span>UX</span><?= cvDots(4) ?></div>
          <div class="cv-row"><span>WordPress</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>AI</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>Figma</span><?= cvDots(4) ?></div>
          <div class="cv-row"><span>Adobe XD</span><?= cvDots(4) ?></div>
        </section>

        <section class="cv-side-block" aria-label="Soft skills">
          <h3 class="cv-h3">Soft skills</h3>
          <div class="cv-row"><span>Teamwork</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Communication</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Fast learner</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Organization</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Time management</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Conflict resolution</span><?= cvDots(5) ?></div>
        </section>
      </aside>
    </div>
  </article>

  <article class="cv-sheet" aria-label="CV page 2">
    <header class="cv-header">
      <div class="cv-header__left">
        <img class="cv-logo" src="/assets/images/CMB_logoRose_480px.svg" alt="Logo" />
        <div class="cv-contact">
          <div><strong>+49 178 91 92 728</strong></div>
          <div><a href="mailto:email@christina-busacker.de">email@christina-busacker.de</a></div>
        </div>
      </div>

      <div class="cv-header__right"></div>
    </header>

    <div class="cv-grid">
      <div class="cv-main">
        <section class="cv-entry" aria-label="KPS Digital GmbH">
          <div class="cv-entry__when">10/2019 – 05/2022</div>
          <div class="cv-entry__role">Senior Frontend Developer</div>
          <div class="cv-entry__org">KPS Digital GmbH, Dortmund</div>
          <p>
            Worked mainly with Angular and Vue as well as Node.js and SCSS. Focus: collaboration with UX, responsive
            implementation, codebase improvements, coding guidelines, and support in requirements and architecture.
          </p>
        </section>

        <section class="cv-entry" aria-label="Iucon GmbH">
          <div class="cv-entry__when">12/2018 – 10/2019</div>
          <div class="cv-entry__role">Fullstack Developer</div>
          <div class="cv-entry__org">Iucon GmbH, Hattingen</div>
          <p>
            Maintained and extended existing C# / ASP.NET and jQuery projects. Built an e-commerce platform in C# with
            modern ECMAScript and SCSS. Created a small framework bridging jQuery syntax to modern methods to improve
            performance.
          </p>
        </section>

        <section class="cv-entry" aria-label="ObjectCode GmbH">
          <div class="cv-entry__when">09/2017 – 11/2018</div>
          <div class="cv-entry__role">Fullstack Developer</div>
          <div class="cv-entry__org">ObjectCode GmbH, Lünen</div>
          <p>
            Contributed to various 3D web applications and configurators using ECMAScript and Three.js.
          </p>
        </section>

        <h2 class="cv-h2">Education</h2>
        <section class="cv-entry" aria-label="IHK Dortmund">
          <div class="cv-entry__when">06/2015 – 06/2017</div>
          <div class="cv-entry__role">IT Specialist (Application Development)</div>
          <div class="cv-entry__org">IHK Dortmund</div>
          <p>
            School-based training with a larger practical phase at LPConcept (Essen). Worked on WordPress sites and
            on new pages using jQuery and CSS.
          </p>
          <p class="cv-small"><strong>Final grade:</strong> 2 &nbsp;&nbsp;/&nbsp;&nbsp; <strong>Project grade:</strong>
            1</p>
        </section>
      </div>

      <aside class="cv-side" aria-label="Skills and interests">
        <section class="cv-side-block" aria-label="Development skills">
          <h3 class="cv-h3">Development skills</h3>
          <div class="cv-row"><span>HTML5</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>CSS / SCSS</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>JavaScript</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>TypeScript</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Angular</span><?= cvDots(6) ?></div>
          <div class="cv-row"><span>Vue</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>React</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>GraphQL</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Three.js</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>PHP</span><?= cvDots(3) ?></div>
          <div class="cv-row"><span>C#</span><?= cvDots(2) ?></div>
          <div class="cv-row"><span>MySQL</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Express.js</span><?= cvDots(5) ?></div>
          <div class="cv-row"><span>Sequelize</span><?= cvDots(3) ?></div>
        </section>

        <section class="cv-side-block" aria-label="Training">
          <h3 class="cv-h3">Training</h3>
          <ul class="cv-list">
            <li>Leadership training</li>
            <li>Communication training</li>
            <li>Presentation training</li>
            <li>Jira workshops</li>
          </ul>
        </section>

        <section class="cv-side-block" aria-label="Interests">
          <h3 class="cv-h3">Interests</h3>
          <ul class="cv-list">
            <li>Cabaret</li>
            <li>Gaming</li>
            <li>Cats</li>
            <li>Physics / science</li>
            <li>Cooking / baking</li>
          </ul>
        </section>

        <p class="cv-print-hint cv-print-hide">
          Tip: Press <kbd>Ctrl</kbd> + <kbd>P</kbd> to print this page as a CV.
        </p>
      </aside>
    </div>
  </article>
</section>