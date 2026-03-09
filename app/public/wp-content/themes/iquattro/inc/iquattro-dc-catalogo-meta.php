<?php
/**
 * Meta boxes y datos editables para páginas Data Center: Hardware, Software, Servicios
 * Permite editar desde el admin de WordPress todos los textos, títulos y cards.
 *
 * @package iQuattro
 */

if (!defined('ABSPATH')) {
  exit;
}

/** Slugs de las páginas que usan este sistema */
function iquattro_dc_catalogo_page_slugs() {
  return array('data-center-hardware', 'data-center-software', 'data-center-servicios');
}

/** Valores por defecto por slug (para fallback cuando no hay meta guardado) */
function iquattro_dc_catalogo_defaults($slug) {
  $defaults = array(
    'data-center-hardware' => array(
      'hero_title' => 'Hardware empresarial para Data Centers confiables y escalables',
      'hero_desc'  => 'Proveemos equipamiento tecnológico de alto rendimiento para centros de datos, redes y entornos de trabajo, seleccionando las mejores marcas y configuraciones según las necesidades de tu operación.',
      'queresolvemos_title'     => 'Qué resolvemos',
      'queresolvemos_box_title' => 'Infraestructura física diseñada para operar sin fallas',
      'queresolvemos_box_text'  => 'En iQuattro te acompañamos desde la selección hasta la implementación de hardware para Data Center, garantizando compatibilidad, escalabilidad y continuidad operativa en entornos empresariales críticos.',
      'catalog_title' => 'Catálogo de Soluciones de Hardware',
      'cta_title'     => 'Optimiza tu Data Center desde la base',
      'cta_button'    => 'Contactar con Especialistas',
      'cards' => array(
        array('icon' => 'hard-1.svg', 'title' => 'Equipos de Cómputo', 'items' => array('Servidores Rack y Tower', 'Blades', 'Hiperconvergentes')),
        array('icon' => 'hard-2.svg', 'title' => 'Equipos de Escritorio', 'items' => array('Desktops', 'Laptops', 'Impresoras', 'Scanner', 'Monitores y Televisores')),
        array('icon' => 'hard-3.svg', 'title' => 'Equipos de Almacenamiento', 'items' => array('Storages', 'Librerías de Cintas', 'Storages para Backups')),
        array('icon' => 'hard-4.svg', 'title' => 'Equipos de Redes y Comunicaciones', 'items' => array('Switches', 'Routers', 'Redes Inalámbricas')),
        array('icon' => 'hard-5.svg', 'title' => 'Mobility', 'items' => array('Celulares', 'Tablets')),
        array('icon' => 'hard-6.svg', 'title' => 'Seguridad', 'items' => array('Firewalls', 'Routers', 'Redes Inalámbricas', 'DDOS', 'ADC', 'WAF')),
        array('icon' => 'hard-7.svg', 'title' => 'Home Office', 'items' => array('Cámaras Web', 'Micrófono', 'Auriculares', 'Videoconferencia', 'Proyectores')),
        array('icon' => 'hard-8.svg', 'title' => 'Energía y Refrigeración', 'items' => array('UPS', 'PDU', 'Aire acondicionado para salas', 'Monitoreo ambiental')),
      ),
    ),
    'data-center-software' => array(
      'hero_title' => 'Software empresarial para gestionar, proteger y optimizar tu Data Center',
      'hero_desc'  => 'Somos aliados de las principales marcas de software empresarial y contamos con profesionales certificados para implementar soluciones críticas de infraestructura, seguridad y continuidad del negocio.',
      'queresolvemos_title'     => 'Qué resolvemos',
      'queresolvemos_box_title' => 'Control total sobre tu infraestructura tecnológica',
      'queresolvemos_box_text'  => 'Implementamos soluciones de software que permiten administrar, proteger y optimizar los recursos del Data Center, asegurando disponibilidad, seguridad y eficiencia operativa.',
      'catalog_title' => 'Catálogo de Soluciones de Software',
      'cta_title'     => 'Haz que tu Data Center funcione con inteligencia',
      'cta_button'    => 'Contactar con Especialistas',
      'cards' => array(
        array('icon' => 'soft-1.svg', 'title' => 'Virtualización', 'items' => array('Servidores', 'Redes', 'Almacenamiento', 'Balanceadores de carga')),
        array('icon' => 'soft-2.svg', 'title' => 'Seguridad', 'items' => array('Antivirus', 'Prevención de Pérdida de Información (DPL)', 'Monitoreo de Vulnerabilidades', 'Rastreo de incidentes, ataques', 'Next-Generation', 'Firewall, IPS', 'Protección contra DDOS')),
        array('icon' => 'soft-3.svg', 'title' => 'Respaldo y Continuidad del Negocio', 'items' => array('Servidores', 'Máquinas Personales', 'Replicación', 'Comprensión', 'Deduplicación de información')),
        array('icon' => 'soft-4.svg', 'title' => 'Administración', 'items' => array('Administración centralizada de Endpoints', 'Administración de Infraestructura', 'Automatización de Servicios e Infraestructura')),
        array('icon' => 'soft-5.svg', 'title' => 'Monitoreo', 'items' => array('Infraestructura', 'Bases de Datos', 'Seguridad')),
        array('icon' => 'soft-6.svg', 'title' => 'Sistemas Operativos', 'items' => array('Microsoft', 'SuSE')),
        array('icon' => 'soft-7.svg', 'title' => 'Bases de Datos', 'items' => array()),
      ),
    ),
    'data-center-servicios' => array(
      'hero_title' => 'Servicios especializados para operar y proteger tu Data Center',
      'hero_desc'  => 'Gracias a nuestro equipo certificado y con amplia experiencia, ofrecemos servicios especializados para asegurar la estabilidad, seguridad y continuidad de tu infraestructura tecnológica.',
      'queresolvemos_title'     => 'Qué resolvemos',
      'queresolvemos_box_title' => 'Acompañamiento experto en cada etapa de tu infraestructura',
      'queresolvemos_box_text'  => 'Desde soporte técnico hasta diagnósticos especializados, nuestros servicios están diseñados para maximizar el rendimiento de tu Data Center y reducir riesgos operativos.',
      'catalog_title' => 'Catálogo de Soluciones de Servicios',
      'cta_title'     => 'Confía la operación de tu Data Center a expertos',
      'cta_button'    => 'Contactar con un Consultor',
      'cards' => array(
        array('icon' => 'serv-1.svg', 'title' => 'Soporte', 'items' => array('Microsoft', 'Vmware (virtualización)', 'Veeam (respaldo)', 'Infraestructura de Servidores')),
        array('icon' => 'serv-2.svg', 'title' => 'Diagnósticos', 'items' => array('Gestión de TI', 'Infraestructura')),
        array('icon' => 'serv-3.svg', 'title' => 'Bases de Datos', 'items' => array()),
      ),
    ),
  );
  return isset($defaults[$slug]) ? $defaults[$slug] : array();
}

/**
 * Obtiene todos los datos editables de una página DC catálogo (desde meta o defaults).
 *
 * @param WP_Post $post
 * @return array
 */
function iquattro_get_dc_catalogo_page_data($post) {
  if (!$post || !in_array($post->post_name, iquattro_dc_catalogo_page_slugs(), true)) {
    return array();
  }
  $slug     = $post->post_name;
  $defaults = iquattro_dc_catalogo_defaults($slug);
  $pid      = $post->ID;

  $hero_title = get_post_meta($pid, '_iq_dc_hero_title', true);
  $hero_desc  = get_post_meta($pid, '_iq_dc_hero_desc', true);
  $qr_title   = get_post_meta($pid, '_iq_dc_queresolvemos_title', true);
  $qr_box_title = get_post_meta($pid, '_iq_dc_queresolvemos_box_title', true);
  $qr_box_text  = get_post_meta($pid, '_iq_dc_queresolvemos_box_text', true);
  $cat_title  = get_post_meta($pid, '_iq_dc_catalog_title', true);
  $cta_title  = get_post_meta($pid, '_iq_dc_cta_title', true);
  $cta_button = get_post_meta($pid, '_iq_dc_cta_button', true);
  $cards_json = get_post_meta($pid, '_iq_dc_cards', true);

  $cards = $defaults['cards'];
  if ($cards_json !== '' && $cards_json !== false) {
    $decoded = json_decode($cards_json, true);
    if (is_array($decoded) && !empty($decoded)) {
      $cards = $decoded;
    }
  }

  return array(
    'hero_title'             => $hero_title !== '' ? $hero_title : $defaults['hero_title'],
    'hero_desc'              => $hero_desc !== '' ? $hero_desc : $defaults['hero_desc'],
    'queresolvemos_title'    => $qr_title !== '' ? $qr_title : $defaults['queresolvemos_title'],
    'queresolvemos_box_title' => $qr_box_title !== '' ? $qr_box_title : $defaults['queresolvemos_box_title'],
    'queresolvemos_box_text'  => $qr_box_text !== '' ? $qr_box_text : $defaults['queresolvemos_box_text'],
    'catalog_title'          => $cat_title !== '' ? $cat_title : $defaults['catalog_title'],
    'cta_title'              => $cta_title !== '' ? $cta_title : $defaults['cta_title'],
    'cta_button'             => $cta_button !== '' ? $cta_button : $defaults['cta_button'],
    'cards'                  => $cards,
  );
}

/**
 * Registrar meta boxes para las páginas DC catálogo
 * Solo se muestra al editar Data Center Hardware, Software o Servicios.
 */
function iquattro_dc_catalogo_add_meta_boxes() {
  $screen = get_current_screen();
  if (!$screen || $screen->post_type !== 'page') {
    return;
  }
  global $post;
  if (!$post || empty($post->post_name) || !in_array($post->post_name, iquattro_dc_catalogo_page_slugs(), true)) {
    return;
  }

  add_meta_box(
    'iquattro_dc_catalogo_content',
    __('Contenido de la página (Data Center)', 'iquattro'),
    'iquattro_dc_catalogo_meta_box_callback',
    'page',
    'normal',
    'high'
  );
}

function iquattro_dc_catalogo_meta_box_callback($post) {
  wp_nonce_field('iquattro_dc_catalogo_save', 'iquattro_dc_catalogo_nonce');
  $slug   = $post->post_name;
  $data   = iquattro_get_dc_catalogo_page_data($post);
  $defaults = iquattro_dc_catalogo_defaults($slug);

  $hero_title = get_post_meta($post->ID, '_iq_dc_hero_title', true);
  $hero_desc  = get_post_meta($post->ID, '_iq_dc_hero_desc', true);
  $qr_title   = get_post_meta($post->ID, '_iq_dc_queresolvemos_title', true);
  $qr_box_title = get_post_meta($post->ID, '_iq_dc_queresolvemos_box_title', true);
  $qr_box_text  = get_post_meta($post->ID, '_iq_dc_queresolvemos_box_text', true);
  $cat_title  = get_post_meta($post->ID, '_iq_dc_catalog_title', true);
  $cta_title  = get_post_meta($post->ID, '_iq_dc_cta_title', true);
  $cta_button = get_post_meta($post->ID, '_iq_dc_cta_button', true);
  $cards_json = get_post_meta($post->ID, '_iq_dc_cards', true);

  if ($hero_title === '') { $hero_title = $defaults['hero_title']; }
  if ($hero_desc === '') { $hero_desc = $defaults['hero_desc']; }
  if ($qr_title === '') { $qr_title = $defaults['queresolvemos_title']; }
  if ($qr_box_title === '') { $qr_box_title = $defaults['queresolvemos_box_title']; }
  if ($qr_box_text === '') { $qr_box_text = $defaults['queresolvemos_box_text']; }
  if ($cat_title === '') { $cat_title = $defaults['catalog_title']; }
  if ($cta_title === '') { $cta_title = $defaults['cta_title']; }
  if ($cta_button === '') { $cta_button = $defaults['cta_button']; }

  $cards = $data['cards'];
  $max_cards = max(10, count($cards));
  ?>
  <div class="iq-dc-meta-box" style="display:grid; gap:1.5rem;">
    <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
    <p>
      <label><?php esc_html_e('Título principal', 'iquattro'); ?></label><br>
      <input type="text" name="iq_dc_hero_title" value="<?php echo esc_attr($hero_title); ?>" class="widefat">
    </p>
    <p>
      <label><?php esc_html_e('Descripción / subtítulo', 'iquattro'); ?></label><br>
      <textarea name="iq_dc_hero_desc" class="widefat" rows="3"><?php echo esc_textarea($hero_desc); ?></textarea>
    </p>

    <p><strong><?php esc_html_e('Qué resolvemos', 'iquattro'); ?></strong></p>
    <p>
      <label><?php esc_html_e('Título de la sección', 'iquattro'); ?></label><br>
      <input type="text" name="iq_dc_queresolvemos_title" value="<?php echo esc_attr($qr_title); ?>" class="widefat">
    </p>
    <p>
      <label><?php esc_html_e('Título de la caja', 'iquattro'); ?></label><br>
      <input type="text" name="iq_dc_queresolvemos_box_title" value="<?php echo esc_attr($qr_box_title); ?>" class="widefat">
    </p>
    <p>
      <label><?php esc_html_e('Texto de la caja', 'iquattro'); ?></label><br>
      <textarea name="iq_dc_queresolvemos_box_text" class="widefat" rows="4"><?php echo esc_textarea($qr_box_text); ?></textarea>
    </p>

    <p><strong><?php esc_html_e('Catálogo', 'iquattro'); ?></strong></p>
    <p>
      <label><?php esc_html_e('Título del catálogo', 'iquattro'); ?></label><br>
      <input type="text" name="iq_dc_catalog_title" value="<?php echo esc_attr($cat_title); ?>" class="widefat">
    </p>

    <p><strong><?php esc_html_e('Cards', 'iquattro'); ?></strong> <span style="color:#666;"><?php esc_html_e('Icono: nombre del archivo en assets/icons/ (ej. hard-1.svg). Características: una por línea.', 'iquattro'); ?></span></p>
    <div style="display:grid; gap:1rem;">
      <?php for ($i = 0; $i < $max_cards; $i++) :
        $card = isset($cards[$i]) ? $cards[$i] : array('icon' => '', 'title' => '', 'items' => array());
        $icon  = isset($card['icon']) ? $card['icon'] : '';
        $title = isset($card['title']) ? $card['title'] : '';
        $items = isset($card['items']) && is_array($card['items']) ? implode("\n", $card['items']) : '';
      ?>
        <div style="border:1px solid #ccc; padding:12px; border-radius:4px; background:#f9f9f9;">
          <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i + 1)); ?></strong>
          <p style="margin:8px 0 0;">
            <input type="text" name="iq_dc_card_<?php echo $i; ?>_icon" value="<?php echo esc_attr($icon); ?>" placeholder="ej. hard-1.svg" style="width:180px;">
            <input type="text" name="iq_dc_card_<?php echo $i; ?>_title" value="<?php echo esc_attr($title); ?>" placeholder="<?php esc_attr_e('Título del card', 'iquattro'); ?>" class="widefat" style="margin-top:4px;">
            <textarea name="iq_dc_card_<?php echo $i; ?>_items" rows="3" class="widefat" style="margin-top:4px;" placeholder="<?php esc_attr_e('Una característica por línea', 'iquattro'); ?>"><?php echo esc_textarea($items); ?></textarea>
          </p>
        </div>
      <?php endfor; ?>
    </div>

    <p><strong><?php esc_html_e('Llamada a la acción (CTA)', 'iquattro'); ?></strong></p>
    <p>
      <label><?php esc_html_e('Título CTA', 'iquattro'); ?></label><br>
      <input type="text" name="iq_dc_cta_title" value="<?php echo esc_attr($cta_title); ?>" class="widefat">
    </p>
    <p>
      <label><?php esc_html_e('Texto del botón', 'iquattro'); ?></label><br>
      <input type="text" name="iq_dc_cta_button" value="<?php echo esc_attr($cta_button); ?>" class="widefat">
    </p>
  </div>
  <?php
}

/**
 * Guardar meta al guardar la página
 */
function iquattro_dc_catalogo_save_meta($post_id) {
  if (!isset($_POST['iquattro_dc_catalogo_nonce']) || !wp_verify_nonce($_POST['iquattro_dc_catalogo_nonce'], 'iquattro_dc_catalogo_save')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  $post = get_post($post_id);
  if (!$post || $post->post_type !== 'page' || !in_array($post->post_name, iquattro_dc_catalogo_page_slugs(), true)) {
    return;
  }

  $keys = array(
    'iq_dc_hero_title' => '_iq_dc_hero_title',
    'iq_dc_hero_desc'  => '_iq_dc_hero_desc',
    'iq_dc_queresolvemos_title'     => '_iq_dc_queresolvemos_title',
    'iq_dc_queresolvemos_box_title' => '_iq_dc_queresolvemos_box_title',
    'iq_dc_queresolvemos_box_text'  => '_iq_dc_queresolvemos_box_text',
    'iq_dc_catalog_title' => '_iq_dc_catalog_title',
    'iq_dc_cta_title'  => '_iq_dc_cta_title',
    'iq_dc_cta_button' => '_iq_dc_cta_button',
  );
  foreach ($keys as $input => $meta_key) {
    if (isset($_POST[$input])) {
      update_post_meta($post_id, $meta_key, sanitize_textarea_field($_POST[$input]));
    }
  }

  $cards = array();
  for ($i = 0; $i < 15; $i++) {
    $title = isset($_POST['iq_dc_card_' . $i . '_title']) ? sanitize_text_field($_POST['iq_dc_card_' . $i . '_title']) : '';
    if ($title === '') {
      continue;
    }
    $icon  = isset($_POST['iq_dc_card_' . $i . '_icon']) ? sanitize_text_field($_POST['iq_dc_card_' . $i . '_icon']) : '';
    $items_raw = isset($_POST['iq_dc_card_' . $i . '_items']) ? sanitize_textarea_field($_POST['iq_dc_card_' . $i . '_items']) : '';
    $items = array_filter(array_map('trim', explode("\n", $items_raw)));
    $cards[] = array('icon' => $icon, 'title' => $title, 'items' => array_values($items));
  }
  update_post_meta($post_id, '_iq_dc_cards', wp_json_encode($cards));
}

add_action('add_meta_boxes', 'iquattro_dc_catalogo_add_meta_boxes');
add_action('save_post_page', 'iquattro_dc_catalogo_save_meta', 10, 1);
