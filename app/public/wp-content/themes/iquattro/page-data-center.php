<?php
/**
 * Plantilla página Data Center
 *
 * @package iQuattro
 */

get_header();

$images_uri = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';

$dc_hardware_url  = get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/');
$dc_software_url  = get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/');
$dc_servicios_url = get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/');

$dc_servicios_cards = array(
  array(
    'icon'    => 'hardware.svg',
    'title'   => __('Hardware', 'iquattro'),
    'desc'    => __('Soluciones de infraestructura física: servidores, almacenamiento y redes para entornos críticos y escalables.', 'iquattro'),
    'btn_txt' => __('Ver Soluciones de Hardware', 'iquattro'),
    'url'     => $dc_hardware_url,
  ),
  array(
    'icon'    => 'software.svg',
    'title'   => __('Software', 'iquattro'),
    'desc'    => __('Plataformas y licenciamiento para virtualización, gestión y automatización de tu Data Center.', 'iquattro'),
    'btn_txt' => __('Ver Soluciones de Software', 'iquattro'),
    'url'     => $dc_software_url,
  ),
  array(
    'icon'    => 'servicios.svg',
    'title'   => __('Servicios', 'iquattro'),
    'desc'    => __('Implementación, soporte especializado y gestión continua de infraestructura tecnológica.', 'iquattro'),
    'btn_txt' => __('Ver Servicios de Data Center', 'iquattro'),
    'url'     => $dc_servicios_url,
  ),
);
?>
<main id="main" class="iq-main iq-datacenter-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-datacenter-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-datacenter.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-datacenter-hero-title"><?php esc_html_e('Soluciones de Data Center para entornos críticos y escalables', 'iquattro'); ?></h1>
      <p class="iq-datacenter-hero-desc"><?php esc_html_e('Diseñamos, implementamos y gestionamos infraestructuras tecnológicas robustas, seguras y escalables para el crecimiento de tu organización.', 'iquattro'); ?></p>
      <p class="iq-datacenter-hero-desc"><?php esc_html_e('Desde sistemas con los que puedes empezar hasta infinitos límites en la nube, acompañamos cada etapa de tu operación.', 'iquattro'); ?></p>
      <p class="iq-datacenter-hero-actions">
        <a href="#iq-dc-servicios" class="iq-btn iq-btn-dark"><?php esc_html_e('Explorar soluciones', 'iquattro'); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-datacenter-infra">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Infraestructura diseñada para operar sin interrupciones', 'iquattro'); ?></h2>
      <p class="iq-datacenter-intro"><?php esc_html_e('Diseñamos infraestructura tecnológica que combina disponibilidad, seguridad y escalabilidad. Nuestras soluciones de Data Center abarcan desde instalaciones on-premise hasta entornos en la nube con Azure, AWS o Google Cloud, adaptadas a las necesidades de cada organización.', 'iquattro'); ?></p>
    </div>
  </section>

  <section class="iq-section iq-datacenter-como">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Cómo trabajamos', 'iquattro'); ?></h2>
      <div class="iq-datacenter-pills-wrap">
        <span class="iq-datacenter-pill"><?php esc_html_e('Arquitecturas escalables y seguras', 'iquattro'); ?></span>
        <span class="iq-datacenter-pill"><?php esc_html_e('Implementación basada en buenas prácticas internacionales', 'iquattro'); ?></span>
        <span class="iq-datacenter-pill"><?php esc_html_e('Integración con servicios cloud híbridos', 'iquattro'); ?></span>
        <span class="iq-datacenter-pill"><?php esc_html_e('Soporte especializado y continuidad operativa', 'iquattro'); ?></span>
        <span class="iq-datacenter-pill"><?php esc_html_e('Profesionales certificados en soluciones de Data Center', 'iquattro'); ?></span>
      </div>
    </div>
  </section>

  <section id="iq-dc-servicios" class="iq-section iq-datacenter-servicios">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Nuestros servicios', 'iquattro'); ?></h2>
      <p class="iq-datacenter-intro"><?php esc_html_e('Acompañamos a empresas e instituciones en el diseño, implementación y operación de infraestructura de Data Center, con soluciones que se adaptan a tu madurez tecnológica y objetivos de negocio.', 'iquattro'); ?></p>
      <div class="iq-datacenter-servicios-cards">
        <?php foreach ($dc_servicios_cards as $card) : ?>
          <div class="iq-datacenter-servicio-card">
            <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-datacenter-servicio-icon" width="48" height="48" loading="lazy">
            <h3 class="iq-datacenter-servicio-title"><?php echo esc_html($card['title']); ?></h3>
            <p class="iq-datacenter-servicio-desc"><?php echo esc_html($card['desc']); ?></p>
            <a href="<?php echo esc_url($card['url']); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($card['btn_txt']); ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-soluciones">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Soluciones diseñadas para entornos empresariales exigentes', 'iquattro'); ?></h2>
      <div class="iq-datacenter-soluciones-cards">
        <div class="iq-datacenter-solucion-card">
          <h3 class="iq-datacenter-solucion-title"><?php esc_html_e('BC / DR - Continuidad y recuperación', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Diseñamos e implementamos estrategias de respaldo y recuperación ante desastres que garantizan la continuidad de tu operación y la protección de la información crítica.', 'iquattro'); ?></p>
        </div>
        <div class="iq-datacenter-solucion-card">
          <h3 class="iq-datacenter-solucion-title"><?php esc_html_e('Gestión de Data Centers', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Servicios de operación, monitoreo y mantenimiento de infraestructura para maximizar la disponibilidad y el rendimiento de tus sistemas.', 'iquattro'); ?></p>
        </div>
        <div class="iq-datacenter-solucion-card">
          <h3 class="iq-datacenter-solucion-title"><?php esc_html_e('Teletrabajo y entornos distribuidos', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Soluciones seguras para trabajo remoto, acceso a aplicaciones y conectividad que permiten a tu equipo operar desde cualquier lugar sin comprometer la seguridad.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Construye una infraestructura preparada para el futuro', 'iquattro'); ?></h2>
      <div class="iq-datacenter-contact-grid">
        <div class="iq-datacenter-form-wrap">
          <form id="iq-datacenter-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <p class="iq-form-field">
              <label for="iq-dc-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-dc-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-dc-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-dc-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-dc-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-dc-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-dc-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-dc-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de la empresa / Institución', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-dc-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-dc-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar iq-btn-datacenter"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-dc-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-datacenter-cta-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-datacenter-costado.jpg'); ?>');">
          <p><?php esc_html_e('Conversemos sobre tus desafíos de infraestructura, continuidad operativa y crecimiento tecnológico.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
