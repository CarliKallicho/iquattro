<?php
/**
 * Plantilla página Data Center - Software
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
  array('icon' => 'soft-1.svg', 'title' => __('Virtualización', 'iquattro'), 'items' => array(__('Servidores', 'iquattro'), __('Redes', 'iquattro'), __('Almacenamiento', 'iquattro'), __('Balanceadores de carga', 'iquattro'))),
  array('icon' => 'soft-2.svg', 'title' => __('Seguridad', 'iquattro'), 'items' => array(__('Antivirus', 'iquattro'), __('Prevención de Pérdida de Información (DPL)', 'iquattro'), __('Monitoreo de Vulnerabilidades', 'iquattro'), __('Rastreo de incidentes, ataques', 'iquattro'), __('Next-Generation', 'iquattro'), __('Firewall, IPS', 'iquattro'), __('Protección contra DDOS', 'iquattro'))),
  array('icon' => 'soft-3.svg', 'title' => __('Respaldo y Continuidad del Negocio', 'iquattro'), 'items' => array(__('Servidores', 'iquattro'), __('Máquinas Personales', 'iquattro'), __('Replicación', 'iquattro'), __('Comprensión', 'iquattro'), __('Deduplicación de información', 'iquattro'))),
  array('icon' => 'soft-4.svg', 'title' => __('Administración', 'iquattro'), 'items' => array(__('Administración centralizada de Endpoints', 'iquattro'), __('Administración de Infraestructura', 'iquattro'), __('Automatización de Servicios e Infraestructura', 'iquattro'))),
  array('icon' => 'soft-5.svg', 'title' => __('Monitoreo', 'iquattro'), 'items' => array(__('Infraestructura', 'iquattro'), __('Bases de Datos', 'iquattro'), __('Seguridad', 'iquattro'))),
  array('icon' => 'soft-6.svg', 'title' => __('Sistemas Operativos', 'iquattro'), 'items' => array(__('Microsoft', 'iquattro'), __('SuSE', 'iquattro'))),
  array('icon' => 'soft-7.svg', 'title' => __('Bases de Datos', 'iquattro'), 'items' => array()),
);
?>
<main id="main" class="iq-main iq-dc-catalogo-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-dc-catalogo-hero">
      <div class="iq-container">
        <h1 class="iq-dc-catalogo-hero-title"><?php esc_html_e('Software empresarial para gestionar, proteger y optimizar tu Data Center', 'iquattro'); ?></h1>
        <p class="iq-dc-catalogo-hero-desc"><?php esc_html_e('Somos aliados de las principales marcas de software empresarial y contamos con profesionales certificados para implementar soluciones críticas de infraestructura, seguridad y continuidad del negocio.', 'iquattro'); ?></p>
      </div>
    </section>
  </div>

  <section class="iq-section iq-dc-queresolvemos">
    <div class="iq-container">
      <h2 class="iq-dc-queresolvemos-title"><?php esc_html_e('Qué resolvemos', 'iquattro'); ?></h2>
      <div class="iq-dc-queresolvemos-box">
        <h3 class="iq-dc-queresolvemos-box-title"><?php esc_html_e('Control total sobre tu infraestructura tecnológica', 'iquattro'); ?></h3>
        <p><?php esc_html_e('Implementamos soluciones de software que permiten administrar, proteger y optimizar los recursos del Data Center, asegurando disponibilidad, seguridad y eficiencia operativa.', 'iquattro'); ?></p>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-catalogo-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Catálogo de Soluciones de Software', 'iquattro'); ?></h2>
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
      <h2 class="iq-section-title"><?php esc_html_e('Haz que tu Data Center funcione con inteligencia', 'iquattro'); ?></h2>
      <p class="iq-dc-cta-actions">
        <a href="<?php echo esc_url($contacto_url); ?>" class="iq-btn iq-btn-dark"><?php esc_html_e('Contactar con Especialistas', 'iquattro'); ?></a>
      </p>
    </div>
  </section>

  <nav class="iq-dc-catalogo-nav" aria-label="<?php esc_attr_e('Navegación Data Center', 'iquattro'); ?>">
    <div class="iq-container">
      <a href="<?php echo esc_url($dc_hardware_url); ?>" class="iq-dc-catalogo-nav-prev"><?php esc_html_e('&larr; Hardware', 'iquattro'); ?></a>
      <a href="<?php echo esc_url($dc_servicios_url); ?>" class="iq-dc-catalogo-nav-next"><?php esc_html_e('Servicios &rarr;', 'iquattro'); ?></a>
    </div>
  </nav>
</main>

<?php get_footer(); ?>
