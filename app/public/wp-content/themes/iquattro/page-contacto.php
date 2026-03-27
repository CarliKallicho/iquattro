<?php
/**
 * Plantilla página Contacto
 *
 * @package iQuattro
 */

get_header();

$phone1 = get_theme_mod('iquattro_phone', '+591 71947016');
$phone2 = get_theme_mod('iquattro_phone2', '+591 67005756');
$email1 = get_theme_mod('iquattro_email', 'marisol@i-quattro.com');
$email2 = get_theme_mod('iquattro_email2', 'ivar@i-quattro.com');
$horario = get_theme_mod('iquattro_horario', __('Lunes a viernes 08:30 - 18:00', 'iquattro'));
$images_uri = get_template_directory_uri() . '/assets/images/';
?>
<main id="main" class="iq-main iq-contacto-page">
  <section class="iq-contacto-banner" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-contacto-titulo.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-contacto-banner-title"><?php esc_html_e('Hablemos sobre tus necesidades tecnológicas', 'iquattro'); ?></h1>
    </div>
  </section>

  <section class="iq-section iq-contact-section">
    <div class="iq-container">
      <h2 class="iq-contacto-main-title"><?php esc_html_e('Estamos listos para ayudarte', 'iquattro'); ?></h2>
      <p class="iq-contacto-intro"><?php esc_html_e('Nuestro equipo está listo para escucharte y ayudarte a encontrar la solución, servicio o programa de capacitación que mejor se adapte a tus objetivos.', 'iquattro'); ?></p>

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
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-contact-info iq-contact-info-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-contacto-costado.jpg'); ?>');">
          <p><?php esc_html_e('Completa el formulario y uno de nuestros especialistas se pondrá en contacto contigo para brindarte asesoría personalizada.', 'iquattro'); ?></p>
        </div>
      </div>

      <h3 class="iq-contacto-channels-title"><?php esc_html_e('Si prefieres, también puedes comunicarte con nosotros a través de los siguientes canales', 'iquattro'); ?></h3>
      <div class="iq-contacto-cards">
        <div class="iq-contacto-card iq-contacto-card-tel">
          <span class="iq-contacto-card-icon iq-icon-phone" aria-hidden="true"></span>
          <h4 class="iq-contacto-card-title"><?php esc_html_e('Teléfonos', 'iquattro'); ?></h4>
          <p class="iq-contacto-card-content">
            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone1)); ?>"><?php echo esc_html($phone1); ?></a><br>
            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone2)); ?>"><?php echo esc_html($phone2); ?></a>
          </p>
        </div>
        <div class="iq-contacto-card iq-contacto-card-email">
          <span class="iq-contacto-card-icon iq-icon-email" aria-hidden="true"></span>
          <h4 class="iq-contacto-card-title"><?php esc_html_e('Correos electrónicos', 'iquattro'); ?></h4>
          <p class="iq-contacto-card-content">
            <a href="mailto:<?php echo esc_attr($email1); ?>"><?php echo esc_html($email1); ?></a><br>
            <a href="mailto:<?php echo esc_attr($email2); ?>"><?php echo esc_html($email2); ?></a>
          </p>
        </div>
        <div class="iq-contacto-card iq-contacto-card-horario">
          <span class="iq-contacto-card-icon iq-icon-phone" aria-hidden="true"></span>
          <h4 class="iq-contacto-card-title"><?php esc_html_e('Horario de atención', 'iquattro'); ?></h4>
          <p class="iq-contacto-card-content"><?php echo esc_html($horario); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
