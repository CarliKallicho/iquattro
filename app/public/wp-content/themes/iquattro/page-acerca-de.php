<?php
/**
 * Plantilla página Acerca De
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$icons_uri = get_template_directory_uri() . '/assets/icons/';
$valores = isset($data['valores_cards']) && is_array($data['valores_cards']) ? $data['valores_cards'] : array();
$acerca_hero_desc = isset($data['hero_desc']) ? (string) $data['hero_desc'] : '';
$acerca_hero_desc = esc_html($acerca_hero_desc);
$acerca_hero_desc = str_replace('tecnológicos.', 'tecnológicos.<br class="iq-mobile-only-break">', $acerca_hero_desc);
?>
<main id="main" class="iq-main iq-acerca-page">
  <section class="iq-section iq-acerca-hero">
    <div class="iq-container iq-acerca-hero-inner">
      <h1 class="iq-acerca-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
      <p class="iq-acerca-hero-desc"><?php echo $acerca_hero_desc; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
      <p class="iq-acerca-hero-subtitle"><?php echo esc_html($data['hero_subtitle']); ?></p>
    </div>
  </section>

  <section class="iq-section iq-acerca-mision-vision">
    <div class="iq-container">
      <div class="iq-acerca-mv-grid">
        <div class="iq-acerca-mv-card">
          <div class="iq-acerca-mv-head">
            <img src="<?php echo esc_url($icons_uri . 'mision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="30" height="30" loading="lazy">
            <h2 class="iq-acerca-mv-title"><?php echo esc_html($data['mision_title']); ?></h2>
          </div>
          <div class="iq-acerca-mv-content"><?php echo wp_kses_post($data['mision_content']); ?></div>
        </div>
        <div class="iq-acerca-mv-card">
          <div class="iq-acerca-mv-head">
            <img src="<?php echo esc_url($icons_uri . 'vision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="30" height="30" loading="lazy">
            <h2 class="iq-acerca-mv-title"><?php echo esc_html($data['vision_title']); ?></h2>
          </div>
          <div class="iq-acerca-mv-content"><?php echo wp_kses_post($data['vision_content']); ?></div>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-acerca-valores">
    <div class="iq-container">
      <div class="iq-acerca-valores-panel">
        <h2 class="iq-acerca-valores-heading">
          <img src="<?php echo esc_url($icons_uri . 'valores.svg'); ?>" alt="" class="iq-acerca-valores-icon" width="30" height="30" loading="lazy">
          <?php echo esc_html($data['valores_heading']); ?>
        </h2>
        <div class="iq-acerca-valores-grid">
          <?php
          for ($i = 0; $i < 4; $i++) :
            $c = isset($valores[ $i ]) && is_array($valores[ $i ]) ? $valores[ $i ] : array('title' => '', 'text' => '');
            $card_mod = ($i % 2 === 0) ? 'iq-acerca-valor-dark-light' : 'iq-acerca-valor-light-dark';
            ?>
            <div class="iq-acerca-valor-card <?php echo esc_attr($card_mod); ?>">
              <h3 class="iq-acerca-valor-title"><?php echo esc_html($c['title']); ?></h3>
              <p><?php echo esc_html($c['text']); ?></p>
            </div>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
