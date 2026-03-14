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
  );
}

function iquattro_get_page_defaults($slug) {
  $defaults = array();
  $path = get_template_directory() . '/inc/page-defaults/' . $slug . '.php';
  if (file_exists($path)) {
    $defaults = include $path;
  }
  return is_array($defaults) ? $defaults : array();
}

function iquattro_get_editable_page_data($post) {
  if (!$post || !in_array($post->post_name, iquattro_editable_page_slugs(), true)) {
    return array();
  }
  $slug = $post->post_name;
  $defaults = iquattro_get_page_defaults($slug);
  $pid = $post->ID;
  $data = array();
  foreach ($defaults as $key => $default_value) {
    $meta_key = '_iq_page_' . $key;
    $stored = get_post_meta($pid, $meta_key, true);
    if (is_array($default_value) && isset($default_value[0]) && is_array($default_value[0])) {
      if ($stored !== '' && $stored !== false) {
        $decoded = json_decode($stored, true);
        $data[$key] = is_array($decoded) ? $decoded : $default_value;
      } else {
        $data[$key] = $default_value;
      }
    } else {
      $data[$key] = ($stored !== '' && $stored !== false) ? $stored : $default_value;
    }
  }
  $repeaters_path = get_template_directory() . '/inc/page-defaults/' . $slug . '-repeaters.php';
  if (file_exists($repeaters_path)) {
    $repeaters = include $repeaters_path;
    if (is_array($repeaters)) {
      foreach (array_keys($repeaters) as $rep_key) {
        $stored = get_post_meta($pid, '_iq_page_' . $rep_key, true);
        if ($stored !== '' && $stored !== false) {
          $decoded = json_decode($stored, true);
          $data[$rep_key] = is_array($decoded) ? $decoded : (isset($defaults[$rep_key]) ? $defaults[$rep_key] : array());
        } elseif (isset($defaults[$rep_key])) {
          $data[$rep_key] = $defaults[$rep_key];
        } else {
          $data[$rep_key] = array();
        }
      }
    }
  }
  return $data;
}

function iquattro_page_meta_add_meta_boxes() {
  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'page') return;
  global $post;
  if (!$post || empty($post->post_name) || !in_array($post->post_name, iquattro_editable_page_slugs(), true)) return;

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
  $slug = $post->post_name;
  $data = iquattro_get_editable_page_data($post);
  $defaults = iquattro_get_page_defaults($slug);
  wp_nonce_field('iquattro_page_meta_save', 'iquattro_page_meta_nonce');

  $path = get_template_directory() . '/inc/page-meta-boxes/' . $slug . '.php';
  if (file_exists($path)) {
    include $path;
    return;
  }
  echo '<p>' . esc_html__('No hay campos editables definidos para esta página.', 'iquattro') . '</p>';
}

function iquattro_page_meta_save($post_id) {
  if (!isset($_POST['iquattro_page_meta_nonce']) || !wp_verify_nonce($_POST['iquattro_page_meta_nonce'], 'iquattro_page_meta_save')) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  $post = get_post($post_id);
  if (!$post || $post->post_type !== 'page' || !in_array($post->post_name, iquattro_editable_page_slugs(), true)) return;

  $slug = $post->post_name;
  $defaults = iquattro_get_page_defaults($slug);
  $repeaters_path = get_template_directory() . '/inc/page-defaults/' . $slug . '-repeaters.php';
  $repeater_keys = array();
  if (file_exists($repeaters_path)) {
    $repeaters = include $repeaters_path;
    $repeater_keys = is_array($repeaters) ? array_keys($repeaters) : array();
  }
  foreach ($defaults as $key => $default_value) {
    if (in_array($key, $repeater_keys, true)) continue;
    $input_name = 'iq_page_' . $key;
    $meta_key = '_iq_page_' . $key;
    if (is_array($default_value) && isset($default_value[0]) && is_array($default_value[0])) {
      if (!isset($_POST[$input_name])) continue;
      $raw = $_POST[$input_name];
      if (is_string($raw)) {
        $decoded = json_decode(stripslashes($raw), true);
        if (is_array($decoded)) {
          update_post_meta($post_id, $meta_key, wp_json_encode($decoded));
        }
      }
    } else {
      if (isset($_POST[$input_name])) {
        update_post_meta($post_id, $meta_key, sanitize_textarea_field($_POST[$input_name]));
      }
    }
  }
  iquattro_page_meta_save_repeaters($post_id, $slug);
}

function iquattro_page_meta_save_repeaters($post_id, $slug) {
  $repeaters = array();
  $path = get_template_directory() . '/inc/page-defaults/' . $slug . '-repeaters.php';
  if (file_exists($path)) {
    $repeaters = include $path;
  }
  if (!is_array($repeaters)) return;
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
        if (!isset($_POST[$name])) continue;
        $val = sanitize_text_field($_POST[$name]);
        if ($field_type === 'textarea') {
          $val = sanitize_textarea_field($_POST[$name]);
        }
        $row[$field_name] = $val;
        if ($val !== '') $has_any = true;
      }
      if ($has_any) $items[] = $row;
    }
    update_post_meta($post_id, '_iq_page_' . $rep_key, wp_json_encode($items));
  }
}

function iquattro_page_meta_enqueue_evento_media() {
  $screen = get_current_screen();
  if (!$screen || $screen->base !== 'post' || $screen->post_type !== 'page') return;
  $post_id = isset($_GET['post']) ? (int) $_GET['post'] : 0;
  if (!$post_id) return;
  $post = get_post($post_id);
  if (!$post || $post->post_name !== 'evento') return;

  wp_enqueue_media();
  wp_add_inline_script('media-views', "
    (function($){
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
            $('#' + preview).html('<img src=\"' + (att.sizes && att.sizes.medium ? att.sizes.medium.url : att.url) + '\" alt=\"\" style=\"max-width:200px;height:auto;display:block;margin-top:8px;\">');
            $(this).siblings('.iq-remove-image').show();
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
    })(jQuery);
  ");
}
add_action('add_meta_boxes', 'iquattro_page_meta_add_meta_boxes');
add_action('admin_enqueue_scripts', 'iquattro_page_meta_enqueue_evento_media');
add_action('save_post_page', 'iquattro_page_meta_save', 10, 1);
