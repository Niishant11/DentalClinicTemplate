<?php
require_once __DIR__ . '/../../../config-loader.php';

$pageTitle       = 'About Us — ' . getConfig('clinic.name');
$pageDescription = 'The story, philosophy and specialist team behind ' . getConfig('clinic.name') . ', led by ' . getConfig('doctor.name') . '.';
$activeNav       = 'about';

require __DIR__ . '/../Contents/header.php';
?>
<style>
/* =========================================================
   ABOUT PAGE — section-scoped styles
   ========================================================= */
.about-hero { padding: clamp(8.5rem, 13vw, 10.5rem) 0 clamp(3rem, 6vw, 4rem); text-align: center; }
.about-hero h1 { font-size: clamp(2.1rem, 4vw, 3rem); margin-top: 0.8rem; }
.about-hero p { max-width: 620px; margin: 1rem auto 0; color: var(--text-muted); }

.timeline { position: relative; max-width: 760px; margin: 0 auto; }
.timeline::before { content: ""; position: absolute; left: 18px; top: 6px; bottom: 6px; width: 2px; background: linear-gradient(180deg, var(--aqua), var(--gold)); }
.timeline-item { position: relative; padding-left: 56px; margin-bottom: 2.2rem; }
.timeline-item::before {
  content: ""; position: absolute; left: 10px; top: 4px; width: 16px; height: 16px; border-radius: 50%;
  background: var(--porcelain); border: 3px solid var(--aqua);
}
.timeline-year { font-family: var(--font-mono); font-size: 0.78rem; color: var(--gold); letter-spacing: 0.05em; }
.timeline-item h3 { font-size: 1.08rem; margin-top: 0.3rem; }
.timeline-item p { color: var(--text-muted); font-size: 0.94rem; margin-top: 0.4rem; }

.story-grid { display: grid; grid-template-columns: 1fr 1fr; gap: clamp(2rem, 4vw, 3.5rem); align-items: center; }
@media (max-width: 900px) { .story-grid { grid-template-columns: 1fr; } }
.about-photo-frame {
  aspect-ratio: 4/3; border-radius: var(--radius-lg); overflow: hidden;
  background: linear-gradient(150deg, var(--mist-deep), var(--mist));
  display: flex; align-items: center; justify-content: center; position: relative;
}
.about-photo-frame .placeholder-caption {
  position: absolute; bottom: 0; left: 0; right: 0; padding: 1rem; font-family: var(--font-mono); font-size: 0.7rem;
  background: rgba(255,255,255,0.55); backdrop-filter: blur(10px); text-align: center;
}

.values-grid .glass-card { text-align: left; }
.value-icon {
  width: 48px; height: 48px; border-radius: 14px; margin-bottom: 1rem;
  background: linear-gradient(140deg, var(--aqua-soft), var(--gold-soft));
  display: flex; align-items: center; justify-content: center;
}
.value-icon svg { width: 22px; height: 22px; color: var(--ink); }

.accred-row { display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center; margin-top: 2rem; }
.accred-chip {
  display: flex; align-items: center; gap: 0.5rem; padding: 0.7rem 1.2rem;
  border-radius: var(--radius-pill); background: var(--glass-light-bg); border: 1px solid var(--glass-light-border);
  font-size: 0.86rem; font-weight: 600; color: var(--ink);
}

.facility-grid { grid-template-columns: repeat(4, 1fr); }
@media (max-width: 980px) { .facility-grid { grid-template-columns: repeat(2, 1fr); } }
.facility-photo {
  aspect-ratio: 1; border-radius: var(--radius-md); overflow: hidden; position: relative;
  background: linear-gradient(150deg, var(--mist-deep), var(--mist));
  display: flex; align-items: center; justify-content: center;
}
.facility-photo span { font-family: var(--font-mono); font-size: 0.62rem; color: var(--text-muted); text-align: center; padding: 0.5rem; }

.team-grid-full { grid-template-columns: repeat(5, 1fr); }
@media (max-width: 980px) { .team-grid-full { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 620px) { .team-grid-full { grid-template-columns: repeat(2, 1fr); } }
.team-photo-frame-static {
  aspect-ratio: 1; border-radius: var(--radius-md); overflow: hidden; margin-bottom: 0.9rem;
  background: linear-gradient(150deg, var(--mist-deep), var(--mist));
  display: flex; align-items: center; justify-content: center; position: relative;
}
.team-photo-frame-static .placeholder-caption {
  position: absolute; bottom: 0; left: 0; right: 0; font-size: 0.6rem; padding: 0.4rem;
  background: rgba(255,255,255,0.6); font-family: var(--font-mono);
}

.cta-banner { text-align: center; }
.cta-banner h2 { color: var(--white); }
</style>

<!-- ================= ABOUT HERO ================= -->
<section class="about-hero">
  <span class="eyebrow" style="justify-content:center;">About <?= htmlspecialchars(getConfig('clinic.shortName')) ?></span>
  <h1>Built by a specialist who got tired of generalist dentistry</h1>
  <p><?= htmlspecialchars(getConfig('clinic.name')) ?> started as a single implantology practice in <?= htmlspecialchars(getConfig('clinic.establishedYear')) ?> and grew into a <?= count(getConfig('locations', [])) ?>-location, five-specialist clinic — without ever changing the original idea: plan first, treat second.</p>
</section>

<!-- ================= STORY ================= -->
<section class="section">
  <div class="container story-grid">
    <div class="about-photo-frame reveal">
      <div class="placeholder-caption">Add a clinic interior photo here — see Images/README-IMAGES.md</div>
    </div>
    <div class="reveal">
      <span class="eyebrow">Our Story</span>
      <h2 style="margin-top:0.6rem; font-size:clamp(1.7rem,3vw,2.2rem);">From one chair to a coordinated specialist network</h2>
      <p class="text-muted" style="margin-top:1rem;"><?= htmlspecialchars(getConfig('doctor.name')) ?> opened the first <?= htmlspecialchars(getConfig('clinic.shortName')) ?> clinic with a simple frustration: too many patients arrived having already been treated for the wrong problem. Implants placed without a bite analysis. Crowns fitted over teeth that needed root canal first. Whitening recommended to patients who actually needed gum treatment.</p>
      <p class="text-muted" style="margin-top:0.9rem;">Fixing that meant building a clinic where every case is diagnosed properly before anyone reaches for a drill — and where the specialist who treats you is the specialist trained for exactly that problem, not whoever is available.</p>
    </div>
  </div>
</section>

<!-- ================= TIMELINE ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">Growth, Not Just Growth in Size</span>
      <h2>How the clinic grew</h2>
    </div>
    <div class="timeline reveal">
      <div class="timeline-item">
        <div class="timeline-year"><?= htmlspecialchars(getConfig('clinic.establishedYear')) ?></div>
        <h3>The first clinic opens</h3>
        <p>A single-chair implantology practice in Greater Kailash, founded on a diagnosis-first protocol.</p>
      </div>
      <div class="timeline-item">
        <div class="timeline-year">A few years later</div>
        <h3>The specialist model takes shape</h3>
        <p>Endodontics, orthodontics and paediatric dentistry join as dedicated specialist tracks rather than general add-ons.</p>
      </div>
      <div class="timeline-item">
        <div class="timeline-year">Expansion</div>
        <h3>Gurugram and Vasant Kunj locations open</h3>
        <p>Demand from patients commuting across Delhi NCR leads to two additional clinics, run on the same protocol.</p>
      </div>
      <div class="timeline-item">
        <div class="timeline-year">Today</div>
        <h3>A coordinated network of <?= count(getConfig('locations', [])) ?> clinics</h3>
        <p>Over <?= htmlspecialchars(getConfig('stats.patientsTreated')) ?> patients treated, with a follow-up structure built to catch problems early.</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= VALUES ================= -->
<section class="section">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">What We Hold Ourselves To</span>
      <h2>Three principles that don't bend for convenience</h2>
    </div>
    <div class="grid grid-3 values-grid reveal-stagger">
      <div class="glass glass-card reveal">
        <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 11l3 3L22 4M2 12a10 10 0 1 0 20 0 10 10 0 0 0-20 0z"/></svg></div>
        <h3>Honest treatment plans</h3>
        <p class="text-muted" style="margin-top:0.6rem; font-size:0.94rem;">If a treatment isn't necessary, we'll say so — even if that means a shorter appointment and a smaller bill.</p>
      </div>
      <div class="glass glass-card reveal">
        <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2l3 7h7l-5.5 4.5L18 21l-6-4-6 4 1.5-7.5L2 9h7l3-7z"/></svg></div>
        <h3>Specialist-only treatment</h3>
        <p class="text-muted" style="margin-top:0.6rem; font-size:0.94rem;">Each procedure is performed by the dentist trained specifically for it, not assigned based on who is in the building.</p>
      </div>
      <div class="glass glass-card reveal">
        <div class="value-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19h16M6 19V9l6-5 6 5v10"/></svg></div>
        <h3>Aftercare as standard, not upsell</h3>
        <p class="text-muted" style="margin-top:0.6rem; font-size:0.94rem;">Follow-up visits are scheduled as part of treatment, not offered later as a paid extra.</p>
      </div>
    </div>

    <div class="accred-row">
      <span class="accred-chip">Indian Dental Association — Member Practice</span>
      <span class="accred-chip">ISO-Compliant Sterilisation Protocol</span>
      <span class="accred-chip">Digital Records &amp; Imaging</span>
    </div>
  </div>
</section>

<!-- ================= FACILITY GALLERY ================= -->
<section class="section section--alt">
  <div class="container">
    <div class="section-head">
      <span class="eyebrow">Inside the Clinic</span>
      <h2>What the space actually looks like</h2>
    </div>
    <div class="grid facility-grid reveal-stagger">
      <?php $facilityLabels = ['Reception & Waiting Area', 'Treatment Suite', 'Digital Imaging Room', 'Paediatric Suite']; ?>
      <?php foreach ($facilityLabels as $label): ?>
        <div class="facility-photo reveal"><span><?= htmlspecialchars($label) ?> — add photo</span></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= FULL TEAM ================= -->
<section class="section">
  <div class="container">
    <div class="section-head section-head--center">
      <span class="eyebrow" style="justify-content:center;">Meet the Team</span>
      <h2>Five specialists, one shared protocol</h2>
    </div>
    <div class="grid team-grid-full reveal-stagger">
      <?php
      $fullTeam = [
        ['name' => 'Dr. Aanya Kapoor', 'role' => 'Prosthodontics & Implantology', 'note' => getConfig('doctor.experienceYears') . '+ years experience'],
        ['name' => 'Dr. Rohan Mehta', 'role' => 'Endodontics (Root Canal)', 'note' => 'Microscope-assisted specialist'],
        ['name' => 'Dr. Simran Bedi', 'role' => 'Orthodontics & Aligners', 'note' => 'Clear aligner certified'],
        ['name' => 'Dr. Karan Suri', 'role' => 'Paediatric Dentistry', 'note' => 'Child behaviour-management trained'],
        ['name' => 'Dr. Naina Oberoi', 'role' => 'Cosmetic & Restorative Dentistry', 'note' => 'Veneers & smile design lead'],
      ];
      foreach ($fullTeam as $member): ?>
        <div class="reveal" style="text-align:center;">
          <div class="team-photo-frame-static">
            <div class="placeholder-caption">Add photo</div>
          </div>
          <h3 style="font-size:0.98rem;"><?= htmlspecialchars($member['name']) ?></h3>
          <p class="text-muted" style="font-size:0.82rem; margin-top:0.3rem;"><?= htmlspecialchars($member['role']) ?></p>
          <p class="text-muted" style="font-size:0.76rem; margin-top:0.2rem;"><?= htmlspecialchars($member['note']) ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= CTA BANNER ================= -->
<section class="section section--dark cta-banner">
  <div class="container reveal">
    <span class="eyebrow" style="justify-content:center;">Ready When You Are</span>
    <h2 style="margin-top:0.6rem; font-size:clamp(1.8rem,3.4vw,2.5rem);">Talk to a specialist before deciding on treatment</h2>
    <div style="margin-top:1.8rem; display:flex; gap:0.9rem; justify-content:center; flex-wrap:wrap;">
      <a href="<?= pageUrl('contact.php') ?>" class="btn btn-gold">Book a Consultation</a>
      <a href="<?= whatsappUrl('Hi, I would like to know more about ' . getConfig('clinic.name')) ?>" class="btn btn-whatsapp" target="_blank" rel="noopener">WhatsApp Us</a>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/../Contents/footer.php';