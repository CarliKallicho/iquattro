<?php
/**
 * Entrada individual (blog)
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
          <?php if (get_the_date()) : ?>
            <p class="iq-entry-meta"><?php echo esc_html(get_the_date()); ?></p>
          <?php endif; ?>
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
