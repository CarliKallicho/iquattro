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
$hero_bg_pos_x = isset($data['hero_bg_pos_x']) && trim((string) $data['hero_bg_pos_x']) !== '' ? trim((string) $data['hero_bg_pos_x']) : 'center';
$hero_bg_pos_y = isset($data['hero_bg_pos_y']) && trim((string) $data['hero_bg_pos_y']) !== '' ? trim((string) $data['hero_bg_pos_y']) : 'center';
$cta_bg = iquattro_meta_image_url($data['contact_side_bg_id'], $images_uri . 'fondo-seguridad-costado.jpg');
$seguridad_cards = isset($data['seguridad_cards']) ? $data['seguridad_cards'] : array();
$main_card = isset($seguridad_cards[0]) ? $seguridad_cards[0] : array('icon' => 'ethical.svg', 'icon_id' => 0, 'title' => 'Ethical Hacking');
$main_icon_src = iquattro_page_icon_or_attachment_url(
  isset($main_card['icon']) ? $main_card['icon'] : 'ethical.svg',
  isset($main_card['icon_id']) ? (int) $main_card['icon_id'] : 0,
  $icons_uri
);
$que_protegemos_points = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) (isset($data['que_protegemos_points']) ? $data['que_protegemos_points'] : ''))));
$ejecucion_cards = isset($data['ejecucion_cards']) ? $data['ejecucion_cards'] : array();
$servicios_complementarios_cards = isset($data['servicios_complementarios_cards']) ? $data['servicios_complementarios_cards'] : array();
$estandares_cards = isset($data['estandares_cards']) ? $data['estandares_cards'] : array();
$experiencia_cards = isset($data['experiencia_cards']) ? $data['experiencia_cards'] : array();
$seg_hero_title_lines = iquattro_seguridad_hero_title_lines(isset($data['hero_title']) ? $data['hero_title'] : '');
?>
<main id="main" class="iq-main iq-seguridad-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-seguridad-hero" style="background-image: url('<?php echo esc_url($hero_bg); ?>'); background-position: <?php echo esc_attr($hero_bg_pos_x); ?> <?php echo esc_attr($hero_bg_pos_y); ?>;">
    <div class="iq-container">
      <div class="iq-seguridad-hero-copy">
        <h1 class="iq-seguridad-hero-title">
          <span class="iq-seguridad-hero-title-desktop">
            <?php
            $seg_l1 = isset($seg_hero_title_lines[0]) ? $seg_hero_title_lines[0] : '';
            $seg_l2 = isset($seg_hero_title_lines[1]) ? $seg_hero_title_lines[1] : '';
            if ($seg_l1 !== '' && $seg_l2 !== '') :
              ?>
              <span class="iq-seguridad-hero-title-line"><?php echo esc_html($seg_l1); ?></span>
              <span class="iq-seguridad-hero-title-line"><?php echo esc_html($seg_l2); ?></span>
            <?php else : ?>
              <?php echo esc_html($seg_l1 !== '' ? $seg_l1 : $seg_l2); ?>
            <?php endif; ?>
          </span>
          <span class="iq-seguridad-hero-title-mobile" aria-hidden="true">
            <span class="iq-seguridad-hero-title-line">Seguridad digital para</span>
            <span class="iq-seguridad-hero-title-line">proteger lo que hace</span>
            <span class="iq-seguridad-hero-title-line">crecer tu negocio</span>
          </span>
        </h1>
        <p class="iq-seguridad-hero-desc"><?php echo nl2br(esc_html($data['hero_desc'])); ?></p>
        <p class="iq-seguridad-hero-actions">
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
        </p>
      </div>
    </div>
  </section>
  </div>

  <section class="iq-section iq-seguridad-que-protegemos">
    <div class="iq-container">
      <h2 class="iq-section-title iq-seguridad-que-protegemos-title"><?php echo esc_html($data['que_protegemos_title']); ?></h2>
      <div class="iq-seguridad-intro-full">
        <p class="iq-seguridad-intro--que-protegemos">
          En iQuattro ayudamos a las organizaciones a <strong>anticiparse, detectar y responder</strong> ante amenazas digitales,
          combinando servicios especializados de hacking ético, cumplimiento regulatorio y gestión de incidentes.
        </p>
      </div>
      <h3 class="iq-seguridad-main-service-title"><?php esc_html_e('Servicio principal', 'iquattro'); ?></h3>
      <div class="iq-seguridad-main-card iq-seguridad-card--grad-light-dark">
        <div class="iq-seguridad-main-card-left">
          <img src="<?php echo esc_url($main_icon_src); ?>" alt="" class="iq-seguridad-card-icon" width="200" height="200" loading="lazy">
          <h3 class="iq-seguridad-card-title"><?php echo esc_html(isset($main_card['title']) ? $main_card['title'] : 'Ethical Hacking'); ?></h3>
        </div>
        <div class="iq-seguridad-main-card-right">
          <p class="iq-seguridad-main-card-intro"><?php echo esc_html(isset($data['que_protegemos_intro']) ? $data['que_protegemos_intro'] : ''); ?></p>
          <div class="iq-seguridad-main-card-bottom">
            <?php if (!empty($que_protegemos_points)) : ?>
              <ul class="iq-seguridad-main-card-list">
                <?php foreach ($que_protegemos_points as $line) : ?>
                  <li>
                    <img src="<?php echo esc_url($icons_uri . 'flecha.svg'); ?>" alt="" class="iq-seguridad-main-card-bullet" width="32" height="24" loading="lazy">
                    <span><?php echo esc_html($line); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-seguridad-main-card-btn"><?php echo esc_html(isset($data['que_protegemos_btn']) ? $data['que_protegemos_btn'] : 'Solicitar Ethical Hacking'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-seguridad-ejecucion">
    <div class="iq-container">
      <h2 class="iq-section-title iq-seguridad-ejecucion-title"><?php echo esc_html(isset($data['ejecucion_title']) ? $data['ejecucion_title'] : ''); ?></h2>
      <div class="iq-seguridad-ejecucion-list">
        <?php foreach ($ejecucion_cards as $step) : ?>
          <article class="iq-seguridad-ejecucion-card">
            <div class="iq-seguridad-ejecucion-number-wrap">
              <span class="iq-seguridad-ejecucion-number"><?php echo esc_html(isset($step['number']) ? $step['number'] : ''); ?></span>
            </div>
            <div class="iq-seguridad-ejecucion-copy">
              <h3 class="iq-seguridad-ejecucion-card-title"><?php echo esc_html(isset($step['title']) ? $step['title'] : ''); ?></h3>
              <p class="iq-seguridad-ejecucion-card-desc"><?php echo esc_html(isset($step['desc']) ? $step['desc'] : ''); ?></p>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-seguridad-servicios-comp">
    <div class="iq-container">
      <h2 class="iq-section-title iq-seguridad-servicios-comp-title"><?php echo esc_html(isset($data['servicios_complementarios_title']) ? $data['servicios_complementarios_title'] : ''); ?></h2>
      <p class="iq-seguridad-servicios-comp-intro"><?php echo esc_html(isset($data['servicios_complementarios_intro']) ? $data['servicios_complementarios_intro'] : ''); ?></p>
      <div class="iq-seguridad-servicios-comp-grid">
        <?php foreach ($servicios_complementarios_cards as $card) : ?>
          <?php
          $card_icon = iquattro_page_icon_or_attachment_url(
            isset($card['icon']) ? $card['icon'] : '',
            isset($card['icon_id']) ? (int) $card['icon_id'] : 0,
            $icons_uri
          );
          $card_points = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) (isset($card['points']) ? $card['points'] : ''))));
          ?>
          <article class="iq-seguridad-servicios-comp-card iq-seguridad-card--grad-light-dark">
            <div class="iq-seguridad-servicios-comp-head">
              <img src="<?php echo esc_url($card_icon); ?>" alt="" class="iq-seguridad-servicios-comp-icon" width="30" height="30" loading="lazy">
              <h3 class="iq-seguridad-servicios-comp-card-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
            </div>
            <p class="iq-seguridad-servicios-comp-card-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
            <?php if (!empty($card_points)) : ?>
              <ul class="iq-seguridad-servicios-comp-points">
                <?php foreach ($card_points as $p) : ?>
                  <li><?php echo esc_html($p); ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-seguridad-servicios-comp-btn"><?php echo esc_html(isset($card['btn_txt']) ? $card['btn_txt'] : ''); ?></a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-seguridad-estandares">
    <div class="iq-container">
      <h2 class="iq-section-title iq-seguridad-estandares-title"><?php echo esc_html(isset($data['estandares_title']) ? $data['estandares_title'] : ''); ?></h2>
      <p class="iq-seguridad-estandares-intro"><?php echo esc_html(isset($data['estandares_intro']) ? $data['estandares_intro'] : ''); ?></p>
      <div class="iq-seguridad-estandares-grid">
        <?php foreach ($estandares_cards as $std) : ?>
          <article class="iq-seguridad-estandares-card">
            <h3 class="iq-seguridad-estandares-card-title"><?php echo esc_html(isset($std['title']) ? $std['title'] : ''); ?></h3>
            <p class="iq-seguridad-estandares-card-subtitle"><?php echo esc_html(isset($std['subtitle']) ? $std['subtitle'] : ''); ?></p>
            <p class="iq-seguridad-estandares-card-detail"><?php echo esc_html(isset($std['detail']) ? $std['detail'] : ''); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-seguridad-experiencia">
    <div class="iq-container">
      <h2 class="iq-section-title iq-seguridad-experiencia-title"><?php echo esc_html(isset($data['experiencia_title']) ? $data['experiencia_title'] : ''); ?></h2>
      <div class="iq-seguridad-experiencia-grid">
        <?php foreach ($experiencia_cards as $card) : ?>
          <?php
          $exp_icon_src = iquattro_page_icon_or_attachment_url(
            isset($card['icon']) ? $card['icon'] : '',
            isset($card['icon_id']) ? (int) $card['icon_id'] : 0,
            $icons_uri
          );
          ?>
          <article class="iq-seguridad-experiencia-card">
            <div class="iq-seguridad-experiencia-circle" aria-hidden="true">
              <img src="<?php echo esc_url($exp_icon_src); ?>" alt="" class="iq-seguridad-experiencia-icon" width="40" height="40" loading="lazy">
            </div>
            <p class="iq-seguridad-experiencia-stat"><?php echo esc_html(isset($card['stat']) ? $card['stat'] : ''); ?></p>
            <p class="iq-seguridad-experiencia-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
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
