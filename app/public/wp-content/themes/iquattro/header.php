<?php
/**
 * Cabecera del sitio y hero
 *
 * @package iQuattro
 */

if (!defined('ABSPATH')) {
  exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="iq-header">
  <?php if (is_front_page()) : ?>
  <?php
  $iq_front_post = null;
  $iq_front_id = (int) get_option('page_on_front');
  if ($iq_front_id) {
    $iq_front_post = get_post($iq_front_id);
  }
  if (!$iq_front_post instanceof WP_Post) {
    $iq_qo = get_queried_object();
    if ($iq_qo instanceof WP_Post && $iq_qo->post_type === 'page') {
      $iq_front_post = $iq_qo;
    }
  }
  $iq_front_data = $iq_front_post ? iquattro_get_editable_page_data($iq_front_post) : array();
  if (empty($iq_front_data)) {
    $iq_front_data = iquattro_get_page_defaults('front-page');
  }
  $iq_hero_pills = array(
    array(
      'text' => isset($iq_front_data['hero_pill_1_text']) ? $iq_front_data['hero_pill_1_text'] : '',
      'url'  => get_permalink(get_page_by_path('capacitacion')) ?: home_url('/capacitacion/'),
    ),
    array(
      'text' => isset($iq_front_data['hero_pill_2_text']) ? $iq_front_data['hero_pill_2_text'] : '',
      'url'  => get_permalink(get_page_by_path('data-center')) ?: home_url('/data-center/'),
    ),
    array(
      'text' => isset($iq_front_data['hero_pill_3_text']) ? $iq_front_data['hero_pill_3_text'] : '',
      'url'  => get_permalink(get_page_by_path('servicios')) ?: home_url('/servicios/'),
    ),
    array(
      'text' => isset($iq_front_data['hero_pill_4_text']) ? $iq_front_data['hero_pill_4_text'] : '',
      'url'  => get_permalink(get_page_by_path('seguridad')) ?: home_url('/seguridad/'),
    ),
    array(
      'text' => isset($iq_front_data['hero_pill_5_text']) ? $iq_front_data['hero_pill_5_text'] : '',
      'url'  => get_permalink(get_page_by_path('consultoria')) ?: home_url('/consultoria/'),
    ),
  );
  ?>
  <section class="iq-hero">
    <div class="iq-topbar iq-topbar-hero">
      <div class="iq-topbar-inner">
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
    <div class="iq-hero-bg" aria-hidden="true"></div>
    <div class="iq-container iq-hero-inner">
      <div class="iq-hero-content">
        <h1 class="iq-hero-title">
          <span class="iq-hero-title-line"><?php esc_html_e('¿Qué desafío tecnológico', 'iquattro'); ?></span>
          <span class="iq-hero-title-line"><?php esc_html_e('quieres resolver hoy?', 'iquattro'); ?></span>
        </h1>
      </div>
      <div class="iq-hero-logo">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/iquattro_group_logo_transparente.png'); ?>" alt="<?php esc_attr_e('iQuattro GROUP', 'iquattro'); ?>" class="iq-logo-img">
        <?php endif; ?>
      </div>
      <div class="iq-hero-ctas">
        <div class="iq-hero-ctas-row iq-hero-ctas-row--first">
          <?php for ($i = 0; $i < 2; $i++) : ?>
            <?php if (isset($iq_hero_pills[$i]) && trim((string) $iq_hero_pills[$i]['text']) !== '') : ?>
              <a href="<?php echo esc_url($iq_hero_pills[$i]['url']); ?>" class="iq-hero-cta"><?php echo esc_html($iq_hero_pills[$i]['text']); ?></a>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
        <div class="iq-hero-ctas-row iq-hero-ctas-row--second">
          <?php for ($i = 2; $i < 4; $i++) : ?>
            <?php if (isset($iq_hero_pills[$i]) && trim((string) $iq_hero_pills[$i]['text']) !== '') : ?>
              <a href="<?php echo esc_url($iq_hero_pills[$i]['url']); ?>" class="iq-hero-cta"><?php echo esc_html($iq_hero_pills[$i]['text']); ?></a>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
        <div class="iq-hero-ctas-row iq-hero-ctas-row--third">
          <?php if (isset($iq_hero_pills[4]) && trim((string) $iq_hero_pills[4]['text']) !== '') : ?>
            <a href="<?php echo esc_url($iq_hero_pills[4]['url']); ?>" class="iq-hero-cta"><?php echo esc_html($iq_hero_pills[4]['text']); ?></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php elseif (is_page(array('capacitacion', 'catalogo-cursos', 'cronograma', 'evento')) || is_singular('curso')) : ?>
  <?php /* Topbar Capacitación: plantillas de página + single curso (detalle) */ ?>
  <?php elseif (is_page(array('acerca-de', 'contacto'))) : ?>
  <section class="iq-page-hero">
    <?php iquattro_render_capacitacion_topbar(); ?>
  </section>
  <?php elseif (is_page(array('data-center', 'seguridad', 'consultoria', 'servicios'))) : ?>
  <?php /* Topbar se renderiza dentro de .iq-page en cada plantilla (page-data-center, etc.) */ ?>
  <?php else : ?>
  <section class="iq-page-hero">
    <div class="iq-topbar">
      <div class="iq-container iq-topbar-inner">
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
  </section>
  <?php endif; ?>
</header>

<div id="iq-page" class="iq-page<?php echo (is_page(array('capacitacion', 'catalogo-cursos', 'cronograma', 'evento')) || is_singular('curso')) ? ' iq-page--capacitacion' : ''; ?>">
