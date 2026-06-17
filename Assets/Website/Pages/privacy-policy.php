<?php
require_once __DIR__ . '/../../../config-loader.php';

$pageTitle       = 'Privacy Policy — ' . getConfig('clinic.name');
$pageDescription = 'How ' . getConfig('clinic.name') . ' collects, uses and protects your personal information.';
$activeNav       = 'privacy';
$lastUpdated     = date('F Y');

require __DIR__ . '/../Contents/header.php';
?>
<style>
/* =========================================================
   LEGAL PAGES — shared section-scoped styles
   ========================================================= */
.legal-hero { padding: clamp(8.5rem, 13vw, 10rem) 0 clamp(2rem, 4vw, 2.8rem); text-align: center; }
.legal-hero h1 { font-size: clamp(1.9rem, 3.6vw, 2.6rem); margin-top: 0.8rem; }
.legal-hero .updated { font-family: var(--font-mono); font-size: 0.78rem; color: var(--text-muted); margin-top: 0.8rem; }

.legal-body { max-width: 760px; margin: 0 auto; }
.legal-body h2 { font-size: 1.25rem; margin-top: 2.4rem; margin-bottom: 0.8rem; color: var(--ink); }
.legal-body h2:first-child { margin-top: 0; }
.legal-body p { color: var(--text-muted); font-size: 0.96rem; line-height: 1.75; margin-bottom: 0.9rem; }
.legal-body ul { margin: 0.6rem 0 1rem 1.2rem; color: var(--text-muted); font-size: 0.96rem; line-height: 1.75; }
.legal-body li { margin-bottom: 0.4rem; }
.legal-body strong { color: var(--ink); }
.legal-toc { display: flex; flex-wrap: wrap; gap: 0.6rem; margin-bottom: 2.4rem; }
.legal-toc a {
  font-size: 0.8rem; padding: 0.45rem 0.9rem; border-radius: var(--radius-pill);
  background: var(--glass-light-bg); border: 1px solid var(--glass-light-border); color: var(--ink); text-decoration: none;
}
</style>

<!-- ================= HERO ================= -->
<section class="legal-hero">
  <div class="container reveal">
    <span class="eyebrow" style="justify-content:center;">Legal</span>
    <h1>Privacy Policy</h1>
    <p class="updated">Last updated: <?= htmlspecialchars($lastUpdated) ?></p>
  </div>
</section>

<!-- ================= BODY ================= -->
<section class="section">
  <div class="container">
    <div class="legal-body reveal">
      <div class="legal-toc">
        <a href="#info-we-collect">Information We Collect</a>
        <a href="#how-we-use">How We Use It</a>
        <a href="#cookies">Cookies</a>
        <a href="#third-party">Third-Party Sharing</a>
        <a href="#security">Data Security</a>
        <a href="#your-rights">Your Rights</a>
        <a href="#children">Children&rsquo;s Privacy</a>
        <a href="#changes">Changes to This Policy</a>
        <a href="#contact">Contact Us</a>
      </div>

      <p><?= htmlspecialchars(getConfig('clinic.name')) ?> ("we", "us", or "our") respects your privacy and is
        committed to protecting the personal and health-related information you share with us. This policy explains
        what we collect, how we use it, and the choices available to you when you visit our website or our clinics.</p>

      <h2 id="info-we-collect">1. Information We Collect</h2>
      <p>We may collect the following categories of information when you interact with our website or book an
        appointment with us:</p>
      <ul>
        <li><strong>Contact details</strong> — name, phone number, email address, and preferred clinic location.</li>
        <li><strong>Appointment information</strong> — treatment of interest, preferred dates, and any notes you choose to share with us.</li>
        <li><strong>Health information</strong> — provided voluntarily during consultations and treatment, handled under applicable medical confidentiality standards.</li>
        <li><strong>Technical information</strong> — such as browser type and general usage patterns collected automatically when you visit our website.</li>
      </ul>

      <h2 id="how-we-use">2. How We Use Your Information</h2>
      <p>We use the information collected to schedule and manage appointments, communicate with you about your
        treatment and follow-up care, respond to enquiries submitted through our contact and booking forms, and
        improve our website and services. We do not use your health information for marketing without your explicit consent.</p>

      <h2 id="cookies">3. Cookies</h2>
      <p>Our website may use basic cookies or similar technologies to remember your preferences and understand how
        visitors use our pages. You can disable cookies through your browser settings at any time; doing so should
        not affect your ability to browse the website, though some features may behave differently.</p>

      <h2 id="third-party">4. Third-Party Sharing</h2>
      <p>We do not sell or rent your personal information to third parties. We may share limited information with
        trusted service providers who help us operate our practice — such as appointment reminder services or
        payment processors — solely for the purpose of delivering our services, and only to the extent necessary.</p>

      <h2 id="security">5. Data Security</h2>
      <p>We maintain reasonable administrative, technical, and physical safeguards to protect the information you
        share with us against unauthorised access, alteration, or disclosure. While no method of transmission or
        storage is completely secure, we work to keep your information protected at every stage.</p>

      <h2 id="your-rights">6. Your Rights</h2>
      <p>You may request access to, correction of, or deletion of the personal information we hold about you, subject
        to any legal or medical record-keeping requirements. To make such a request, please contact us using the
        details below.</p>

      <h2 id="children">7. Children&rsquo;s Privacy</h2>
      <p>Where we provide paediatric dental care, information about a child patient is collected and used only with
        the consent and involvement of a parent or legal guardian, and is handled with the same care as any other
        patient information.</p>

      <h2 id="changes">8. Changes to This Policy</h2>
      <p>We may update this Privacy Policy from time to time to reflect changes in our practices or for legal
        reasons. Any updates will be posted on this page along with a revised "last updated" date.</p>

      <h2 id="contact">9. Contact Us</h2>
      <p>If you have any questions about this Privacy Policy or how your information is handled, please reach out to
        us at <strong><?= htmlspecialchars(getConfig('contact.email')) ?></strong> or call
        <strong><?= htmlspecialchars(getConfig('contact.phoneDisplay')) ?></strong>.</p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../Contents/footer.php'; ?>