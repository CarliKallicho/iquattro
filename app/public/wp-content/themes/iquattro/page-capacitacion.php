<?php
/**
 * Plantilla página Capacitación
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$data = is_array($data) && !empty($data) ? $data : array();
$cap_title = isset($data['hero_title']) ? $data['hero_title'] : __('En iQuattro Capacitación no dictamos cursos genéricos, desarrollamos capacidades técnicas aplicables a entornos críticos y reales.', 'iquattro');
$cap_btn_primary = isset($data['hero_btn_primary']) ? $data['hero_btn_primary'] : __('Explorar cursos', 'iquattro');
$cap_btn_schedule = isset($data['hero_btn_schedule']) ? $data['hero_btn_schedule'] : __('Ver cronograma', 'iquattro');
$cap_btn_event = isset($data['hero_btn_event']) ? $data['hero_btn_event'] : __('Ver Próximo Evento', 'iquattro');
$cap_beneficios_title = isset($data['beneficios_title']) ? $data['beneficios_title'] : __('Beneficios exclusivos de formarte en iQuattro', 'iquattro');
$cap_partner_title = isset($data['partner_title']) ? $data['partner_title'] : __('Partner oficial en formación tecnológica', 'iquattro');
$cap_partner_text = isset($data['partner_text']) ? $data['partner_text'] : __('En iQuattro formamos parte del programa Microsoft Learning Solutions Partner, lo que nos permite ofrecer contenido oficial y certificaciones reconocidas internacionalmente.', 'iquattro');
$cap_evoluciona_title = isset($data['evoluciona_title']) ? $data['evoluciona_title'] : __('Evoluciona con una formación que genera impacto', 'iquattro');
$cap_catalogo_title = isset($data['catalogo_section_title']) ? $data['catalogo_section_title'] : __('Explora nuestro catálogo de cursos', 'iquattro');
$cap_catalogo_text = isset($data['catalogo_section_text']) ? $data['catalogo_section_text'] : __('Nuestros programas de formación abarcan tecnología, productividad, Microsoft 365, Azure, inteligencia artificial, seguridad digital y análisis de datos. Encuentra rutas de aprendizaje alineadas a tus objetivos.', 'iquattro');
$cap_catalogo_btn = isset($data['catalogo_btn']) ? $data['catalogo_btn'] : __('Ver Catálogo de Cursos', 'iquattro');
$cap_cronograma_title = isset($data['cronograma_title']) ? $data['cronograma_title'] : __('Próximos cursos programados', 'iquattro');
$cap_cronograma_text = isset($data['cronograma_text']) ? $data['cronograma_text'] : __('Consulta el cronograma actualizado y las plazas disponibles para formación individual o grupal.', 'iquattro');
$cap_cronograma_btn = isset($data['cronograma_btn']) ? $data['cronograma_btn'] : __('Ver Cronograma', 'iquattro');
$cap_contact_title = isset($data['contact_title']) ? $data['contact_title'] : __('Hablemos sobre tu próximo paso profesional', 'iquattro');
$cap_contact_cta = isset($data['contact_cta_text']) ? $data['contact_cta_text'] : __('Ya sea para ti o para tu equipo, estamos listos para acompañarte.', 'iquattro');

$carousel_slides = array(
  array(
    'title'       => __('Datos e Inteligencia Artificial', 'iquattro'),
    'description' => __('Convierte grandes volúmenes de información en activos estratégicos.', 'iquattro'),
    'image'       => 'a-carousel.jpg',
  ),
  array(
    'title'       => __('Ciberseguridad', 'iquattro'),
    'description' => __('Protege tu organización con conocimientos en defensa y respuesta ante amenazas.', 'iquattro'),
    'image'       => 'b-carousel.jpg',
  ),
  array(
    'title'       => __('Infraestructura y Cloud', 'iquattro'),
    'description' => __('Domina soluciones de centros de datos, virtualización y servicios en la nube.', 'iquattro'),
    'image'       => 'c-carousel.jpg',
  ),
  array(
    'title'       => __('Desarrollo y DevOps', 'iquattro'),
    'description' => __('Integra desarrollo, operaciones y automatización para entregar valor de forma continua.', 'iquattro'),
    'image'       => 'd-carousel.jpg',
  ),
  array(
    'title'       => __('Gestión de Proyectos TI', 'iquattro'),
    'description' => __('Planifica, ejecuta y cierra proyectos tecnológicos con metodologías ágiles y tradicionales.', 'iquattro'),
    'image'       => 'e-carousel.jpg',
  ),
);

$images_dir = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';

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
        <h1 class="iq-capacitacion-title"><?php echo esc_html($cap_title); ?></h1>
        <div class="iq-capacitacion-ctas">
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('catalogo-cursos')) ?: home_url('/catalogo-cursos/')); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php echo esc_html($cap_btn_primary); ?></a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('cronograma')) ?: home_url('/cronograma/')); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-secondary"><?php echo esc_html($cap_btn_schedule); ?></a>
          <a href="#evento" class="iq-capacitacion-btn iq-capacitacion-btn-secondary"><?php echo esc_html($cap_btn_event); ?></a>
        </div>
      </div>
    </section>

    <section class="iq-capacitacion-carousel-section">
      <div class="iq-container">
        <div class="iq-capacitacion-carousel" id="iq-capacitacion-carousel">
          <?php foreach ($carousel_slides as $i => $slide) : ?>
            <div class="iq-capacitacion-slide<?php echo $i === 0 ? ' iq-slide-active' : ''; ?>" data-slide="<?php echo (int) $i; ?>">
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
        <div class="iq-capacitacion-dots" id="iq-capacitacion-dots" aria-label="<?php esc_attr_e('Navegación del carrusel', 'iquattro'); ?>">
          <?php foreach ($carousel_slides as $i => $slide) : ?>
            <button type="button" class="iq-capacitacion-dot<?php echo $i === 0 ? ' iq-dot-active' : ''; ?>" data-index="<?php echo (int) $i; ?>" aria-label="<?php echo esc_attr(sprintf(__('Slide %d', 'iquattro'), $i + 1)); ?>"></button>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-beneficios">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($cap_beneficios_title); ?></h2>
        <div class="iq-capacitacion-beneficios-grid">
          <?php foreach ($beneficios_cards as $card) : ?>
            <div class="iq-capacitacion-beneficio-card">
              <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-capacitacion-beneficio-icon" width="56" height="56" loading="lazy">
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
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($cap_partner_title); ?></h2>
        <div class="iq-capacitacion-partner-inner">
          <p class="iq-capacitacion-partner-text"><?php echo esc_html($cap_partner_text); ?></p>
          <?php if (file_exists(get_template_directory() . '/assets/images/microsoft-partner.png')) : ?>
          <div class="iq-capacitacion-partner-logo">
            <img src="<?php echo esc_url($images_dir . 'microsoft-partner.png'); ?>" alt="<?php esc_attr_e('Microsoft Partner', 'iquattro'); ?>" width="180" height="auto" loading="lazy">
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-evoluciona">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($cap_evoluciona_title); ?></h2>
        <div class="iq-capacitacion-evoluciona-grid">
          <?php foreach ($evoluciona_cards as $card) : ?>
            <div class="iq-capacitacion-evoluciona-card">
              <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-capacitacion-evoluciona-icon" width="48" height="48" loading="lazy">
              <h3 class="iq-capacitacion-evoluciona-title"><?php echo esc_html($card['title']); ?></h3>
              <?php if ($card['sub']) : ?>
                <p class="iq-capacitacion-evoluciona-sub"><?php echo esc_html($card['sub']); ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-catalogo-section" style="background-image: url('<?php echo esc_url($images_dir . 'fondo-capacitacion.jpg'); ?>');">
      <div class="iq-container">
        <div class="iq-capacitacion-catalogo-block">
          <h2 class="iq-capacitacion-section-title"><?php echo esc_html($cap_catalogo_title); ?></h2>
          <p class="iq-capacitacion-catalogo-text"><?php echo esc_html($cap_catalogo_text); ?></p>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('catalogo-cursos')) ?: home_url('/catalogo-cursos/')); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php echo esc_html($cap_catalogo_btn); ?></a>
        </div>
        <div class="iq-capacitacion-catalogo-block" id="cronograma">
          <h2 class="iq-capacitacion-section-title"><?php echo esc_html($cap_cronograma_title); ?></h2>
          <p class="iq-capacitacion-catalogo-text"><?php echo esc_html($cap_cronograma_text); ?></p>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('cronograma')) ?: home_url('/cronograma/')); ?>" class="iq-capacitacion-btn iq-capacitacion-btn-primary"><?php echo esc_html($cap_cronograma_btn); ?></a>
        </div>
      </div>
    </section>

    <section class="iq-section iq-capacitacion-contact-section">
      <div class="iq-container">
        <h2 class="iq-capacitacion-section-title"><?php echo esc_html($cap_contact_title); ?></h2>
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
            <p class="iq-capacitacion-cta-text"><?php echo esc_html($cap_contact_cta); ?></p>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<script>
(function() {
  var carousel = document.getElementById('iq-capacitacion-carousel');
  var dotsWrap = document.getElementById('iq-capacitacion-dots');
  if (!carousel || !dotsWrap) return;

  var slides = carousel.querySelectorAll('.iq-capacitacion-slide');
  var dots = dotsWrap.querySelectorAll('.iq-capacitacion-dot');
  var total = slides.length;
  var current = 0;

  function goTo(index) {
    if (index < 0) index = total - 1;
    if (index >= total) index = 0;
    current = index;
    slides.forEach(function(s, i) {
      s.classList.toggle('iq-slide-active', i === current);
    });
    dots.forEach(function(d, i) {
      d.classList.toggle('iq-dot-active', i === current);
      d.setAttribute('aria-current', i === current ? 'true' : 'false');
    });
  }

  dots.forEach(function(btn, i) {
    btn.addEventListener('click', function() { goTo(i); });
  });

  var touchStartX = 0, touchEndX = 0;
  carousel.addEventListener('touchstart', function(e) { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
  carousel.addEventListener('touchend', function(e) {
    touchEndX = e.changedTouches[0].screenX;
    if (touchStartX - touchEndX > 50) goTo(current + 1);
    if (touchEndX - touchStartX > 50) goTo(current - 1);
  }, { passive: true });
})();
</script>

<?php get_footer(); ?>
