<?php
/**
 * Plantilla página Servicios
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$images_uri = get_template_directory_uri() . '/assets/images/';
$icons_uri = get_template_directory_uri() . '/assets/icons/';
$hero_bg = iquattro_meta_image_url($data['hero_bg_id'], $images_uri . 'fondo-servicio.jpg');
$cta_bg = iquattro_meta_image_url($data['cta_side_bg_id'], $images_uri . 'fondo-servicios-costado.jpg');
$que_cajas = array_filter(array_map('trim', explode("\n", (string) $data['que_hacemos_cajas'])));
$tecnologias_groups = isset($data['tecnologias_groups']) ? $data['tecnologias_groups'] : array();
$adaptacion_cards = isset($data['adaptacion_cards']) ? $data['adaptacion_cards'] : array();
$intervencion_cards = isset($data['intervencion_cards']) ? $data['intervencion_cards'] : array();
$entregables_cards = isset($data['entregables_cards']) ? $data['entregables_cards'] : array();
$clientes_cards = isset($data['clientes_cards']) ? $data['clientes_cards'] : array();
$tecnologias_item_icons = array(
  array('people.svg', 'icon-mail.svg', 'home.svg', 'computer.svg', 'insignia.svg', 'rack.svg'),
  array('rack.svg', 'signal.svg', 'block.svg', 'cloud.svg', 'people.svg', 'flash.svg'),
  array('block.svg', 'refresh.svg', 'insignia.svg', 'home.svg'),
);
$adaptacion_icons = array('clock.svg', 'toolcase.svg', 'flash.svg');
$serv_hero_title_lines = iquattro_consultoria_hero_title_lines(isset($data['hero_title']) ? $data['hero_title'] : '');
?>
<main id="main" class="iq-main iq-servicios-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-servicios-hero" style="background-image: url('<?php echo esc_url($hero_bg); ?>');">
    <div class="iq-container">
      <div class="iq-servicios-hero-copy">
        <h1 class="iq-servicios-hero-title">
          <?php
          $serv_l1 = isset($serv_hero_title_lines[0]) ? $serv_hero_title_lines[0] : '';
          $serv_l2 = isset($serv_hero_title_lines[1]) ? $serv_hero_title_lines[1] : '';
          if ($serv_l1 !== '' && $serv_l2 !== '') :
            ?>
            <span class="iq-servicios-hero-title-line"><?php echo esc_html($serv_l1); ?></span>
            <span class="iq-servicios-hero-title-line"><?php echo esc_html($serv_l2); ?></span>
          <?php else : ?>
            <?php echo esc_html($serv_l1 !== '' ? $serv_l1 : $serv_l2); ?>
          <?php endif; ?>
        </h1>
        <p class="iq-servicios-hero-desc"><?php echo nl2br(esc_html($data['hero_desc'])); ?></p>
        <p class="iq-servicios-hero-actions">
          <a href="#iq-servicios-form" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
        </p>
      </div>
    </div>
  </section>
  </div>

  <section class="iq-section iq-servicios-intro-negocio">
    <div class="iq-container">
      <h2 class="iq-servicios-intro-negocio-title"><?php echo esc_html(isset($data['intro_negocio_title']) ? $data['intro_negocio_title'] : ''); ?></h2>
      <p class="iq-servicios-intro-negocio-desc"><?php echo wp_kses_post(isset($data['intro_negocio_desc']) ? $data['intro_negocio_desc'] : ''); ?></p>
    </div>
  </section>

  <section class="iq-section iq-servicios-que-hacemos">
    <div class="iq-container">
      <?php
      $qh_sub = isset($data['que_hacemos_subtitle']) ? trim((string) $data['que_hacemos_subtitle']) : '';
      $qh_txt = isset($data['que_hacemos_text']) ? trim((string) $data['que_hacemos_text']) : '';
      if ($qh_sub !== '' || $qh_txt !== '') :
        ?>
      <div class="iq-servicios-que-hacemos-lead">
        <?php if ($qh_sub !== '') : ?>
          <h3 class="iq-servicios-que-hacemos-lead-sub"><?php echo esc_html($qh_sub); ?></h3>
        <?php endif; ?>
        <?php if ($qh_txt !== '') : ?>
          <p class="iq-servicios-que-hacemos-lead-text"><?php echo esc_html($qh_txt); ?></p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <div class="iq-servicios-que-hacemos-grid">
        <h2 class="iq-section-title iq-servicios-que-hacemos-title"><?php echo esc_html($data['que_hacemos_title']); ?></h2>
        <div class="iq-servicios-que-hacemos-pills-wrap">
          <?php foreach ($que_cajas as $pill) : ?>
            <span class="iq-servicios-que-hacemos-pill"><?php echo esc_html($pill); ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-tecnologias">
    <div class="iq-container">
      <h2 class="iq-servicios-tecnologias-title"><?php echo esc_html(isset($data['tecnologias_title']) ? $data['tecnologias_title'] : ''); ?></h2>
      <div class="iq-servicios-tecnologias-list">
        <?php foreach ($tecnologias_groups as $group_idx => $group) : ?>
          <?php
          $group_pills = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) (isset($group['pills']) ? $group['pills'] : ''))));
          $group_items = isset($group['items']) && is_array($group['items']) ? $group['items'] : array();
          $group_icon = isset($group['icon']) ? $group['icon'] : '';
          ?>
          <article class="iq-tech-group-card">
            <div class="iq-tech-group-head">
              <img src="<?php echo esc_url($icons_uri . ltrim((string) $group_icon, '/')); ?>" alt="" class="iq-tech-group-head-icon" width="80" height="80" loading="lazy">
              <div class="iq-tech-group-head-copy">
                <h3 class="iq-tech-group-head-title"><?php echo esc_html(isset($group['title']) ? $group['title'] : ''); ?></h3>
                <?php if (!empty($group_pills)) : ?>
                  <div class="iq-tech-group-head-pills">
                    <?php foreach ($group_pills as $pill) : ?>
                      <span class="iq-tech-pill"><?php echo esc_html($pill); ?></span>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="iq-tech-items-grid">
              <?php foreach ($group_items as $item_idx => $item) : ?>
                <?php $item_pills = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) (isset($item['pills']) ? $item['pills'] : '')))); ?>
                <article class="iq-tech-item-card">
                  <?php
                  $item_icon_file = isset($tecnologias_item_icons[$group_idx][$item_idx]) ? $tecnologias_item_icons[$group_idx][$item_idx] : '';
                  $item_icon_src = $item_icon_file !== '' ? $icons_uri . ltrim((string) $item_icon_file, '/') : '';
                  ?>
                  <div class="iq-tech-item-head">
                    <?php if ($item_icon_src !== '') : ?>
                      <img src="<?php echo esc_url($item_icon_src); ?>" alt="" class="iq-tech-item-icon" width="30" height="30" loading="lazy">
                    <?php endif; ?>
                    <h4 class="iq-tech-item-title"><?php echo esc_html(isset($item['title']) ? $item['title'] : ''); ?></h4>
                  </div>
                  <p class="iq-tech-item-desc"><?php echo esc_html(isset($item['desc']) ? $item['desc'] : ''); ?></p>
                  <?php if (!empty($item_pills)) : ?>
                    <div class="iq-tech-item-pills">
                      <?php foreach ($item_pills as $pill) : ?>
                        <span class="iq-tech-pill iq-tech-pill--outline"><?php echo esc_html($pill); ?></span>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </article>
              <?php endforeach; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-adaptacion">
    <div class="iq-container">
      <h2 class="iq-servicios-adaptacion-title"><?php echo esc_html(isset($data['adaptacion_title']) ? $data['adaptacion_title'] : ''); ?></h2>
      <div class="iq-servicios-adaptacion-grid">
        <?php foreach ($adaptacion_cards as $card_idx => $card) : ?>
          <?php $card_points = array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) (isset($card['points']) ? $card['points'] : '')))); ?>
          <article class="iq-servicios-adaptacion-card">
            <?php
            $adapt_icon_file = isset($adaptacion_icons[$card_idx]) ? $adaptacion_icons[$card_idx] : '';
            $adapt_icon_src = $adapt_icon_file !== '' ? $icons_uri . ltrim((string) $adapt_icon_file, '/') : '';
            ?>
            <div class="iq-servicios-adaptacion-head">
              <?php if ($adapt_icon_src !== '') : ?>
                <img src="<?php echo esc_url($adapt_icon_src); ?>" alt="" class="iq-servicios-adaptacion-icon" width="30" height="30" loading="lazy">
              <?php endif; ?>
              <h3 class="iq-servicios-adaptacion-card-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
            </div>
            <?php if (!empty($card['badge'])) : ?>
              <span class="iq-servicios-adaptacion-badge"><?php echo esc_html($card['badge']); ?></span>
            <?php endif; ?>
            <p class="iq-servicios-adaptacion-card-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
            <?php if (!empty($card_points)) : ?>
              <ul class="iq-servicios-adaptacion-points">
                <?php foreach ($card_points as $point) : ?>
                  <li><?php echo esc_html($point); ?></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-intervencion">
    <div class="iq-container">
      <div class="iq-servicios-intervencion-grid">
        <h2 class="iq-servicios-intervencion-title"><?php echo esc_html(isset($data['intervencion_title']) ? $data['intervencion_title'] : ''); ?></h2>
        <div class="iq-servicios-intervencion-list">
          <?php foreach ($intervencion_cards as $card) : ?>
            <article class="iq-servicios-intervencion-card">
              <div class="iq-servicios-intervencion-circle"><?php echo esc_html(isset($card['number']) ? $card['number'] : ''); ?></div>
              <div class="iq-servicios-intervencion-copy">
                <h3 class="iq-servicios-intervencion-card-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
                <p class="iq-servicios-intervencion-card-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-entregables">
    <div class="iq-container">
      <h2 class="iq-servicios-entregables-title"><?php echo esc_html(isset($data['entregables_title']) ? $data['entregables_title'] : ''); ?></h2>
      <div class="iq-servicios-entregables-grid">
        <?php foreach ($entregables_cards as $card) : ?>
          <?php $deliver_icon = isset($card['icon']) ? $card['icon'] : ''; ?>
          <article class="iq-servicios-entregables-card">
            <img src="<?php echo esc_url($icons_uri . ltrim((string) $deliver_icon, '/')); ?>" alt="" class="iq-servicios-entregables-icon" width="30" height="30" loading="lazy">
            <p class="iq-servicios-entregables-card-text"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-clientes">
    <div class="iq-container">
      <div class="iq-servicios-clientes-grid">
        <h2 class="iq-servicios-clientes-title"><?php echo esc_html(isset($data['clientes_title']) ? $data['clientes_title'] : ''); ?></h2>
        <div class="iq-servicios-clientes-list">
          <?php foreach ($clientes_cards as $card) : ?>
            <?php $pill_type = isset($card['pill_type']) ? sanitize_html_class($card['pill_type']) : 'bolivia'; ?>
            <article class="iq-servicios-clientes-card">
              <div class="iq-servicios-clientes-head">
                <h3 class="iq-servicios-clientes-card-title"><?php echo esc_html(isset($card['title']) ? $card['title'] : ''); ?></h3>
                <span class="iq-servicios-clientes-pill iq-servicios-clientes-pill--<?php echo esc_attr($pill_type); ?>"><?php echo esc_html(isset($card['pill']) ? $card['pill'] : ''); ?></span>
              </div>
              <p class="iq-servicios-clientes-card-desc"><?php echo esc_html(isset($card['desc']) ? $card['desc'] : ''); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
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
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar iq-btn-servicios"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-serv-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-servicios-cta-imagen" style="background-image: url('<?php echo esc_url($cta_bg); ?>');">
          <p><?php echo esc_html($data['contact_cta_text']); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
