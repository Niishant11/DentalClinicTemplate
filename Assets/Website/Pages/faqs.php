<?php
require_once __DIR__ . '/../../../config-loader.php';

$pageTitle       = 'Frequently Asked Questions — ' . getConfig('clinic.name');
$pageDescription = 'Answers to common questions about appointments, treatments, payments and aftercare at ' . getConfig('clinic.name') . '.';
$activeNav       = 'faqs';

require __DIR__ . '/../Contents/header.php';
?>
<style>
/* =========================================================
   FAQ PAGE — section-scoped styles
   ========================================================= */
.faqs-hero { padding: clamp(8.5rem, 13vw, 10.5rem) 0 clamp(2.5rem, 5vw, 3.5rem); text-align: center; }
.faqs-hero h1 { font-size: clamp(2.1rem, 4vw, 3rem); margin-top: 0.8rem; }
.faqs-hero p { max-width: 600px; margin: 1rem auto 0; color: var(--text-muted); }

.faq-jump { display: flex; gap: 0.7rem; flex-wrap: wrap; justify-content: center; margin-top: 2rem; }
.faq-jump a {
  font-family: var(--font-mono); font-size: 0.76rem; letter-spacing: 0.04em; text-transform: uppercase;
  padding: 0.55rem 1.1rem; border-radius: var(--radius-pill); background: var(--glass-light-bg);
  border: 1px solid var(--glass-light-border); color: var(--ink); text-decoration: none; transition: transform 0.25s ease;
}
.faq-jump a:hover { transform: translateY(-2px); }

.faq-category { max-width: 760px; margin: 0 auto; }
.faq-category-title { display: flex; align-items: center; gap: 0.7rem; margin-bottom: 1.2rem; }
.faq-category-title .num {
  font-family: var(--font-mono); font-size: 0.78rem; color: var(--gold); border: 1px solid var(--gold-soft);
  border-radius: 999px; width: 28px; height: 28px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;
}
.faq-category-title h2 { font-size: 1.3rem; }

.faq-still { text-align: center; max-width: 560px; margin: 0 auto; }


/* ===== FAQ CATEGORY HEADER ===== */

.faq-category{
    max-width: 900px;
    margin: 0 auto;
}

.faq-category-title{
    display:flex;
    align-items:center;
    gap:16px;
    margin-bottom:30px;
    padding:18px 22px;
    border-radius:18px;
    background:#fff;
    box-shadow:0 8px 25px rgba(0,0,0,.06);
    border:1px solid rgba(0,0,0,.05);
}

.faq-category-title .num{
    width:42px;
    height:42px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    background:linear-gradient(135deg,#d4af37,#c49a2c);
    color:#fff;
    font-weight:700;
    font-size:0.95rem;
    border:none;
    box-shadow:0 6px 15px rgba(212,175,55,.25);
}

.faq-category-title h2{
    margin:0;
    font-size:1.6rem;
    font-weight:700;
    color:var(--ink);
}

/* ===== ALTERNATE SECTION SPACING ===== */

.section[id]{
    scroll-margin-top:120px;
}

/* ===== MOBILE ===== */

@media(max-width:768px){

    .faq-category-title{
        padding:14px 16px;
        gap:12px;
    }

    .faq-category-title .num{
        width:36px;
        height:36px;
        font-size:.85rem;
    }

    .faq-category-title h2{
        font-size:1.2rem;
    }
}

/* ===== STILL HAVE QUESTIONS ===== */

.faq-still{
    max-width:800px;
    text-align:center;
}

.faq-still h2{
    font-size:clamp(2rem,4vw,3rem);
}

.faq-still .btn{
    min-width:180px;
}

/* ===== MOBILE ===== */

@media(max-width:768px){

    .faqs-hero{
        padding:100px 0 50px;
    }

    .faq-category-title h2{
        font-size:1.5rem;
    }

    .accordion-trigger{
        padding:18px;
        font-size:.95rem;
    }

    .accordion-panel p{
        padding:0 18px 18px;
    }
}

/* ===== QUESTION & ANSWER CARDS ===== */

.accordion-item{
    background:#fff;
    border-radius:18px;
    padding:24px;
    margin-bottom:18px;
    border:1px solid rgba(0,0,0,.06);
    box-shadow:0 8px 25px rgba(0,0,0,.05);
}

.accordion-trigger{
    all:unset;
    display:block;
    width:100%;
    cursor:default;
}

.accordion-trigger span:first-child{
    display:block;
    font-size:1.1rem;
    font-weight:700;
    color:var(--ink);
    line-height:1.5;
    margin-bottom:12px;
    position:relative;
    padding-left:35px;
}

.accordion-trigger span:first-child::before{
    content:"Q";
    position:absolute;
    left:0;
    top:0;
    width:24px;
    height:24px;
    border-radius:50%;
    background:#d4af37;
    color:#fff;
    font-size:0.8rem;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

.accordion-panel{
    display:block !important;
    height:auto !important;
    overflow:visible !important;
    padding-left:35px;
}

.accordion-panel p{
    margin:0;
    color:#5f6b7a;
    line-height:1.8;
    font-size:0.96rem;
    position:relative;
}

.accordion-panel p::before{
    content:"A";
    position:absolute;
    left:-35px;
    top:2px;
    width:24px;
    height:24px;
    border-radius:50%;
    background:#1fb981;
    color:#fff;
    font-size:0.8rem;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:700;
}

.plus{
    display:none;
}
</style>

<!-- ================= HERO ================= -->
<section class="faqs-hero">
  <div class="container reveal">
    <div class="glass-strong" style="padding:40px;border-radius:28px;">
      <span class="eyebrow" style="justify-content:center;">Frequently Asked Questions</span>
      <h1>Questions we hear <span style="color:var(--gold);">often</span>, answered plainly.</h1>
      <p>Can&rsquo;t find what you&rsquo;re looking for? Our front desk is always happy to talk it through before you book.</p>
      <div class="faq-jump">
       <a href="#general">General</a>
        <a href="#appointments">Appointments</a>
        <a href="#treatments">Treatments</a>
        <a href="#payments">Payments &amp; Insurance</a>
        <a href="#aftercare">Aftercare</a>
      </div>
    </div>
  </div>
</section>

<?php
$faqGroups = [
  [
    'id' => 'general',
    'title' => 'General',
    'items' => [
      ['q' => 'Where are your clinics located?', 'a' => 'We currently operate ' . count(getConfig('locations', [])) . ' clinics across Delhi NCR. Visit the Contact page for full addresses and directions to each one.'],
      ['q' => 'Do I need a referral to visit?', 'a' => 'No referral is needed. You can book directly with us for a general consultation, and we will refer you internally to the right specialist if needed.'],
      ['q' => 'Do you treat children as well as adults?', 'a' => 'Yes — we have a dedicated paediatric suite and a dentist who works exclusively with children, designed to make first visits comfortable rather than clinical.'],
      ['q' => 'What languages does your team speak?', 'a' => 'Our clinical and front-desk teams are comfortable in English and Hindi, and can usually accommodate a few other regional languages on request.'],
    ],
  ],
  [
    'id' => 'appointments',
    'title' => 'Appointments',
    'items' => [
      ['q' => 'How do I book an appointment?', 'a' => 'You can book through the form on our Contact page, call us directly, or message us on WhatsApp — whichever is easiest for you.'],
      ['q' => 'Do you offer same-day appointments?', 'a' => 'We hold same-day slots for dental emergencies such as severe pain, swelling, or a broken tooth. Call ahead and our team will fit you in as quickly as possible.'],
      ['q' => 'What are your clinic timings?', 'a' => 'We are open Monday to Saturday, ' . getConfig('hours.weekdays') . ', and on Sundays by appointment only.'],
      ['q' => 'What should I bring to my first visit?', 'a' => 'Please bring any prior dental records or X-rays you may have, a list of current medications, and your preferred contact details for follow-up.'],
      ['q' => 'Can I reschedule or cancel an appointment?', 'a' => 'Yes, we just ask for at least 24 hours notice where possible so the slot can be offered to another patient.'],
    ],
  ],
  [
    'id' => 'treatments',
    'title' => 'Treatments',
    'items' => [
      ['q' => 'Is treatment really painless?', 'a' => 'Most routine treatments involve minimal discomfort thanks to modern anaesthesia techniques. For more involved procedures, we walk you through exactly what to expect beforehand.'],
      ['q' => 'How long does a root canal take?', 'a' => 'A microscope-assisted root canal typically takes one to two sessions of around 45–60 minutes each, depending on the tooth and the extent of infection.'],
      ['q' => 'How long do dental implants take to heal?', 'a' => 'Implants generally need three to six months to fuse fully with the jawbone before the final crown is fitted, though this varies by individual healing rate.'],
      ['q' => 'Are clear aligners as effective as traditional braces?', 'a' => 'For most mild-to-moderate alignment cases, yes. Our specialists assess your bite first and will recommend traditional braces instead if your case calls for it.'],
      ['q' => 'Do you treat international or out-of-town patients?', 'a' => 'Yes — our coordination desk plans multi-day treatment schedules for patients visiting from outside Delhi NCR, including follow-up scheduling around your travel dates.'],
    ],
  ],
  [
    'id' => 'payments',
    'title' => 'Payments &amp; Insurance',
    'items' => [
      ['q' => 'Do you accept health insurance?', 'a' => 'We accept a range of major insurance providers for eligible treatments. Please share your policy details when booking so our coordinator can confirm coverage in advance.'],
      ['q' => 'Do you offer payment plans for larger treatments?', 'a' => 'Yes, for treatments like implants or full mouth rehabilitation we offer staged payment plans tied to treatment milestones rather than a single upfront bill.'],
      ['q' => 'What payment methods do you accept?', 'a' => 'We accept cash, all major debit and credit cards, and UPI payments at every location.'],
      ['q' => 'Will I get a written treatment estimate beforehand?', 'a' => 'Always. After your consultation and any required imaging, you will receive a written estimate before any treatment begins — no surprise costs.'],
    ],
  ],
  [
    'id' => 'aftercare',
    'title' => 'Aftercare',
    'items' => [
      ['q' => 'What should I do after a tooth extraction?', 'a' => 'Avoid rinsing vigorously, hot food, and straws for the first 24 hours, and apply a cold compress if there is swelling. We will give you a printed aftercare sheet specific to your procedure.'],
      ['q' => 'How soon can I eat normally after a filling or crown?', 'a' => 'For most fillings you can eat once numbness wears off, usually within a couple of hours. For crowns, we will advise a softer-food window of a day or two.'],
      ['q' => 'Do you follow up after treatment?', 'a' => 'Yes — every treatment plan includes a scheduled follow-up call or visit, not just a one-time procedure, so we can catch any issues early.'],
      ['q' => 'What if I have pain or swelling after a procedure?', 'a' => 'Call us immediately. Mild discomfort for a day or two is normal, but persistent pain or swelling should always be checked rather than waited out.'],
    ],
  ],
];
?>

<?php foreach ($faqGroups as $index => $group): ?>
<section class="section <?= $index % 2 === 1 ? 'section--alt' : '' ?>" id="<?= $group['id'] ?>">
  <div class="container">
    <div class="faq-category reveal">
      <div class="faq-category-title">
        <span class="num"><?= $index + 1 ?></span>
        <h2><?= $group['title'] ?></h2>
      </div>
      <div data-accordion data-accordion-single>
        <?php foreach ($group['items'] as $faq): ?>
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
    </div>
  </div>
</section>
<?php endforeach; ?>

<!-- ================= STILL HAVE QUESTIONS ================= -->
<section class="section section--dark">
  <div class="container faq-still reveal">
    <span class="eyebrow" style="justify-content:center;">Still Have Questions?</span>
    <h2 style="margin-top:0.6rem; font-size:clamp(1.6rem,2.8vw,2.1rem);">Our front desk is happy to talk it through</h2>
    <div style="margin-top:1.8rem; display:flex; gap:0.9rem; justify-content:center; flex-wrap:wrap;">
      <a href="<?= pageUrl('contact.php') ?>" class="btn btn-gold">Contact Us</a>
      <a href="<?= whatsappUrl('Hi, I have a question before booking an appointment.') ?>" class="btn btn-whatsapp" target="_blank" rel="noopener">WhatsApp Us</a>
    </div>
  </div>
</section>

<?php require __DIR__ . '/../Contents/footer.php'; ?>