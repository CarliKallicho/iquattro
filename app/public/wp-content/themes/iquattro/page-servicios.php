<?php
/**
 * Plantilla página Servicios
 *
 * @package iQuattro
 */

get_header();

$images_uri = get_template_directory_uri() . '/assets/images/';
?>
<main id="main" class="iq-main iq-servicios-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-servicios-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-servicio.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-servicios-hero-title"><?php esc_html_e('Servicios tecnológicos para asegurar la continuidad de tu operación', 'iquattro'); ?></h1>
      <p class="iq-servicios-hero-desc"><?php esc_html_e('A través de nuestra división de Servicios, en iQuattro entregamos soporte técnico especializado y servicios de acompañamiento de calidad, adaptados a las necesidades de cada cliente y respaldados por experiencia, certificaciones y conocimiento profundo de las tecnologías que representamos.', 'iquattro'); ?></p>
      <p class="iq-servicios-hero-actions">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php esc_html_e('Solicitar soporte', 'iquattro'); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-servicios-que-hacemos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Qué hacemos', 'iquattro'); ?></h2>
      <div class="iq-que-hacemos-grid">
        <div class="iq-que-hacemos-texto">
          <h3 class="iq-que-hacemos-subtitle"><?php esc_html_e('Soporte, calidad y acompañamiento tecnológico', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Nuestros servicios están diseñados para mantener, optimizar y asegurar el correcto funcionamiento de las soluciones tecnológicas de nuestros clientes, reduciendo riesgos operativos y maximizando el valor de su inversión tecnológica.', 'iquattro'); ?></p>
        </div>
        <div class="iq-que-hacemos-cajas">
          <div class="iq-que-hacemos-caja"><?php esc_html_e('Soporte técnico especializado', 'iquattro'); ?></div>
          <div class="iq-que-hacemos-caja"><?php esc_html_e('Quality Assurance y Testing', 'iquattro'); ?></div>
          <div class="iq-que-hacemos-caja"><?php esc_html_e('Acompañamiento continuo', 'iquattro'); ?></div>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-especializados">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Servicios especializados', 'iquattro'); ?></h2>
      <div class="iq-servicios-cards">
        <div class="iq-servicio-card">
          <div class="iq-servicio-card-icon iq-servicio-icon-microsoft" aria-hidden="true"></div>
          <h3 class="iq-servicio-card-title"><?php esc_html_e('Microsoft', 'iquattro'); ?></h3>
          <div class="iq-servicio-pills">
            <span class="iq-servicio-pill"><?php esc_html_e('Exchange Server', 'iquattro'); ?></span>
            <span class="iq-servicio-pill"><?php esc_html_e('Skype for Business', 'iquattro'); ?></span>
            <span class="iq-servicio-pill"><?php esc_html_e('Microsoft 365', 'iquattro'); ?></span>
            <span class="iq-servicio-pill"><?php esc_html_e('AZURE', 'iquattro'); ?></span>
            <span class="iq-servicio-pill"><?php esc_html_e('Active Directory', 'iquattro'); ?></span>
          </div>
          <p class="iq-servicio-card-desc"><?php esc_html_e('Diseñados para asegurar disponibilidad, seguridad y rendimiento de los entornos Microsoft.', 'iquattro'); ?></p>
        </div>
        <div class="iq-servicio-card">
          <div class="iq-servicio-card-icon iq-servicio-icon-almacenamiento" aria-hidden="true"></div>
          <h3 class="iq-servicio-card-title"><?php esc_html_e('Almacenamiento', 'iquattro'); ?></h3>
          <div class="iq-servicio-pills">
            <span class="iq-servicio-pill"><?php esc_html_e('Veeam', 'iquattro'); ?></span>
            <span class="iq-servicio-pill"><?php esc_html_e('Commvault', 'iquattro'); ?></span>
            <span class="iq-servicio-pill"><?php esc_html_e('NetVault', 'iquattro'); ?></span>
          </div>
          <p class="iq-servicio-card-desc"><?php esc_html_e('Orientados al respaldo, recuperación y continuidad del negocio.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-servicios-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Asegura el funcionamiento de tu tecnología con expertos', 'iquattro'); ?></h2>
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
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-serv-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-servicios-cta-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-servicios-costado.jpg'); ?>');">
          <p><?php esc_html_e('Deja tu operación tecnológica en manos de un equipo especializado y enfocado en resultados.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
