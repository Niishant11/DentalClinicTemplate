/* ==========================================================================
   GLOBAL SCRIPT — Lumière Dental Template
   Shared behaviour included by every page via:
   <script src="<?= asset('Website/Scripts/main.js') ?>"></script>
   ========================================================================== */

(function () {
  "use strict";

  var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  document.addEventListener("DOMContentLoaded", function () {
    initMobileNav();
    initSmileProgress();
    initScrollReveal();
    initTilt3D();
    initAccordions();
    initCounters();
    initCarousel();
    initAjaxForms();
    initHeaderShrink();
  });

  /* ---------------- Mobile nav toggle ---------------- */
  function initMobileNav() {
    var toggle = document.querySelector("[data-nav-toggle]");
    var nav = document.querySelector("[data-nav-menu]");
    if (!toggle || !nav) return;
    toggle.addEventListener("click", function () {
      var isOpen = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      document.body.classList.toggle("nav-locked", isOpen);
    });
    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        nav.classList.remove("is-open");
        document.body.classList.remove("nav-locked");
        toggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  /* ---------------- Header shrink on scroll ---------------- */
  function initHeaderShrink() {
    var header = document.querySelector("[data-site-header]");
    if (!header) return;
    var onScroll = function () {
      header.classList.toggle("is-scrolled", window.scrollY > 24);
    };
    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  /* ---------------- Signature: Smile Progress Arc ---------------- */
  function initSmileProgress() {
    var fill = document.getElementById("smile-progress-fill");
    if (!fill) return;
    var total = parseFloat(fill.getAttribute("data-length")) || 1200;
    fill.style.strokeDasharray = total;

    var update = function () {
      var doc = document.documentElement;
      var scrollTop = window.scrollY || doc.scrollTop;
      var max = doc.scrollHeight - doc.clientHeight;
      var pct = max > 0 ? Math.min(scrollTop / max, 1) : 0;
      fill.style.strokeDashoffset = total - total * pct;
    };
    window.addEventListener("scroll", update, { passive: true });
    window.addEventListener("resize", update);
    update();
  }

  /* ---------------- Scroll reveal via IntersectionObserver ---------------- */
  function initScrollReveal() {
    var targets = document.querySelectorAll(".reveal");
    if (!targets.length) return;

    if (prefersReducedMotion || !("IntersectionObserver" in window)) {
      targets.forEach(function (el) { el.classList.add("is-visible"); });
      return;
    }

    var groups = {};
    targets.forEach(function (el) {
      var parent = el.parentElement;
      if (parent && parent.classList.contains("reveal-stagger")) {
        var key = parent;
        groups[key] = groups[key] || [];
        var idx = groups[key].length;
        el.style.setProperty("--stagger-i", idx);
        groups[key].push(el);
      }
    });

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.18, rootMargin: "0px 0px -40px 0px" });

    targets.forEach(function (el) { observer.observe(el); });
  }

  /* ---------------- 3D pointer tilt for glass cards ---------------- */
  function initTilt3D() {
    if (prefersReducedMotion) return;
    var tiltEls = document.querySelectorAll(".tilt");
    if (!tiltEls.length) return;

    tiltEls.forEach(function (el) {
      var strength = parseFloat(el.getAttribute("data-tilt-strength")) || 8;

      el.addEventListener("mousemove", function (e) {
        var rect = el.getBoundingClientRect();
        var px = (e.clientX - rect.left) / rect.width - 0.5;
        var py = (e.clientY - rect.top) / rect.height - 0.5;
        el.style.transform =
          "perspective(900px) rotateX(" + (-py * strength) + "deg) rotateY(" + (px * strength) + "deg) translateZ(0)";
      });

      el.addEventListener("mouseleave", function () {
        el.style.transform = "perspective(900px) rotateX(0deg) rotateY(0deg) translateZ(0)";
      });
    });
  }

  /* ---------------- Accordions (FAQ etc.) ---------------- */
  function initAccordions() {
    document.querySelectorAll("[data-accordion]").forEach(function (group) {
      var items = group.querySelectorAll("[data-accordion-item]");
      items.forEach(function (item) {
        var trigger = item.querySelector("[data-accordion-trigger]");
        var panel = item.querySelector("[data-accordion-panel]");
        if (!trigger || !panel) return;

        trigger.addEventListener("click", function () {
          var isOpen = item.classList.contains("is-open");

          if (group.hasAttribute("data-accordion-single")) {
            items.forEach(function (sibling) {
              sibling.classList.remove("is-open");
              var siblingPanel = sibling.querySelector("[data-accordion-panel]");
              if (siblingPanel) siblingPanel.style.maxHeight = null;
              var siblingTrigger = sibling.querySelector("[data-accordion-trigger]");
              if (siblingTrigger) siblingTrigger.setAttribute("aria-expanded", "false");
            });
          }

          if (!isOpen) {
            item.classList.add("is-open");
            panel.style.maxHeight = panel.scrollHeight + "px";
            trigger.setAttribute("aria-expanded", "true");
          } else {
            item.classList.remove("is-open");
            panel.style.maxHeight = null;
            trigger.setAttribute("aria-expanded", "false");
          }
        });
      });
    });
  }

  /* ---------------- Animated counters for stats ---------------- */
  function initCounters() {
    var counters = document.querySelectorAll("[data-counter]");
    if (!counters.length) return;

    var animate = function (el) {
      var raw = el.getAttribute("data-counter");
      var match = raw.match(/^([\D]*)([\d,]+)(.*)$/);
      if (!match) { el.textContent = raw; return; }
      var prefix = match[1];
      var numeric = parseInt(match[2].replace(/,/g, ""), 10);
      var suffix = match[3];
      var duration = 1400;
      var startTime = null;

      var step = function (timestamp) {
        if (!startTime) startTime = timestamp;
        var progress = Math.min((timestamp - startTime) / duration, 1);
        var eased = 1 - Math.pow(1 - progress, 3);
        var current = Math.floor(eased * numeric);
        el.textContent = prefix + current.toLocaleString("en-IN") + suffix;
        if (progress < 1) requestAnimationFrame(step);
      };

      if (prefersReducedMotion) {
        el.textContent = raw;
      } else {
        requestAnimationFrame(step);
      }
    };

    if ("IntersectionObserver" in window) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            animate(entry.target);
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.6 });
      counters.forEach(function (el) { observer.observe(el); });
    } else {
      counters.forEach(animate);
    }
  }

  /* ---------------- Lightweight testimonial / media carousel ---------------- */
  function initCarousel() {
    document.querySelectorAll("[data-carousel]").forEach(function (carousel) {
      var track = carousel.querySelector("[data-carousel-track]");
      var prev = carousel.querySelector("[data-carousel-prev]");
      var next = carousel.querySelector("[data-carousel-next]");
      if (!track) return;

      var scrollByCard = function (direction) {
        var card = track.querySelector("[data-carousel-card]");
        var distance = card ? card.getBoundingClientRect().width + 20 : 320;
        track.scrollBy({ left: direction * distance, behavior: "smooth" });
      };

      if (prev) prev.addEventListener("click", function () { scrollByCard(-1); });
      if (next) next.addEventListener("click", function () { scrollByCard(1); });
    });
  }

  /* ---------------- AJAX form submission (contact / booking) ---------------- */
  function initAjaxForms() {
    document.querySelectorAll("[data-ajax-form]").forEach(function (form) {
      var statusEl = form.querySelector("[data-form-status]");
      var submitBtn = form.querySelector("[type=submit]");

      form.addEventListener("submit", function (e) {
        e.preventDefault();

        if (statusEl) {
          statusEl.className = "form-status";
          statusEl.textContent = "";
        }

        // Honeypot spam check
        var honeypot = form.querySelector("[data-honeypot]");
        if (honeypot && honeypot.value !== "") return;

        var originalLabel = submitBtn ? submitBtn.innerHTML : "";
        if (submitBtn) {
          submitBtn.disabled = true;
          submitBtn.innerHTML = "Sending\u2026";
        }

        fetch(form.getAttribute("action"), {
          method: "POST",
          headers: { "X-Requested-With": "XMLHttpRequest" },
          body: new FormData(form)
        })
          .then(function (res) { return res.json(); })
          .then(function (data) {
            if (statusEl) {
              statusEl.classList.add("is-visible", data.success ? "is-success" : "is-error");
              statusEl.textContent = data.message || (data.success ? "Thank you — we will be in touch shortly." : "Something went wrong. Please call us directly.");
            }
            if (data.success) form.reset();
          })
          .catch(function () {
            if (statusEl) {
              statusEl.classList.add("is-visible", "is-error");
              statusEl.textContent = "We couldn't send that. Please call or WhatsApp us directly.";
            }
          })
          .finally(function () {
            if (submitBtn) {
              submitBtn.disabled = false;
              submitBtn.innerHTML = originalLabel;
            }
          });
      });
    });
  }
})();