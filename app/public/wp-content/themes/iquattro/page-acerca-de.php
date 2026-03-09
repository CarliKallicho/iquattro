<?php
/**
 * Plantilla página Acerca De
 * Contenido editable desde WordPress (Páginas → Editar).
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);

$icons_uri = get_template_directory_uri() . '/assets/icons/';

$mision_parrafos = isset($data['mision_content']) ? array_filter(explode("\n\n", $data['mision_content'])) : array();
$vision_parrafos = isset($data['vision_content']) ? array_filter(explode("\n\n", $data['vision_content'])) : array();
$valores_cards = isset($data['valores_cards']) ? $data['valores_cards'] : array();
?>
<main id="main" class="iq-main iq-acerca-page">
  <section class="iq-section iq-acerca-hero">
    <div class="iq-container iq-acerca-hero-inner">
      <h1 class="iq-acerca-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
      <p class="iq-acerca-hero-desc"><?php echo esc_html($data['hero_desc']); ?></p>
      <p class="iq-acerca-hero-subtitle"><?php echo esc_html($data['hero_subtitle']); ?></p>
    </div>
  </section>

  <section class="iq-section iq-acerca-mision-vision">
    <div class="iq-container">
      <div class="iq-acerca-mv-grid">
        <div class="iq-acerca-mv-card">
          <img src="<?php echo esc_url($icons_uri . 'mision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="48" height="48" loading="lazy">
          <h2 class="iq-acerca-mv-title"><?php echo esc_html($data['mision_title']); ?></h2>
          <div class="iq-acerca-mv-content">
            <?php foreach ($mision_parrafos as $p) : ?>
              <p><?php echo wp_kses(nl2br(esc_html(trim($p))), array('br' => array())); ?></p>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="iq-acerca-mv-card">
          <img src="<?php echo esc_url($icons_uri . 'vision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="48" height="48" loading="lazy">
          <h2 class="iq-acerca-mv-title"><?php echo esc_html($data['vision_title']); ?></h2>
          <div class="iq-acerca-mv-content">
            <?php foreach ($vision_parrafos as $p) : ?>
              <p><?php echo wp_kses(nl2br(esc_html(trim($p))), array('br' => array())); ?></p>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-acerca-valores">
    <div class="iq-container">
      <h2 class="iq-acerca-valores-heading">
        <img src="<?php echo esc_url($icons_uri . 'valores.svg'); ?>" alt="" class="iq-acerca-valores-icon" width="40" height="40" loading="lazy">
        <?php echo esc_html($data['valores_heading']); ?>
      </h2>
      <div class="iq-acerca-valores-grid">
        <?php
        $valor_classes = array('iq-acerca-valor-dark-light', 'iq-acerca-valor-light-dark', 'iq-acerca-valor-dark-light', 'iq-acerca-valor-light-dark');
        foreach ($valores_cards as $i => $valor) :
          $cls = isset($valor_classes[$i % 4]) ? $valor_classes[$i % 4] : '';
        ?>
          <div class="iq-acerca-valor-card <?php echo esc_attr($cls); ?>">
            <h3 class="iq-acerca-valor-title"><?php echo esc_html($valor['title']); ?></h3>
            <p><?php echo esc_html($valor['text']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
