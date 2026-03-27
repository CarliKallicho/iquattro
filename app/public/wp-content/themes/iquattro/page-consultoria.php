<?php
/**
 * Plantilla página Consultoría
 *
 * @package iQuattro
 */

get_header();

$images_uri = get_template_directory_uri() . '/assets/images/';
?>
<main id="main" class="iq-main iq-consultoria-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-consultoria-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-consultoria.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-consultoria-hero-title"><?php esc_html_e('Consultoría tecnológica para decisiones estratégicas', 'iquattro'); ?></h1>
      <p class="iq-consultoria-hero-desc"><?php esc_html_e('Acompañamos a las organizaciones en sus procesos de transformación digital mediante consultoría especializada que integra negocio, tecnología y ejecución, respaldada por más de 20 años de experiencia en múltiples industrias.', 'iquattro'); ?></p>
      <p class="iq-consultoria-hero-actions">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php esc_html_e('Solicitar asesoría', 'iquattro'); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-consultoria-pensamos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Pensamos la tecnología desde el negocio', 'iquattro'); ?></h2>
      <p class="iq-consultoria-intro"><?php esc_html_e('En iQuattro analizamos los contextos organizacionales desde una mirada estratégica hasta el detalle técnico, identificando oportunidades reales de mejora, eficiencia y crecimiento sostenible.', 'iquattro'); ?></p>
      <h3 class="iq-consultoria-subtitle"><?php esc_html_e('Nuestra consultoría está orientada a:', 'iquattro'); ?></h3>
      <div class="iq-consultoria-soluciones">
        <div class="iq-consultoria-solucion"><?php esc_html_e('Transformación digital', 'iquattro'); ?></div>
        <div class="iq-consultoria-solucion"><?php esc_html_e('Optimización de procesos', 'iquattro'); ?></div>
        <div class="iq-consultoria-solucion"><?php esc_html_e('Alineación entre tecnología y objetivos del negocio', 'iquattro'); ?></div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-consultoria-expertos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Expertos que marcan la diferencia', 'iquattro'); ?></h2>
      <p class="iq-consultoria-intro"><?php esc_html_e('Todos nuestros servicios están orientados a que la experiencia de nuestros clientes sea relevante y satisfactoria. Contamos con un equipo de profesionales de primer nivel, con amplia experiencia en distintos rubros del mercado nacional y regional, respaldados por certificaciones que avalan la calidad de los resultados que entregamos.', 'iquattro'); ?></p>
      <h3 class="iq-consultoria-subtitle"><?php esc_html_e('Diferenciales:', 'iquattro'); ?></h3>
      <div class="iq-consultoria-diferenciales">
        <div class="iq-consultoria-diferencial"><?php esc_html_e('Más de 20 años de experiencia acumulada', 'iquattro'); ?></div>
        <div class="iq-consultoria-diferencial"><?php esc_html_e('Certificaciones Internacionales', 'iquattro'); ?></div>
        <div class="iq-consultoria-diferencial"><?php esc_html_e('Visión estratégica y técnica integrada', 'iquattro'); ?></div>
        <div class="iq-consultoria-diferencial"><?php esc_html_e('Experiencia multisectorial', 'iquattro'); ?></div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-consultoria-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Toma decisiones tecnológicas con respaldo experto', 'iquattro'); ?></h2>
      <div class="iq-consultoria-contact-grid">
        <div class="iq-consultoria-form-wrap">
          <form id="iq-consultoria-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <p class="iq-form-field">
              <label for="iq-cons-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-cons-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-cons-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-cons-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-cons-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-cons-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-cons-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-cons-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-cons-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-cons-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary iq-btn-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-cons-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-consultoria-cta-imagen" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-consultoria-costado.jpg'); ?>');">
          <p><?php esc_html_e('Conversemos sobre los desafíos de tu organización y diseñemos juntos una estrategia tecnológica alineada a tus objetivos.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
