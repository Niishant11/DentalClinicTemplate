<?php
if (!defined('CONFIG_LOADED')) {
    require_once __DIR__ . '/config-loader.php';
}
$year = date('Y');
?>
</main>

<style>
/* =========================================================
   FOOTER — internal styles (page-partial scoped)
   ========================================================= */
.site-footer {
  background: linear-gradient(170deg, var(--ink-dark) 0%, #051A17 100%);
  color: var(--text-on-dark);
  padding: clamp(3.5rem, 7vw, 5.5rem) 0 2rem;
  position: relative;
  overflow: hidden;
}
.footer-grid {
  display: grid;
  grid-template-columns: 1.4fr 1fr 1fr 1.1fr;
  gap: clamp(2rem, 4vw, 3rem);
  padding-bottom: 3rem;
  border-bottom: 1px solid rgba(234,246,243,0.12);
}
@media (max-width: 900px) { .footer-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 580px) { .footer-grid { grid-template-columns: 1fr; } }

.footer-brand { display: flex; align-items: center; gap: 0.6rem; font-family: var(--font-display); font-size: 1.2rem; color: var(--white); margin-bottom: 0.9rem; }
.footer-brand .brand-mark { width: 34px; height: 34px; }
.footer-about p { color: var(--text-on-dark-muted); font-size: 0.92rem; max-width: 280px; }
.footer-social { display: flex; gap: 0.7rem; margin-top: 1.3rem; }
.footer-social a {
  width: 36px; height: 36px; border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  background: var(--glass-dark-bg); border: 1px solid var(--glass-dark-border);
  transition: transform 0.25s ease, background 0.25s ease;
}
.footer-social a:hover { transform: translateY(-3px); background: rgba(70,201,180,0.18); }
.footer-social svg { width: 16px; height: 16px; }

.footer-col h4 { color: var(--white); font-size: 0.85rem; font-family: var(--font-mono); letter-spacing: 0.08em; text-transform: uppercase; margin-bottom: 1.1rem; font-weight: 500; }
.footer-col ul { display: flex; flex-direction: column; gap: 0.65rem; }
.footer-col a, .footer-col address { color: var(--text-on-dark-muted); font-size: 0.92rem; font-style: normal; }
.footer-col a:hover { color: var(--aqua-soft); }

.footer-bottom {
  display: flex; align-items: center; justify-content: space-between;
  flex-wrap: wrap; gap: 1rem;
  padding-top: 1.6rem;
  font-size: 0.8rem;
  color: var(--text-on-dark-muted);
}
.footer-bottom a { color: var(--text-on-dark-muted); }
.footer-bottom a:hover { color: var(--aqua-soft); }

/* Floating WhatsApp action button */
.float-whatsapp {
  position: fixed;
  bottom: 1.5rem; right: 1.5rem;
  width: 58px; height: 58px;
  border-radius: 50%;
  background: linear-gradient(135deg, #25D366, #1DA851);
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 14px 30px rgba(29,168,81,0.4);
  z-index: 900;
  animation: floatPulse 2.6s ease-in-out infinite;
}
.float-whatsapp svg { width: 26px; height: 26px; }
@keyframes floatPulse {
  0%, 100% { box-shadow: 0 14px 30px rgba(29,168,81,0.4); }
  50% { box-shadow: 0 14px 30px rgba(29,168,81,0.65), 0 0 0 10px rgba(37,211,102,0.12); }
}
@media (prefers-reduced-motion: reduce) { .float-whatsapp { animation: none; } }
</style>

<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-about">
        <div class="footer-brand">
          <span class="brand-mark">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 2C8.5 2 6 4.2 6 7.8c0 2.3 0.8 3.6 1.4 5.4.5 1.6.7 3.9 1.4 5.9.5 1.4 1.2 2.4 2 2.4.9 0 1.3-1 1.7-2.6.3-1.2.4-2.6 1-2.6s.7 1.4 1 2.6c.4 1.6.8 2.6 1.7 2.6.8 0 1.5-1 2-2.4.7-2 .9-4.3 1.4-5.9.6-1.8 1.4-3.1 1.4-5.4C18 4.2 15.5 2 12 2Z" stroke="white" stroke-width="1.4"/>
            </svg>
          </span>
          <?= htmlspecialchars(getConfig('clinic.logoText', getConfig('clinic.name'))) ?>
        </div>
        <p>Specialist-led dentistry built around precise diagnosis, gentle delivery, and results that hold up for years — not just for the photograph.</p>
        <div class="footer-social">
          <a href="<?= htmlspecialchars(getConfig('social.instagram')) ?>" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="#EAF6F3" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="0.6" fill="#EAF6F3"/></svg></a>
          <a href="<?= htmlspecialchars(getConfig('social.facebook')) ?>" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="none" stroke="#EAF6F3" stroke-width="1.6"><path d="M14 8h2V5h-2c-2 0-3.5 1.5-3.5 3.5V11H8v3h2.5v6h3v-6H16l.5-3h-3V9c0-.6.4-1 1-1Z"/></svg></a>
          <a href="<?= htmlspecialchars(getConfig('social.youtube')) ?>" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="none" stroke="#EAF6F3" stroke-width="1.6"><rect x="3" y="6" width="18" height="12" rx="3"/><path d="M11 9.5 14.5 12 11 14.5Z" fill="#EAF6F3" stroke="none"/></svg></a>
        </div>
      </div>

      <div class="footer-col">
        <h4>Explore</h4>
        <ul>
          <li><a href="<?= homeUrl() ?>#services">Treatments</a></li>
          <li><a href="<?= pageUrl('about-us.php') ?>">About the Clinic</a></li>
          <li><a href="<?= homeUrl() ?>#reviews">Patient Stories</a></li>
          <li><a href="<?= pageUrl('faqs.php') ?>">FAQs</a></li>
          <li><a href="<?= pageUrl('contact.php') ?>">Book a Visit</a></li>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Locations</h4>
        <ul>
          <?php foreach ((array) getConfig('locations', []) as $loc): ?>
            <li><a href="<?= htmlspecialchars($loc['mapUrl'] ?? '#') ?>"><?= htmlspecialchars($loc['label'] ?? '') ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="footer-col">
        <h4>Reach Us</h4>
        <ul>
          <li><a href="tel:<?= htmlspecialchars(getConfig('contact.phonePrimary')) ?>"><?= htmlspecialchars(getConfig('contact.phoneDisplay')) ?></a></li>
          <li><a href="mailto:<?= htmlspecialchars(getConfig('contact.email')) ?>"><?= htmlspecialchars(getConfig('contact.email')) ?></a></li>
          <li><address>Mon–Sat, <?= htmlspecialchars(getConfig('hours.weekdays')) ?></address></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <span>&copy; <?= $year ?> <?= htmlspecialchars(getConfig('clinic.name')) ?>. <?= htmlspecialchars(getConfig('footer.copyrightText')) ?></span>
      <span>
        <a href="<?= pageUrl('privacy-policy.php') ?>">Privacy Policy</a> &nbsp;&middot;&nbsp;
        <a href="<?= pageUrl('terms-conditions.php') ?>">Terms &amp; Conditions</a>
      </span>
    </div>
  </div>
</footer>

<a class="float-whatsapp" href="<?= whatsappUrl('Hi, I would like to book a dental consultation.') ?>" target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 24 24" fill="white"><path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.9-1.3A10 10 0 1 0 12 2Zm5.6 14.2c-.2.7-1.4 1.4-2 1.5-.5.1-1.1.2-3.2-.7-2.7-1.1-4.4-3.9-4.6-4.1-.1-.2-1.1-1.4-1.1-2.7 0-1.3.7-2 .9-2.2.2-.2.5-.3.7-.3h.5c.2 0 .4 0 .6.4.2.5.7 1.7.8 1.8.1.1.1.3 0 .5-.1.2-.2.3-.3.5l-.4.5c-.1.2-.3.3-.1.6.2.3.9 1.5 2 2.4 1.3 1.2 2.4 1.5 2.8 1.7.3.1.5.1.7-.1.2-.2.7-.8.9-1.1.2-.3.4-.2.6-.1.2.1 1.4.7 1.7.8.3.1.4.2.5.3.1.2.1.7-.1 1.3Z"/></svg>
</a>

<script src="<?= asset('Website/Scripts/main.js') ?>"></script>
</body>
</html>