<?php
/**
 * 404 - Página no encontrada
 *
 * @package iQuattro
 */

get_header();
?>

<main id="main" class="iq-main">
  <div class="iq-container iq-content">
    <header class="iq-page-header">
      <h1 class="iq-page-title"><?php esc_html_e('Página no encontrada', 'iquattro'); ?></h1>
    </header>
    <p><?php esc_html_e('El contenido que buscas no existe o ha sido movido.', 'iquattro'); ?></p>
    <p><a href="<?php echo esc_url(home_url('/')); ?>" class="iq-btn iq-btn-primary"><?php esc_html_e('Volver al inicio', 'iquattro'); ?></a></p>
  </div>
</main>

<?php get_footer(); ?>
