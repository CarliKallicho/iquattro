<?php
/**
 * Plantilla página Data Center
 * Contenido editable desde WordPress (Páginas → Editar).
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);

$images_uri = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';

$dc_hardware_url  = get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/');
$dc_software_url  = get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/');
$dc_servicios_url = get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/');

$servicios_cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
$urls = array($dc_hardware_url, $dc_software_url, $dc_servicios_url);
foreach ($servicios_cards as $i => $card) {
  $servicios_cards[$i]['url'] = isset($urls[$i]) ? $urls[$i] : $dc_hardware_url;
}

$como_pills = isset($data['como_pills']) ? array_filter(array_map('trim', explode("\n", $data['como_pills']))) : array();
$soluciones_cards = isset($data['soluciones_cards']) ? $data['soluciones_cards'] : array();
?>
<main id="main" class="iq-main iq-datacenter-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-datacenter-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-datacenter.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-datacenter-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
      <p class="iq-datacenter-hero-desc"><?php echo esc_html($data['hero_desc_1']); ?></p>
      <p class="iq-datacenter-hero-desc"><?php echo esc_html($data['hero_desc_2']); ?></p>
      <p class="iq-datacenter-hero-actions">
        <a href="#iq-dc-servicios" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-datacenter-infra">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['infra_title']); ?></h2>
      <p class="iq-datacenter-intro"><?php echo esc_html($data['infra_intro']); ?></p>
    </div>
  </section>

  <section class="iq-section iq-datacenter-como">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['como_title']); ?></h2>
      <div class="iq-datacenter-pills-wrap">
        <?php foreach ($como_pills as $pill) : ?>
          <span class="iq-datacenter-pill"><?php echo esc_html($pill); ?></span>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="iq-dc-servicios" class="iq-section iq-datacenter-servicios">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['servicios_title']); ?></h2>
      <p class="iq-datacenter-intro"><?php echo esc_html($data['servicios_intro']); ?></p>
      <div class="iq-datacenter-servicios-cards">
        <?php foreach ($servicios_cards as $card) : ?>
          <div class="iq-datacenter-servicio-card">
            <?php if (!empty($card['icon'])) : ?>
              <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-datacenter-servicio-icon" width="48" height="48" loading="lazy">
            <?php endif; ?>
            <h3 class="iq-datacenter-servicio-title"><?php echo esc_html($card['title']); ?></h3>
            <p class="iq-datacenter-servicio-desc"><?php echo esc_html($card['desc']); ?></p>
            <a href="<?php echo esc_url(isset($card['url']) ? $card['url'] : $dc_hardware_url); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($card['btn_txt']); ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-soluciones">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['soluciones_title']); ?></h2>
      <div class="iq-datacenter-soluciones-cards">
        <?php foreach ($soluciones_cards as $sol) : ?>
          <div class="iq-datacenter-solucion-card">
            <h3 class="iq-datacenter-solucion-title"><?php echo esc_html($sol['title']); ?></h3>
            <p><?php echo esc_html($sol['text']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['contact_title']); ?></h2>
      <div class="iq-datacenter-contact-grid">
        <div class="iq-datacenter-form-wrap">
          <form id="iq-datacenter-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <p class="iq-form-field">
              <label for="iq-dc-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-dc-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-dc-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-dc-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-dc-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-dc-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-dc-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-dc-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de la empresa / Institución', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-dc-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-dc-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar iq-btn-datacenter"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-dc-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-datacenter-cta-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-datacenter-costado.jpg'); ?>');">
          <p><?php echo esc_html($data['contact_cta_text']); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
