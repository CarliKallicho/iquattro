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
$hero_default = file_exists(get_template_directory() . '/assets/images/data-center.png')
  ? ($images_uri . 'data-center.png')
  : ($images_uri . 'data-center.jpg');
$hero_bg = iquattro_meta_image_url($data['hero_bg_id'], $hero_default);
$cta_bg = iquattro_meta_image_url($data['contact_side_bg_id'], $images_uri . 'fondo-datacenter-costado.jpg');
$servicios_cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
$implementation_cards = isset($data['implementation_cards']) ? $data['implementation_cards'] : array();
$soluciones_cards = isset($data['soluciones_cards']) ? $data['soluciones_cards'] : array();
$fabricantes_cards = isset($data['fabricantes_cards']) ? $data['fabricantes_cards'] : array();
$dc_hero_title_lines = iquattro_dc_hero_title_lines(isset($data['hero_title']) ? $data['hero_title'] : '');
$infra_cards = array();
for ($i = 1; $i <= 4; $i++) {
  $infra_cards[] = array(
    'value' => isset($data['infra_card_' . $i . '_value']) ? $data['infra_card_' . $i . '_value'] : '',
    'text'  => isset($data['infra_card_' . $i . '_text']) ? $data['infra_card_' . $i . '_text'] : '',
  );
}
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
          <?php if (!empty($data['hero_btn_2'])) : ?>
            <a href="#iq-dc-contacto" class="iq-btn iq-btn-dark iq-datacenter-hero-btn-secondary"><?php echo esc_html($data['hero_btn_2']); ?></a>
          <?php endif; ?>
        </p>
      </div>
    </div>
  </section>
  </div>

  <section class="iq-section iq-datacenter-infra">
    <div class="iq-container">
      <div class="iq-datacenter-infra-cards">
        <?php foreach ($infra_cards as $card) : ?>
          <article class="iq-datacenter-infra-card">
            <p class="iq-datacenter-infra-card-value"><?php echo esc_html($card['value']); ?></p>
            <p class="iq-datacenter-infra-card-text"><?php echo esc_html($card['text']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-portfolio">
    <div class="iq-container">
      <div class="iq-datacenter-portfolio-grid">
        <h2 class="iq-datacenter-portfolio-title"><?php echo esc_html(isset($data['portfolio_title']) ? $data['portfolio_title'] : ''); ?></h2>
        <div class="iq-datacenter-portfolio-text">
          <?php echo wp_kses_post(isset($data['portfolio_text']) ? $data['portfolio_text'] : ''); ?>
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
      <?php if (trim($servicios_intro_raw) !== '') : ?>
        <div class="iq-datacenter-intro iq-datacenter-servicios-intro">
          <?php
          if (strpos($servicios_intro_raw, '<') !== false) {
            echo wp_kses_post($servicios_intro_raw);
          } else {
            echo wp_kses_post(wpautop(esc_html($servicios_intro_raw)));
          }
          ?>
        </div>
      <?php endif; ?>
      <div class="iq-datacenter-servicios-cards">
        <?php foreach ($servicios_cards as $idx => $card) : ?>
          <?php
          $icon_by_order = array('respaldo.svg', 'virtualizacion.svg', 'gestion.svg', 'devops.svg', 'snapshots.svg');
          $icon_file = isset($icon_by_order[$idx]) ? $icon_by_order[$idx] : (isset($card['icon']) ? $card['icon'] : '');
          $icon_src = iquattro_page_icon_or_attachment_url(
            $icon_file,
            isset($card['icon_id']) ? (int) $card['icon_id'] : 0,
            $icons_uri
          );
          $service_pills = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) (isset($card['pills']) ? $card['pills'] : ''))));
          ?>
          <div class="iq-datacenter-servicio-card">
            <div class="iq-datacenter-servicio-head">
              <img src="<?php echo esc_url($icon_src); ?>" alt="" class="iq-datacenter-servicio-icon" width="30" height="30" loading="lazy">
              <h3 class="iq-datacenter-servicio-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
            </div>
            <p class="iq-datacenter-servicio-subtitle-1"><?php echo esc_html(isset($card['subtitle_1']) ? $card['subtitle_1'] : ''); ?></p>
            <p class="iq-datacenter-servicio-subtitle-2"><?php echo esc_html(isset($card['subtitle_2']) ? $card['subtitle_2'] : ''); ?></p>
            <p class="iq-datacenter-servicio-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
            <?php if (!empty($service_pills)) : ?>
              <div class="iq-datacenter-servicio-pills">
                <?php foreach ($service_pills as $pill_txt) : ?>
                  <span class="iq-datacenter-servicio-pill"><?php echo esc_html($pill_txt); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <a href="#iq-dc-contacto" class="iq-btn iq-btn-dark iq-datacenter-servicio-btn"><?php esc_html_e('Solicitar información', 'iquattro'); ?></a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-datacenter-implementation">
    <div class="iq-container">
      <h2 class="iq-section-title iq-datacenter-implementation-title"><?php echo esc_html(isset($data['implementation_title']) ? $data['implementation_title'] : ''); ?></h2>
      <div class="iq-datacenter-implementation-cards">
        <?php foreach ($implementation_cards as $impl_card) : ?>
          <article class="iq-datacenter-implementation-card">
            <div class="iq-datacenter-implementation-circle">
              <span class="iq-datacenter-implementation-number"><?php echo esc_html(isset($impl_card['number']) ? $impl_card['number'] : ''); ?></span>
            </div>
            <h3 class="iq-datacenter-implementation-card-title"><?php echo esc_html(isset($impl_card['title']) ? $impl_card['title'] : ''); ?></h3>
            <p class="iq-datacenter-implementation-card-text"><?php echo esc_html(isset($impl_card['text']) ? $impl_card['text'] : ''); ?></p>
          </article>
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
          $sol_grad = (((int) $sol_idx % 2) === 0) ? 'iq-datacenter-solucion-card--grad-light-dark' : 'iq-datacenter-solucion-card--grad-dark-light';
          $sol_text = isset($sc['text']) ? (string) $sc['text'] : '';
          $sol_icon_by_order = array('insignia.svg', 'habilitacion.svg', 'aceleracion.svg', 'cumplimiento.svg', 'soft-7.svg', 'infraestructura.svg');
          $sol_icon_file = isset($sol_icon_by_order[$sol_idx]) ? $sol_icon_by_order[$sol_idx] : (isset($sc['icon']) ? $sc['icon'] : '');
          $sol_icon_src = iquattro_page_icon_or_attachment_url(
            $sol_icon_file,
            isset($sc['icon_id']) ? (int) $sc['icon_id'] : 0,
            $icons_uri
          );
          ?>
          <div class="iq-datacenter-solucion-card <?php echo esc_attr($sol_grad); ?>">
            <div class="iq-datacenter-solucion-head">
              <img src="<?php echo esc_url($sol_icon_src); ?>" alt="" class="iq-datacenter-solucion-icon" width="30" height="30" loading="lazy">
              <h3 class="iq-datacenter-solucion-title"><?php echo esc_html(isset($sc['title']) ? $sc['title'] : ''); ?></h3>
            </div>
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

  <section class="iq-section iq-datacenter-fabricantes">
    <div class="iq-container">
      <h2 class="iq-section-title iq-datacenter-fabricantes-title"><?php echo esc_html(isset($data['fabricantes_title']) ? $data['fabricantes_title'] : ''); ?></h2>
      <div class="iq-datacenter-fabricantes-cards">
        <?php foreach ($fabricantes_cards as $fab) : ?>
          <article class="iq-datacenter-fabricante-card">
            <h3 class="iq-datacenter-fabricante-title"><?php echo esc_html(isset($fab['title']) ? $fab['title'] : ''); ?></h3>
            <p class="iq-datacenter-fabricante-subtitle"><?php echo esc_html(isset($fab['subtitle']) ? $fab['subtitle'] : ''); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="iq-dc-contacto" class="iq-section iq-datacenter-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['contact_title']); ?></h2>
      <p class="iq-datacenter-contact-subtitle"><?php echo esc_html(isset($data['contact_subtitle']) ? $data['contact_subtitle'] : ''); ?></p>
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
