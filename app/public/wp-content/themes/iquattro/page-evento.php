<?php
/**
 * Plantilla página Evento
 * Contenido editable desde WordPress (Páginas → Editar página Evento).
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$data = is_array($data) && !empty($data) ? $data : array();

$event_title    = isset($data['event_title']) ? $data['event_title'] : __('Próximo evento', 'iquattro');
$hero_image     = isset($data['event_hero_image']) && $data['event_hero_image'] !== '' ? $data['event_hero_image'] : 'fondo-evento.jpg';
$speaker_image  = isset($data['speaker_image']) && $data['speaker_image'] !== '' ? $data['speaker_image'] : 'persona-evento.jpg';
$speaker_name   = isset($data['speaker_name']) ? $data['speaker_name'] : '';
$speaker_creds  = isset($data['speaker_credentials']) ? $data['speaker_credentials'] : '';
$speaker_bio    = isset($data['speaker_bio']) ? $data['speaker_bio'] : '';
$descripcion    = isset($data['descripcion']) ? $data['descripcion'] : '';
$modalidad      = isset($data['modalidad']) ? $data['modalidad'] : '';
$fecha          = isset($data['fecha']) ? $data['fecha'] : '';
$horario        = isset($data['horario']) ? $data['horario'] : '';
$lugar          = isset($data['lugar']) ? $data['lugar'] : '';
$observaciones  = isset($data['observaciones']) ? $data['observaciones'] : '';
$form_title     = isset($data['form_title']) ? $data['form_title'] : __('Reserva tu cupo en este evento', 'iquattro');
$form_cta_title = isset($data['form_cta_title']) ? $data['form_cta_title'] : '';
$form_cta_text  = isset($data['form_cta_text']) ? $data['form_cta_text'] : '';

$images_uri = get_template_directory_uri() . '/assets/images/';
$hero_src   = $images_uri . $hero_image;
$speaker_src = $images_uri . $speaker_image;
?>

<main id="main" class="iq-main iq-evento-page">
  <div class="iq-evento-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>

    <section class="iq-evento-hero">
      <h1 class="iq-evento-title"><?php echo esc_html($event_title); ?></h1>
      <div class="iq-evento-hero-image" style="background-image: url('<?php echo esc_url($hero_src); ?>');" aria-hidden="true"></div>
    </section>

    <section class="iq-evento-content">
      <div class="iq-container">
        <div class="iq-evento-grid">
          <div class="iq-evento-speaker">
            <div class="iq-evento-speaker-photo-wrap">
              <img src="<?php echo esc_url($speaker_src); ?>" alt="<?php echo esc_attr($speaker_name); ?>" class="iq-evento-speaker-photo" loading="lazy">
            </div>
            <?php if ($speaker_name !== '') : ?>
              <h2 class="iq-evento-speaker-name"><?php echo esc_html($speaker_name); ?></h2>
            <?php endif; ?>
            <?php if ($speaker_creds !== '') : ?>
              <p class="iq-evento-speaker-credentials"><?php echo esc_html($speaker_creds); ?></p>
            <?php endif; ?>
            <?php if ($speaker_bio !== '') : ?>
              <div class="iq-evento-speaker-bio"><?php echo wp_kses(nl2br(esc_html($speaker_bio)), array('br' => array())); ?></div>
            <?php endif; ?>
          </div>
          <div class="iq-evento-details">
            <?php if ($descripcion !== '') : ?>
              <div class="iq-evento-block">
                <h3 class="iq-evento-block-title"><?php esc_html_e('Descripción', 'iquattro'); ?></h3>
                <p class="iq-evento-block-text"><?php echo wp_kses(nl2br(esc_html($descripcion)), array('br' => array())); ?></p>
              </div>
            <?php endif; ?>
            <div class="iq-evento-block">
              <h3 class="iq-evento-block-title"><?php esc_html_e('Datos del Evento', 'iquattro'); ?></h3>
              <dl class="iq-evento-datos">
                <?php if ($modalidad !== '') : ?><dt><?php esc_html_e('Modalidad:', 'iquattro'); ?></dt><dd><?php echo esc_html($modalidad); ?></dd><?php endif; ?>
                <?php if ($fecha !== '') : ?><dt><?php esc_html_e('Fecha:', 'iquattro'); ?></dt><dd><?php echo esc_html($fecha); ?></dd><?php endif; ?>
                <?php if ($horario !== '') : ?><dt><?php esc_html_e('Horario:', 'iquattro'); ?></dt><dd><?php echo esc_html($horario); ?></dd><?php endif; ?>
                <?php if ($lugar !== '') : ?><dt><?php esc_html_e('Lugar:', 'iquattro'); ?></dt><dd><?php echo esc_html($lugar); ?></dd><?php endif; ?>
              </dl>
            </div>
            <?php if ($observaciones !== '') : ?>
              <div class="iq-evento-block">
                <h3 class="iq-evento-block-title"><?php esc_html_e('Observaciones', 'iquattro'); ?></h3>
                <p class="iq-evento-block-text"><?php echo wp_kses(nl2br(esc_html($observaciones)), array('br' => array())); ?></p>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="iq-evento-form-section">
      <div class="iq-container">
        <h2 class="iq-evento-form-heading"><?php echo esc_html($form_title); ?></h2>
        <div class="iq-evento-form-grid">
          <div class="iq-evento-form-wrap">
            <form id="iq-evento-form" class="iq-contact-form" method="post" novalidate>
              <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
              <input type="hidden" name="iq_form_origin" value="evento">
              <p class="iq-form-field">
                <label for="iq-evento-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
                <input type="text" id="iq-evento-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
              </p>
              <p class="iq-form-row">
                <span class="iq-form-field">
                  <label for="iq-evento-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                  <input type="email" id="iq-evento-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
                </span>
                <span class="iq-form-field">
                  <label for="iq-evento-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                  <input type="tel" id="iq-evento-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
                </span>
              </p>
              <p class="iq-form-field">
                <label for="iq-evento-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
                <input type="text" id="iq-evento-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
              </p>
              <p class="iq-form-actions">
                <button type="submit" class="iq-btn iq-btn-evento-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
              </p>
              <p class="iq-form-message" id="iq-evento-form-message" aria-live="polite"></p>
            </form>
          </div>
          <div class="iq-evento-form-cta">
            <?php if ($form_cta_title !== '') : ?><h3 class="iq-evento-form-cta-title"><?php echo esc_html($form_cta_title); ?></h3><?php endif; ?>
            <?php if ($form_cta_text !== '') : ?><p><?php echo esc_html($form_cta_text); ?></p><?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>
