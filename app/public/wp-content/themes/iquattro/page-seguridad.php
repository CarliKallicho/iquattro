<?php
/**
 * Plantilla página Seguridad
 *
 * @package iQuattro
 */

get_header();

$images_uri = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';

$seguridad_cards = array(
  array(
    'icon'  => 'ethical.svg',
    'title' => __('Ethical Hacking', 'iquattro'),
    'desc'  => __('Descubrimos vulnerabilidades mediante pruebas controladas que simulan ataques reales.', 'iquattro'),
  ),
  array(
    'icon'  => 'requerimientos.svg',
    'title' => __('Requerimientos regulatorios', 'iquattro'),
    'desc'  => __('Te acompañamos en la implementación de controles de seguridad alineados a normativas y estándares exigidos por la industria.', 'iquattro'),
  ),
  array(
    'icon'  => 'compliance.svg',
    'title' => __('Compliance', 'iquattro'),
    'desc'  => __('Diseñamos e implementamos estrategias de cumplimiento que aseguran el correcto manejo de la información y reducen riesgos legales y operativos.', 'iquattro'),
  ),
  array(
    'icon'  => 'antivirus.svg',
    'title' => __('Antivirus', 'iquattro'),
    'desc'  => __('Protección avanzada contra malware, virus y amenazas avanzadas y emergentes en todos los endpoints de la organización.', 'iquattro'),
  ),
  array(
    'icon'  => 'dataloss.svg',
    'title' => __('Data Loss Prevention (DLP)', 'iquattro'),
    'desc'  => __('Prevención de pérdida, fuga o uso indebido de información crítica, tanto interna como externamente.', 'iquattro'),
  ),
  array(
    'icon'  => 'ransomware.svg',
    'title' => __('Anti Ransomware', 'iquattro'),
    'desc'  => __('Soluciones especializadas para prevenir, detectar y mitigar ataques de ransomware que pueden comprometer tu operación.', 'iquattro'),
  ),
);
?>
<main id="main" class="iq-main iq-seguridad-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-seguridad-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-seguridad.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-seguridad-hero-title"><?php esc_html_e('Seguridad digital para proteger lo que hace crecer tu negocio', 'iquattro'); ?></h1>
      <p class="iq-seguridad-hero-desc"><?php esc_html_e('Protegemos la información crítica de tu organización y garantizamos la continuidad de tu operación, mediante soluciones avanzadas de ciberseguridad, cumplimiento normativo y monitoreo permanente, respaldadas por profesionales certificados y tecnología líder.', 'iquattro'); ?></p>
      <p class="iq-seguridad-hero-actions">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php esc_html_e('Solicitar evaluación', 'iquattro'); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-seguridad-que-protegemos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('¿Qué protegemos?', 'iquattro'); ?></h2>
      <p class="iq-seguridad-intro"><?php esc_html_e('En iQuattro ayudamos a las organizaciones a anticipar, detectar y responder ante amenazas digitales, combinando servicios especializados, cumplimiento regulatorio y soluciones tecnológicas alineadas a las mejores prácticas de seguridad.', 'iquattro'); ?></p>
      <div class="iq-seguridad-cards">
        <?php foreach ($seguridad_cards as $card) : ?>
          <div class="iq-seguridad-card">
            <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-seguridad-card-icon" width="48" height="48" loading="lazy">
            <h3 class="iq-seguridad-card-title"><?php echo esc_html($card['title']); ?></h3>
            <p class="iq-seguridad-card-desc"><?php echo esc_html($card['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-seguridad-monitoreo">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Monitoreo de seguridad 24/7', 'iquattro'); ?></h2>
      <p class="iq-seguridad-intro"><?php esc_html_e('A través de servicios premium conducidos por nuestro equipo de expertos certificados y tecnologías especializadas, habilitamos a tu organización a operar con total confianza, detectando amenazas en tiempo real y cumpliendo requerimientos regulatorios con el acompañamiento permanente de iQuattro.', 'iquattro'); ?></p>
    </div>
  </section>

  <section class="iq-section iq-seguridad-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Protege hoy la información que no puedes perder mañana', 'iquattro'); ?></h2>
      <div class="iq-seguridad-contact-grid">
        <div class="iq-seguridad-form-wrap">
          <form id="iq-seguridad-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <p class="iq-form-field">
              <label for="iq-seg-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-seg-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-seg-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-seg-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-seg-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-seg-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-seg-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-seg-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-seg-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-seg-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar iq-btn-seguridad"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-seg-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-seguridad-cta-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-servicios-costado.jpg'); ?>');">
          <p><?php esc_html_e('Evalúa el nivel de seguridad de tu organización y define una estrategia sólida con el acompañamiento de expertos.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
