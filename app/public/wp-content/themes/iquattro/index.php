<?php
/**
 * Plantilla principal
 *
 * @package iQuattro
 */

get_header();
?>

<main id="main" class="iq-main">
  <?php
  if (have_posts()) :
    while (have_posts()) :
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('iq-content'); ?>>
        <div class="iq-container">
          <?php the_content(); ?>
        </div>
      </article>
      <?php
    endwhile;
  else :
    ?>
    <div class="iq-container">
      <p><?php esc_html_e('No se encontró contenido.', 'iquattro'); ?></p>
    </div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
