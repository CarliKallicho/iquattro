<?php
/**
 * Plantilla de la portada (página de inicio)
 *
 * @package iQuattro
 */

get_header();

global $wp_query;
// Misma página que WordPress está mostrando como portada (evita desajuste ID vs page_on_front).
$fp_post = null;
if ($wp_query->is_front_page() && get_option('show_on_front') === 'page') {
  $qid = (int) $wp_query->get_queried_object_id();
  if ($qid) {
    $fp_post = get_post($qid);
  }
  if (!$fp_post instanceof WP_Post) {
    $fid = (int) get_option('page_on_front');
    $fp_post = $fid ? get_post($fid) : null;
  }
} elseif (get_option('show_on_front') === 'page') {
  $fid = (int) get_option('page_on_front');
  $fp_post = $fid ? get_post($fid) : null;
}
if (!$fp_post instanceof WP_Post) {
  $qo = get_queried_object();
  if ($qo instanceof WP_Post && $qo->post_type === 'page') {
    $fp_post = $qo;
  }
}
$data = $fp_post ? iquattro_get_editable_page_data($fp_post) : array();
if (empty($data)) {
  $data = iquattro_get_page_defaults('front-page');
}
$theme_uri = get_template_directory_uri();
$images_uri = $theme_uri . '/assets/images/';
$divisions = isset($data['front_divisions']) ? $data['front_divisions'] : array();
$allies = isset($data['front_allies']) ? $data['front_allies'] : array();
$trust_z = iquattro_meta_image_url($data['trust_z_img_id'], $images_uri . 'z.png');
$trust_y = iquattro_meta_image_url($data['trust_y_img_id'], $images_uri . 'y.png');
?>

<main id="main" class="iq-main iq-front">

  <section class="iq-section iq-somos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['somos_title']); ?></h2>
      <div class="iq-somos-intro">
        <p><?php echo esc_html($data['somos_p1']); ?></p>
        <p><?php echo esc_html($data['somos_p2']); ?></p>
      </div>
      <div class="iq-features">
        <?php for ($f = 1; $f <= 3; $f++) : ?>
          <div class="iq-feature">
            <span class="iq-feature-icon <?php echo $f === 1 ? 'iq-icon-innovation' : ($f === 2 ? 'iq-icon-shield' : 'iq-icon-excellence'); ?>" aria-hidden="true"></span>
            <h3 class="iq-feature-title"><?php echo esc_html($data['feature' . $f . '_title']); ?></h3>
            <p><?php echo wp_kses_post($data['feature' . $f . '_text']); ?></p>
          </div>
        <?php endfor; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-divisions">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['divisions_title']); ?></h2>
      <div class="iq-divisions-grid">
        <?php foreach ($divisions as $div) : ?>
          <?php
          $slug = isset($div['slug']) ? $div['slug'] : '';
          if ($slug === '') {
            continue;
          }
          $url = get_permalink(get_page_by_path($slug)) ?: home_url('/' . $slug . '/');
          $fallback_img = $images_uri . $slug . '.jpg';
          $img_url = iquattro_meta_image_url(isset($div['image_id']) ? (int) $div['image_id'] : 0, $fallback_img);
          $label = isset($div['label']) ? $div['label'] : '';
          $desc = isset($div['description']) ? $div['description'] : '';
          $card_class = isset($div['card_class']) ? $div['card_class'] : '';
          ?>
          <a href="<?php echo esc_url($url); ?>" class="iq-division-card <?php echo esc_attr($card_class); ?>">
            <span class="iq-division-img-wrap" aria-hidden="true" style="background-image: url('<?php echo esc_url($img_url); ?>');"></span>
            <span class="iq-division-label"><?php echo esc_html($label); ?></span>
            <span class="iq-division-hover">
              <span class="iq-division-hover-img" style="background-image: url('<?php echo esc_url($img_url); ?>');" aria-hidden="true"></span>
              <span class="iq-division-hover-title"><?php echo esc_html($label); ?></span>
              <span class="iq-division-desc"><?php echo esc_html($desc); ?></span>
              <span class="iq-division-btn"><?php esc_html_e('Ver más', 'iquattro'); ?></span>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-trust">
    <div class="iq-container iq-trust-inner">
      <h2 class="iq-section-title iq-trust-title"><?php echo esc_html($data['trust_title']); ?></h2>
    </div>
    <div class="iq-trust-visual iq-trust-visual--full">
      <div class="iq-trust-composite" role="img" aria-label="<?php echo esc_attr($data['trust_arc_desc']); ?>">
        <div class="iq-trust-globe" aria-hidden="true"></div>
        <img class="iq-trust-text-layer iq-trust-text-layer--z" src="<?php echo esc_url($trust_z); ?>" alt="" loading="lazy" decoding="async">
        <img class="iq-trust-text-layer iq-trust-text-layer--y" src="<?php echo esc_url($trust_y); ?>" alt="" loading="lazy" decoding="async">
      </div>
    </div>
  </section>

  <section class="iq-section iq-allies">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['allies_title']); ?></h2>
      <div class="iq-allies-grid">
        <?php foreach ($allies as $ally) : ?>
          <?php
          $slug = isset($ally['slug']) ? $ally['slug'] : '';
          if ($slug === '') {
            continue;
          }
          $fallback = $images_uri . sanitize_file_name($slug) . '.png';
          $ally_img = iquattro_meta_image_url(isset($ally['logo_id']) ? (int) $ally['logo_id'] : 0, $fallback);
          ?>
          <div class="iq-ally" title="<?php echo esc_attr($slug); ?>">
            <img class="iq-ally-logo" src="<?php echo esc_url($ally_img); ?>" alt="<?php echo esc_attr($slug); ?>" loading="lazy">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-contact-section" id="contacto">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['contact_title']); ?></h2>
      <div class="iq-contact-grid">
        <div class="iq-contact-form-wrap">
          <form id="iq-contact-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <p class="iq-form-field">
              <label for="iq-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-contact-info">
          <div class="iq-contact-info-bg" aria-hidden="true"></div>
          <p><?php echo esc_html($data['contact_side_text']); ?></p>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
