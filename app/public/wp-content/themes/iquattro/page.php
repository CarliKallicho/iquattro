<?php
/**
 * Plantilla por defecto para páginas
 *
 * @package iQuattro
 */

get_header();
?>

<main id="main" class="iq-main">
  <?php
  while (have_posts()) :
    the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('iq-content'); ?>>
      <div class="iq-container">
        <header class="iq-page-header">
          <h1 class="iq-page-title"><?php the_title(); ?></h1>
        </header>
        <div class="iq-entry-content">
          <?php the_content(); ?>
        </div>
      </div>
    </article>
    <?php
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
