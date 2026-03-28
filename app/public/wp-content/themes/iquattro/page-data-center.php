<?php
/**
 * Plantilla página Data Center
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$images_uri = get_template_directory_uri() . '/assets/images/';
$icons_uri  = get_template_directory_uri() . '/assets/icons/';
$hero_bg = iquattro_meta_image_url($data['hero_bg_id'], $images_uri . 'fondo-datacenter.jpg');
$cta_bg = iquattro_meta_image_url($data['contact_side_bg_id'], $images_uri . 'fondo-datacenter-costado.jpg');
$como_pills = array_filter(array_map('trim', explode("\n", (string) $data['como_pills'])));
$servicios_cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
$soluciones_cards = isset($data['soluciones_cards']) ? $data['soluciones_cards'] : array();
$dc_card_urls = array(
  get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/'),
  get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/'),
  get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/'),
);
$dc_hero_title_lines = iquattro_dc_hero_title_lines(isset($data['hero_title']) ? $data['hero_title'] : '');
?>
<main id="main" class="iq-main iq-datacenter-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-datacenter-hero" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
    <div class="iq-container iq-datacenter-hero-grid">
      <div class="iq-datacenter-hero-copy">
        <h1 class="iq-datacenter-hero-title">
          <?php
          $dc_l1 = isset($dc_hero_title_lines[0]) ? $dc_hero_title_lines[0] : '';
          $dc_l2 = isset($dc_hero_title_lines[1]) ? $dc_hero_title_lines[1] : '';
          if ($dc_l1 !== '' && $dc_l2 !== '') :
            ?>
            <span class="iq-datacenter-hero-title-line"><?php echo esc_html($dc_l1); ?></span>
            <span class="iq-datacenter-hero-title-line"><?php echo esc_html($dc_l2); ?></span>
          <?php else : ?>
            <?php echo esc_html($dc_l1 !== '' ? $dc_l1 : $dc_l2); ?>
          <?php endif; ?>
        </h1>
        <p class="iq-datacenter-hero-desc"><?php echo esc_html($data['hero_desc_1']); ?></p>
        <p class="iq-datacenter-hero-desc"><?php echo esc_html($data['hero_desc_2']); ?></p>
        <p class="iq-datacenter-hero-actions">
          <a href="#iq-dc-servicios" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
        </p>
      </div>
    </div>
  </section>
  </div>

  <section class="iq-section iq-datacenter-infra">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['infra_title']); ?></h2>
      <?php
      $infra_intro_raw = isset($data['infra_intro']) ? (string) $data['infra_intro'] : '';
      ?>
      <div class="iq-datacenter-intro iq-datacenter-infra-intro">
        <?php
        if (strpos($infra_intro_raw, '<') !== false) {
          echo wp_kses_post($infra_intro_raw);
        } else {
          echo wp_kses_post(wpautop(esc_html($infra_intro_raw)));
        }
        ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-como">
    <div class="iq-container">
      <div class="iq-datacenter-como-grid">
        <h2 class="iq-section-title iq-datacenter-como-title"><?php echo esc_html($data['como_title']); ?></h2>
        <div class="iq-datacenter-pills-wrap">
          <?php foreach ($como_pills as $pill) : ?>
            <span class="iq-datacenter-pill"><?php echo esc_html($pill); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="iq-dc-servicios" class="iq-section iq-datacenter-servicios">
    <div class="iq-container">
      <h2 class="iq-section-title iq-datacenter-servicios-title"><?php echo esc_html($data['servicios_title']); ?></h2>
      <?php
      $servicios_intro_raw = isset($data['servicios_intro']) ? (string) $data['servicios_intro'] : '';
      ?>
      <div class="iq-datacenter-intro iq-datacenter-servicios-intro">
        <?php
        if (strpos($servicios_intro_raw, '<') !== false) {
          echo wp_kses_post($servicios_intro_raw);
        } else {
          echo wp_kses_post(wpautop(esc_html($servicios_intro_raw)));
        }
        ?>
      </div>
      <div class="iq-datacenter-servicios-cards">
        <?php foreach ($servicios_cards as $idx => $card) : ?>
          <?php
          $icon_src = iquattro_page_icon_or_attachment_url(
            isset($card['icon']) ? $card['icon'] : '',
            isset($card['icon_id']) ? (int) $card['icon_id'] : 0,
            $icons_uri
          );
          $card_url = isset($dc_card_urls[ $idx ]) ? $dc_card_urls[ $idx ] : (get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/'));
          ?>
          <div class="iq-datacenter-servicio-card">
            <div class="iq-datacenter-servicio-head">
              <img src="<?php echo esc_url($icon_src); ?>" alt="" class="iq-datacenter-servicio-icon" width="30" height="30" loading="lazy">
              <h3 class="iq-datacenter-servicio-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
            </div>
            <p class="iq-datacenter-servicio-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
            <a href="<?php echo esc_url($card_url); ?>" class="iq-btn iq-btn-dark iq-datacenter-servicio-btn"><?php echo esc_html(isset($card['btn_txt']) ? $card['btn_txt'] : ''); ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-soluciones">
    <div class="iq-container">
      <h2 class="iq-section-title iq-datacenter-soluciones-title"><?php echo esc_html($data['soluciones_title']); ?></h2>
      <div class="iq-datacenter-soluciones-cards">
        <?php foreach ($soluciones_cards as $sol_idx => $sc) : ?>
          <?php
          $sol_grad = ((int) $sol_idx === 1) ? 'iq-datacenter-solucion-card--grad-dark-light' : 'iq-datacenter-solucion-card--grad-light-dark';
          $sol_text = isset($sc['text']) ? (string) $sc['text'] : '';
          ?>
          <div class="iq-datacenter-solucion-card <?php echo esc_attr($sol_grad); ?>">
            <h3 class="iq-datacenter-solucion-title"><?php echo esc_html(isset($sc['title']) ? $sc['title'] : ''); ?></h3>
            <div class="iq-datacenter-solucion-body">
              <?php
              if (strpos($sol_text, '<') !== false) {
                echo wp_kses_post($sol_text);
              } else {
                echo wp_kses_post(wpautop(esc_html($sol_text)));
              }
              ?>
            </div>
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
        <div class="iq-datacenter-cta-imagen" style="background-image: url('<?php echo esc_url($cta_bg); ?>');">
          <p><?php echo esc_html($data['contact_cta_text']); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
