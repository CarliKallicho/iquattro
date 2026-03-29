<?php
/**
 * Plantilla página Capacitación
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$catalogo_cursos_url = get_permalink(get_page_by_path('catalogo-cursos')) ?: home_url('/catalogo-cursos/');
$cronograma_url = get_permalink(get_page_by_path('cronograma')) ?: home_url('/cronograma/');
$evento_url = get_permalink(get_page_by_path('evento')) ?: home_url('/evento/');

$carousel_slides = array(
  array(
    'title'       => __('Datos e Inteligencia Artificial', 'iquattro'),
    'description' => __('Convierte grandes volúmenes de información en activos estratégicos.', 'iquattro'),
    'image'       => 'a-carousel.jpg',
  ),
  array(
    'title'       => __('Gestión y Estrategia', 'iquattro'),
    'description' => __('Anticípate a los cambios, mitigar riesgos y tomar decisiones que generen valor real.', 'iquattro'),
    'image'       => 'b-carousel.jpg',
  ),
  array(
    'title'       => __('Desarrollo Software', 'iquattro'),
    'description' => __('Un enfoque 100% practico en desarrollo Fronted, Backend y Fullstack.', 'iquattro'),
    'image'       => 'c-carousel.jpg',
  ),
  array(
    'title'       => __('Infraestructura y Cloud', 'iquattro'),
    'description' => __('Integra servidores físicos con soluciones en la nube.', 'iquattro'),
    'image'       => 'd-carousel.jpg',
  ),
  array(
    'title'       => __('Seguridad de la Información', 'iquattro'),
    'description' => __('Blinda tus infraestructuras y lidera la defensa digital.', 'iquattro'),
    'image'       => 'e-carousel.jpg',
  ),
);

$images_dir = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';
$catalogo_bg = iquattro_meta_image_url($data['catalogo_section_bg_id'], $images_dir . 'fondo-capacitacion.jpg');
$partner_logo = iquattro_meta_image_url($data['partner_logo_id'], $images_dir . 'microsoft-partner.png');

$beneficios_cards = array(
  array(
    'icon'  => 'cap1.svg',
    'items' => array(
      __('Laboratorios calados', 'iquattro'),
      __('Costos netos y análisis de incidentes relevantes', 'iquattro'),
      __('Simulaciones técnicas', 'iquattro'),
      __('Facilidades colaborativas', 'iquattro'),
      __('Optimización y resolución de problemas', 'iquattro'),
    ),
  ),
  array(
    'icon'  => 'cap2.svg',
    'items' => array(
      __('Acceso a nuestra plataforma', 'iquattro'),
      __('Material y visualización de grabaciones', 'iquattro'),
    ),
  ),
  array(
    'icon'  => 'cap3.svg',
    'items' => array(
      __('Certificado emitido por iQuattro', 'iquattro'),
      __('Certificados avalados internacionalmente', 'iquattro'),
    ),
  ),
  array(
    'icon'  => 'cap4.svg',
    'items' => array(
      __('Contenido personalizado (previo acuerdo con nuestras expectativas)', 'iquattro'),
    ),
  ),
);

$evoluciona_cards = array(
  array('icon' => 'diagnostico.svg', 'title' => __('Diagnóstico previo de necesidades', 'iquattro'), 'sub' => __('Test de nivel de conocimientos', 'iquattro')),
  array('icon' => 'contenidos.svg', 'title' => __('Contenidos personalizados', 'iquattro'), 'sub' => __('Según rol y nivel', 'iquattro')),
  array('icon' => 'enfoque.svg', 'title' => __('Enfoque en casos reales', 'iquattro'), 'sub' => __('Y escenarios empresariales', 'iquattro')),
  array('icon' => 'preparacion.svg', 'title' => __('Preparación para certificaciones internacionales', 'iquattro'), 'sub' => ''),
  array('icon' => 'acompanamiento.svg', 'title' => __('Acompañamiento', 'iquattro'), 'sub' => __('Activo, durante y después del curso (Coaching)', 'iquattro')),
);
?>

<main id="main" class="iq-main iq-capacitacion-page">
  <div class="iq-capacitacion-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-capacitacion-hero">
      <div class="iq-container iq-capacitacion-hero-inner">
        <h1 class="iq-capacitacion-title"><?php echo esc_html($data['hero_title']); ?></h1>
        <div class="iq-capacitacion-ctas">
          <a href="<?php echo esc_url($catalogo_cursos_url); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php echo esc_html($data['hero_btn_primary']); ?></a>
          <a href="<?php echo esc_url($cronograma_url); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-secondary"><?php echo esc_html($data['hero_btn_schedule']); ?></a>
          <a href="<?php echo esc_url($evento_url); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-secondary"><?php echo esc_html($data['hero_btn_event']); ?></a>
        </div>
      </div>
    </section>

    <section class="iq-capacitacion-carousel-section">
      <div class="iq-container">
        <div class="iq-capacitacion-carousel" id="iq-capacitacion-carousel">
          <div class="iq-capacitacion-carousel-track" id="iq-capacitacion-carousel-track">
          <?php foreach ($carousel_slides as $i => $slide) : ?>
            <div class="iq-capacitacion-slide" data-slide="<?php echo (int) $i; ?>">
              <div class="iq-capacitacion-slide-text">
                <h3 class="iq-capacitacion-slide-title"><?php echo esc_html($slide['title']); ?></h3>
                <p class="iq-capacitacion-slide-desc"><?php echo esc_html($slide['description']); ?></p>
              </div>
              <div class="iq-capacitacion-slide-img-wrap">
                <img src="<?php echo esc_url($images_dir . $slide['image']); ?>" alt="" class="iq-capacitacion-slide-img" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>">
              </div>
            </div>
          <?php endforeach; ?>
          </div>
        </div>
        <div class="iq-capacitacion-dots" id="iq-capacitacion-dots" aria-label="<?php esc_attr_e('Navegación del carrusel', 'iquattro'); ?>">
          <?php foreach ($carousel_slides as $i => $slide) : ?>
            <button type="button" class="iq-capacitacion-dot<?php echo $i === 0 ? ' iq-dot-active' : ''; ?>" data-index="<?php echo (int) $i; ?>" aria-label="<?php echo esc_attr(sprintf(__('Slide %d', 'iquattro'), $i + 1)); ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-beneficios">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($data['beneficios_title']); ?></h2>
        <div class="iq-capacitacion-beneficios-grid">
          <?php foreach ($beneficios_cards as $card) : ?>
            <div class="iq-capacitacion-beneficio-card">
              <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-capacitacion-beneficio-icon" width="200" height="155" loading="lazy">
              <ul class="iq-capacitacion-beneficio-list">
                <?php foreach ($card['items'] as $item) : ?>
                  <li><?php echo esc_html($item); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-partner">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($data['partner_title']); ?></h2>
        <div class="iq-capacitacion-partner-inner">
          <div class="iq-capacitacion-partner-text">
            <?php
            $partner_raw = isset($data['partner_text']) ? (string) $data['partner_text'] : '';
            if (strpos($partner_raw, '<') !== false) {
              echo wp_kses_post($partner_raw);
            } else {
              echo wp_kses_post(wpautop(esc_html($partner_raw)));
            }
            ?>
          </div>
          <?php if ($partner_logo) : ?>
          <div class="iq-capacitacion-partner-logo">
            <img src="<?php echo esc_url($partner_logo); ?>" alt="<?php esc_attr_e('Microsoft Partner', 'iquattro'); ?>" width="402" height="139" loading="lazy">
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-evoluciona">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($data['evoluciona_title']); ?></h2>
        <div class="iq-capacitacion-evoluciona-grid">
          <div class="iq-capacitacion-evoluciona-row iq-capacitacion-evoluciona-row--top">
            <?php foreach (array_slice($evoluciona_cards, 0, 3) as $card) : ?>
              <div class="iq-capacitacion-evoluciona-card">
                <h3 class="iq-capacitacion-evoluciona-title">
                  <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-capacitacion-evoluciona-icon" width="30" height="30" loading="lazy">
                  <?php echo esc_html($card['title']); ?>
                </h3>
                <?php if ($card['sub']) : ?>
                  <p class="iq-capacitacion-evoluciona-sub"><?php echo esc_html($card['sub']); ?></p>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="iq-capacitacion-evoluciona-row iq-capacitacion-evoluciona-row--bottom">
            <?php foreach (array_slice($evoluciona_cards, 3, 2) as $ev_bottom_idx => $card) : ?>
              <?php
              $bottom_card_class = 'iq-capacitacion-evoluciona-card iq-capacitacion-evoluciona-card--bottom';
              if ((int) $ev_bottom_idx === 0) {
                $bottom_card_class .= ' iq-capacitacion-evoluciona-card--preparacion';
              }
              ?>
              <div class="<?php echo esc_attr($bottom_card_class); ?>">
                <h3 class="iq-capacitacion-evoluciona-title">
                  <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-capacitacion-evoluciona-icon" width="30" height="30" loading="lazy">
                  <?php echo esc_html($card['title']); ?>
                </h3>
                <?php if ($card['sub']) : ?>
                  <p class="iq-capacitacion-evoluciona-sub"><?php echo esc_html($card['sub']); ?></p>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-catalogo-section" style="background-image: url('<?php echo esc_url($catalogo_bg); ?>');">
      <div class="iq-container">
        <div class="iq-capacitacion-catalogo-block iq-capacitacion-catalogo-block--intro">
          <h2 class="iq-capacitacion-section-title iq-capacitacion-catalogo-intro-title"><?php echo esc_html($data['catalogo_section_title']); ?></h2>
          <div class="iq-capacitacion-catalogo-text iq-capacitacion-catalogo-intro-text">
            <?php
            $catalogo_intro_raw = isset($data['catalogo_section_text']) ? (string) $data['catalogo_section_text'] : '';
            if (strpos($catalogo_intro_raw, '<') !== false) {
              echo wp_kses_post($catalogo_intro_raw);
            } else {
              echo wp_kses_post(wpautop(esc_html($catalogo_intro_raw)));
            }
            ?>
          </div>
          <a href="<?php echo esc_url($catalogo_cursos_url); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php echo esc_html($data['catalogo_btn']); ?></a>
        </div>
        <div class="iq-capacitacion-catalogo-block iq-capacitacion-catalogo-block--cronograma" id="cronograma">
          <h2 class="iq-capacitacion-section-title iq-capacitacion-catalogo-intro-title"><?php echo esc_html($data['cronograma_title']); ?></h2>
          <div class="iq-capacitacion-catalogo-text iq-capacitacion-catalogo-intro-text">
            <?php
            $cronograma_raw = isset($data['cronograma_text']) ? (string) $data['cronograma_text'] : '';
            if (strpos($cronograma_raw, '<') !== false) {
              echo wp_kses_post($cronograma_raw);
            } else {
              echo wp_kses_post(wpautop(esc_html($cronograma_raw)));
            }
            ?>
          </div>
          <a href="<?php echo esc_url($cronograma_url); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php echo esc_html($data['cronograma_btn']); ?></a>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-contact-section">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title iq-capacitacion-contact-title"><?php echo esc_html($data['contact_title']); ?></h2>
        <div class="iq-capacitacion-contact-grid">
          <div class="iq-capacitacion-form-wrap">
            <form id="iq-capacitacion-form" class="iq-contact-form iq-capacitacion-form" method="post" novalidate>
              <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
              <p class="iq-form-field">
                <label for="iq-cap-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
                <input type="text" id="iq-cap-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
              </p>
              <p class="iq-form-row">
                <span class="iq-form-field">
                  <label for="iq-cap-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                  <input type="email" id="iq-cap-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
                </span>
                <span class="iq-form-field">
                  <label for="iq-cap-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                  <input type="tel" id="iq-cap-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
                </span>
              </p>
              <p class="iq-form-field">
                <label for="iq-cap-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
                <input type="text" id="iq-cap-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de la empresa / independiente', 'iquattro'); ?>">
              </p>
              <p class="iq-form-field">
                <label for="iq-cap-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
                <textarea id="iq-cap-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
              </p>
              <p class="iq-form-actions">
                <button type="submit" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
              </p>
              <p class="iq-form-message" id="iq-cap-form-message" aria-live="polite"></p>
            </form>
          </div>
          <div class="iq-capacitacion-cta-imagen" style="background-image: url('<?php echo esc_url($images_dir . 'fondo-capacitacion-costado.jpg'); ?>');">
            <div class="iq-capacitacion-cta-copy">
              <?php
              $cta_raw = isset($data['contact_cta_text']) ? (string) $data['contact_cta_text'] : '';
              if (strpos($cta_raw, '<') !== false) {
                echo wp_kses_post($cta_raw);
              } else {
                $plain = trim($cta_raw);
                $lead = 'Ya sea para ti o para tu equipo, estamos listos para acompañarte.';
                $rest = 'Déjanos tus datos y te contactaremos para brindarte información clara y personalizada sobre nuestros programas de capacitación.';
                if ($plain !== '' && strpos($plain, $lead) === 0) {
                  $after = trim(substr($plain, strlen($lead)));
                  $after = ltrim($after, " \t\n\r\0\x0B.");
                  $body  = ($after !== '') ? $after : $rest;
                  echo wp_kses_post('<p>' . esc_html($lead) . '</p><p>' . esc_html($body) . '</p>');
                } elseif ($plain !== '') {
                  echo wp_kses_post(wpautop(esc_html($plain)));
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<script>
(function() {
  var carousel = document.getElementById('iq-capacitacion-carousel');
  var track = document.getElementById('iq-capacitacion-carousel-track');
  var dotsWrap = document.getElementById('iq-capacitacion-dots');
  if (!carousel || !track || !dotsWrap) return;

  var slides = carousel.querySelectorAll('.iq-capacitacion-slide');
  var dots = dotsWrap.querySelectorAll('.iq-capacitacion-dot');
  var total = slides.length;
  if (total < 1) return;

  var current = 0;
  var autoplayMs = 3000;
  var timer = null;
  var prefersReduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function syncDots() {
    dots.forEach(function(d, i) {
      d.classList.toggle('iq-dot-active', i === current);
      d.setAttribute('aria-current', i === current ? 'true' : 'false');
    });
  }

  function applyTransform(instant) {
    var pct = current * 100;
    if (prefersReduced) {
      track.style.transform = 'translateX(-' + pct + '%)';
      return;
    }
    if (instant) {
      track.style.transition = 'none';
      track.style.transform = 'translateX(-' + pct + '%)';
      void track.offsetHeight;
      track.style.transition = '';
    } else {
      track.style.transform = 'translateX(-' + pct + '%)';
    }
  }

  function goTo(index) {
    if (index < 0) index = total - 1;
    if (index >= total) index = 0;
    var prev = current;
    current = index;
    var wrap = (prev === total - 1 && current === 0) || (prev === 0 && current === total - 1);
    var instant = prefersReduced || wrap || Math.abs(current - prev) > 1;
    applyTransform(instant);
    syncDots();
  }

  function next() {
    goTo(current + 1);
  }

  function prev() {
    goTo(current - 1);
  }

  function startAutoplay() {
    stopAutoplay();
    if (prefersReduced || total < 2) return;
    timer = window.setInterval(next, autoplayMs);
  }

  function stopAutoplay() {
    if (timer) {
      window.clearInterval(timer);
      timer = null;
    }
  }

  track.style.transform = 'translateX(0)';
  syncDots();

  dots.forEach(function(btn, i) {
    btn.addEventListener('click', function() {
      stopAutoplay();
      goTo(i);
      startAutoplay();
    });
  });

  carousel.addEventListener('mouseenter', stopAutoplay);
  carousel.addEventListener('mouseleave', startAutoplay);

  var touchStartX = 0;
  carousel.addEventListener('touchstart', function(e) {
    touchStartX = e.changedTouches[0].screenX;
  }, { passive: true });
  carousel.addEventListener('touchend', function(e) {
    var x = e.changedTouches[0].screenX;
    if (touchStartX - x > 50) {
      stopAutoplay();
      next();
      startAutoplay();
    }
    if (x - touchStartX > 50) {
      stopAutoplay();
      prev();
      startAutoplay();
    }
  }, { passive: true });

  startAutoplay();
})();
</script>

<?php get_footer(); ?>
