<?php
/**
 * Plantilla página Consultoría
 * Contenido editable desde WordPress (Páginas → Editar).
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);

$images_uri = get_template_directory_uri() . '/assets/images/';

$pensamos_soluciones = isset($data['pensamos_soluciones']) ? array_filter(array_map('trim', explode("\n", $data['pensamos_soluciones']))) : array();
$expertos_diferenciales = isset($data['expertos_diferenciales']) ? array_filter(array_map('trim', explode("\n", $data['expertos_diferenciales']))) : array();
?>
<main id="main" class="iq-main iq-consultoria-page">
  <div class="iq-page-hero-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <section class="iq-consultoria-hero" style="background-image: url('<?php echo esc_url($images_uri . 'fondo-consultoria.jpg'); ?>');">
    <div class="iq-container">
      <h1 class="iq-consultoria-hero-title"><?php echo esc_html($data['hero_title']); ?></h1>
      <p class="iq-consultoria-hero-desc"><?php echo esc_html($data['hero_desc']); ?></p>
      <p class="iq-consultoria-hero-actions">
        <a href="<?php echo esc_url(get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/')); ?>" class="iq-btn iq-btn-dark"><?php echo esc_html($data['hero_btn']); ?></a>
      </p>
    </div>
  </section>
  </div>

  <section class="iq-section iq-consultoria-pensamos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['pensamos_title']); ?></h2>
      <p class="iq-consultoria-intro"><?php echo esc_html($data['pensamos_intro']); ?></p>
      <h3 class="iq-consultoria-subtitle"><?php echo esc_html($data['pensamos_subtitle']); ?></h3>
      <div class="iq-consultoria-soluciones">
        <?php foreach ($pensamos_soluciones as $sol) : ?>
          <div class="iq-consultoria-solucion"><?php echo esc_html($sol); ?></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-consultoria-expertos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['expertos_title']); ?></h2>
      <p class="iq-consultoria-intro"><?php echo esc_html($data['expertos_intro']); ?></p>
      <h3 class="iq-consultoria-subtitle"><?php echo esc_html($data['expertos_subtitle']); ?></h3>
      <div class="iq-consultoria-diferenciales">
        <?php foreach ($expertos_diferenciales as $dif) : ?>
          <div class="iq-consultoria-diferencial"><?php echo esc_html($dif); ?></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="iq-section iq-consultoria-contact-section">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php echo esc_html($data['contact_title']); ?></h2>
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
          <p><?php echo esc_html($data['contact_cta_text']); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
