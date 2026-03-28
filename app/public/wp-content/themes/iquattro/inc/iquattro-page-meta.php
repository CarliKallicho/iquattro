<?php
/**
 * Meta boxes y datos editables para todas las páginas del sitio
 * (excepto Data Center Hardware/Software/Servicios que usan iquattro-dc-catalogo-meta.php)
 *
 * @package iQuattro
 */

if (!defined('ABSPATH')) {
  exit;
}

function iquattro_editable_page_slugs() {
  return array(
    'data-center',
    'seguridad',
    'consultoria',
    'servicios',
    'acerca-de',
    'contacto',
    'capacitacion',
    'catalogo-cursos',
    'evento',
    'cronograma',
  );
}

/**
 * Página de inicio estática: editable aunque su slug no esté en la lista.
 */
function iquattro_is_page_editable($post) {
  if (!$post || $post->post_type !== 'page') {
    return false;
  }
  $front_id = (int) get_option('page_on_front');
  if ($front_id && (int) $post->ID === $front_id) {
    return true;
  }
  return in_array($post->post_name, iquattro_editable_page_slugs(), true);
}

/**
 * Slug lógico para defaults, repeaters y meta boxes (front-page para la portada).
 */
function iquattro_get_page_meta_slug($post) {
  if (!$post) {
    return '';
  }
  $front_id = (int) get_option('page_on_front');
  if ($front_id && (int) $post->ID === $front_id) {
    return 'front-page';
  }
  return $post->post_name;
}

function iquattro_get_page_defaults_for_post($post) {
  if (!$post) {
    return array();
  }
  $meta_slug = iquattro_get_page_meta_slug($post);
  $path = get_template_directory() . '/inc/page-defaults/' . $meta_slug . '.php';
  if (file_exists($path)) {
    $defaults = include $path;
    return is_array($defaults) ? $defaults : array();
  }
  return array();
}

/**
 * Por slug de página (p.ej. cuando aún no hay post).
 *
 * @param string $slug Slug de página o 'front-page'.
 */
function iquattro_get_page_defaults($slug) {
  $page = get_page_by_path($slug);
  if ($page) {
    return iquattro_get_page_defaults_for_post($page);
  }
  $path = get_template_directory() . '/inc/page-defaults/' . $slug . '.php';
  if (file_exists($path)) {
    $defaults = include $path;
    return is_array($defaults) ? $defaults : array();
  }
  return array();
}

/**
 * Campos de texto que guardan HTML (wp_kses_post) por meta slug.
 */
function iquattro_page_meta_html_field_keys($meta_slug) {
  $map = array(
    'acerca-de' => array('mision_content', 'vision_content'),
    'front-page' => array('feature1_text', 'feature2_text', 'feature3_text'),
    'data-center' => array('infra_intro', 'servicios_intro'),
    'seguridad' => array('que_protegemos_intro', 'monitoreo_intro'),
    'capacitacion' => array('partner_text', 'catalogo_section_text', 'cronograma_text', 'contact_cta_text'),
  );
  $keys = isset($map[ $meta_slug ]) ? $map[ $meta_slug ] : array();
  return apply_filters('iquattro_page_meta_html_field_keys', $keys, $meta_slug);
}

/**
 * Campos escalares que guardan ID de adjunto (0 = usar imagen por defecto del tema).
 */
function iquattro_page_meta_attachment_field_keys($meta_slug) {
  $map = array(
    'servicios' => array('hero_bg_id', 'cta_side_bg_id'),
    'seguridad' => array('hero_bg_id', 'contact_side_bg_id'),
    'data-center' => array('hero_bg_id', 'contact_side_bg_id'),
    'consultoria' => array('hero_bg_id', 'contact_side_bg_id'),
    'contacto' => array('banner_bg_id', 'contact_side_bg_id'),
    'front-page' => array('trust_z_img_id', 'trust_y_img_id'),
    'capacitacion' => array('catalogo_section_bg_id', 'partner_logo_id'),
  );
  $keys = isset($map[ $meta_slug ]) ? $map[ $meta_slug ] : array();
  return apply_filters('iquattro_page_meta_attachment_field_keys', $keys, $meta_slug);
}

/**
 * URL de adjunto o URL de respaldo (tema o externa).
 */
function iquattro_meta_image_url($attachment_id, $fallback_url) {
  $id = (int) $attachment_id;
  if ($id > 0) {
    $url = wp_get_attachment_image_url($id, 'full');
    if ($url) {
      return $url;
    }
  }
  return $fallback_url;
}

/**
 * Icono por nombre de archivo en assets/icons/ o imagen subida (ID).
 */
function iquattro_page_icon_or_attachment_url($icon_file, $icon_id, $icons_base_uri) {
  $id = (int) $icon_id;
  if ($id > 0) {
    $u = wp_get_attachment_image_url($id, 'full');
    if ($u) {
      return $u;
    }
  }
  return $icons_base_uri . ltrim((string) $icon_file, '/');
}

/**
 * Campo de medios en meta box (requiere wp_enqueue_media + script .iq-select-image).
 */
function iquattro_page_meta_render_attachment_field($input_name, $label, $attachment_id) {
  $id = (int) $attachment_id;
  $field_id = 'iqatt_' . md5($input_name);
  $preview = $id ? wp_get_attachment_image($id, 'medium', false, array('style' => 'max-width:200px;height:auto;display:block;margin-top:8px;')) : '';
  ?>
  <p class="iq-attachment-field">
    <span class="description"><?php echo esc_html($label); ?></span><br>
    <input type="hidden" name="<?php echo esc_attr($input_name); ?>" id="<?php echo esc_attr($field_id); ?>" value="<?php echo esc_attr($id ); ?>">
    <button type="button" class="button iq-select-image" data-target="<?php echo esc_attr($field_id); ?>" data-preview="<?php echo esc_attr($field_id); ?>_preview"><?php esc_html_e('Elegir imagen', 'iquattro'); ?></button>
    <button type="button" class="button iq-remove-image" data-target="<?php echo esc_attr($field_id); ?>" data-preview="<?php echo esc_attr($field_id); ?>_preview" style="<?php echo $id ? '' : 'display:none;'; ?>"><?php esc_html_e('Quitar', 'iquattro'); ?></button>
    <span id="<?php echo esc_attr($field_id); ?>_preview"><?php echo $preview; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
  </p>
  <?php
}

function iquattro_get_editable_page_data($post) {
  if (!$post || !iquattro_is_page_editable($post)) {
    return array();
  }
  $meta_slug = iquattro_get_page_meta_slug($post);
  $defaults = iquattro_get_page_defaults_for_post($post);
  $pid = $post->ID;
  $data = array();
  $attachment_keys = iquattro_page_meta_attachment_field_keys($meta_slug);

  foreach ($defaults as $key => $default_value) {
    $meta_key = '_iq_page_' . $key;
    $stored = get_post_meta($pid, $meta_key, true);
    if (is_array($default_value) && isset($default_value[0]) && is_array($default_value[0])) {
      if ($stored !== '' && $stored !== false) {
        $decoded = json_decode($stored, true);
        $data[ $key ] = is_array($decoded) ? $decoded : $default_value;
      } else {
        $data[ $key ] = $default_value;
      }
    } else {
      if (in_array($key, $attachment_keys, true)) {
        $data[ $key ] = ($stored !== '' && $stored !== false) ? (int) $stored : (int) $default_value;
      } else {
        $data[ $key ] = ($stored !== '' && $stored !== false) ? $stored : $default_value;
      }
    }
  }

  $repeaters_path = get_template_directory() . '/inc/page-defaults/' . $meta_slug . '-repeaters.php';
  if (file_exists($repeaters_path)) {
    $repeaters = include $repeaters_path;
    if (is_array($repeaters)) {
      foreach (array_keys($repeaters) as $rep_key) {
        $stored = get_post_meta($pid, '_iq_page_' . $rep_key, true);
        if ($stored !== '' && $stored !== false) {
          $decoded = json_decode($stored, true);
          $data[ $rep_key ] = is_array($decoded) ? $decoded : (isset($defaults[ $rep_key ]) ? $defaults[ $rep_key ] : array());
        } elseif (isset($defaults[ $rep_key ])) {
          $data[ $rep_key ] = $defaults[ $rep_key ];
        } else {
          $data[ $rep_key ] = array();
        }
      }
    }
  }
  return $data;
}

/**
 * En el editor de bloques, el nonce debe estar en el formulario base (.metabox-base-form)
 * para que siempre viaje en el POST que guarda los meta boxes (wp-includes/js/dist/edit-post.js).
 */
function iquattro_page_meta_nonce_in_base_form($post) {
  if (!$post || !iquattro_is_page_editable($post)) {
    return;
  }
  wp_nonce_field('iquattro_page_meta_save', 'iquattro_page_meta_nonce');
}

function iquattro_page_meta_add_meta_boxes() {
  global $post;
  if (!$post || !iquattro_is_page_editable($post)) {
    return;
  }

  add_meta_box(
    'iquattro_page_content',
    __('Contenido de la página', 'iquattro'),
    'iquattro_page_meta_box_callback',
    'page',
    'normal',
    'high'
  );
}

function iquattro_page_meta_box_callback($post) {
  $meta_slug = iquattro_get_page_meta_slug($post);
  $data = iquattro_get_editable_page_data($post);

  $path = get_template_directory() . '/inc/page-meta-boxes/' . $meta_slug . '.php';
  if (file_exists($path)) {
    include $path;
    return;
  }
  echo '<p>' . esc_html__('No hay campos editables definidos para esta página.', 'iquattro') . '</p>';
}

function iquattro_page_meta_save($post_id) {
  if (wp_is_post_revision($post_id) || wp_is_post_autosave($post_id)) {
    return;
  }
  if (!isset($_POST['iquattro_page_meta_nonce']) || !wp_verify_nonce(wp_unslash($_POST['iquattro_page_meta_nonce']), 'iquattro_page_meta_save')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  $post = get_post($post_id);
  if (!$post || $post->post_type !== 'page' || !iquattro_is_page_editable($post)) {
    return;
  }

  $meta_slug = iquattro_get_page_meta_slug($post);
  $defaults = iquattro_get_page_defaults_for_post($post);
  $repeaters_path = get_template_directory() . '/inc/page-defaults/' . $meta_slug . '-repeaters.php';
  $repeater_keys = array();
  if (file_exists($repeaters_path)) {
    $repeaters = include $repeaters_path;
    $repeater_keys = is_array($repeaters) ? array_keys($repeaters) : array();
  }
  $attachment_keys = iquattro_page_meta_attachment_field_keys($meta_slug);

  foreach ($defaults as $key => $default_value) {
    if (in_array($key, $repeater_keys, true)) {
      continue;
    }
    $input_name = 'iq_page_' . $key;
    $meta_key = '_iq_page_' . $key;
    if (is_array($default_value) && isset($default_value[0]) && is_array($default_value[0])) {
      if (!isset($_POST[ $input_name ])) {
        continue;
      }
      $raw = wp_unslash($_POST[ $input_name ]);
      if (is_string($raw)) {
        $decoded = json_decode($raw, true);
        if (is_array($decoded)) {
          update_post_meta($post_id, $meta_key, wp_json_encode($decoded));
        }
      }
    } else {
      if (in_array($key, $attachment_keys, true)) {
        if (isset($_POST[ $input_name ])) {
          update_post_meta($post_id, $meta_key, absint(wp_unslash($_POST[ $input_name ])));
        }
        continue;
      }
      if (isset($_POST[ $input_name ])) {
        $raw_in = wp_unslash($_POST[ $input_name ]);
        if (in_array($key, iquattro_page_meta_html_field_keys($meta_slug), true)) {
          update_post_meta($post_id, $meta_key, wp_kses_post($raw_in));
        } else {
          update_post_meta($post_id, $meta_key, sanitize_textarea_field($raw_in));
        }
      }
    }
  }
  iquattro_page_meta_save_repeaters($post_id, $meta_slug);
}

function iquattro_page_meta_save_repeaters($post_id, $meta_slug) {
  $path = get_template_directory() . '/inc/page-defaults/' . $meta_slug . '-repeaters.php';
  if (!file_exists($path)) {
    return;
  }
  $repeaters = include $path;
  if (!is_array($repeaters)) {
    return;
  }
  foreach ($repeaters as $rep_key => $rep_config) {
    $input_prefix = 'iq_page_' . $rep_key . '_';
    $max = isset($rep_config['max']) ? (int) $rep_config['max'] : 20;
    $fields = isset($rep_config['fields']) ? $rep_config['fields'] : array();
    $items = array();
    for ($i = 0; $i < $max; $i++) {
      $row = array();
      $has_any = false;
      foreach ($fields as $field_name => $field_type) {
        $name = $input_prefix . $i . '_' . $field_name;
        if (!isset($_POST[ $name ])) {
          continue;
        }
        if ($field_type === 'textarea') {
          $raw_ta = wp_unslash($_POST[ $name ]);
          if ($meta_slug === 'data-center' && $rep_key === 'soluciones_cards' && $field_name === 'text') {
            $val = wp_kses_post($raw_ta);
          } else {
            $val = sanitize_textarea_field($raw_ta);
          }
        } elseif ($field_type === 'attachment') {
          $val = absint(wp_unslash($_POST[ $name ]));
        } else {
          $val = sanitize_text_field(wp_unslash($_POST[ $name ]));
        }
        $row[ $field_name ] = $val;
        if ($field_type === 'attachment') {
          if ($val > 0) {
            $has_any = true;
          }
        } elseif ($val !== '') {
          $has_any = true;
        }
      }
      if ($has_any) {
        $items[] = $row;
      }
    }
    update_post_meta($post_id, '_iq_page_' . $rep_key, wp_json_encode($items));
  }
}

function iquattro_page_meta_enqueue_media() {
  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'page') {
    return;
  }
  if ($screen->base !== 'post') {
    return;
  }

  wp_enqueue_script('jquery');
  wp_enqueue_media();
  wp_add_inline_script(
    'jquery',
    "(function($){
      $(function(){
        var frame;
        $(document).on('click', '.iq-select-image', function(e){
          e.preventDefault();
          var target = $(this).data('target');
          var preview = $(this).data('preview');
          if (frame) { frame.open(); return; }
          frame = wp.media({ library: { type: 'image' }, multiple: false });
          frame.on('select', function(){
            var att = frame.state().get('selection').first().toJSON();
            $('#' + target).val(att.id);
            var url = (att.sizes && att.sizes.medium) ? att.sizes.medium.url : att.url;
            $('#' + preview).html('<img src=\"' + url + '\" alt=\"\" style=\"max-width:200px;height:auto;display:block;margin-top:8px;\">');
            $('.iq-remove-image[data-target=\"' + target + '\"]').show();
          });
          frame.open();
        });
        $(document).on('click', '.iq-remove-image', function(e){
          e.preventDefault();
          var target = $(this).data('target');
          var preview = $(this).data('preview');
          $('#' + target).val('');
          $('#' + preview).empty();
          $(this).hide();
        });
      });
    })(jQuery);"
  );
}

add_action('edit_form_after_title', 'iquattro_page_meta_nonce_in_base_form', 1);
add_action('add_meta_boxes', 'iquattro_page_meta_add_meta_boxes');
add_action('admin_enqueue_scripts', 'iquattro_page_meta_enqueue_media');
add_action('save_post', 'iquattro_page_meta_save', 10, 1);

/**
 * La portada del tema solo usa el meta box "Contenido de la página". Con el editor de bloques,
 * esos campos a veces no llegan al POST de meta-box-loader y no se guardan en la base de datos.
 * El editor clásico envía todo en un único formulario (editpost) y el guardado es fiable.
 *
 * Para volver al editor de bloques en la página de inicio:
 * add_filter( 'iquattro_use_block_editor_for_static_front_page', '__return_true' );
 */
add_filter('use_block_editor_for_post', 'iquattro_filter_block_editor_for_static_front_page', 100, 2);
function iquattro_filter_block_editor_for_static_front_page($use_block_editor, $post) {
  if (!($post instanceof WP_Post) || $post->post_type !== 'page') {
    return $use_block_editor;
  }
  if (get_option('show_on_front') !== 'page') {
    return $use_block_editor;
  }
  $front_id = (int) get_option('page_on_front');
  if (!$front_id || (int) $post->ID !== $front_id) {
    return $use_block_editor;
  }
  if (apply_filters('iquattro_use_block_editor_for_static_front_page', false)) {
    return $use_block_editor;
  }
  return false;
}
