<?php
/**
 * iQuattro Group - Funciones del tema
 *
 * @package iQuattro
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
  exit;
}

define('IQUATTRO_VERSION', '1.0.0');
define('IQUATTRO_THEME_DIR', get_template_directory());
define('IQUATTRO_THEME_URI', get_template_directory_uri());

require_once IQUATTRO_THEME_DIR . '/inc/iquattro-dc-catalogo-meta.php';
require_once IQUATTRO_THEME_DIR . '/inc/iquattro-page-meta.php';
require_once IQUATTRO_THEME_DIR . '/inc/iquattro-cpt-curso.php';

/**
 * Configuración del tema
 */
function iquattro_setup() {
  load_theme_textdomain('iquattro', IQUATTRO_THEME_DIR . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
  add_theme_support('custom-logo', array(
    'height'      => 80,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array('site-title', 'site-description'),
  ));
  add_theme_support('customize-selective-refresh-widgets');
  add_theme_support('responsive-embeds');

  register_nav_menus(array(
    'primary' => __('Menú principal', 'iquattro'),
  ));
}
add_action('after_setup_theme', 'iquattro_setup');

/**
 * Al activar el tema, actualizar reglas de reescritura para que las URLs del CPT Curso (/curso/slug/) funcionen.
 */
function iquattro_flush_rewrite_rules_on_activation() {
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'iquattro_flush_rewrite_rules_on_activation');

/**
 * Añadir clases al body en páginas con fondo gradiente (Data Center, Seguridad, Consultoría, Servicios)
 */
function iquattro_body_class_page_gradients($classes) {
  if (is_page('data-center')) {
    $classes[] = 'iq-page-data-center-body';
  }
  if (is_page('seguridad')) {
    $classes[] = 'iq-page-seguridad-body';
  }
  if (is_page('consultoria')) {
    $classes[] = 'iq-page-consultoria-body';
  }
  if (is_page('servicios')) {
    $classes[] = 'iq-page-servicios-body';
  }
  if (is_singular('curso')) {
    $classes[] = 'iq-page--curso-detail';
  }
  return $classes;
}
add_filter('body_class', 'iquattro_body_class_page_gradients');

/**
 * Crear la página Capacitación con slug "capacitacion" si no existe (para que page-capacitacion.php funcione)
 */
function iquattro_ensure_capacitacion_page() {
  if (get_page_by_path('capacitacion')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Capacitación', 'iquattro'),
    'post_name'    => 'capacitacion',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_capacitacion_page');

/**
 * Crear la página Catálogo de cursos con slug "catalogo-cursos" si no existe
 */
function iquattro_ensure_catalogo_cursos_page() {
  if (get_page_by_path('catalogo-cursos')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Catálogo de cursos', 'iquattro'),
    'post_name'    => 'catalogo-cursos',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_catalogo_cursos_page');

/**
 * Crear la página Cronograma con slug "cronograma" si no existe
 */
function iquattro_ensure_cronograma_page() {
  if (get_page_by_path('cronograma')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Cronograma', 'iquattro'),
    'post_name'    => 'cronograma',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_cronograma_page');

/**
 * Crear la página Evento con slug "evento" si no existe
 */
function iquattro_ensure_evento_page() {
  if (get_page_by_path('evento')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Evento', 'iquattro'),
    'post_name'    => 'evento',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_evento_page');

/**
 * Crear la página Contacto con slug "contacto" si no existe
 */
function iquattro_ensure_contacto_page() {
  if (get_page_by_path('contacto')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Contacto', 'iquattro'),
    'post_name'    => 'contacto',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_contacto_page');

/**
 * Crear la página Servicios con slug "servicios" si no existe
 */
function iquattro_ensure_servicios_page() {
  if (get_page_by_path('servicios')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Servicios', 'iquattro'),
    'post_name'    => 'servicios',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_servicios_page');

/**
 * Crear la página Consultoría con slug "consultoria" si no existe
 */
function iquattro_ensure_consultoria_page() {
  if (get_page_by_path('consultoria')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Consultoría', 'iquattro'),
    'post_name'    => 'consultoria',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_consultoria_page');

/**
 * Crear la página Seguridad con slug "seguridad" si no existe
 */
function iquattro_ensure_seguridad_page() {
  if (get_page_by_path('seguridad')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Seguridad', 'iquattro'),
    'post_name'    => 'seguridad',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_seguridad_page');

/**
 * Crear la página Data Center con slug "data-center" si no existe
 */
function iquattro_ensure_data_center_page() {
  if (get_page_by_path('data-center')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Data Center', 'iquattro'),
    'post_name'    => 'data-center',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_data_center_page');

/**
 * Crear páginas Data Center: Hardware, Software, Servicios
 */
function iquattro_ensure_data_center_hardware_page() {
  if (get_page_by_path('data-center-hardware')) return;
  wp_insert_post(array('post_title' => __('Hardware', 'iquattro'), 'post_name' => 'data-center-hardware', 'post_status' => 'publish', 'post_type' => 'page', 'post_author' => 1));
}
add_action('init', 'iquattro_ensure_data_center_hardware_page');

function iquattro_ensure_data_center_software_page() {
  if (get_page_by_path('data-center-software')) return;
  wp_insert_post(array('post_title' => __('Software', 'iquattro'), 'post_name' => 'data-center-software', 'post_status' => 'publish', 'post_type' => 'page', 'post_author' => 1));
}
add_action('init', 'iquattro_ensure_data_center_software_page');

function iquattro_ensure_data_center_servicios_page() {
  if (get_page_by_path('data-center-servicios')) return;
  wp_insert_post(array('post_title' => __('Servicios Data Center', 'iquattro'), 'post_name' => 'data-center-servicios', 'post_status' => 'publish', 'post_type' => 'page', 'post_author' => 1));
}
add_action('init', 'iquattro_ensure_data_center_servicios_page');

/**
 * Crear la página Acerca De con slug "acerca-de" si no existe
 */
function iquattro_ensure_acerca_de_page() {
  if (get_page_by_path('acerca-de')) {
    return;
  }
  wp_insert_post(array(
    'post_title'   => __('Acerca De', 'iquattro'),
    'post_name'    => 'acerca-de',
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_author'  => 1,
  ));
}
add_action('init', 'iquattro_ensure_acerca_de_page');

/**
 * Clases para el menú de navegación
 */
function iquattro_nav_menu_css_class($classes, $item, $args, $depth) {
  if (isset($args->theme_location) && $args->theme_location === 'primary') {
    $classes[] = 'iq-nav-item';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'iquattro_nav_menu_css_class', 10, 4);

function iquattro_nav_menu_link_attributes($atts, $item, $args, $depth) {
  if (isset($args->theme_location) && $args->theme_location === 'primary') {
    $atts['class'] = isset($atts['class']) ? $atts['class'] . ' iq-nav-link' : 'iq-nav-link';
    $title_slug = isset($item->title) ? sanitize_title($item->title) : '';
    if ($title_slug === 'capacitacion') {
      $atts['href'] = get_permalink(get_page_by_path('capacitacion')) ?: home_url('/capacitacion/');
    }
    if ($title_slug === 'contacto') {
      $atts['href'] = get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/');
    }
    if ($title_slug === 'servicios') {
      $atts['href'] = get_permalink(get_page_by_path('servicios')) ?: home_url('/servicios/');
    }
    if ($title_slug === 'consultoria') {
      $atts['href'] = get_permalink(get_page_by_path('consultoria')) ?: home_url('/consultoria/');
    }
    if ($title_slug === 'seguridad') {
      $atts['href'] = get_permalink(get_page_by_path('seguridad')) ?: home_url('/seguridad/');
    }
    if ($title_slug === 'data-center') {
      $atts['href'] = get_permalink(get_page_by_path('data-center')) ?: home_url('/data-center/');
    }
    if ($title_slug === 'acerca-de') {
      $atts['href'] = get_permalink(get_page_by_path('acerca-de')) ?: home_url('/acerca-de/');
    }
  }
  return $atts;
}
add_filter('nav_menu_link_attributes', 'iquattro_nav_menu_link_attributes', 10, 4);

/**
 * Registrar estilos y scripts
 */
function iquattro_scripts() {
  wp_enqueue_style(
    'iquattro-style',
    get_stylesheet_uri(),
    array(),
    IQUATTRO_VERSION
  );
  wp_enqueue_style(
    'iquattro-main',
    IQUATTRO_THEME_URI . '/assets/css/main.css',
    array('iquattro-style'),
    IQUATTRO_VERSION
  );

  wp_enqueue_script(
    'iquattro-main',
    IQUATTRO_THEME_URI . '/assets/js/main.js',
    array('jquery'),
    IQUATTRO_VERSION,
    true
  );

  wp_localize_script('iquattro-main', 'iquattroData', array(
    'ajaxUrl' => admin_url('admin-ajax.php'),
    'nonce'   => wp_create_nonce('iquattro_contact'),
  ));
}
add_action('wp_enqueue_scripts', 'iquattro_scripts');

/**
 * Registrar widgets / áreas de widget (opcional)
 */
function iquattro_widgets_init() {
  register_sidebar(array(
    'name'          => __('Barra lateral', 'iquattro'),
    'id'            => 'sidebar-1',
    'description'   => __('Añade widgets aquí.', 'iquattro'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));
}
add_action('widgets_init', 'iquattro_widgets_init');

/**
 * Menú de respaldo si no hay menú asignado
 */
function iquattro_fallback_menu() {
  $pages = array(
    'inicio'     => home_url('/'),
    'acerca-de'  => get_permalink(get_page_by_path('acerca-de')) ?: home_url('/acerca-de/'),
    'data-center'=> get_permalink(get_page_by_path('data-center')) ?: home_url('/data-center/'),
    'seguridad'  => get_permalink(get_page_by_path('seguridad')) ?: home_url('/seguridad/'),
    'consultoria'=> get_permalink(get_page_by_path('consultoria')) ?: home_url('/consultoria/'),
    'servicios'  => get_permalink(get_page_by_path('servicios')) ?: home_url('/servicios/'),
    'capacitacion'=> get_permalink(get_page_by_path('capacitacion')) ?: home_url('/capacitacion/'),
    'contacto'   => get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/'),
  );
  $labels = array(
    'inicio'      => __('Inicio', 'iquattro'),
    'acerca-de'   => __('Acerca De', 'iquattro'),
    'data-center' => __('Data Center', 'iquattro'),
    'seguridad'   => __('Seguridad', 'iquattro'),
    'consultoria' => __('Consultoría', 'iquattro'),
    'servicios'   => __('Servicios', 'iquattro'),
    'capacitacion'=> __('Capacitación', 'iquattro'),
    'contacto'    => __('Contacto', 'iquattro'),
  );
  echo '<ul class="iq-nav-list">';
  foreach ($pages as $slug => $url) {
    $current = (is_front_page() && $slug === 'inicio') || (get_post() && get_post()->post_name === $slug) ? ' iq-current' : '';
    echo '<li class="iq-nav-item' . esc_attr($current) . '"><a href="' . esc_url($url) . '" class="iq-nav-link">' . esc_html($labels[$slug]) . '</a></li>';
  }
  echo '</ul>';
}

/**
 * Asegurar que el ítem Capacitación del menú principal apunte siempre a la página correcta
 */
function iquattro_fix_capacitacion_menu_url($items, $args) {
  if (empty($args->theme_location) || $args->theme_location !== 'primary') {
    return $items;
  }
  $capacitacion_url = get_permalink(get_page_by_path('capacitacion')) ?: home_url('/capacitacion/');
  $contacto_url = get_permalink(get_page_by_path('contacto')) ?: home_url('/contacto/');
  foreach ($items as $item) {
    $title_slug = isset($item->title) ? sanitize_title($item->title) : '';
    if ($title_slug === 'capacitacion' || (isset($item->url) && strpos($item->url, 'capacitacion') !== false)) {
      $item->url = $capacitacion_url;
    }
    if ($title_slug === 'contacto' || (isset($item->url) && strpos($item->url, 'contacto') !== false)) {
      $item->url = $contacto_url;
    }
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'iquattro_fix_capacitacion_menu_url', 10, 2);

/**
 * Logo del topbar según la página actual (slug).
 *
 * @return string Nombre del archivo de imagen en assets/images/
 */
function iquattro_topbar_logo_filename() {
  $logos = array(
    'acerca-de'             => 'logo-iquattro-acerca.png',
    'data-center'          => 'logo-iquattro-datacenter.png',
    'data-center-hardware' => 'logo-iquattro-datacenter.png',
    'data-center-software' => 'logo-iquattro-datacenter.png',
    'data-center-servicios'=> 'logo-iquattro-datacenter.png',
    'seguridad'            => 'logo-iquattro-seguridad.png',
    'consultoria'          => 'logo-iquattro-consultoria.png',
    'servicios'            => 'logo-iquattro-servicios.png',
    'capacitacion'         => 'iquattro-capacitacion-header.png',
    'contacto'             => 'logo-iquattro-contacto.png',
  );
  foreach ($logos as $slug => $filename) {
    if (is_page($slug)) {
      return $filename;
    }
  }
  if (is_singular('curso')) {
    return 'iquattro-capacitacion-header.png';
  }
  if (is_page('cronograma') || is_page('evento')) {
    return 'iquattro-capacitacion-header.png';
  }
  return 'iquattro-capacitacion-header.png';
}

/**
 * Renderizar el topbar de la página Capacitación (logo + menú). Se usa dentro de .iq-capacitacion-wrap.
 */
function iquattro_render_capacitacion_topbar() {
  $logo_file = iquattro_topbar_logo_filename();
  $logo_src = get_template_directory_uri() . '/assets/images/' . $logo_file;
  ?>
  <div class="iq-topbar iq-topbar-capacitacion">
    <div class="iq-topbar-capacitacion-inner">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="iq-topbar-capacitacion-logo">
        <img src="<?php echo esc_url($logo_src); ?>" alt="<?php bloginfo('name'); ?> - <?php esc_attr_e('Capacitación', 'iquattro'); ?>" class="iq-topbar-capacitacion-img">
      </a>
      <nav class="iq-nav" aria-label="<?php esc_attr_e('Menú principal', 'iquattro'); ?>">
        <?php
        if (has_nav_menu('primary')) {
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class'     => 'iq-nav-list',
            'container'      => false,
            'fallback_cb'    => 'iquattro_fallback_menu',
          ));
        } else {
          iquattro_fallback_menu();
        }
        ?>
      </nav>
    </div>
  </div>
  <?php
}

/**
 * Obtener páginas del menú para enlaces de divisiones
 */
function iquattro_get_division_pages() {
  $slugs = array('data-center', 'seguridad', 'consultoria', 'servicios', 'capacitacion');
  $pages = array();
  foreach ($slugs as $slug) {
    $page = get_page_by_path($slug);
    if ($page) {
      $pages[] = array(
        'title' => $page->post_title,
        'url'   => get_permalink($page),
      );
    }
  }
  return $pages;
}

/**
 * Nombre de página para el asunto del correo según form_origin (slug)
 */
function iquattro_form_origin_page_name($slug) {
  $names = array(
    'portada'      => __('Portada', 'iquattro'),
    'data-center'  => __('Data Center', 'iquattro'),
    'seguridad'    => __('Seguridad', 'iquattro'),
    'consultoria'  => __('Consultoría', 'iquattro'),
    'servicios'    => __('Servicios', 'iquattro'),
    'capacitacion' => __('Capacitación', 'iquattro'),
    'contacto'     => __('Contacto', 'iquattro'),
    'cronograma'   => __('Cronograma (inscripción curso)', 'iquattro'),
    'curso'        => __('Detalle curso (inscripción)', 'iquattro'),
    'evento'       => __('Evento', 'iquattro'),
  );
  return isset($names[ $slug ]) ? $names[ $slug ] : $slug;
}

/**
 * Envío del formulario de contacto (AJAX)
 * Destino: opción "Correo destino de formularios" en Apariencia → Personalizar → Datos de contacto.
 */
function iquattro_handle_contact_form() {
  check_ajax_referer('iquattro_contact', 'nonce');

  $nombre       = isset($_POST['nombre']) ? sanitize_text_field($_POST['nombre']) : '';
  $email        = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  $telefono     = isset($_POST['telefono']) ? sanitize_text_field($_POST['telefono']) : '';
  $empresa      = isset($_POST['empresa']) ? sanitize_text_field($_POST['empresa']) : '';
  $mensaje      = isset($_POST['mensaje']) ? sanitize_textarea_field($_POST['mensaje']) : '';
  $curso_id     = isset($_POST['curso_id']) ? absint($_POST['curso_id']) : 0;
  $form_origin  = isset($_POST['form_origin']) ? sanitize_text_field($_POST['form_origin']) : '';

  $errors = array();
  if (empty($nombre)) $errors[] = __('El nombre es obligatorio.', 'iquattro');
  if (empty($email) || !is_email($email)) $errors[] = __('Correo electrónico válido es obligatorio.', 'iquattro');
  if (empty($mensaje)) $errors[] = __('El mensaje es obligatorio.', 'iquattro');

  if (!empty($errors)) {
    wp_send_json_error(array('message' => implode(' ', $errors)));
  }

  $curso_info = '';
  if ($curso_id) {
    $curso = get_post($curso_id);
    $curso_info = $curso && $curso->post_type === 'curso'
      ? sprintf("\nCurso inscripción: %s\n", get_the_title($curso_id))
      : '';
  }

  $to = get_theme_mod('iquattro_form_destination_email', 'pinell.rengel.carlos@gmail.com');
  if (!is_email($to)) {
    $to = get_option('admin_email');
  }

  $page_name = iquattro_form_origin_page_name($form_origin) ?: __('Web', 'iquattro');
  $subject   = sprintf(__('[iQuattro] Mensaje desde %s: %s', 'iquattro'), $page_name, $nombre);

  $body = sprintf(
    "Nombre: %s\nEmail: %s\nTeléfono: %s\nEmpresa: %s%s\nMensaje:\n%s",
    $nombre,
    $email,
    $telefono,
    $empresa,
    $curso_info,
    $mensaje
  );
  $headers = array('Content-Type: text/plain; charset=UTF-8', 'From: ' . $nombre . ' <' . $email . '>');

  $sent = wp_mail($to, $subject, $body, $headers);

  if ($sent) {
    wp_send_json_success(array('message' => __('Gracias. Tu mensaje ha sido enviado correctamente.', 'iquattro')));
  } else {
    wp_send_json_error(array('message' => __('No se pudo enviar el mensaje. Intenta más tarde.', 'iquattro')));
  }
}
add_action('wp_ajax_iquattro_contact', 'iquattro_handle_contact_form');
add_action('wp_ajax_nopriv_iquattro_contact', 'iquattro_handle_contact_form');

/**
 * Añadir datos de contacto desde personalizador (opcional)
 */
function iquattro_customize_register($wp_customize) {
  $wp_customize->add_section('iquattro_contact', array(
    'title'    => __('Datos de contacto', 'iquattro'),
    'priority' => 30,
  ));

  $wp_customize->add_setting('iquattro_phone', array(
    'default'           => '+591 71947016',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('iquattro_phone', array(
    'label'   => __('Teléfono', 'iquattro'),
    'section' => 'iquattro_contact',
    'type'    => 'text',
  ));

  $wp_customize->add_setting('iquattro_email', array(
    'default'           => 'marisol@i-quattro.com',
    'sanitize_callback' => 'sanitize_email',
  ));
  $wp_customize->add_control('iquattro_email', array(
    'label'   => __('Email de contacto', 'iquattro'),
    'section' => 'iquattro_contact',
    'type'    => 'email',
  ));

  $wp_customize->add_setting('iquattro_location', array(
    'default'           => 'Bolivia',
    'sanitize_callback' => 'sanitize_text_field',
  ));
  $wp_customize->add_control('iquattro_location', array(
    'label'   => __('Ubicación', 'iquattro'),
    'section' => 'iquattro_contact',
    'type'    => 'text',
  ));

  /* Correo donde llegan los mensajes de todos los formularios del sitio */
  $wp_customize->add_setting('iquattro_form_destination_email', array(
    'default'           => 'pinell.rengel.carlos@gmail.com',
    'sanitize_callback' => 'sanitize_email',
  ));
  $wp_customize->add_control('iquattro_form_destination_email', array(
    'label'       => __('Correo destino de formularios', 'iquattro'),
    'description' => __('Todos los mensajes enviados desde los formularios (portada, Data Center, Seguridad, Consultoría, Servicios, Capacitación, Contacto) se enviarán a este correo. En producción puede cambiarlo por el correo del cliente (ej. en Bluehost).', 'iquattro'),
    'section'     => 'iquattro_contact',
    'type'        => 'email',
  ));
}
add_action('customize_register', 'iquattro_customize_register');
