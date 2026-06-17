<?php

require_once __DIR__ . '/config-loader.php';

$pageTitle = getConfig('clinic.name', 'Dental Clinic');
$pageDescription = getConfig('clinic.name', 'Dental Clinic') .
    ' offers specialist-led implants, root canal, cosmetic dentistry and orthodontics across Delhi NCR.';

$activeNav = 'home';

require_once __DIR__ . '/Assets/Website/Contents/header.php';
?>
<style>
/* =========================================================
   HOME PAGE — section-scoped styles
   ========================================================= */

/* ---------- Hero ---------- */
.hero { padding: clamp(8.5rem, 14vw, 11rem) 0 clamp(4rem, 8vw, 6rem); position: relative; overflow: hidden; }
.hero-grid { display: grid; grid-template-columns: 1.05fr 0.95fr; gap: clamp(2rem, 5vw, 4rem); align-items: center; position: relative; z-index: 1; }
.hero-copy h1 { font-size: clamp(2.4rem, 4.4vw, 3.6rem); margin-top: 0.9rem; letter-spacing: -0.01em; }
.hero-copy h1 em { font-style: normal; color: var(--aqua); position: relative; }
.hero-copy p.lead { margin-top: 1.2rem; font-size: 1.08rem; color: var(--text-muted); max-width: 480px; }
.hero-badges { display: flex; gap: 0.6rem; flex-wrap: wrap; margin-top: 1.6rem; }
.hero-badges .badge { background: var(--glass-light-bg); border: 1px solid var(--glass-light-border); color: var(--ink); }
.hero-cta-row { display: flex; gap: 0.85rem; margin-top: 2rem; flex-wrap: wrap; }

.hero-visual { position: relative; height: 460px; display: flex; align-items: center; justify-content: center; }
.tooth-halo {
  width: 320px; height: 320px;
  border-radius: 50%;
  background: radial-gradient(circle at 35% 30%, rgba(255,255,255,0.9), rgba(159,230,215,0.35) 60%, transparent 75%);
  border: 1px solid rgba(255,255,255,0.6);
  backdrop-filter: blur(6px);
  display: flex; align-items: center; justify-content: center;
  animation: haloSpin 26s linear infinite;
  box-shadow: var(--shadow-lifted);
}
@keyframes haloSpin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
.tooth-graphic { width: 168px; filter: drop-shadow(0 18px 30px rgba(14,59,54,0.22)); animation: toothFloat 5.5s ease-in-out infinite; }
@keyframes toothFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
@media (prefers-reduced-motion: reduce) { .tooth-halo, .tooth-graphic { animation: none; } }

.float-card {
  position: absolute;
  padding: 0.85rem 1.1rem;
  display: flex; align-items: center; gap: 0.6rem;
  border-radius: var(--radius-md);
}
.float-card .stat-figure { font-size: 1.25rem; }
.float-card .stat-label { font-size: 0.62rem; }
.float-card--rating { top: 6%; left: -4%; }
.float-card--patients { bottom: 10%; right: -6%; }
.float-card--exp { top: 48%; right: -10%; }
@media (max-width: 1080px) { .float-card--exp { display: none; } }

.hero-form-panel { margin-top: 0; }
.hero-form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 0 1rem; }
@media (max-width: 540px) { .hero-form-grid { grid-template-columns: 1fr; } }

@media (max-width: 980px) {
  .hero-grid { grid-template-columns: 1fr; }
  .hero-visual { height: 320px; order: -1; }
}


/* ---------- Trust stats strip ---------- */
.stats-strip { padding: 2.6rem 0; }
.stats-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; text-align: center; }
@media (max-width: 760px) { .stats-row { grid-template-columns: repeat(2, 1fr); } }

/* ---------- About doctor ---------- */
.doctor-grid { display: grid; grid-template-columns: 0.85fr 1.15fr; gap: clamp(2rem, 5vw, 3.5rem); align-items: center; }
.doctor-photo-frame {
  aspect-ratio: 4/5; border-radius: var(--radius-lg); overflow: hidden;
  background: linear-gradient(150deg, var(--mist-deep), var(--mist));
  display: flex; align-items: center; justify-content: center; position: relative;
  box-shadow: var(--shadow-lifted);
}
.doctor-photo-frame .placeholder-caption {
  position: absolute; bottom: 0; left: 0; right: 0;
  padding: 1rem; font-family: var(--font-mono); font-size: 0.72rem;
  color: var(--ink); background: rgba(255,255,255,0.55); backdrop-filter: blur(10px);
  text-align: center;
}
.doctor-credentials { display: flex; flex-direction: column; gap: 0.7rem; margin-top: 1.3rem; }
.doctor-credentials li { display: flex; gap: 0.7rem; align-items: flex-start; font-size: 0.97rem; color: var(--text-dark); }
.doctor-credentials li svg { flex-shrink: 0; margin-top: 3px; width: 18px; height: 18px; color: var(--aqua); }
.doctor-quote { margin-top: 1.6rem; padding: 1.4rem 1.6rem; border-left: 2px solid var(--gold); font-family: var(--font-display); font-size: 1.08rem; color: var(--ink); }

/* ---------- Why choose us ---------- */
.pillars-grid .glass-card { text-align: left; }
.pillar-icon {
  width: 52px; height: 52px; border-radius: 16px; margin-bottom: 1.1rem;
  background: linear-gradient(140deg, var(--aqua-soft), var(--gold-soft));
  display: flex; align-items: center; justify-content: center;
  box-shadow: inset 0 1px 2px rgba(255,255,255,0.6), 0 8px 18px rgba(14,59,54,0.12);
}
.pillar-icon svg { width: 24px; height: 24px; color: var(--ink); }

/* ---------- Services ---------- */
.service-card { text-align: left; display: flex; flex-direction: column; height: 100%; }
.service-icon {
  width: 50px; height: 50px; border-radius: 14px; margin-bottom: 1rem;
  background: var(--glass-strong, rgba(255,255,255,0.7));
  background: rgba(255,255,255,0.7);
  border: 1px solid rgba(255,255,255,0.9);
  display: flex; align-items: center; justify-content: center;
  box-shadow: inset 0 1px 3px rgba(255,255,255,0.8), 0 8px 18px rgba(14,59,54,0.1);
}
.service-icon svg { width: 24px; height: 24px; color: var(--ink); }
.service-card h3 { font-size: 1.12rem; margin-top: 0.2rem; }
.service-card p { font-size: 0.9rem; color: var(--text-muted); margin-top: 0.5rem; flex-grow: 1; }
.service-price { margin-top: 1rem; font-family: var(--font-mono); font-size: 0.78rem; color: var(--gold); letter-spacing: 0.02em; }

/* ---------- Signs you may need care ---------- */
.signs-grid { grid-template-columns: repeat(6, 1fr); gap: 1.2rem; }
@media (max-width: 980px) { .signs-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 560px) { .signs-grid { grid-template-columns: repeat(2, 1fr); } }
.sign-item { text-align: center; }
.sign-circle {
  width: 78px; height: 78px; border-radius: 50%; margin: 0 auto 0.8rem;
  background: var(--glass-light-bg); border: 1px solid var(--glass-light-border);
  display: flex; align-items: center; justify-content: center;
  box-shadow: var(--shadow-soft);
}
.sign-circle svg { width: 30px; height: 30px; color: var(--ink); }
.sign-item span { font-size: 0.86rem; font-weight: 600; color: var(--text-dark); }
.signs-cta { text-align: center; margin-top: 2.6rem; }

/* ---------- Comparison table ---------- */
.compare-table-wrap { overflow-x: auto; }
.compare-table { width: 100%; border-collapse: collapse; min-width: 560px; }
.compare-table th, .compare-table td { padding: 1rem 1.3rem; text-align: left; font-size: 0.94rem; }
.compare-table thead th {
  font-family: var(--font-mono); font-size: 0.72rem; text-transform: uppercase; letter-spacing: 0.06em;
  color: var(--text-muted); border-bottom: 1px solid rgba(14,59,54,0.1);
}
.compare-table thead th:nth-child(2) { color: var(--ink); font-weight: 700; }
.compare-table tbody tr { border-bottom: 1px solid rgba(14,59,54,0.07); }
.compare-table tbody tr:last-child { border-bottom: none; }
.compare-check { color: var(--aqua); font-weight: 700; }
.compare-varies { color: var(--text-muted); }
.compare-table-card { padding: 0.5rem clamp(0.5rem, 2vw, 1.5rem); }

/* ---------- Team ---------- */
.team-track {
  display: flex; gap: 1.4rem; overflow-x: auto; scroll-snap-type: x mandatory;
  padding-bottom: 0.5rem; scrollbar-width: thin;
}
.team-card {
  scroll-snap-align: start; min-width: 250px; text-align: center; flex-shrink: 0;
}
.team-photo-frame {
  aspect-ratio: 1; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 1rem;
  background: linear-gradient(150deg, var(--mist-deep), var(--mist));
  display: flex; align-items: center; justify-content: center; position: relative;
}
.team-photo-frame .placeholder-caption {
  position: absolute; bottom: 0; left: 0; right: 0; font-size: 0.62rem;
  padding: 0.5rem; background: rgba(255,255,255,0.6); font-family: var(--font-mono); backdrop-filter: blur(8px);
}
.team-card h3 { font-size: 1.02rem; }
.team-card .role { font-size: 0.82rem; color: var(--text-muted); margin: 0.3rem 0 0.9rem; }
.carousel-controls { display: flex; gap: 0.6rem; justify-content: flex-end; margin-bottom: 1.2rem; }
.carousel-btn {
  width: 38px; height: 38px; border-radius: 50%; border: 1px solid rgba(14,59,54,0.14);
  background: var(--glass-light-bg); display: flex; align-items: center; justify-content: center;
}
.carousel-btn svg { width: 16px; height: 16px; }

/* ---------- Before / after ---------- */
.ba-grid { grid-template-columns: repeat(3, 1fr); }
@media (max-width: 860px) { .ba-grid { grid-template-columns: 1fr; } }
.ba-card { padding: 0; overflow: hidden; }
.ba-images { display: grid; grid-template-columns: 1fr 1fr; }
.ba-images div {
  aspect-ratio: 1; display: flex; align-items: center; justify-content: center;
  font-family: var(--font-mono); font-size: 0.68rem; color: var(--text-muted); text-align: center; padding: 0.6rem;
}
.ba-before { background: linear-gradient(150deg, #E4ECEA, #D6E3E0); }
.ba-after { background: linear-gradient(150deg, var(--aqua-soft), #C9EFE5); }
.ba-label { padding: 1rem 1.2rem; font-weight: 700; font-size: 0.92rem; }

/* ---------- Testimonials ---------- */
.reviews-head-row { display: flex; align-items: flex-end; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap; }
.google-badge { display: flex; align-items: center; gap: 0.7rem; }
.google-badge .stars { font-size: 1.1rem; }
.review-card { min-width: 320px; max-width: 320px; scroll-snap-align: start; }
.review-track { display: flex; gap: 1.4rem; overflow-x: auto; scroll-snap-type: x mandatory; padding-bottom: 0.5rem; }
.review-card p.quote { font-size: 0.96rem; color: var(--text-dark); margin-top: 0.8rem; }
.review-meta { display: flex; align-items: center; gap: 0.6rem; margin-top: 1.1rem; }
.review-avatar { width: 38px; height: 38px; border-radius: 50%; background: linear-gradient(140deg, var(--aqua), var(--ink)); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 0.85rem; }
.review-meta strong { font-size: 0.88rem; display: block; }
.review-meta span { font-size: 0.76rem; color: var(--text-muted); }

/* ---------- FAQ preview ---------- */
.accordion-item { border-bottom: 1px solid rgba(14,59,54,0.1); }
.accordion-item:first-child { border-top: 1px solid rgba(14,59,54,0.1); }
.accordion-trigger {
  width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 1rem;
  background: none; border: none; padding: 1.3rem 0.2rem; text-align: left;
  font-family: var(--font-display); font-size: 1.04rem; color: var(--ink);
}
.accordion-trigger .plus { width: 22px; height: 22px; flex-shrink: 0; position: relative; }
.accordion-trigger .plus::before, .accordion-trigger .plus::after {
  content: ""; position: absolute; background: var(--ink); transition: transform 0.3s ease;
}
.accordion-trigger .plus::before { width: 14px; height: 2px; top: 10px; left: 4px; }
.accordion-trigger .plus::after { width: 2px; height: 14px; top: 4px; left: 10px; }
.accordion-item.is-open .plus::after { transform: scaleY(0); }
.accordion-panel { max-height: 0; overflow: hidden; transition: max-height 0.35s ease; }
.accordion-panel p { padding: 0 0.2rem 1.3rem; color: var(--text-muted); font-size: 0.94rem; max-width: 620px; }
.faq-more { text-align: center; margin-top: 2rem; }

/* ---------- Locations / Book ---------- */
.book-grid { display: grid; grid-template-columns: 1fr 0.9fr; gap: clamp(2rem, 4vw, 3rem); align-items: start; }
@media (max-width: 920px) { .book-grid { grid-template-columns: 1fr; } }
.location-card { display: flex; flex-direction: column; gap: 0.7rem; }
.location-card h3 { font-size: 1.05rem; }
.location-card p { font-size: 0.9rem; color: var(--text-on-dark-muted); }
.locations-list { display: flex; flex-direction: column; gap: 1.1rem; }
.book-form-card { position: sticky; top: 110px; }
</style>

<!-- ================= HERO ================= -->
<section class="hero">
  <div class="blob-field">
    <div class="blob blob--aqua" style="width:420px;height:420px;top:-120px;left:-80px;"></div>
    <div class="blob blob--gold" style="width:320px;height:320px;bottom:-100px;right:5%;"></div>
  </div>
  <div class="container hero-grid">
    <div class="hero-copy reveal">
      <span class="eyebrow">Premium Dental Care &middot; Delhi NCR</span>
      <h1>Precision smiles, planned like a <em>specialist</em> would plan them.</h1>
      <p class="lead">From the first scan to the final polish, every treatment at <?= htmlspecialchars(getConfig('clinic.name')) ?> is mapped out by specialists, not generalists — so the result holds up years from now, not just for the day you leave the chair.</p>
      <div class="hero-badges">
        <span class="badge" style="border-color: rgba(200,160,91,0.3);">Specialist-led diagnosis</span>
        <span class="badge">In-house digital imaging</span>
        <span class="badge">Same-day emergency slots</span>
      </div>
      <div class="hero-cta-row">
        <a href="#book" class="btn btn-primary">Book a Consultation</a>
        <a href="<?= whatsappUrl('Hi, I would like to ask about a dental treatment.') ?>" class="btn btn-whatsapp" target="_blank" rel="noopener">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="white"><path d="M12 2a10 10 0 0 0-8.5 15.3L2 22l4.9-1.3A10 10 0 1 0 12 2Z"/></svg>
          WhatsApp Us
        </a>
      </div>
    </div>

    <div class="hero-visual reveal">
      <div class="tooth-halo">
        <svg class="tooth-graphic" viewBox="0 0 100 110" xmlns="http://www.w3.org/2000/svg">
          <defs>
            <linearGradient id="toothGrad" x1="0" y1="0" x2="1" y2="1">
              <stop offset="0%" stop-color="#FFFFFF"/>
              <stop offset="55%" stop-color="#DDF3EE"/>
              <stop offset="100%" stop-color="#9FE6D7"/>
            </linearGradient>
          </defs>
          <path d="M50 5C32 5 18 16 18 36c0 13 5 20 8 31 3 10 4 22 9 33 3 7 7 12 11 12s7-6 9-15c1-6 2-14 5-14s4 8 5 14c2 9 5 15 9 15s8-5 11-12c5-11 6-23 9-33 3-11 8-18 8-31C92 16 78 5 50 5Z" fill="url(#toothGrad)" stroke="#0E3B36" stroke-width="1.4"/>
        </svg>
      </div>

      <div class="float-card float-card--rating glass-strong tilt" data-tilt-strength="10">
    <span class="stars">★★★★★</span>
    <div>
        <span class="stat-figure" style="font-size:1.1rem;">
            <?= htmlspecialchars(getConfig('stats.googleRating')) ?>/5
        </span>
        <span class="stat-label">Google Rating</span>
    </div>
</div>

<div class="float-card float-card--patients glass-strong tilt" data-tilt-strength="10">
    <div>
        <span class="stat-figure" data-counter="<?= htmlspecialchars(getConfig('stats.patientsTreated')) ?>">0</span>
        <span class="stat-label">Patients Treated</span>
    </div>
</div>

<div class="float-card float-card--exp glass-strong tilt" data-tilt-strength="10">
    <div>
        <span class="stat-figure"><?= htmlspecialchars(getConfig('doctor.experienceYears')) ?>+</span>
        <span class="stat-label">Yrs Experience</span>
    </div>
</div>
    </div>
  </div>
</section>

<!-- ================= TRUST STATS ================= -->
<section class="stats-strip section--alt">
  <div class="container stats-row reveal-stagger">
    <div class="reveal">
      <span class="stat-figure" data-counter="<?= htmlspecialchars(getConfig('stats.yearsOfTrust')) ?>">0</span>
      <span class="stat-label">Years of Trust</span>
    </div>
    <div class="reveal">
      <span class="stat-figure" data-counter="<?= htmlspecialchars(getConfig('stats.patientsTreated')) ?>">0</span>
      <span class="stat-label">Patients Treated</span>
    </div>
    <div class="reveal">
      <span class="stat-figure" data-counter="<?= htmlspecialchars(getConfig('stats.countriesServed')) ?>">0</span>
      <span class="stat-label">Countries Served</span>
    </div>
    <div class="reveal">
      <span class="stat-figure"><?= htmlspecialchars(getConfig('stats.googleRating')) ?>★</span>
      <span class="stat-label">Patient Satisfaction</span>
    </div>
  </div>
</section>

<!-- ================= ABOUT DOCTOR ================= -->
<section class="section">
  <div class="container doctor-grid">
    <div class="doctor-photo-frame reveal">
      <div class="placeholder-caption">Replace with <?= htmlspecialchars(getConfig('doctor.name')) ?>'s portrait — see Images/README-IMAGES.md</div>
    </div>
    <div class="reveal">
      <span class="eyebrow">The Clinician Behind the Plan</span>
      <h2 style="margin-top:0.6rem; font-size:clamp(1.7rem,3vw,2.3rem);">A clinic built around <?= htmlspecialchars(getConfig('doctor.name')) ?>'s approach to lasting dentistry</h2>
      <p class="text-muted" style="margin-top:1rem;">Every case at <?= htmlspecialchars(getConfig('clinic.name')) ?> begins with a full diagnostic picture — digital scans, bite analysis, and an honest conversation about what's realistic — before a single instrument comes near your teeth.</p>
      <ul class="doctor-credentials">
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg><?= htmlspecialchars(getConfig('doctor.experienceYears')) ?>+ years of clinical practice in prosthodontics and implantology</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg>Trained in microscope-assisted root canal and full-mouth rehabilitation</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg>Built a referral network across <?= htmlspecialchars(getConfig('stats.countriesServed')) ?> countries for follow-up care</li>
        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 13l4 4L19 7"/></svg>Leads a five-dentist specialist team across <?= count(getConfig('locations', [])) ?> Delhi NCR locations</li>
      </ul>
      <p class="doctor-quote">"A smile makeover means nothing if it doesn't survive five years of real life. We plan for that day one."</p>
    </div>
  </div>
</section>

<!-- ================= WHY CHOOSE US ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">Why Patients Choose Us</span>
      <h2>Dentistry that treats the cause, not just the symptom</h2>
      <p>Three commitments shape every appointment here, regardless of how small or complex the treatment is.</p>
    </div>
    <div class="grid grid-3 pillars-grid reveal-stagger">
      <div class="glass glass-card tilt reveal" data-tilt-strength="6">
        <div class="pillar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="9"/><path d="M9 12l2 2 4-4"/></svg></div>
        <h3>Diagnosis before instruments</h3>
        <p class="text-muted" style="margin-top:0.6rem; font-size:0.94rem;">Digital X-rays and intra-oral scans map the full picture before we recommend a single treatment — no guesswork, no upselling.</p>
      </div>
      <div class="glass glass-card tilt reveal" data-tilt-strength="6">
        <div class="pillar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v18M3 12h18"/><circle cx="12" cy="12" r="9"/></svg></div>
        <h3>One specialist, one case</h3>
        <p class="text-muted" style="margin-top:0.6rem; font-size:0.94rem;">Implants are handled by an implantologist, root canals by an endodontist — not whichever dentist happens to be free that day.</p>
      </div>
      <div class="glass glass-card tilt reveal" data-tilt-strength="6">
        <div class="pillar-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19h16M6 19V9l6-5 6 5v10"/></svg></div>
        <h3>Aftercare that doesn't end at checkout</h3>
        <p class="text-muted" style="margin-top:0.6rem; font-size:0.94rem;">Every major treatment includes scheduled follow-ups, so small issues get caught before they become expensive ones.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= SERVICES ================= -->
<section class="section" id="services">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Treatments</span>
      <h2>Comprehensive care, under one specialist roof</h2>
      <p>A curated set of the treatments patients ask for most. Ask us about anything not listed here — our team coordinates with specialist partners when needed.</p>
    </div>
    <div class="grid grid-4 reveal-stagger">
      <?php
      $services = [
        ['title' => 'Smile Design & Veneers', 'price' => 'From ₹9,000 / tooth', 'desc' => 'Porcelain and composite veneers shaped around your facial proportions, not a stock template.', 'icon' => '<path d="M9 4c-3 1-5 4-5 8 0 5 3 9 8 9s8-4 8-9c0-4-2-7-5-8" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['title' => 'Dental Implants', 'price' => 'From ₹28,000 / implant', 'desc' => 'Single-sitting digital planning for predictable placement and faster healing timelines.', 'icon' => '<path d="M12 3v6m0 0l-3 3v6l3 3 3-3v-6l-3-3z" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['title' => 'Microscopic Root Canal', 'price' => 'From ₹6,500 / tooth', 'desc' => 'Dental microscopes catch canals the naked eye misses — fewer repeat treatments down the line.', 'icon' => '<circle cx="12" cy="12" r="7" stroke="currentColor" fill="none" stroke-width="1.6"/><circle cx="12" cy="12" r="2.4" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['title' => 'Clear Aligners', 'price' => 'From ₹65,000 / case', 'desc' => 'Invisible, removable alignment for adults who want results without visible braces.', 'icon' => '<path d="M4 12c2-4 14-4 16 0M4 12c2 4 14 4 16 0" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['title' => 'Porcelain Crowns & Bridges', 'price' => 'From ₹8,000 / unit', 'desc' => 'Metal-free, colour-matched restorations finished to blend with your natural bite line.', 'icon' => '<path d="M5 9l7-5 7 5-2 11H7L5 9z" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['title' => 'Teeth Whitening', 'price' => 'From ₹7,500 / session', 'desc' => 'In-chair and take-home whitening systems calibrated to your enamel sensitivity.', 'icon' => '<path d="M12 3l2.5 5.5L20 9l-4 4 1 6-5-3-5 3 1-6-4-4 5.5-0.5z" stroke="currentColor" fill="none" stroke-width="1.4"/>'],
        ['title' => 'Paediatric Dentistry', 'price' => 'From ₹1,200 / visit', 'desc' => 'A dedicated kids\' suite designed to make a first dental visit feel ordinary, not scary.', 'icon' => '<circle cx="12" cy="9" r="4" stroke="currentColor" fill="none" stroke-width="1.6"/><path d="M5 21c1-4 5-6 7-6s6 2 7 6" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['title' => 'Full Mouth Rehabilitation', 'price' => 'Custom treatment plan', 'desc' => 'A phased, multi-specialist plan for patients restoring bite function across the full arch.', 'icon' => '<path d="M4 12h16M4 12a8 4 0 1 0 16 0M4 12a8 4 0 1 1 16 0" stroke="currentColor" fill="none" stroke-width="1.4"/>'],
      ];
      foreach ($services as $svc): ?>
        <div class="glass glass-card service-card reveal">
          <div class="service-icon"><svg viewBox="0 0 24 24"><?= $svc['icon'] ?></svg></div>
          <h3><?= htmlspecialchars($svc['title']) ?></h3>
          <p><?= htmlspecialchars($svc['desc']) ?></p>
          <span class="service-price"><?= htmlspecialchars($svc['price']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= SIGNS YOU MAY NEED CARE ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">A Quick Self-Check</span>
      <h2>Noticing any of these? It's worth a look.</h2>
      <p>Dental problems are easiest — and cheapest — to treat early. None of these mean something is seriously wrong, but they're worth a proper look.</p>
    </div>
    <div class="grid signs-grid reveal-stagger">
      <?php
      $signs = [
        ['label' => 'Sensitivity to cold', 'icon' => '<path d="M12 2v20M5 9l14 6M19 9L5 15" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['label' => 'Persistent toothache', 'icon' => '<circle cx="12" cy="12" r="9" stroke="currentColor" fill="none" stroke-width="1.6"/><path d="M12 8v5l3 2" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['label' => 'Bleeding gums', 'icon' => '<path d="M12 21s-7-5-7-11a7 7 0 0 1 14 0c0 6-7 11-7 11z" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['label' => 'Jaw clicking or pain', 'icon' => '<path d="M4 9c2-3 14-3 16 0M4 9v6c2 3 14 3 16 0V9" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['label' => 'Visible chips or wear', 'icon' => '<path d="M9 4l6 0 1 9-4 7-4-7 1-9z" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
        ['label' => 'Bad breath that lingers', 'icon' => '<path d="M8 4c0 3-3 4-3 8a7 7 0 0 0 14 0c0-2-1-3-2-4" stroke="currentColor" fill="none" stroke-width="1.6"/>'],
      ];
      foreach ($signs as $sign): ?>
        <div class="sign-item reveal">
          <div class="sign-circle"><svg viewBox="0 0 24 24"><?= $sign['icon'] ?></svg></div>
          <span><?= htmlspecialchars($sign['label']) ?></span>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="signs-cta">
      <a href="#book" class="btn btn-gold">Get Your Smile Evaluated</a>
    </div>
  </div>
</section>

<!-- ================= COMPARISON TABLE ================= -->
<section class="section">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">An Honest Comparison</span>
      <h2><?= htmlspecialchars(getConfig('clinic.shortName')) ?> vs. a typical neighbourhood clinic</h2>
      <p>We'd rather you choose us for the right reasons than the loudest marketing claim.</p>
    </div>
    <div class="glass-strong compare-table-card reveal">
      <div class="compare-table-wrap">
        <table class="compare-table">
          <thead>
            <tr><th>What matters</th><th><?= htmlspecialchars(getConfig('clinic.shortName')) ?></th><th>Typical clinic</th></tr>
          </thead>
          <tbody>
            <tr><td>Specialist-led treatment planning</td><td class="compare-check">✓ Always</td><td class="compare-varies">Varies</td></tr>
            <tr><td>In-house digital imaging &amp; 3D scans</td><td class="compare-check">✓ On-site</td><td class="compare-varies">Often outsourced</td></tr>
            <tr><td>Microscope-assisted root canal</td><td class="compare-check">✓ Standard</td><td class="compare-varies">Limited</td></tr>
            <tr><td>Dedicated paediatric suite</td><td class="compare-check">✓ Yes</td><td class="compare-varies">Rare</td></tr>
            <tr><td>Structured follow-up after treatment</td><td class="compare-check">✓ Scheduled</td><td class="compare-varies">Ad-hoc</td></tr>
            <tr><td>Multiple Delhi NCR locations</td><td class="compare-check">✓ <?= count(getConfig('locations', [])) ?> clinics</td><td class="compare-varies">Single location</td></tr>
            <tr><td>Coordination for out-of-town patients</td><td class="compare-check">✓ Dedicated desk</td><td class="compare-varies">Limited</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- ================= TEAM ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Our Specialists</span>
      <h2>Five specialists. One coordinated treatment plan.</h2>
    </div>
    <div class="carousel-controls">
      <button class="carousel-btn" data-carousel-prev aria-label="Previous"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
      <button class="carousel-btn" data-carousel-next aria-label="Next"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
    </div>
    <div class="team-track" data-carousel data-carousel-track>
      <?php
      $team = [
        ['name' => 'Dr. Aanya Kapoor', 'role' => 'Prosthodontics & Implantology'],
        ['name' => 'Dr. Rohan Mehta', 'role' => 'Endodontics (Root Canal)'],
        ['name' => 'Dr. Simran Bedi', 'role' => 'Orthodontics & Aligners'],
        ['name' => 'Dr. Karan Suri', 'role' => 'Paediatric Dentistry'],
        ['name' => 'Dr. Naina Oberoi', 'role' => 'Cosmetic & Restorative Dentistry'],
      ];
      foreach ($team as $member): ?>
        <div class="team-card glass glass-card" data-carousel-card>
          <div class="team-photo-frame">
            <div class="placeholder-caption">Add team photo</div>
          </div>
          <h3><?= htmlspecialchars($member['name']) ?></h3>
          <div class="role"><?= htmlspecialchars($member['role']) ?></div>
          <a href="<?= whatsappUrl('Hi, I would like to consult ' . $member['name']) ?>" class="btn btn-whatsapp btn-sm btn-block" target="_blank" rel="noopener">WhatsApp</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= BEFORE / AFTER ================= -->
<section class="section">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">Real Outcomes</span>
      <h2>Before &amp; after, not before and "almost"</h2>
      <p>Patient case photos are added here with consent. Replace these placeholders with your own documented cases.</p>
    </div>
    <div class="grid ba-grid reveal-stagger">
      <?php
      $cases = ['Smile Makeover — Veneers', 'Implant Restoration', 'Orthodontic Alignment'];
      foreach ($cases as $case): ?>
        <div class="glass ba-card reveal">
          <div class="ba-images">
            <div class="ba-before">Before</div>
            <div class="ba-after">After</div>
          </div>
          <div class="ba-label"><?= htmlspecialchars($case) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= TESTIMONIALS ================= -->
<section class="section section--alt" id="reviews">
  <div class="container">
    <div class="reviews-head-row section-head">
      <div>
        <span class="eyebrow">Verified Patients</span>
        <h2>What patients say once the treatment is actually done</h2>
      </div>
      <div class="google-badge">
        <span class="stars">★★★★★</span>
        <div>
          <strong style="display:block; font-size:1.1rem;"><?= htmlspecialchars(getConfig('stats.googleRating')) ?> on Google</strong>
          <span class="text-muted" style="font-size:0.82rem;">Based on verified patient reviews</span>
        </div>
      </div>
    </div>
    <div class="carousel-controls">
      <button class="carousel-btn" data-carousel-prev aria-label="Previous"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg></button>
      <button class="carousel-btn" data-carousel-next aria-label="Next"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg></button>
    </div>
    <div class="review-track" data-carousel data-carousel-track>
      <?php
      $reviews = [
        ['name' => 'Aanya Sethi', 'loc' => 'Greater Kailash', 'quote' => 'My implant consultation felt like an actual diagnosis, not a sales pitch. The follow-up calls afterward were the part I didn\'t expect.'],
        ['name' => 'Raghav Bansal', 'loc' => 'Gurugram', 'quote' => 'Switched here after a root canal elsewhere failed twice. The microscope-assisted redo has held up for over a year now.'],
        ['name' => 'Devika Arora', 'loc' => 'Vasant Kunj', 'quote' => 'Took my son for his first dental visit and he asked to go back. The kids\' suite genuinely makes a difference.'],
        ['name' => 'Imran Qureshi', 'loc' => 'Greater Kailash', 'quote' => 'Got veneers done before a wedding deadline. The shade-matching was precise — nothing looked obviously "done".'],
      ];
      foreach ($reviews as $r): ?>
        <div class="glass glass-card review-card" data-carousel-card>
          <span class="stars">★★★★★</span>
          <p class="quote">"<?= htmlspecialchars($r['quote']) ?>"</p>
          <div class="review-meta">
            <div class="review-avatar"><?= strtoupper(substr($r['name'], 0, 1)) ?></div>
            <div>
              <strong><?= htmlspecialchars($r['name']) ?></strong>
              <span><?= htmlspecialchars($r['loc']) ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= FAQ PREVIEW ================= -->
<section class="section">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">Common Questions</span>
      <h2>Before you call, you may already have the answer</h2>
    </div>
    <div style="max-width: 720px; margin: 0 auto;" data-accordion data-accordion-single>
      <?php
      $faqs = [
        ['q' => 'Do you treat children as well?', 'a' => 'Yes — we have a dedicated paediatric suite and a dentist who works exclusively with children, designed to make first visits comfortable rather than clinical.'],
        ['q' => 'Is treatment really painless?', 'a' => 'Most routine treatments involve minimal discomfort thanks to modern anaesthesia techniques. For more involved procedures, we walk you through exactly what to expect beforehand.'],
        ['q' => 'Do you offer same-day appointments?', 'a' => 'We hold same-day slots for dental emergencies such as severe pain, swelling, or a broken tooth — call ahead and we will fit you in.'],
        ['q' => 'Do you treat international or out-of-town patients?', 'a' => 'Yes — our coordination desk plans multi-day treatment schedules for patients visiting from outside Delhi NCR, including follow-up scheduling.'],
        ['q' => 'What are your clinic timings?', 'a' => 'We are open Monday to Saturday, ' . getConfig('hours.weekdays') . ', with limited Sunday availability by appointment only.'],
      ];
      foreach ($faqs as $faq): ?>
        <div class="accordion-item" data-accordion-item>
          <button class="accordion-trigger" data-accordion-trigger aria-expanded="false">
            <span><?= htmlspecialchars($faq['q']) ?></span>
            <span class="plus"></span>
          </button>
          <div class="accordion-panel" data-accordion-panel>
            <p><?= htmlspecialchars($faq['a']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="faq-more">
      <a href="<?= pageUrl('faqs.php') ?>" class="btn btn-ghost">View All FAQs</a>
    </div>
  </div>
</section>

<!-- ================= LOCATIONS / BOOK ================= -->
<section class="section section--dark" id="book">
  <div class="container book-grid">
    <div class="reveal">
      <span class="eyebrow">Visit Us</span>
      <h2 style="margin-top:0.6rem;">Three Delhi NCR locations, one care standard</h2>
      <p class="text-on-dark-muted" style="margin-top:0.8rem; color:var(--text-on-dark-muted);">Every clinic runs on the same diagnostic protocol and the same specialist coordination — pick whichever is closest.</p>
      <div class="locations-list" style="margin-top:2rem;">
        <?php foreach ((array) getConfig('locations', []) as $loc): ?>
          <div class="glass-dark location-card" style="padding:1.4rem 1.6rem;">
            <h3><?= htmlspecialchars($loc['label'] ?? '') ?></h3>
            <p><?= htmlspecialchars($loc['address'] ?? '') ?></p>
            <div>
              <a href="<?= htmlspecialchars($loc['mapUrl'] ?? '#') ?>" class="btn btn-ghost btn-sm" target="_blank" rel="noopener">Get Directions</a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="glass-strong book-form-card reveal" style="padding: clamp(1.6rem, 3vw, 2.2rem);">
      <h3 style="color:var(--ink);">Book an Appointment</h3>
      <p class="text-muted" style="margin:0.5rem 0 1.3rem; font-size:0.92rem;">We'll confirm by phone within a few hours during clinic hours.</p>
      <form data-ajax-form action="<?= asset('Website/Processors/send-mail.php') ?>" method="POST">
        <input type="text" name="website" data-honeypot style="display:none" tabindex="-1" autocomplete="off">
        <input type="hidden" name="form_type" value="Booking Request">
        <div class="hero-form-grid">
          <div class="field">
            <label for="book-name">Full Name</label>
            <input type="text" id="book-name" name="name" required>
          </div>
          <div class="field">
            <label for="book-phone">Phone Number</label>
            <input type="tel" id="book-phone" name="phone" required>
          </div>
        </div>
        <div class="field">
          <label for="book-treatment">Treatment Required</label>
          <select id="book-treatment" name="treatment">
            <option>General Consultation</option>
            <option>Dental Implants</option>
            <option>Root Canal</option>
            <option>Smile Design / Veneers</option>
            <option>Clear Aligners</option>
            <option>Paediatric Dentistry</option>
            <option>Other</option>
          </select>
        </div>
        <div class="field">
          <label for="book-location">Preferred Location</label>
          <select id="book-location" name="location">
            <?php foreach ((array) getConfig('locations', []) as $loc): ?>
              <option><?= htmlspecialchars($loc['label'] ?? '') ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Request Appointment</button>
        <div class="form-status" data-form-status></div>
        <p class="form-note">Your details are sent securely and used only to confirm your appointment.</p>
      </form>
    </div>
  </div>
</section>

<?php require __DIR__ . '/Assets/Website/Contents/footer.php'; ?>