<?php
/**
 * Plantilla página Data Center - Hardware
 * Contenido editable desde WordPress (Páginas → Editar esta página).
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_dc_catalogo_page_data($post);

$icons_uri   = get_template_directory_uri() . '/assets/icons/';
$contacto_url = get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/');
$dc_hardware_url = get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/');
$dc_software_url = get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/');
$dc_servicios_url = get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/');

$cards = isset($data['cards']) && is_array($data['cards']) ? $data['cards'] : array();
?>
<main id="main" class="iq-main iq-dc-catalogo-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-dc-catalogo-hero">
      <div class="iq-container">
        <h1 class="iq-dc-catalogo-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
        <p class="iq-dc-catalogo-hero-desc"><?php echo esc_html($data['hero_desc']); ?></p>
      </div>
    </section>
  </div>

  <section class="iq-section iq-dc-queresolvemos">
    <div class="iq-container">
      <h2 class="iq-dc-queresolvemos-title"><?php echo esc_html($data['queresolvemos_title']); ?></h2>
      <div class="iq-dc-queresolvemos-box">
        <h3 class="iq-dc-queresolvemos-box-title"><?php echo esc_html($data['queresolvemos_box_title']); ?></h3>
        <p><?php echo esc_html($data['queresolvemos_box_text']); ?></p>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-catalogo-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['catalog_title']); ?></h2>
      <div class="iq-dc-catalogo-grid">
        <?php foreach ($cards as $card) :
          $card_icon = isset($card['icon']) ? $card['icon'] : '';
          $card_title = isset($card['title']) ? $card['title'] : '';
          $card_items = isset($card['items']) && is_array($card['items']) ? $card['items'] : array();
          $icon_src = $card_icon !== '' ? $icons_uri . $card_icon : '';
        ?>
          <div class="iq-dc-catalogo-card">
            <?php if ($icon_src !== '') : ?>
              <img src="<?php echo esc_url($icon_src); ?>" alt="" class="iq-dc-catalogo-card-icon" width="64" height="64" loading="lazy">
            <?php endif; ?>
            <h3 class="iq-dc-catalogo-card-title"><?php echo esc_html($card_title); ?></h3>
            <?php if (!empty($card_items)) : ?>
              <ul class="iq-dc-catalogo-card-list">
                <?php foreach ($card_items as $item) : ?>
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
      <h2 class="iq-section-title"><?php echo esc_html($data['cta_title']); ?></h2>
      <p class="iq-dc-cta-actions">
        <a href="<?php echo esc_url($contacto_url); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($data['cta_button']); ?></a>
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
