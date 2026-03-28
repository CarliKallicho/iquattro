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
      <div class="iq-dc-queresolvemos-row">
        <h2 class="iq-dc-queresolvemos-title"><?php echo esc_html($data['queresolvemos_title']); ?></h2>
        <div class="iq-dc-queresolvemos-box">
          <h3 class="iq-dc-queresolvemos-box-title"><?php echo esc_html($data['queresolvemos_box_title']); ?></h3>
          <p class="iq-dc-queresolvemos-box-text"><?php echo esc_html($data['queresolvemos_box_text']); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-dc-catalogo-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['catalog_title']); ?></h2>
      <div class="iq-dc-catalogo-grid">
        <?php foreach ($cards as $card_idx => $card) :
          $card_icon = isset($card['icon']) ? $card['icon'] : '';
          $card_title = isset($card['title']) ? $card['title'] : '';
          $card_items = isset($card['items']) && is_array($card['items']) ? $card['items'] : array();
          $icon_src = $card_icon !== '' ? $icons_uri . $card_icon : '';
          $dc_cat_grad = ((int) $card_idx % 3 === 1) ? 'iq-dc-catalogo-card--grad-dark-light' : 'iq-dc-catalogo-card--grad-light-dark';
          ?>
          <div class="iq-dc-catalogo-card <?php echo esc_attr($dc_cat_grad); ?>">
            <div class="iq-dc-catalogo-card-head">
              <?php if ($icon_src !== '') : ?>
                <img src="<?php echo esc_url($icon_src); ?>" alt="" class="iq-dc-catalogo-card-icon" width="200" height="200" loading="lazy">
              <?php endif; ?>
              <h3 class="iq-dc-catalogo-card-title"><?php echo esc_html($card_title); ?></h3>
            </div>
            <?php if (!empty($card_items)) : ?>
              <div class="iq-dc-catalogo-card-body">
                <ul class="iq-dc-catalogo-card-list">
                  <?php foreach ($card_items as $item) : ?>
                    <li><?php echo esc_html($item); ?></li>
                  <?php endforeach; ?>
                </ul>
              </div>
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
      <a href="<?php echo esc_url($dc_servicios_url); ?>" class="iq-dc-catalogo-nav-btn iq-dc-catalogo-nav-btn--prev">
        <svg class="iq-dc-catalogo-nav-chevron" width="11" height="18" viewBox="0 0 11 18" aria-hidden="true" focusable="false"><path d="M7.5 2.5 3 9l4.5 6.5" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span class="iq-dc-catalogo-nav-label"><?php esc_html_e('Servicios', 'iquattro'); ?></span>
      </a>
      <a href="<?php echo esc_url($dc_software_url); ?>" class="iq-dc-catalogo-nav-btn iq-dc-catalogo-nav-btn--next">
        <span class="iq-dc-catalogo-nav-label"><?php esc_html_e('Software', 'iquattro'); ?></span>
        <svg class="iq-dc-catalogo-nav-chevron" width="11" height="18" viewBox="0 0 11 18" aria-hidden="true" focusable="false"><path d="M3.5 2.5 8 9l-4.5 6.5" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </div>
  </nav>
</main>

<?php get_footer(); ?>
