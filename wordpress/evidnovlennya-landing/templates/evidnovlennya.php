<?php
/**
 * Шаблон сторінки «єВідновлення».
 * Шапка й футер беруться з теми сайту, посередині — лендинг.
 *
 * @package Evidnovlennya_Landing
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$evd_img    = EVD_URL . 'assets/images/';
$evd_status = isset( $_GET['evd_sent'] ) ? sanitize_key( wp_unslash( $_GET['evd_sent'] ) ) : '';

get_header();
?>

<main class="evd" id="evd">

<?php if ( '1' === $evd_status ) : ?>
<div class="evd-notice">Дякуємо! Заявку отримано — ми зателефонуємо найближчим часом.</div>
<?php elseif ( 'err' === $evd_status ) : ?>
<div class="evd-notice evd-notice--err">Не вдалося надіслати заявку. Будь ласка, зателефонуйте нам: 066-560-24-33.</div>
<?php endif; ?>

<!-- ================= ВЕРХНЯ ПЛАШКА ================= -->
<div class="topbar" data-aos="fade-down">Компанія «Комфорт» — учасник державної програми «єВідновлення»</div>

<!-- ================= HERO ================= -->
<div class="hero">
  <h1 class="sr-only">єВідновлення — державна допомога на ремонт житла від компанії «Комфорт»</h1>
  <div class="hero__banner" data-aos="zoom-in">
    <img src="<?php echo esc_url( $evd_img ); ?>hero.jpg" alt="єВідновлення — державна допомога на ремонт житла, пошкодженого внаслідок бойових дій">
  </div>
  <div class="container">
    <div class="hero__cta" data-aos="zoom-in" data-aos-delay="600">
      <button type="button" class="btn" data-modal-open>Залишити заявку на Є-Відновлення</button>
    </div>
  </div>
</div>

<!-- ================= ЩО МИ ВІДНОВЛЮЄМО ================= -->
<section id="services">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up">Що ми відновлюємо?</h2>
    <div class="services">
      <div class="service" data-aos="flip-left" data-aos-delay="0">
        <img class="svc-icon" src="<?php echo esc_url( $evd_img ); ?>svc-vikna.png" alt="" aria-hidden="true">
        <h3>Вікна</h3>
        <p>Енергоефективні профілі Rehau, Steko, WDS</p>
      </div>
      <div class="service" data-aos="flip-left" data-aos-delay="100">
        <img class="svc-icon" src="<?php echo esc_url( $evd_img ); ?>svc-balkon.png" alt="" aria-hidden="true">
        <h3>Балкони</h3>
        <p>Скління, розширення та ремонт під ключ</p>
      </div>
      <div class="service" data-aos="flip-left" data-aos-delay="200">
        <img class="svc-icon" src="<?php echo esc_url( $evd_img ); ?>svc-dveri.png" alt="" aria-hidden="true">
        <h3>Вхідні двері</h3>
        <p>Надійні двері для квартир та будинків</p>
      </div>
      <div class="service" data-aos="flip-left" data-aos-delay="300">
        <img class="svc-icon" src="<?php echo esc_url( $evd_img ); ?>svc-remont.png" alt="" aria-hidden="true">
        <h3>Ремонт</h3>
        <p>Заміна склопакетів, фурнітури, ущільнювачів</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= УМОВИ УЧАСТІ ================= -->
<section class="conditions" id="conditions">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up">Умови участі в програмі єВідновлення</h2>

    <div class="cond-card" data-aos="fade-right">
      <div class="cond-card__icon" data-aos="zoom-in" data-aos-delay="200">
        <img src="<?php echo esc_url( $evd_img ); ?>1.1umovy.jpg" alt="" aria-hidden="true">
      </div>
      <div>
        <h3>Хто може отримати допомогу?</h3>
        <ul class="list-dot">
          <li>Власник житла, пошкодженого внаслідок бойових дій після 24.02.2022</li>
          <li>Житло розташоване на неокупованій території, де не ведуться активні бойові дії</li>
          <li>Комісія підтвердила, що оселю можна відновити</li>
          <li>Ремонт не був виконаний самостійно до отримання компенсації</li>
        </ul>
      </div>
    </div>

    <div class="cond-card" data-aos="fade-left">
      <div class="cond-card__icon" data-aos="zoom-in" data-aos-delay="200">
        <img src="<?php echo esc_url( $evd_img ); ?>1.2umovy.jpg" alt="" aria-hidden="true">
      </div>
      <div>
        <h3>Яке житло підлягає відновленню?</h3>
        <ul class="list-dot">
          <li>Приватні житлові будинки</li>
          <li>Квартири в багатоквартирних будинках</li>
          <li>Окремі житлові приміщення (кімнати)</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ================= ЯК ОТРИМАТИ КОМПЕНСАЦІЮ ================= -->
<section id="steps">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up">Як отримати компенсацію за програмою «єВідновлення»</h2>

    <div class="steps">
      <div class="step" data-aos="fade-right" data-aos-delay="0">
        <div class="step__num" data-aos="zoom-in" data-aos-delay="250">1</div>
        <div class="step__icon"><img src="<?php echo esc_url( $evd_img ); ?>1yak_otrymaty.jpg" alt="" aria-hidden="true"></div>
        <div>
          <h3>Крок 1. Повідомити про пошкоджене майно</h3>
          <p>Подайте інформаційне повідомлення через застосунок або портал «Дія» чи ЦНАП, якщо раніше цього не зробили. За можливості сфотографуйте пошкодження та збережіть підтверджувальні документи.</p>
        </div>
      </div>

      <div class="step" data-aos="fade-left" data-aos-delay="80">
        <div class="step__num" data-aos="zoom-in" data-aos-delay="250">2</div>
        <div class="step__icon"><img src="<?php echo esc_url( $evd_img ); ?>2yak_otrymaty.jpg" alt="" aria-hidden="true"></div>
        <div>
          <h3>Крок 2. Відкрити картку «єВідновлення»</h3>
          <p>Для компенсації на майбутній ремонт відкрийте спеціальний рахунок в одному з банків-партнерів програми — онлайн або у відділенні.</p>
        </div>
      </div>

      <div class="step" data-aos="fade-right" data-aos-delay="160">
        <div class="step__num" data-aos="zoom-in" data-aos-delay="250">3</div>
        <div class="step__icon"><img src="<?php echo esc_url( $evd_img ); ?>3yak_otrymaty.jpg" alt="" aria-hidden="true"></div>
        <div>
          <h3>Крок 3. Подати заяву на компенсацію</h3>
          <p>Оформіть заяву через «Дію», ЦНАП або в нотаріуса. Якщо житло перебуває у спільній власності, необхідно дотриматися процедури інформування співвласників та врахування їхньої згоди або заперечень.</p>
        </div>
      </div>

      <div class="step" data-aos="fade-left" data-aos-delay="240">
        <div class="step__num" data-aos="zoom-in" data-aos-delay="250">4</div>
        <div class="step__icon"><img src="<?php echo esc_url( $evd_img ); ?>4yak_otrymaty.jpg" alt="" aria-hidden="true"></div>
        <div>
          <h3>Крок 4. Дочекатися рішення комісії</h3>
          <p>Комісія перевірить відомості, обстежить житло та визначить суму компенсації. Звичайний строк розгляду — до 30 календарних днів, а в передбачених законодавством випадках перебіг розгляду може бути зупинений.</p>
        </div>
      </div>

      <div class="step" data-aos="fade-right" data-aos-delay="320">
        <div class="step__num" data-aos="zoom-in" data-aos-delay="250">5</div>
        <div class="step__icon"><img src="<?php echo esc_url( $evd_img ); ?>5yak_otrymaty.jpg" alt="" aria-hidden="true"></div>
        <div>
          <h3>Крок 5. Отримати кошти та виконати ремонт</h3>
          <p>Після позитивного рішення кошти надходять на спеціальну картку. Їх можна витратити лише на погоджені ремонтні роботи й дозволені будівельні товари або послуги учасників програми. Після завершення ремонту потрібно подати повідомлення про виконання робіт відповідно до встановленої процедури.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= СУМИ, СТРОКИ, ЗАМОВЛЕННЯ ================= -->
<section class="info" id="order">
  <div class="container">

    <div class="info-block" data-aos="fade-up">
      <h3>Яку суму компенсації можна отримати</h3>
      <p>Граничні суми залежать від категорії ремонту та типу житла:</p>
      <div class="amounts">
        <div class="amount" data-aos="fade-up" data-aos-delay="0"><b>Категорія А</b><strong>до 200 000 грн</strong><span>на ремонт житла з незначними пошкодженнями</span></div>
        <div class="amount" data-aos="fade-up" data-aos-delay="150"><b>Категорія Б</b><strong>до 350 000 грн</strong><span>на ремонт квартири в багатоквартирному будинку</span></div>
        <div class="amount" data-aos="fade-up" data-aos-delay="300"><b>Категорія В</b><strong>до 500 000 грн</strong><span>на ремонт приватного житлового будинку</span></div>
      </div>
      <p>Фактичний розмір допомоги визначає комісія після обстеження за затвердженим Урядом чек-листом. Сума компенсації не обов'язково дорівнює встановленому максимуму.</p>
    </div>

    <div class="info-block" data-aos="fade-up">
      <h3>Скільки часу є на використання компенсації</h3>
      <ul class="list-dot">
        <li>Категорія А: кошти надходять одним платежем. Використати їх потрібно протягом 12 місяців з дня зарахування.</li>
        <li>Категорія Б: компенсацію виплачують у два етапи. Перший транш — 70% погодженої суми, його потрібно використати протягом 12 місяців. Для отримання другого траншу (30%) заявник повідомляє про завершення першого етапу ремонту. Після перевірки комісією другий транш потрібно використати протягом 6 місяців після його зарахування.</li>
      </ul>
      <p>Для ремонту категорії Б загальний строк використання компенсації становить до 18 місяців. Після завершення всіх робіт потрібно подати підсумкове повідомлення.</p>
    </div>

    <div class="info-block" data-aos="fade-up">
      <h3>Що можна замовити в компанії «Комфорт»</h3>
      <p>Якщо відповідні роботи передбачені погодженим обсягом відновлення, компанія виготовить:</p>
      <ul class="list-dot">
        <li>металопластикові вікна та віконні блоки;</li>
        <li>балконні блоки й конструкції для відновлення пошкодженого скління балконів та лоджій;</li>
        <li>вхідні двері для квартир і приватних будинків.</li>
      </ul>
      <p>Конструкції виготовляються за індивідуальними розмірами з урахуванням особливостей приміщення. Оплата карткою «єВідновлення» можлива лише за товари, що відповідають погодженому ремонту та правилам програми. Зокрема, відновлення скління балкона не означає автоматичного погодження будь-яких робіт з його переобладнання.</p>
    </div>

    <div class="info-block" data-aos="fade-up">
      <h3>Як оформити замовлення</h3>
      <p>Зверніться до компанії «Комфорт», щоб узгодити параметри конструкцій та уточнити можливість оплати в межах затвердженої компенсації.</p>
      <div class="phones">
        <a href="tel:+380665602433" data-aos="zoom-in">066-560-24-33</a>
        <a href="tel:+380975424620" data-aos="zoom-in" data-aos-delay="150">097-542-46-20</a>
      </div>
      <p>Детальні правила програми: <a href="https://erecovery.diia.gov.ua/" target="_blank" rel="noopener">офіційна інформація про «єВідновлення»</a> та <a href="https://zakon.rada.gov.ua/laws/show/381-2023-%D0%BF" target="_blank" rel="noopener">постанова Кабінету Міністрів України № 381</a>.</p>
    </div>
  </div>
</section>

<!-- ================= ІНФОГРАФІКИ (узгоджений дизайн) ================= -->
<section style="padding-top:0">
  <div class="container">
    <figure class="ig-img" data-aos="fade-up">
      <img src="<?php echo esc_url( $evd_img ); ?>ig-dopomoga.jpg" alt="єВідновлення: як отримати допомогу — хто може подати заяву, що потрібно зробити та як використовують кошти" loading="lazy">
    </figure>
    <figure class="ig-img" data-aos="fade-up">
      <img src="<?php echo esc_url( $evd_img ); ?>ig-komisiya.jpg" alt="єВідновлення: робота комісії громади — що робить комісія та її склад" loading="lazy">
    </figure>
  </div>
</section>

<!-- ================= МОДАЛЬНЕ ВІКНО: КОНСУЛЬТАЦІЯ ================= -->
<div class="modal" id="consult" role="dialog" aria-modal="true" aria-labelledby="consult-title" aria-hidden="true">
  <div class="modal__overlay" data-modal-close></div>
  <div class="modal__card">
    <button type="button" class="modal__close" data-modal-close aria-label="Закрити">&times;</button>
    <h3 class="modal__title" id="consult-title">Отримати консультацію</h3>
    <p class="modal__text">Залиште контакти — ми зателефонуємо та безкоштовно проконсультуємо щодо участі в програмі «єВідновлення».</p>
    <form class="form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
      <input type="hidden" name="action" value="evd_consult">
      <input type="hidden" name="evd_back" value="<?php echo esc_url( get_permalink() ); ?>">
      <?php wp_nonce_field( 'evd_consult', 'evd_nonce' ); ?>
      <input type="text" name="evd_website" class="evd-hp" tabindex="-1" autocomplete="off" aria-hidden="true">
      <input type="text" name="evd_name" placeholder="Ваше ім'я" required>
      <input type="tel" name="evd_phone" placeholder="Номер телефону" required>
      <textarea name="evd_message" placeholder="Коротко опишіть ваше питання (необовʼязково)"></textarea>
      <button type="submit" class="btn">Отримати консультацію</button>
    </form>
  </div>
</div>

</main>

<?php
get_footer();
