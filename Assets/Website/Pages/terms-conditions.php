<?php
require_once __DIR__ . '/../../../config-loader.php';

$pageTitle       = 'Terms & Conditions — ' . getConfig('clinic.name');
$pageDescription = 'Terms and conditions governing use of the ' . getConfig('clinic.name') . ' website and clinic services.';
$activeNav       = 'terms';
$lastUpdated     = date('F Y');

require __DIR__ . '/../Contents/header.php';
?>
<style>
/* Re-uses the same .legal-* styles defined inline on the Privacy Policy page. */
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
    <h1>Terms &amp; Conditions</h1>
    <p class="updated">Last updated: <?= htmlspecialchars($lastUpdated) ?></p>
  </div>
</section>

<!-- ================= BODY ================= -->
<section class="section">
  <div class="container">
    <div class="legal-body reveal">
      <div class="legal-toc">
        <a href="#acceptance">Acceptance of Terms</a>
        <a href="#use-of-website">Use of Website</a>
        <a href="#appointments">Appointment &amp; Cancellation Policy</a>
        <a href="#medical-disclaimer">Medical Disclaimer</a>
        <a href="#payment">Payment Terms</a>
        <a href="#ip">Intellectual Property</a>
        <a href="#liability">Limitation of Liability</a>
        <a href="#governing-law">Governing Law</a>
        <a href="#changes">Changes to Terms</a>
        <a href="#contact">Contact Us</a>
      </div>

      <p>These Terms &amp; Conditions govern your use of the <?= htmlspecialchars(getConfig('clinic.name')) ?>
        website and the booking of appointments through it. By using this website or booking a consultation with
        us, you agree to the terms set out below.</p>

      <h2 id="acceptance">1. Acceptance of Terms</h2>
      <p>By accessing this website, submitting a form, or booking an appointment, you confirm that you have read,
        understood, and agree to be bound by these Terms &amp; Conditions. If you do not agree, please do not use
        this website or our booking services.</p>

      <h2 id="use-of-website">2. Use of Website</h2>
      <p>This website is provided for informational purposes and to facilitate appointment requests. You agree to
        use it only for lawful purposes and not to submit false, misleading, or malicious information through any
        form on this site.</p>

      <h2 id="appointments">3. Appointment &amp; Cancellation Policy</h2>
      <p>Appointment requests submitted through this website are confirmed only once acknowledged by our front desk
        team. We kindly request at least 24 hours&rsquo; notice for cancellations or rescheduling so the slot can be
        offered to another patient. Repeated no-shows may affect future booking priority.</p>

      <h2 id="medical-disclaimer">4. Medical Disclaimer</h2>
      <p>Content on this website is provided for general informational purposes only and does not constitute
        medical or dental advice. Every treatment plan is individual and determined only after an in-person
        consultation and clinical examination. Always consult a qualified dentist before making treatment decisions.</p>

      <h2 id="payment">5. Payment Terms</h2>
      <p>Treatment costs are communicated as a written estimate following consultation and any required diagnostic
        imaging. Payment is due as agreed at the time of treatment unless a staged payment plan has been arranged in
        advance with our billing team.</p>

      <h2 id="ip">6. Intellectual Property</h2>
      <p>All content on this website, including text, graphics, logos, and design elements, is the property of
        <?= htmlspecialchars(getConfig('clinic.name')) ?> or its licensors and may not be copied, reproduced, or
        distributed without prior written permission.</p>

      <h2 id="liability">7. Limitation of Liability</h2>
      <p>While we take care to keep the information on this website accurate and up to date, we make no warranties
        regarding its completeness and are not liable for any indirect or consequential loss arising from reliance
        on website content. This does not limit our responsibility for the clinical care provided at our facilities,
        which is governed separately by applicable healthcare regulations and the consent forms signed at the time
        of treatment.</p>

      <h2 id="governing-law">8. Governing Law</h2>
      <p>These Terms &amp; Conditions are governed by the laws of India, and any disputes arising from them shall be
        subject to the jurisdiction of the courts in the city where the relevant clinic is located.</p>

      <h2 id="changes">9. Changes to Terms</h2>
      <p>We may revise these Terms &amp; Conditions from time to time. Continued use of this website after any
        changes are posted constitutes your acceptance of the revised terms.</p>

      <h2 id="contact">10. Contact Us</h2>
      <p>For any questions about these Terms &amp; Conditions, please contact us at
        <strong><?= htmlspecialchars(getConfig('contact.email')) ?></strong> or call
        <strong><?= htmlspecialchars(getConfig('contact.phoneDisplay')) ?></strong>.</p>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../Contents/footer.php'; ?>