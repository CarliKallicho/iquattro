<?php
/**
 * Plantilla página Servicios
 * Contenido editable desde WordPress (Páginas → Editar).
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);

$images_uri = get_template_directory_uri() . '/assets/images/';

$que_hacemos_cajas = isset($data['que_hacemos_cajas']) ? array_filter(array_map('trim', explode("\n", $data['que_hacemos_cajas']))) : array();
$servicios_cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
?>
<main id="main" class="iq-main iq-servicios-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-servicios-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-servicio.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-servicios-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
      <p class="iq-servicios-hero-desc"><?php echo esc_html($data['hero_desc']); ?></p>
      <p class="iq-servicios-hero-actions">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-servicios-que-hacemos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['que_hacemos_title']); ?></h2>
      <div class="iq-que-hacemos-grid">
        <div class="iq-que-hacemos-texto">
          <h3 class="iq-que-hacemos-subtitle"><?php echo esc_html($data['que_hacemos_subtitle']); ?></h3>
          <p><?php echo esc_html($data['que_hacemos_text']); ?></p>
        </div>
        <div class="iq-que-hacemos-cajas">
          <?php foreach ($que_hacemos_cajas as $caja) : ?>
            <div class="iq-que-hacemos-caja"><?php echo esc_html($caja); ?></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-especializados">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['especializados_title']); ?></h2>
      <div class="iq-servicios-cards">
        <?php
        $card_icons = array('iq-servicio-icon-microsoft', 'iq-servicio-icon-almacenamiento');
        foreach ($servicios_cards as $idx => $card) :
          $pills = isset($card['pills']) ? array_filter(array_map('trim', explode("\n", $card['pills']))) : array();
          $icon_class = isset($card_icons[$idx]) ? $card_icons[$idx] : '';
        ?>
          <div class="iq-servicio-card">
            <div class="iq-servicio-card-icon <?php echo esc_attr($icon_class); ?>" aria-hidden="true"></div>
            <h3 class="iq-servicio-card-title"><?php echo esc_html($card['title']); ?></h3>
            <div class="iq-servicio-pills">
              <?php foreach ($pills as $pill) : ?>
                <span class="iq-servicio-pill"><?php echo esc_html($pill); ?></span>
              <?php endforeach; ?>
            </div>
            <p class="iq-servicio-card-desc"><?php echo esc_html($card['desc']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['contact_title']); ?></h2>
      <div class="iq-servicios-contact-grid">
        <div class="iq-servicios-form-wrap">
          <form id="iq-servicios-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <input type="hidden" name="iq_form_origin" value="servicios">
            <p class="iq-form-field">
              <label for="iq-serv-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-serv-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-serv-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-serv-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-serv-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-serv-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-serv-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-serv-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / independiente', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-serv-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-serv-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-serv-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-servicios-cta-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-servicios-costado.jpg'); ?>');">
          <p><?php echo esc_html($data['contact_cta_text']); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
