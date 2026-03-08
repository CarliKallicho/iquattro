<?php
/**
 * Plantilla página Data Center - Servicios
 *
 * @package iQuattro
 */

get_header();

$icons_uri   = get_template_directory_uri() . '/assets/icons/';
$contacto_url = get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/');
$dc_hardware_url = get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/');
$dc_software_url = get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/');
$dc_servicios_url = get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/');

$cards = array(
  array('icon' => 'serv-1.svg', 'title' => __('Soporte', 'iquattro'), 'items' => array(__('Microsoft', 'iquattro'), __('Vmware (virtualización)', 'iquattro'), __('Veeam (respaldo)', 'iquattro'), __('Infraestructura de Servidores', 'iquattro'))),
  array('icon' => 'serv-2.svg', 'title' => __('Diagnósticos', 'iquattro'), 'items' => array(__('Gestión de TI', 'iquattro'), __('Infraestructura', 'iquattro'))),
  array('icon' => 'serv-3.svg', 'title' => __('Bases de Datos', 'iquattro'), 'items' => array()),
);
?>
<main id="main" class="iq-main iq-dc-catalogo-page iq-dc-servicios-catalogo-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-dc-catalogo-hero">
      <div class="iq-container">
        <h1 class="iq-dc-catalogo-hero-title"><?php esc_html_e('Servicios especializados para operar y proteger tu Data Center', 'iquattro'); ?></h1>
        <p class="iq-dc-catalogo-hero-desc"><?php esc_html_e('Gracias a nuestro equipo certificado y con amplia experiencia, ofrecemos servicios especializados para asegurar la estabilidad, seguridad y continuidad de tu infraestructura tecnológica.', 'iquattro'); ?></p>
      </div>
    </section>
  </div>

  <section class="iq-section iq-dc-queresolvemos">
    <div class="iq-container">
      <h2 class="iq-dc-queresolvemos-title"><?php esc_html_e('Qué resolvemos', 'iquattro'); ?></h2>
      <div class="iq-dc-queresolvemos-box">
        <h3 class="iq-dc-queresolvemos-box-title"><?php esc_html_e('Acompañamiento experto en cada etapa de tu infraestructura', 'iquattro'); ?></h3>
        <p><?php esc_html_e('Desde soporte técnico hasta diagnósticos especializados, nuestros servicios están diseñados para maximizar el rendimiento de tu Data Center y reducir riesgos operativos.', 'iquattro'); ?></p>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-catalogo-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Catálogo de Soluciones de Servicios', 'iquattro'); ?></h2>
      <div class="iq-dc-catalogo-grid">
        <?php foreach ($cards as $card) : ?>
          <div class="iq-dc-catalogo-card">
            <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-dc-catalogo-card-icon" width="64" height="64" loading="lazy">
            <h3 class="iq-dc-catalogo-card-title"><?php echo esc_html($card['title']); ?></h3>
            <?php if (!empty($card['items'])) : ?>
              <ul class="iq-dc-catalogo-card-list">
                <?php foreach ($card['items'] as $item) : ?>
                  <li><?php echo esc_html($item); ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-cta-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Confía la operación de tu Data Center a expertos', 'iquattro'); ?></h2>
      <p class="iq-dc-cta-actions">
        <a href="<?php echo esc_url($contacto_url); ?>" class="iq-btn iq-btn-dark"><?php esc_html_e('Contactar con un Consultor', 'iquattro'); ?></a>
      </p>
    </div>
  </section>

  <nav class="iq-dc-catalogo-nav" aria-label="<?php esc_attr_e('Navegación Data Center', 'iquattro'); ?>">
    <div class="iq-container">
      <a href="<?php echo esc_url($dc_software_url); ?>" class="iq-dc-catalogo-nav-prev"><?php esc_html_e('&larr; Software', 'iquattro'); ?></a>
      <a href="<?php echo esc_url($dc_hardware_url); ?>" class="iq-dc-catalogo-nav-next"><?php esc_html_e('Hardware &rarr;', 'iquattro'); ?></a>
    </div>
  </nav>
</main>

<?php get_footer(); ?>
