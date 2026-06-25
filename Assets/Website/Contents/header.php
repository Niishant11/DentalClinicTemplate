<?php
/**
 * header.php
 * ------------------------------------------------------------------
 * Included at the top of every page, right after config-loader.php.
 * Expects (optionally) these variables set by the calling page BEFORE
 * including this file:
 *   $pageTitle        string  -> used in <title>
 *   $pageDescription  string  -> used in meta description
 *   $activeNav        string  -> one of: home, about, services, contact, faqs
 *
 * If config-loader.php hasn't been required yet, require it here so
 * this partial never breaks if included on its own.
 */
if (!defined('CONFIG_LOADED')) {
    require_once __DIR__ . '/config-loader.php';
}

$pageTitle       = $pageTitle ?? getConfig('clinic.name') . ' — ' . getConfig('clinic.tagline');
$pageDescription = $pageDescription ?? getConfig('clinic.name') . ' is a premium dental clinic offering implants, root canal, cosmetic dentistry and orthodontics with a patient-first, technology-led approach.';
$activeNav       = $activeNav ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
<link rel="icon" href="<?= getConfig('clinic.faviconImage') ?: asset('Website/Images/Clean tooth.svg') ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400..700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= asset('Website/Styles/main.css') ?>">

<style>
/* =========================================================
   HEADER / NAV — internal styles (page-partial scoped)
   ========================================================= */
.site-header {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 1000;
  padding: 1.1rem 0;
  transition: padding 0.35s ease, background 0.35s ease;
}
.site-header .container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.5rem;
}
.header-shell {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1.5rem;
  padding: 0.7rem 1.4rem;
  border-radius: var(--radius-pill);
  background: var(--glass-light-bg);
  border: 1px solid var(--glass-light-border);
  backdrop-filter: blur(22px) saturate(150%);
  -webkit-backdrop-filter: blur(22px) saturate(150%);
  box-shadow: var(--shadow-soft);
  transition: box-shadow 0.35s ease, background 0.35s ease;
}
.site-header.is-scrolled .header-shell { box-shadow: var(--shadow-lifted); background: rgba(255,255,255,0.82); }

.brand {
  display: flex;
  align-items: center;
  gap: 0.65rem;
  font-family: var(--font-display);
  font-weight: 600;
  font-size: 1.18rem;
  color: var(--ink);
  letter-spacing: 0.01em;
}
.brand-mark{
    width:50px;
    height:50px;
    display:flex;
    align-items:center;
    justify-content:center;
    overflow:hidden;
    flex-shrink:0;
    border-radius:50%;
}

.brand-logo{
    width:100%;
    height:100%;
    object-fit:contain;
    filter: drop-shadow(0 4px 12px rgba(0,0,0,.15));
}
.brand small {
  display: block;
  font-family: var(--font-mono);
  font-size: 0.6rem;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: var(--text-muted);
  font-weight: 400;
}

.nav-links {
  display: flex;
  align-items: center;
  gap: 1.9rem;
}
.nav-links a {
  font-size: 0.92rem;
  font-weight: 600;
  color: var(--text-dark);
  position: relative;
  padding: 0.3rem 0;
}
.nav-links a::after {
  content: "";
  position: absolute;
  left: 0; bottom: -2px;
  width: 0%; height: 2px;
  background: linear-gradient(90deg, var(--aqua), var(--gold));
  transition: width 0.3s ease;
}
.nav-links a:hover::after, .nav-links a.is-active::after { width: 100%; }
.nav-links a.is-active { color: var(--ink); }
/* Dropdown Menu */

.nav-dropdown{
    position:relative;
}

.nav-dropdown-btn{
    background:none;
    border:none;
    font:inherit;
    color:var(--text-dark);
    cursor:pointer;
    font-size:0.92rem;
    font-weight:600;
    display:flex;
    align-items:center;
    gap:6px;
    padding:0;
}

.arrow{
    font-size:10px;
    transition:transform .3s ease;
}

.nav-dropdown:hover .arrow{
    transform:rotate(180deg);
}

.nav-dropdown-menu{
    position:absolute;
    top:100%;
    left:50%;
    transform:translateX(-50%);
    min-width:180px;
    background:#fff;
    border-radius:14px;
    padding:10px 0;
    box-shadow:0 15px 40px rgba(0,0,0,.12);
    opacity:0;
    visibility:hidden;
    transition:.25s ease;
    z-index:9999;
}

.nav-dropdown:hover .nav-dropdown-menu{
    opacity:1;
    visibility:visible;
    top:130%;
}

.nav-dropdown-menu a{
    display:block;
    padding:12px 18px;
    color:var(--ink);
    text-decoration:none;
}

.nav-dropdown-menu a:hover{
    background:rgba(0,0,0,.05);
}

.header-cta { display: flex; align-items: center; gap: 0.65rem; }
.header-cta .btn { padding: 0.7rem 1.25rem; font-size: 0.86rem; }
.icon-call { display: inline-flex; }
.icon-call svg { width: 20px; height: 20px; }

.call-icon{
    color:#25D366;
    filter:
        drop-shadow(0 0 4px rgba(37,211,102,.8))
        drop-shadow(0 0 8px rgba(37,211,102,.6))
        drop-shadow(0 0 12px rgba(37,211,102,.4));
}

.nav-toggle {
  display: none;
  flex-direction: column;
  gap: 5px;
  background: none;
  border: none;
  padding: 0.5rem;
}
.nav-toggle span { width: 22px; height: 2px; background: var(--ink); border-radius: 2px; transition: transform 0.3s ease, opacity 0.3s ease; }

@media (max-width: 800px) {
  .nav-links { display: none; }
  .header-cta .btn-ghost { display: none; }
  .nav-toggle { display: flex; }

  .nav-links.is-open {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 1.1rem;
    position: fixed;
    top: 82px; right: 1rem; left: 1rem;
    padding: 1.6rem;
    border-radius: var(--radius-lg);
    background: rgba(255,255,255,0.92);
    border: 1px solid var(--glass-light-border);
    backdrop-filter: blur(24px);
    box-shadow: var(--shadow-lifted);
    z-index: 999;
  }
  .nav-links.is-open a { font-size: 1.05rem; }
}
body.nav-locked { overflow: hidden; }

/* Smile progress arc */
.smile-progress-mount { position: fixed; top: 0; left: 0; width: 100%; z-index: 1001; pointer-events: none; }
</style>
</head>
<body>
<a href="#main-content" class="skip-link">Skip to content</a>

<!-- Signature element: smile-shaped scroll progress -->
<div class="smile-progress-mount" aria-hidden="true">
  <svg id="smile-progress-svg" viewBox="0 0 1200 40" preserveAspectRatio="none">
    <defs>
      <linearGradient id="smileGradient" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" stop-color="#46C9B4"/>
        <stop offset="100%" stop-color="#C8A05B"/>
      </linearGradient>
    </defs>
    <path id="smile-progress-track" d="M0,6 Q600,40 1200,6" fill="none" stroke-width="3"/>
    <path id="smile-progress-fill" data-length="1200" d="M0,6 Q600,40 1200,6" fill="none" stroke-width="3" stroke-linecap="round"/>
  </svg>
</div>

<header class="site-header" data-site-header>
  <div class="container">
    <div class="header-shell">
      <a href="<?= homeUrl() ?>" class="brand">
        <span class="brand-mark">
    <?php if (getConfig('clinic.logoImage')): ?>
        <img
            src="<?= asset(getConfig('clinic.logoImage')) ?>"
            alt="<?= htmlspecialchars(getConfig('clinic.name')) ?> Logo"
            class="brand-logo">
    <?php endif; ?>
</span>
        <span>
          <?= htmlspecialchars(getConfig('clinic.logoText', getConfig('clinic.name'))) ?>
          <small><?= htmlspecialchars(getConfig('clinic.tagline')) ?></small>
        </span>
      </a>

      <nav class="nav-links" data-nav-menu>

    <a href="<?= homeUrl() ?>#services"
       class="<?= $activeNav === 'home' ? 'is-active' : '' ?>">
        Treatments
    </a>
    <a href="<?= pageUrl('contact.php') ?>"
       class="<?= $activeNav === 'contact' ? 'is-active' : '' ?>">
        Contact Us
    </a>

    <div class="nav-dropdown">

        <button type="button" class="nav-dropdown-btn">
            More
            <span class="arrow">▼</span>
        </button>
        
        <div class="nav-dropdown-menu">
            <a href="<?= pageUrl('about-us.php') ?>"
               class="<?= $activeNav === 'about' ? 'is-active' : '' ?>">
                About Us
            </a>

            <a href="<?= homeUrl() ?>#reviews">
                Reviews
            </a>

            <a href="<?= pageUrl('faqs.php') ?>"
               class="<?= $activeNav === 'faqs' ? 'is-active' : '' ?>">
                FAQs
            </a>
        </div>

    </div>


</nav>

      <div class="header-cta">
        <a href="tel:<?= htmlspecialchars(getConfig('contact.phonePrimary')) ?>" class="btn btn-ghost btn-sm">
          <span class="icon-call call-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6.6 10.8a15 15 0 0 0 6.6 6.6l2.2-2.2a1.2 1.2 0 0 1 1.2-.3 11 11 0 0 0 3.4.5 1.2 1.2 0 0 1 1.2 1.2V20a1.2 1.2 0 0 1-1.2 1.2A17.2 17.2 0 0 1 2.8 4.2 1.2 1.2 0 0 1 4 3h3.4a1.2 1.2 0 0 1 1.2 1.2 11 11 0 0 0 .5 3.4 1.2 1.2 0 0 1-.3 1.2Z"/></svg>
          </span>
        </a>
        <a href="<?= homeUrl() ?>#book" class="btn btn-primary btn-sm">Book Appointment</a>
      </div>

      <button class="nav-toggle" data-nav-toggle aria-label="Toggle navigation" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
</header>
<main id="main-content">