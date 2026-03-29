<?php
/**
 * Plantilla Cronograma
 * Muestra cursos con Programado=TRUE ordenados por fecha de inicio.
 * Topbar y footer como el resto de páginas.
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);

$query = new WP_Query(array(
  'post_type'      => 'curso',
  'posts_per_page' => -1,
  'post_status'    => 'publish',
  'meta_query'     => array(
    array('key' => '_curso_programado', 'value' => '1', 'compare' => '='),
  ),
));

$cursos = array();
if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();
    $pid = get_the_ID();
    $fecha = get_post_meta($pid, '_curso_fecha_inicio', true);
    $cursos[] = array(
      'id'       => $pid,
      'titulo'   => get_the_title(),
      'url'      => get_permalink(),
      'icon'     => get_post_meta($pid, '_curso_icon', true) ?: 'bulbo.svg',
      'fecha'    => $fecha,
      'modalidad'=> get_post_meta($pid, '_curso_modalidad', true),
      'duracion' => get_post_meta($pid, '_curso_duracion', true),
      'dias'     => get_post_meta($pid, '_curso_dias', true),
      'horarios' => get_post_meta($pid, '_curso_horarios', true),
      'terms'    => get_the_terms($pid, 'categoria_curso'),
    );
  }
  wp_reset_postdata();
}

// Ordenar por fecha (más cercana primero); sin fecha al final
usort($cursos, function ($a, $b) {
  $fa = $a['fecha'] ? strtotime($a['fecha']) : PHP_INT_MAX;
  $fb = $b['fecha'] ? strtotime($b['fecha']) : PHP_INT_MAX;
  return $fa - $fb;
});

$icons_uri = get_template_directory_uri() . '/assets/icons/';
?>

<main id="main" class="iq-main iq-cronograma-page">
  <div class="iq-cronograma-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <div class="iq-container iq-cronograma-inner">
      <h1 class="iq-cronograma-title"><?php echo esc_html($data['page_title']); ?></h1>
      <div class="iq-cronograma-cards">
        <?php foreach ($cursos as $c) :
          $terms = is_array($c['terms']) ? $c['terms'] : array();
          $colors = array();
          foreach ($terms as $t) {
            $colors[] = iquattro_curso_get_term_color($t);
          }
          $bg_style = count($colors) === 2
            ? 'background: linear-gradient(90deg, ' . esc_attr($colors[0]) . ', ' . esc_attr($colors[1]) . ');'
            : (count($colors) === 1 ? 'background-color: ' . esc_attr($colors[0]) . ';' : 'background-color: #47C281;');
          $accent_color = !empty($colors[0]) ? $colors[0] : '#47C281';
          $fecha_display = $c['fecha'] ? iquattro_curso_format_fecha($c['fecha']) : '—';
        ?>
          <article class="iq-cronograma-card" style="<?php echo $bg_style; ?> --iq-cronograma-accent: <?php echo esc_attr($accent_color); ?>;">
            <div class="iq-cronograma-card-inner">
              <div class="iq-cronograma-card-icon-wrap">
                <img src="<?php echo esc_url($icons_uri . $c['icon']); ?>" alt="" class="iq-cronograma-card-icon" loading="lazy" width="198" height="198">
              </div>
              <div class="iq-cronograma-card-main">
                <div class="iq-cronograma-card-body">
                <h2 class="iq-cronograma-card-title"><?php echo esc_html($c['titulo']); ?></h2>
                <div class="iq-cronograma-pills">
                  <div class="iq-cronograma-pills-row iq-cronograma-pills-row--top">
                    <span class="iq-cronograma-pill">
                      <span class="iq-cronograma-pill-label"><?php esc_html_e('Fecha de Inicio:', 'iquattro'); ?></span>
                      <span class="iq-cronograma-pill-value"><?php echo esc_html($fecha_display); ?></span>
                    </span>
                    <span class="iq-cronograma-pill">
                      <span class="iq-cronograma-pill-label"><?php esc_html_e('Modalidad:', 'iquattro'); ?></span>
                      <span class="iq-cronograma-pill-value"><?php echo esc_html($c['modalidad'] ?: '—'); ?></span>
                    </span>
                    <span class="iq-cronograma-pill">
                      <span class="iq-cronograma-pill-label"><?php esc_html_e('Duración:', 'iquattro'); ?></span>
                      <span class="iq-cronograma-pill-value"><?php echo esc_html($c['duracion'] ?: '—'); ?></span>
                    </span>
                  </div>
                  <div class="iq-cronograma-pills-row iq-cronograma-pills-row--bottom">
                    <span class="iq-cronograma-pill">
                      <span class="iq-cronograma-pill-label"><?php esc_html_e('Días:', 'iquattro'); ?></span>
                      <span class="iq-cronograma-pill-value"><?php echo esc_html($c['dias'] ?: '—'); ?></span>
                    </span>
                    <span class="iq-cronograma-pill">
                      <span class="iq-cronograma-pill-label"><?php esc_html_e('Horarios:', 'iquattro'); ?></span>
                      <span class="iq-cronograma-pill-value"><?php echo esc_html($c['horarios'] ?: '—'); ?></span>
                    </span>
                  </div>
                </div>
                </div>
                <div class="iq-cronograma-card-actions">
                  <a href="<?php echo esc_url($c['url']); ?>" class="iq-cronograma-btn iq-cronograma-btn-ghost"><?php esc_html_e('Ver Contenido', 'iquattro'); ?></a>
                  <button type="button" class="iq-cronograma-btn iq-cronograma-btn-ghost iq-inscribirme-btn" data-curso-id="<?php echo (int) $c['id']; ?>" data-curso-titulo="<?php echo esc_attr($c['titulo']); ?>"><?php esc_html_e('Inscribirme', 'iquattro'); ?></button>
                </div>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
      <?php if (empty($cursos)) : ?>
        <p class="iq-cronograma-empty"><?php echo esc_html($data['empty_message']); ?></p>
      <?php endif; ?>
    </div>
  </div>
</main>

<!-- Modal Inscribirme -->
<div id="iq-inscribirme-modal" class="iq-modal" role="dialog" aria-modal="true" aria-labelledby="iq-inscribirme-modal-title" hidden>
  <div class="iq-modal-backdrop" data-close-modal></div>
  <div class="iq-modal-dialog">
    <div class="iq-modal-header">
      <h2 id="iq-inscribirme-modal-title" class="iq-modal-title"><?php esc_html_e('Reserva tu lugar en este curso', 'iquattro'); ?></h2>
      <button type="button" class="iq-modal-close" aria-label="<?php esc_attr_e('Cerrar', 'iquattro'); ?>" data-close-modal>&times;</button>
    </div>
    <div class="iq-modal-body">
      <form id="iq-inscribirme-form" class="iq-inscribirme-form" method="post" novalidate>
        <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
        <input type="hidden" name="iq_form_origin" value="cronograma">
        <input type="hidden" name="curso_id" id="iq-inscribirme-curso-id" value="">
        <p class="iq-form-field">
          <label for="iq-inscribirme-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
          <input type="text" id="iq-inscribirme-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
        </p>
        <p class="iq-form-row">
          <span class="iq-form-field">
            <label for="iq-inscribirme-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
            <input type="email" id="iq-inscribirme-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
          </span>
          <span class="iq-form-field">
            <label for="iq-inscribirme-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
            <input type="tel" id="iq-inscribirme-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
          </span>
        </p>
        <p class="iq-form-field">
          <label for="iq-inscribirme-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
          <input type="text" id="iq-inscribirme-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
        </p>
        <p class="iq-form-field">
          <label for="iq-inscribirme-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
          <textarea id="iq-inscribirme-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
        </p>
        <p class="iq-form-actions">
          <button type="submit" class="iq-btn iq-btn-curso-enviar"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
        </p>
        <p class="iq-form-message" id="iq-inscribirme-form-message" aria-live="polite"></p>
      </form>
    </div>
  </div>
</div>

<script>
(function() {
  var modal = document.getElementById('iq-inscribirme-modal');
  var btns = document.querySelectorAll('.iq-inscribirme-btn');
  var closeTriggers = document.querySelectorAll('[data-close-modal]');
  var form = document.getElementById('iq-inscribirme-form');
  var cursoIdInput = document.getElementById('iq-inscribirme-curso-id');
  var messageEl = document.getElementById('iq-inscribirme-form-message');

  function openModal(cursoId, cursoTitulo) {
    if (cursoIdInput) cursoIdInput.value = cursoId || '';
    modal.removeAttribute('hidden');
    document.body.style.overflow = 'hidden';
  }
  function closeModal() {
    modal.setAttribute('hidden', '');
    document.body.style.overflow = '';
  }

  btns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      openModal(this.getAttribute('data-curso-id'), this.getAttribute('data-curso-titulo'));
    });
  });
  closeTriggers.forEach(function(el) {
    el.addEventListener('click', closeModal);
  });
  modal.addEventListener('click', function(e) {
    if (e.target === modal) closeModal();
  });
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && !modal.hasAttribute('hidden')) closeModal();
  });

  if (form && typeof jQuery !== 'undefined') {
    jQuery(form).on('submit', function(e) {
      e.preventDefault();
      var $form = jQuery(this);
      var $msg = jQuery(messageEl);
      var $submit = $form.find('button[type="submit"]');
      function showMsg(t, err) { $msg.removeClass('iq-success iq-error').addClass(err ? 'iq-error' : 'iq-success').text(t); }
      function setLoading(l) { $submit.prop('disabled', l); }
      if (typeof iquattroData === 'undefined' || !iquattroData.ajaxUrl) {
        showMsg('Configuración no disponible.', true);
        return;
      }
      setLoading(true);
      showMsg('');
      jQuery.post(iquattroData.ajaxUrl, {
        action: 'iquattro_contact',
        nonce: $form.find('[name="iq_contact_nonce"]').val(),
        nombre: $form.find('[name="nombre"]').val(),
        email: $form.find('[name="email"]').val(),
        telefono: $form.find('[name="telefono"]').val(),
        empresa: $form.find('[name="empresa"]').val(),
        mensaje: $form.find('[name="mensaje"]').val(),
        form_origin: $form.find('[name="iq_form_origin"]').val() || '',
        curso_id: $form.find('[name="curso_id"]').val() || ''
      }).done(function(r) {
        if (r.success && r.data && r.data.message) {
          showMsg(r.data.message, false);
          form.reset();
          if (cursoIdInput) cursoIdInput.value = '';
        } else {
          showMsg((r.data && r.data.message) ? r.data.message : 'Error al enviar.', true);
        }
      }).fail(function() {
        showMsg('Error de conexión.', true);
      }).always(function() {
        setLoading(false);
      });
    });
  }
})();
</script>

<?php get_footer(); ?>
