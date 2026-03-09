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
        <h1 class="iq-hero-title"><?php esc_html_e('¿Qué desafío tecnológico quieres resolver hoy?', 'iquattro'); ?></h1>
      </div>
      <div class="iq-hero-logo">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php else : ?>
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/iquattro_group_logo_transparente.png'); ?>" alt="<?php esc_attr_e('iQuattro GROUP', 'iquattro'); ?>" class="iq-logo-img">
        <?php endif; ?>
      </div>
      <div class="iq-hero-ctas">
        <div class="iq-hero-ctas-row iq-hero-ctas-row--top">
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('capacitacion')) ?: home_url('/capacitacion/')); ?>" class="iq-hero-cta"><?php esc_html_e('Necesito capacitar a mi equipo', 'iquattro'); ?></a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('servicios')) ?: home_url('/servicios/')); ?>" class="iq-hero-cta"><?php esc_html_e('Busco licencias o infraestructura', 'iquattro'); ?></a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('servicios')) ?: home_url('/servicios/')); ?>" class="iq-hero-cta"><?php esc_html_e('Requiero soporte especializado', 'iquattro'); ?></a>
        </div>
        <div class="iq-hero-ctas-row iq-hero-ctas-row--bottom">
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('seguridad')) ?: home_url('/seguridad/')); ?>" class="iq-hero-cta"><?php esc_html_e('Quiero mejorar la seguridad de mi empresa', 'iquattro'); ?></a>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('consultoria')) ?: home_url('/consultoria/')); ?>" class="iq-hero-cta"><?php esc_html_e('Tengo un proyecto tecnológico completo', 'iquattro'); ?></a>
        </div>
      </div>
    </div>
  </section>
  <?php elseif (is_page('capacitacion')) : ?>
  <?php /* Topbar Capacitación se renderiza dentro de .iq-capacitacion-wrap en page-capacitacion.php */ ?>
  <?php elseif (is_page('cronograma')) : ?>
  <?php /* Topbar se renderiza dentro de .iq-cronograma-wrap en page-cronograma.php */ ?>
  <?php elseif (is_page(array('acerca-de', 'contacto'))) : ?>
  <section class="iq-page-hero">
    <?php iquattro_render_capacitacion_topbar(); ?>
  </section>
  <?php elseif (is_page(array('data-center', 'data-center-hardware', 'data-center-software', 'data-center-servicios', 'seguridad', 'consultoria', 'servicios'))) : ?>
  <?php /* Topbar se renderiza dentro de .iq-page en cada plantilla */ ?>
  <?php elseif (is_singular('curso')) : ?>
  <?php /* Topbar se renderiza dentro de .iq-curso-detail-wrap en single-curso.php */ ?>
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

<div id="iq-page" class="iq-page<?php echo is_page('capacitacion') ? ' iq-page--capacitacion' : ''; ?><?php echo is_singular('curso') ? ' iq-page--curso-detail' : ''; ?>">
