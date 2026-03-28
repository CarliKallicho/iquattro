<?php
/**
 * Plantilla página Seguridad
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$images_uri = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';
$hero_bg = iquattro_meta_image_url($data['hero_bg_id'], $images_uri . 'fondo-seguridad.jpg');
$cta_bg = iquattro_meta_image_url($data['contact_side_bg_id'], $images_uri . 'fondo-servicios-costado.jpg');
$seguridad_cards = isset($data['seguridad_cards']) ? $data['seguridad_cards'] : array();
?>
<main id="main" class="iq-main iq-seguridad-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-seguridad-hero" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
    <div class="iq-container">
      <h1 class="iq-seguridad-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
      <p class="iq-seguridad-hero-desc"><?php echo esc_html($data['hero_desc']); ?></p>
      <p class="iq-seguridad-hero-actions">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-seguridad-que-protegemos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['que_protegemos_title']); ?></h2>
      <p class="iq-seguridad-intro"><?php echo esc_html($data['que_protegemos_intro']); ?></p>
      <div class="iq-seguridad-cards">
        <?php foreach ($seguridad_cards as $card) : ?>
          <?php
          $icon_src = iquattro_page_icon_or_attachment_url(
            isset($card['icon']) ? $card['icon'] : '',
            isset($card['icon_id']) ? (int) $card['icon_id'] : 0,
            $icons_uri
          );
          ?>
          <div class="iq-seguridad-card">
            <img src="<?php echo esc_url($icon_src); ?>" alt="" class="iq-seguridad-card-icon" width="48" height="48" loading="lazy">
            <h3 class="iq-seguridad-card-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
            <p class="iq-seguridad-card-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-seguridad-monitoreo">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['monitoreo_title']); ?></h2>
      <p class="iq-seguridad-intro"><?php echo esc_html($data['monitoreo_intro']); ?></p>
    </div>
  </section>

  <section class="iq-section iq-seguridad-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['contact_title']); ?></h2>
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
        <div class="iq-seguridad-cta-imagen" style="background-image: url('<?php echo esc_url($cta_bg); ?>');">
          <p><?php echo esc_html($data['contact_cta_text']); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
