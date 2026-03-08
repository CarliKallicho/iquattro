<?php
/**
 * Plantilla página Data Center - Hardware
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
  array('icon' => 'hard-1.svg', 'title' => __('Equipos de Cómputo', 'iquattro'), 'items' => array(__('Servidores Rack y Tower', 'iquattro'), __('Blades', 'iquattro'), __('Hiperconvergentes', 'iquattro'))),
  array('icon' => 'hard-2.svg', 'title' => __('Equipos de Escritorio', 'iquattro'), 'items' => array(__('Desktops', 'iquattro'), __('Laptops', 'iquattro'), __('Impresoras', 'iquattro'), __('Scanner', 'iquattro'), __('Monitores y Televisores', 'iquattro'))),
  array('icon' => 'hard-3.svg', 'title' => __('Equipos de Almacenamiento', 'iquattro'), 'items' => array(__('Storages', 'iquattro'), __('Librerías de Cintas', 'iquattro'), __('Storages para Backups', 'iquattro'))),
  array('icon' => 'hard-4.svg', 'title' => __('Equipos de Redes y Comunicaciones', 'iquattro'), 'items' => array(__('Switches', 'iquattro'), __('Routers', 'iquattro'), __('Redes Inalámbricas', 'iquattro'))),
  array('icon' => 'hard-5.svg', 'title' => __('Mobility', 'iquattro'), 'items' => array(__('Celulares', 'iquattro'), __('Tablets', 'iquattro'))),
  array('icon' => 'hard-6.svg', 'title' => __('Seguridad', 'iquattro'), 'items' => array(__('Firewalls', 'iquattro'), __('Routers', 'iquattro'), __('Redes Inalámbricas', 'iquattro'), __('DDOS', 'iquattro'), __('ADC', 'iquattro'), __('WAF', 'iquattro'))),
  array('icon' => 'hard-7.svg', 'title' => __('Home Office', 'iquattro'), 'items' => array(__('Cámaras Web', 'iquattro'), __('Micrófono', 'iquattro'), __('Auriculares', 'iquattro'), __('Videoconferencia', 'iquattro'), __('Proyectores', 'iquattro'))),
  array('icon' => 'hard-8.svg', 'title' => __('Energía y Refrigeración', 'iquattro'), 'items' => array(__('UPS', 'iquattro'), __('PDU', 'iquattro'), __('Aire acondicionado para salas', 'iquattro'), __('Monitoreo ambiental', 'iquattro'))),
);
?>
<main id="main" class="iq-main iq-dc-catalogo-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-dc-catalogo-hero">
      <div class="iq-container">
        <h1 class="iq-dc-catalogo-hero-title"><?php esc_html_e('Hardware empresarial para Data Centers confiables y escalables', 'iquattro'); ?></h1>
        <p class="iq-dc-catalogo-hero-desc"><?php esc_html_e('Proveemos equipamiento tecnológico de alto rendimiento para centros de datos, redes y entornos de trabajo, seleccionando las mejores marcas y configuraciones según las necesidades de tu operación.', 'iquattro'); ?></p>
      </div>
    </section>
  </div>

  <section class="iq-section iq-dc-queresolvemos">
    <div class="iq-container">
      <h2 class="iq-dc-queresolvemos-title"><?php esc_html_e('Qué resolvemos', 'iquattro'); ?></h2>
      <div class="iq-dc-queresolvemos-box">
        <h3 class="iq-dc-queresolvemos-box-title"><?php esc_html_e('Infraestructura física diseñada para operar sin fallas', 'iquattro'); ?></h3>
        <p><?php esc_html_e('En iQuattro te acompañamos desde la selección hasta la implementación de hardware para Data Center, garantizando compatibilidad, escalabilidad y continuidad operativa en entornos empresariales críticos.', 'iquattro'); ?></p>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-catalogo-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Catálogo de Soluciones de Hardware', 'iquattro'); ?></h2>
      <div class="iq-dc-catalogo-grid">
        <?php foreach ($cards as $card) : ?>
          <div class="iq-dc-catalogo-card">
            <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-dc-catalogo-card-icon" width="64" height="64" loading="lazy">
            <h3 class="iq-dc-catalogo-card-title"><?php echo esc_html($card['title']); ?></h3>
            <ul class="iq-dc-catalogo-card-list">
              <?php foreach ($card['items'] as $item) : ?>
                <li><?php echo esc_html($item); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-cta-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Optimiza tu Data Center desde la base', 'iquattro'); ?></h2>
      <p class="iq-dc-cta-actions">
        <a href="<?php echo esc_url($contacto_url); ?>" class="iq-btn iq-btn-dark"><?php esc_html_e('Contactar con Especialistas', 'iquattro'); ?></a>
      </p>
    </div>
  </section>

  <nav class="iq-dc-catalogo-nav" aria-label="<?php esc_attr_e('Navegación Data Center', 'iquattro'); ?>">
    <div class="iq-container">
      <a href="<?php echo esc_url($dc_servicios_url); ?>" class="iq-dc-catalogo-nav-prev"><?php esc_html_e('&larr; Servicios', 'iquattro'); ?></a>
      <a href="<?php echo esc_url($dc_software_url); ?>" class="iq-dc-catalogo-nav-next"><?php esc_html_e('Software &rarr;', 'iquattro'); ?></a>
    </div>
  </nav>
</main>

<?php get_footer(); ?>
