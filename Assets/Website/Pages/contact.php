<?php
require_once __DIR__ . '/../../../config-loader.php';

$pageTitle       = 'Contact & Locations — ' . getConfig('clinic.name');
$pageDescription = 'Book a consultation, find a clinic near you, or reach ' . getConfig('clinic.name') . ' by phone, WhatsApp or email.';
$activeNav       = 'contact';

require __DIR__ . '/../Contents/header.php';
?>
<style>
/* =========================================================
   CONTACT PAGE — section-scoped styles
   ========================================================= */
.contact-hero { padding: clamp(8.5rem, 13vw, 10.5rem) 0 clamp(2.5rem, 5vw, 3.5rem); text-align: center; }
.contact-hero h1 { font-size: clamp(2.1rem, 4vw, 3rem); margin-top: 0.8rem; }
.contact-hero p { max-width: 600px; margin: 1rem auto 0; color: var(--text-muted); }

.contact-quick-grid { grid-template-columns: repeat(3, 1fr); }
@media (max-width: 900px) { .contact-quick-grid { grid-template-columns: 1fr; } }
.quick-card { text-align: center; padding: 2rem 1.6rem; }
.quick-icon {
  width: 52px; height: 52px; border-radius: 16px; margin: 0 auto 1rem;
  background: linear-gradient(140deg, var(--aqua-soft), var(--gold-soft));
  display: flex; align-items: center; justify-content: center;
}
.quick-icon svg { width: 24px; height: 24px; color: var(--ink); }
.quick-card h3 { font-size: 1.05rem; }
.quick-card p { color: var(--text-muted); font-size: 0.9rem; margin-top: 0.4rem; }
.quick-card a.btn { margin-top: 1.1rem; }

.contact-split { grid-template-columns: 1.1fr 1fr; align-items: flex-start; gap: clamp(2rem, 4vw, 3.5rem); }
@media (max-width: 980px) { .contact-split { grid-template-columns: 1fr; } }

.hours-table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
.hours-table td { padding: 0.65rem 0; border-bottom: 1px solid var(--glass-light-border); font-size: 0.92rem; }
.hours-table td:first-child { color: var(--text-muted); }
.hours-table td:last-child { text-align: right; font-weight: 600; color: var(--ink); font-family: var(--font-mono); font-size: 0.84rem; }
.hours-table tr:last-child td { border-bottom: none; }

.location-card { padding: 1.8rem; }
.location-card h3 { font-size: 1.1rem; }
.location-card .addr { color: var(--text-muted); font-size: 0.9rem; margin-top: 0.5rem; line-height: 1.6; }
.location-map-frame {
  margin-top: 1.1rem; aspect-ratio: 16/9; border-radius: var(--radius-md); overflow: hidden;
  background: linear-gradient(150deg, var(--mist-deep), var(--mist));
  display: flex; align-items: center; justify-content: center; position: relative;
}
.location-map-frame .map-pin { width: 30px; height: 30px; color: var(--gold); }
.location-card .btn { margin-top: 1.1rem; width: 100%; justify-content: center; }

.locations-grid { grid-template-columns: repeat(3, 1fr); }
@media (max-width: 980px) { .locations-grid { grid-template-columns: 1fr; } }
</style>

<!-- ================= HERO ================= -->
<section class="contact-hero">
  <div class="container reveal">
    <span class="eyebrow" style="justify-content:center;">Get In Touch</span>
    <h1>Let&rsquo;s plan your visit, <span style="color:var(--gold);">properly</span>.</h1>
    <p>Whether it&rsquo;s a routine check-up or a question about a treatment plan, our front desk team responds within
      one business day &mdash; usually much sooner.</p>
  </div>
</section>

<!-- ================= QUICK CONTACT ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="grid contact-quick-grid reveal-stagger">
      <div class="glass-card quick-card reveal">
        <div class="quick-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 5a2 2 0 0 1 2-2h2.5a1 1 0 0 1 1 .8l1 4a1 1 0 0 1-.5 1.1L7.5 10A12 12 0 0 0 14 16.5l1.1-1.5a1 1 0 0 1 1.1-.5l4 1a1 1 0 0 1 .8 1V19a2 2 0 0 1-2 2h-1C9.6 21 3 14.4 3 6V5Z"/></svg>
        </div>
        <h3>Call Us</h3>
        <p><?= htmlspecialchars(getConfig('contact.phoneDisplay')) ?></p>
        <a href="tel:<?= htmlspecialchars(getConfig('contact.phonePrimary')) ?>" class="btn btn-ghost">Call Now</a>
      </div>
      <div class="glass-card quick-card reveal">
        <div class="quick-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"/></svg>
        </div>
        <h3>WhatsApp</h3>
        <p>Quick replies during clinic hours</p>
        <a href="<?= whatsappUrl('Hi, I would like to enquire about an appointment.') ?>" class="btn btn-whatsapp" target="_blank" rel="noopener">Message Us</a>
      </div>
      <div class="glass-card quick-card reveal">
        <div class="quick-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 6.5 12 13l9-6.5M5 5h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z"/></svg>
        </div>
        <h3>Email</h3>
        <p><?= htmlspecialchars(getConfig('contact.email')) ?></p>
        <a href="mailto:<?= htmlspecialchars(getConfig('contact.email')) ?>" class="btn btn-ghost">Send Email</a>
      </div>
    </div>
  </div>
</section>

<!-- ================= BOOKING FORM + HOURS ================= -->
<section class="section" id="book">
  <div class="container">
    <div class="grid contact-split">
      <div class="glass-strong reveal" style="padding: clamp(1.8rem, 3vw, 2.6rem); border-radius: var(--radius-lg);">
        <span class="eyebrow">Book a Consultation</span>
        <h2 style="margin-top:0.6rem; font-size:clamp(1.5rem,2.4vw,1.9rem);">Tell us a little about what you need</h2>
        <form data-ajax-form action="<?= asset('Website/Processors/send-mail.php') ?>" method="post" style="margin-top:1.6rem; display:flex; flex-direction:column; gap:1.1rem;">
          <input type="hidden" name="form_type" value="Booking Request">
          <input type="text" name="company" data-honeypot tabindex="-1" autocomplete="off" style="position:absolute; left:-9999px;">
          <div class="field">
            <label for="contact-name">Full name</label>
            <input type="text" id="contact-name" name="name" required>
          </div>
          <div class="field">
            <label for="contact-phone">Phone number</label>
            <input type="tel" id="contact-phone" name="phone" required>
          </div>
          <div class="field">
            <label for="contact-email">Email (optional)</label>
            <input type="email" id="contact-email" name="email">
          </div>
          <div class="field">
            <label for="contact-treatment">Treatment of interest</label>
            <select id="contact-treatment" name="treatment">
              <option>General Consultation</option>
              <option>Smile Design &amp; Veneers</option>
              <option>Dental Implants</option>
              <option>Root Canal Treatment</option>
              <option>Clear Aligners</option>
              <option>Crowns &amp; Bridges</option>
              <option>Teeth Whitening</option>
              <option>Paediatric Dentistry</option>
              <option>Full Mouth Rehabilitation</option>
              <option>Something Else</option>
            </select>
          </div>
          <div class="field">
            <label for="contact-location">Preferred location</label>
            <select id="contact-location" name="location">
              <?php foreach (getConfig('locations', []) as $loc): ?>
                <option><?= htmlspecialchars($loc['label']) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="field">
            <label for="contact-message">Anything else we should know?</label>
            <textarea id="contact-message" name="message" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-gold" style="justify-content:center;">Request Appointment</button>
          <div class="form-status" data-form-status></div>
          <p style="font-size:0.78rem; color: var(--text-muted);">By submitting, you agree to be contacted regarding your enquiry. We never share your details with third parties.</p>
        </form>
      </div>

      <div class="reveal">
        <div class="glass-card" style="margin-bottom:1.5rem;">
          <h3 style="font-size:1.1rem;">Clinic Hours</h3>
          <table class="hours-table">
            <tr><td>Monday &ndash; Friday</td><td><?= htmlspecialchars(getConfig('hours.weekdays')) ?></td></tr>
            <tr><td>Saturday</td><td><?= htmlspecialchars(getConfig('hours.saturday')) ?></td></tr>
            <tr><td>Sunday</td><td><?= htmlspecialchars(getConfig('hours.sunday')) ?></td></tr>
          </table>
        </div>
        <div class="glass-card">
          <h3 style="font-size:1.1rem;">General Enquiry</h3>
          <p class="text-muted" style="font-size:0.9rem; margin-top:0.5rem;">Not ready to book? Send a message and our coordinator will call you back to answer any questions first.</p>
          <form data-ajax-form action="<?= asset('Website/Processors/send-mail.php') ?>" method="post" style="margin-top:1.2rem; display:flex; flex-direction:column; gap:1rem;">
            <input type="hidden" name="form_type" value="General Enquiry">
            <input type="text" name="company" data-honeypot tabindex="-1" autocomplete="off" style="position:absolute; left:-9999px;">
            <div class="field">
              <label for="gen-name">Name</label>
              <input type="text" id="gen-name" name="name" required>
            </div>
            <div class="field">
              <label for="gen-contact">Phone or email</label>
              <input type="text" id="gen-contact" name="contact_info" required>
            </div>
            <div class="field">
              <label for="gen-message">Message</label>
              <textarea id="gen-message" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="justify-content:center;">Send Message</button>
            <div class="form-status" data-form-status></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= LOCATIONS ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="section-head reveal">
      <span class="eyebrow">Find Us</span>
      <h2>Three locations across Delhi NCR</h2>
      <p>Walk-ins welcome, though booking ahead means shorter waits and a chair held in your name.</p>
    </div>
    <div class="grid locations-grid reveal-stagger">
      <?php foreach (getConfig('locations', []) as $loc): ?>
        <div class="glass-card location-card reveal">
          <h3><?= htmlspecialchars($loc['label']) ?></h3>
          <p class="addr"><?= htmlspecialchars($loc['address']) ?></p>
          <div class="location-map-frame">
            <svg class="map-pin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 21s7-6.6 7-12a7 7 0 1 0-14 0c0 5.4 7 12 7 12Z"/><circle cx="12" cy="9" r="2.4"/></svg>
          </div>
          <a href="<?= htmlspecialchars($loc['mapUrl']) ?>" class="btn btn-ghost" target="_blank" rel="noopener">Get Directions</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../Contents/footer.php'; ?>