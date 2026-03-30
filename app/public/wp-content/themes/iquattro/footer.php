<?php
/**
 * Pie de página del sitio
 *
 * @package iQuattro
 */

if (!defined('ABSPATH')) {
  exit;
}
?>

</div><!-- #iq-page -->

<footer id="colophon" class="iq-footer">
  <div class="iq-container iq-footer-inner">
    <div class="iq-footer-grid">
      <div class="iq-footer-col iq-footer-brand">
        <div class="iq-footer-brand-inner">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="iq-footer-logo">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/iquattro-logo-blanco.png'); ?>" alt="<?php bloginfo('name'); ?>" class="iq-footer-logo-img" width="110" height="150">
          </a>
          <div class="iq-footer-brand-text">
            <span class="iq-footer-logo-text">iQuattro SRL</span>
            <p class="iq-footer-tagline"><?php esc_html_e('Soluciones tecnológicas integrales en capacitación, ciberseguridad, infraestructura, soporte y consultoría.', 'iquattro'); ?></p>
          </div>
        </div>
      </div>
      <div class="iq-footer-col iq-footer-divisions">
        <h3 class="iq-footer-title"><?php esc_html_e('Nuestras Divisiones', 'iquattro'); ?></h3>
        <ul class="iq-footer-links">
          <?php
          $divisions = iquattro_get_division_pages();
          if (!empty($divisions)) :
            foreach ($divisions as $div) :
              ?>
              <li><a href="<?php echo esc_url($div['url']); ?>"><?php echo esc_html($div['title']); ?></a></li>
            <?php
            endforeach;
          else :
            ?>
            <li><a href="<?php echo esc_url(home_url('/data-center/')); ?>"><?php esc_html_e('Data Center', 'iquattro'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/seguridad/')); ?>"><?php esc_html_e('Seguridad', 'iquattro'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/consultoria/')); ?>"><?php esc_html_e('Consultoría', 'iquattro'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/servicios/')); ?>"><?php esc_html_e('Servicios', 'iquattro'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/capacitacion/')); ?>"><?php esc_html_e('Capacitación', 'iquattro'); ?></a></li>
          <?php endif; ?>
        </ul>
      </div>
      <div class="iq-footer-col iq-footer-contact">
        <h3 class="iq-footer-title"><?php esc_html_e('Datos de Contacto', 'iquattro'); ?></h3>
        <ul class="iq-footer-contact-list">
          <li>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/ubicacion.svg'); ?>" alt="" class="iq-footer-icon-img" width="24" height="24" loading="lazy" aria-hidden="true">
            <?php echo esc_html(get_theme_mod('iquattro_location', 'Bolivia')); ?>
          </li>
          <li>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/icon-mail.svg'); ?>" alt="" class="iq-footer-icon-img" width="24" height="24" loading="lazy" aria-hidden="true">
            <a href="mailto:<?php echo esc_attr(get_theme_mod('iquattro_email', 'marisol@i-quattro.com')); ?>"><?php echo esc_html(get_theme_mod('iquattro_email', 'marisol@i-quattro.com')); ?></a>
          </li>
          <li>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/icons/icon-telefono.svg'); ?>" alt="" class="iq-footer-icon-img" width="24" height="24" loading="lazy" aria-hidden="true">
            <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', get_theme_mod('iquattro_phone', '+591 71947016'))); ?>"><?php echo esc_html(get_theme_mod('iquattro_phone', '+591 71947016')); ?></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="iq-footer-bottom">
      <p class="iq-footer-copy">© <?php echo esc_html(gmdate('Y')); ?> IQUATTRO SRL. <?php esc_html_e('Todos los derechos reservados.', 'iquattro'); ?></p>
      <p class="iq-footer-copy"><?php esc_html_e('Diseñado y desarrollado por Stradia.', 'iquattro'); ?></p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
