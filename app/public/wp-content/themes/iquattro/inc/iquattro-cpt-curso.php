<?php
/**
 * Custom Post Type Curso y taxonomía Categoría de curso
 * Los cards del catálogo son posts tipo "curso"; Detalle Curso es single-curso.php
 *
 * @package iQuattro
 */

if (!defined('ABSPATH')) {
  exit;
}

function iquattro_register_curso_cpt() {
  register_post_type('curso', array(
    'labels' => array(
      'name' => __('Cursos', 'iquattro'),
      'singular_name' => __('Curso', 'iquattro'),
      'add_new' => __('Añadir curso', 'iquattro'),
      'add_new_item' => __('Añadir nuevo curso', 'iquattro'),
      'edit_item' => __('Editar curso', 'iquattro'),
      'new_item' => __('Nuevo curso', 'iquattro'),
      'view_item' => __('Ver curso', 'iquattro'),
      'search_items' => __('Buscar cursos', 'iquattro'),
      'not_found' => __('No se encontraron cursos', 'iquattro'),
      'not_found_in_trash' => __('No hay cursos en la papelera', 'iquattro'),
    ),
    'public' => true,
    'has_archive' => false,
    'rewrite' => array('slug' => 'curso'),
    'supports' => array('title', 'thumbnail'),
    'menu_icon' => 'dashicons-welcome-learn-more',
    'show_in_rest' => false,
  ));
}
add_action('init', 'iquattro_register_curso_cpt');

function iquattro_register_categoria_curso_taxonomy() {
  register_taxonomy('categoria_curso', 'curso', array(
    'labels' => array(
      'name' => __('Categorías de curso', 'iquattro'),
      'singular_name' => __('Categoría', 'iquattro'),
      'search_items' => __('Buscar categorías', 'iquattro'),
      'all_items' => __('Todas las categorías', 'iquattro'),
      'edit_item' => __('Editar categoría', 'iquattro'),
      'update_item' => __('Actualizar categoría', 'iquattro'),
      'add_new_item' => __('Añadir categoría', 'iquattro'),
    ),
    'hierarchical' => true,
    'rewrite' => array('slug' => 'categoria-curso'),
    'show_admin_column' => true,
  ));
}
add_action('init', 'iquattro_register_categoria_curso_taxonomy');

/** Colores por defecto para categorías (slug => color) */
function iquattro_curso_category_default_colors() {
  return array(
    'datos-ia' => '#2d5a3d',
    'seguridad' => '#D7263D',
    'desarrollo' => '#1e3a5f',
    'ofimatica' => '#47C281',
    'gestion' => '#7B4B94',
    'infraestructura' => '#60a5fa',
  );
}

/** Crear términos por defecto y guardar color en term meta */
function iquattro_curso_ensure_default_categories() {
  if (get_option('iquattro_curso_categories_seeded')) {
    return;
  }
  $defaults = array(
    'datos-ia' => array('name' => __('Datos e Inteligencia Artificial', 'iquattro'), 'color' => '#2d5a3d'),
    'seguridad' => array('name' => __('Seguridad de la Información', 'iquattro'), 'color' => '#D7263D'),
    'desarrollo' => array('name' => __('Desarrollo de Software', 'iquattro'), 'color' => '#1e3a5f'),
    'ofimatica' => array('name' => __('Ofimática', 'iquattro'), 'color' => '#47C281'),
    'gestion' => array('name' => __('Gestión y Estrategia', 'iquattro'), 'color' => '#7B4B94'),
    'infraestructura' => array('name' => __('Infraestructura y Cloud', 'iquattro'), 'color' => '#60a5fa'),
  );
  foreach ($defaults as $slug => $data) {
    if (!term_exists($slug, 'categoria_curso')) {
      $t = wp_insert_term($data['name'], 'categoria_curso', array('slug' => $slug));
      if (!is_wp_error($t) && isset($t['term_id'])) {
        update_term_meta($t['term_id'], 'color', $data['color']);
      }
    }
  }
  update_option('iquattro_curso_categories_seeded', 1);
}
add_action('init', 'iquattro_curso_ensure_default_categories', 20);

/** Formatear fecha YYYY-MM-DD para mostrar en cronograma (ej. "15 de mayo") */
function iquattro_curso_format_fecha($fecha) {
  if (empty($fecha)) return '';
  $ts = strtotime($fecha);
  if ($ts === false) return $fecha;
  return date_i18n(__('j \d\e F', 'iquattro'), $ts);
}

/** Obtener color de una categoría (término) */
function iquattro_curso_get_term_color($term) {
  if (is_object($term) && isset($term->term_id)) {
    $color = get_term_meta($term->term_id, 'color', true);
    return $color ? $color : '#47C281';
  }
  return '#47C281';
}

/** Meta boxes para Curso */
function iquattro_curso_add_meta_boxes() {
  add_meta_box('iquattro_curso_catalog', __('Card en catálogo', 'iquattro'), 'iquattro_curso_meta_box_catalog', 'curso', 'normal');
  add_meta_box('iquattro_curso_cronograma', __('Cronograma (si Programado=TRUE)', 'iquattro'), 'iquattro_curso_meta_box_cronograma', 'curso', 'normal');
  add_meta_box('iquattro_curso_detail', __('Detalle del curso (página Detalle Curso)', 'iquattro'), 'iquattro_curso_meta_box_detail', 'curso', 'normal');
  add_meta_box('iquattro_curso_contact', __('Sección contacto (Detalle Curso)', 'iquattro'), 'iquattro_curso_meta_box_contact', 'curso', 'normal');
}

function iquattro_curso_meta_box_cronograma($post) {
  $fecha = get_post_meta($post->ID, '_curso_fecha_inicio', true);
  $modalidad = get_post_meta($post->ID, '_curso_modalidad', true);
  $dias = get_post_meta($post->ID, '_curso_dias', true);
  $horarios = get_post_meta($post->ID, '_curso_horarios', true);
  ?>
  <p class="description"><?php esc_html_e('Estos campos se muestran en la página Cronograma cuando el curso tiene Programado=TRUE.', 'iquattro'); ?></p>
  <p><label><?php esc_html_e('Fecha de inicio (YYYY-MM-DD)', 'iquattro'); ?></label><br>
  <input type="date" name="curso_fecha_inicio" value="<?php echo esc_attr($fecha); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Modalidad', 'iquattro'); ?></label><br>
  <input type="text" name="curso_modalidad" value="<?php echo esc_attr($modalidad); ?>" class="widefat" placeholder="<?php esc_attr_e('ej. Virtual, Presencial', 'iquattro'); ?>"></p>
  <p><label><?php esc_html_e('Días', 'iquattro'); ?></label><br>
  <input type="text" name="curso_dias" value="<?php echo esc_attr($dias); ?>" class="widefat" placeholder="<?php esc_attr_e('ej. Lunes, miércoles y viernes', 'iquattro'); ?>"></p>
  <p><label><?php esc_html_e('Horarios', 'iquattro'); ?></label><br>
  <input type="text" name="curso_horarios" value="<?php echo esc_attr($horarios); ?>" class="widefat" placeholder="<?php esc_attr_e('ej. 19:00 a 22:00', 'iquattro'); ?>"></p>
  <?php
}

function iquattro_curso_meta_box_catalog($post) {
  wp_nonce_field('iquattro_curso_save', 'iquattro_curso_nonce');
  $desc = get_post_meta($post->ID, '_curso_desc', true);
  $icon = get_post_meta($post->ID, '_curso_icon', true);
  $programado = get_post_meta($post->ID, '_curso_programado', true);
  if ($icon === '') $icon = 'bulbo.svg';
  ?>
  <p><label><?php esc_html_e('Descripción corta (catálogo)', 'iquattro'); ?></label><br>
  <textarea name="curso_desc" class="widefat" rows="2"><?php echo esc_textarea($desc); ?></textarea></p>
  <p><label><?php esc_html_e('Icono (nombre en assets/icons/)', 'iquattro'); ?></label><br>
  <input type="text" name="curso_icon" value="<?php echo esc_attr($icon); ?>" class="widefat"></p>
  <p><label><input type="checkbox" name="curso_programado" value="1" <?php checked($programado, '1'); ?>>
  <?php esc_html_e('Programado (mostrar badge "Programado")', 'iquattro'); ?></label></p>
  <p class="description"><?php esc_html_e('Categorías: asignar en el panel derecho "Categorías de curso".', 'iquattro'); ?></p>
  <?php
}

function iquattro_curso_meta_box_detail($post) {
  $tecnologia = get_post_meta($post->ID, '_curso_tecnologia', true);
  $especialidad = get_post_meta($post->ID, '_curso_especialidad', true);
  $duracion = get_post_meta($post->ID, '_curso_duracion', true);
  $contenido = get_post_meta($post->ID, '_curso_contenido', true);
  $descripcion = get_post_meta($post->ID, '_curso_descripcion', true);
  $objetivo = get_post_meta($post->ID, '_curso_objetivo', true);
  $perfil = get_post_meta($post->ID, '_curso_perfil', true);
  $requisitos = get_post_meta($post->ID, '_curso_requisitos', true);
  $observaciones = get_post_meta($post->ID, '_curso_observaciones', true);
  ?>
  <p><label><?php esc_html_e('Tecnología', 'iquattro'); ?></label><br><input type="text" name="curso_tecnologia" value="<?php echo esc_attr($tecnologia); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Especialidad', 'iquattro'); ?></label><br><input type="text" name="curso_especialidad" value="<?php echo esc_attr($especialidad); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Duración', 'iquattro'); ?></label><br><input type="text" name="curso_duracion" value="<?php echo esc_attr($duracion); ?>" class="widefat" placeholder="ej. 20 Hrs."></p>
  <p><label><?php esc_html_e('Contenido (un tema por línea)', 'iquattro'); ?></label><br><textarea name="curso_contenido" class="widefat" rows="12"><?php echo esc_textarea($contenido); ?></textarea></p>
  <p><label><?php esc_html_e('Descripción (una viñeta por línea)', 'iquattro'); ?></label><br><textarea name="curso_descripcion" class="widefat" rows="6"><?php echo esc_textarea($descripcion); ?></textarea></p>
  <p><label><?php esc_html_e('Objetivo', 'iquattro'); ?></label><br><textarea name="curso_objetivo" class="widefat" rows="4"><?php echo esc_textarea($objetivo); ?></textarea></p>
  <p><label><?php esc_html_e('Perfil del participante (uno por línea)', 'iquattro'); ?></label><br><textarea name="curso_perfil" class="widefat" rows="4"><?php echo esc_textarea($perfil); ?></textarea></p>
  <p><label><?php esc_html_e('Requisitos de conocimiento', 'iquattro'); ?></label><br><textarea name="curso_requisitos" class="widefat" rows="2"><?php echo esc_textarea($requisitos); ?></textarea></p>
  <p><label><?php esc_html_e('Observaciones', 'iquattro'); ?></label><br><textarea name="curso_observaciones" class="widefat" rows="2"><?php echo esc_textarea($observaciones); ?></textarea></p>
  <?php
}

function iquattro_curso_meta_box_contact($post) {
  $cta_title = get_post_meta($post->ID, '_curso_contact_title', true);
  $cta_text = get_post_meta($post->ID, '_curso_contact_cta_text', true);
  if ($cta_title === '') $cta_title = __('Encuentra la formación adecuada para ti o tu equipo', 'iquattro');
  if ($cta_text === '') $cta_text = __('Cada proceso de capacitación tiene un objetivo distinto.', 'iquattro') . "\n" . __('Completa el formulario y te ayudaremos a evaluar si este curso es el indicado o a definir una ruta de aprendizaje más alineada a tus necesidades.', 'iquattro');
  ?>
  <p><label><?php esc_html_e('Título sección contacto', 'iquattro'); ?></label><br><input type="text" name="curso_contact_title" value="<?php echo esc_attr($cta_title); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA (costado del formulario)', 'iquattro'); ?></label><br><textarea name="curso_contact_cta_text" class="widefat" rows="4"><?php echo esc_textarea($cta_text); ?></textarea></p>
  <?php
}

function iquattro_curso_save_meta($post_id) {
  if (!isset($_POST['iquattro_curso_nonce']) || !wp_verify_nonce($_POST['iquattro_curso_nonce'], 'iquattro_curso_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (get_post_type($post_id) !== 'curso') return;

  $fields = array(
    'curso_desc' => '_curso_desc',
    'curso_icon' => '_curso_icon',
    'curso_fecha_inicio' => '_curso_fecha_inicio',
    'curso_modalidad' => '_curso_modalidad',
    'curso_dias' => '_curso_dias',
    'curso_horarios' => '_curso_horarios',
    'curso_tecnologia' => '_curso_tecnologia',
    'curso_especialidad' => '_curso_especialidad',
    'curso_duracion' => '_curso_duracion',
    'curso_contenido' => '_curso_contenido',
    'curso_descripcion' => '_curso_descripcion',
    'curso_objetivo' => '_curso_objetivo',
    'curso_perfil' => '_curso_perfil',
    'curso_requisitos' => '_curso_requisitos',
    'curso_observaciones' => '_curso_observaciones',
    'curso_contact_title' => '_curso_contact_title',
    'curso_contact_cta_text' => '_curso_contact_cta_text',
  );
  foreach ($fields as $input => $meta_key) {
    if (isset($_POST[$input])) {
      update_post_meta($post_id, $meta_key, sanitize_textarea_field($_POST[$input]));
    }
  }
  $programado = isset($_POST['curso_programado']) ? '1' : '0';
  update_post_meta($post_id, '_curso_programado', $programado);
}

/** Añadir campo color al editar/añadir término de categoria_curso */
function iquattro_curso_term_color_field_add($taxonomy) {
  ?>
  <div class="form-field">
    <label for="categoria_curso_color"><?php esc_html_e('Color (hex)', 'iquattro'); ?></label>
    <input type="text" name="categoria_curso_color" id="categoria_curso_color" value="#47C281">
  </div>
  <?php
}
function iquattro_curso_term_color_field_edit($term) {
  $color = get_term_meta($term->term_id, 'color', true) ?: '#47C281';
  ?>
  <tr class="form-field">
    <th><label for="categoria_curso_color"><?php esc_html_e('Color (hex)', 'iquattro'); ?></label></th>
    <td><input type="text" name="categoria_curso_color" id="categoria_curso_color" value="<?php echo esc_attr($color); ?>"></td>
  </tr>
  <?php
}
function iquattro_curso_save_term_color($term_id) {
  if (isset($_POST['categoria_curso_color'])) {
    update_term_meta($term_id, 'color', sanitize_hex_color($_POST['categoria_curso_color']) ?: '#47C281');
  }
}
add_action('categoria_curso_add_form_fields', 'iquattro_curso_term_color_field_add');
add_action('categoria_curso_edit_form_fields', 'iquattro_curso_term_color_field_edit');
add_action('created_categoria_curso', 'iquattro_curso_save_term_color');
add_action('edited_categoria_curso', 'iquattro_curso_save_term_color');

add_action('add_meta_boxes', 'iquattro_curso_add_meta_boxes');
add_action('save_post_curso', 'iquattro_curso_save_meta', 10, 1);
