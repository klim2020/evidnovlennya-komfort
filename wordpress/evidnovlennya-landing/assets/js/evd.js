/* Лендинг «єВідновлення»: анімації AOS та модальне вікно */
(function () {

  // Якщо CDN не завантажився — показуємо контент без анімацій
  if (typeof AOS === 'undefined') {
    document.querySelectorAll('.evd [data-aos]').forEach(function (el) { el.removeAttribute('data-aos'); });
  } else
  {
    // На телефоні бічні анімації (виїзд зліва/справа) розширюють сторінку — замінюємо на появу знизу
    if (window.innerWidth < 768) {
      document.querySelectorAll('.evd [data-aos^="fade-left"],.evd [data-aos^="fade-right"],.evd [data-aos^="flip"]').forEach(function (el) {
        el.setAttribute('data-aos', 'fade-up');
      });
    }
  AOS.init({ duration: 700, easing: 'ease-out-cubic', once: true, offset: 60 });
  }


  // Модальне вікно «Отримати консультацію»
  (function () {
    var modal = document.getElementById('consult');
    if (!modal) return;
    var lastFocused = null;
    function open() {
      lastFocused = document.activeElement;
      modal.classList.add('open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.classList.add('evd-modal-open');
      var field = modal.querySelector('input, textarea, button');
      if (field) field.focus();
    }
    function close() {
      modal.classList.remove('open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('evd-modal-open');
      if (lastFocused) lastFocused.focus();
    }
    document.querySelectorAll('[data-modal-open], a[href="#consult"]').forEach(function (btn) {
      btn.addEventListener('click', function (e) { e.preventDefault(); open(); });
    });
    modal.querySelectorAll('[data-modal-close]').forEach(function (btn) {
      btn.addEventListener('click', close);
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('open')) close();
    });
  })();

})();
