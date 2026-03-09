<?php
/**
 * Plantilla Detalle Curso (single curso)
 * Mismo formato que Capacitación: topbar, fondo verde, footer.
 *
 * @package iQuattro
 */

get_header();

if (!have_posts()) {
  return;
}
the_post();

$pid = get_the_ID();
$titulo = get_the_title();
$tecnologia = get_post_meta($pid, '_curso_tecnologia', true);
$especialidad = get_post_meta($pid, '_curso_especialidad', true);
$duracion = get_post_meta($pid, '_curso_duracion', true);
$contenido_raw = get_post_meta($pid, '_curso_contenido', true);
$descripcion_raw = get_post_meta($pid, '_curso_descripcion', true);
$objetivo = get_post_meta($pid, '_curso_objetivo', true);
$perfil_raw = get_post_meta($pid, '_curso_perfil', true);
$requisitos = get_post_meta($pid, '_curso_requisitos', true);
$observaciones = get_post_meta($pid, '_curso_observaciones', true);
$contact_title = get_post_meta($pid, '_curso_contact_title', true);
$contact_cta = get_post_meta($pid, '_curso_contact_cta_text', true);

if ($contact_title === '') $contact_title = __('Encuentra la formación adecuada para ti o tu equipo', 'iquattro');
if ($contact_cta === '') $contact_cta = __('Cada proceso de capacitación tiene un objetivo distinto.', 'iquattro') . ' ' . __('Completa el formulario y te ayudaremos a evaluar si este curso es el indicado o a definir una ruta de aprendizaje más alineada a tus necesidades.', 'iquattro');

$contenido_items = $contenido_raw ? array_filter(array_map('trim', explode("\n", $contenido_raw))) : array();
$descripcion_items = $descripcion_raw ? array_filter(array_map('trim', explode("\n", $descripcion_raw))) : array();
$perfil_items = $perfil_raw ? array_filter(array_map('trim', explode("\n", $perfil_raw))) : array();

$terms = get_the_terms($pid, 'categoria_curso');
$categorias = is_array($terms) ? $terms : array();
?>
<main id="main" class="iq-main iq-curso-detail-page">
  <div class="iq-curso-detail-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>

    <div class="iq-curso-detail-content">
      <div class="iq-container iq-curso-detail-inner">
        <h1 class="iq-curso-detail-title"><?php echo esc_html($titulo); ?></h1>
        <?php if (!empty($categorias)) : ?>
          <div class="iq-curso-detail-pills">
            <?php foreach ($categorias as $term) :
              $color = iquattro_curso_get_term_color($term);
            ?>
              <span class="iq-curso-detail-pill" style="background-color:<?php echo esc_attr($color); ?>"><?php echo esc_html($term->name); ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="iq-curso-detail-cards">
          <div class="iq-curso-info-card">
            <strong><?php esc_html_e('Tecnología', 'iquattro'); ?></strong>
            <span><?php echo $tecnologia !== '' ? esc_html($tecnologia) : '—'; ?></span>
          </div>
          <div class="iq-curso-info-card">
            <strong><?php esc_html_e('Especialidad', 'iquattro'); ?></strong>
            <span><?php echo $especialidad !== '' ? esc_html($especialidad) : '—'; ?></span>
          </div>
          <div class="iq-curso-info-card">
            <strong><?php esc_html_e('Duración', 'iquattro'); ?></strong>
            <span><?php echo $duracion !== '' ? esc_html($duracion) : '—'; ?></span>
          </div>
        </div>

        <div class="iq-curso-detail-grid">
          <?php if (!empty($contenido_items)) : ?>
            <section class="iq-curso-detail-section">
              <h2 class="iq-curso-detail-section-title"><?php esc_html_e('Contenido', 'iquattro'); ?></h2>
              <ul class="iq-curso-detail-list">
                <?php foreach ($contenido_items as $item) : ?>
                  <li><?php echo esc_html($item); ?></li>
                <?php endforeach; ?>
              </ul>
            </section>
          <?php endif; ?>
          <?php if (!empty($descripcion_items)) : ?>
            <section class="iq-curso-detail-section">
              <h2 class="iq-curso-detail-section-title"><?php esc_html_e('Descripción', 'iquattro'); ?></h2>
              <ul class="iq-curso-detail-list">
                <?php foreach ($descripcion_items as $item) : ?>
                  <li><?php echo esc_html($item); ?></li>
                <?php endforeach; ?>
              </ul>
            </section>
          <?php endif; ?>
        </div>

        <?php if ($objetivo !== '') : ?>
          <section class="iq-curso-detail-section iq-curso-detail-full">
            <h2 class="iq-curso-detail-section-title"><?php esc_html_e('Objetivo', 'iquattro'); ?></h2>
            <p class="iq-curso-detail-text"><?php echo esc_html($objetivo); ?></p>
          </section>
        <?php endif; ?>

        <?php if (!empty($perfil_items)) : ?>
          <section class="iq-curso-detail-section iq-curso-detail-full">
            <h2 class="iq-curso-detail-section-title"><?php esc_html_e('Perfil del participante', 'iquattro'); ?></h2>
            <ul class="iq-curso-detail-list">
              <?php foreach ($perfil_items as $item) : ?>
                <li><?php echo esc_html($item); ?></li>
              <?php endforeach; ?>
            </ul>
          </section>
        <?php endif; ?>

        <section class="iq-curso-detail-section iq-curso-detail-full">
          <h2 class="iq-curso-detail-section-title"><?php esc_html_e('Requisitos de conocimiento', 'iquattro'); ?></h2>
          <p class="iq-curso-detail-text"><?php echo $requisitos !== '' ? esc_html($requisitos) : '—'; ?></p>
        </section>

        <section class="iq-curso-detail-section iq-curso-detail-full">
          <h2 class="iq-curso-detail-section-title"><?php esc_html_e('Observaciones', 'iquattro'); ?></h2>
          <p class="iq-curso-detail-text"><?php echo $observaciones !== '' ? esc_html($observaciones) : '—'; ?></p>
        </section>

        <section class="iq-curso-detail-contact">
          <h2 class="iq-curso-detail-section-title"><?php echo esc_html($contact_title); ?></h2>
          <div class="iq-curso-detail-contact-grid">
            <div class="iq-curso-detail-form-wrap">
              <form id="iq-curso-contact-form" class="iq-contact-form" method="post" novalidate>
                <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
                <p class="iq-form-field">
                  <label for="iq-curso-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
                  <input type="text" id="iq-curso-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
                </p>
                <p class="iq-form-row">
                  <span class="iq-form-field">
                    <label for="iq-curso-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                    <input type="email" id="iq-curso-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
                  </span>
                  <span class="iq-form-field">
                    <label for="iq-curso-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                    <input type="tel" id="iq-curso-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
                  </span>
                </p>
                <p class="iq-form-field">
                  <label for="iq-curso-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
                  <input type="text" id="iq-curso-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
                </p>
                <p class="iq-form-field">
                  <label for="iq-curso-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
                  <textarea id="iq-curso-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
                </p>
                <p class="iq-form-actions">
                  <button type="submit" class="iq-btn iq-btn-curso-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
                </p>
                <p class="iq-form-message" id="iq-curso-form-message" aria-live="polite"></p>
              </form>
            </div>
            <div class="iq-curso-detail-cta">
              <p><?php echo esc_html($contact_cta); ?></p>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>
