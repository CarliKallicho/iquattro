<?php
/**
 * Plantilla página Acerca De
 *
 * @package iQuattro
 */

get_header();

$icons_uri = get_template_directory_uri() . '/assets/icons/';
?>
<main id="main" class="iq-main iq-acerca-page">
  <section class="iq-section iq-acerca-hero">
    <div class="iq-container iq-acerca-hero-inner">
      <h1 class="iq-acerca-hero-title"><?php esc_html_e('Somos iQuattro: tecnología, conocimiento y confianza', 'iquattro'); ?></h1>
      <p class="iq-acerca-hero-desc"><?php esc_html_e('Somos una empresa boliviana de tecnología con más de 10 años de experiencia acompañando a empresas, instituciones y profesionales en sus desafíos tecnológicos. En iQuattro integramos capacitación, ciberseguridad, infraestructura, soporte y consultoría para ofrecer soluciones sólidas, seguras y orientadas a resultados reales.', 'iquattro'); ?></p>
      <p class="iq-acerca-hero-subtitle"><?php esc_html_e('Somos el socio tecnológico que tu empresa necesita.', 'iquattro'); ?></p>
    </div>
  </section>

  <section class="iq-section iq-acerca-mision-vision">
    <div class="iq-container">
      <div class="iq-acerca-mv-grid">
        <div class="iq-acerca-mv-card">
          <img src="<?php echo esc_url($icons_uri . 'mision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="48" height="48" loading="lazy">
          <h2 class="iq-acerca-mv-title"><?php esc_html_e('Misión', 'iquattro'); ?></h2>
          <div class="iq-acerca-mv-content">
            <p><?php echo wp_kses(__('Nuestra misión es entregar <strong>soluciones integrales</strong> que impulsen la transformación digital de nuestros clientes, combinando tecnología de vanguardia con un equipo de <strong>asesores tecnológicos y de innovación</strong> comprometidos con el éxito de cada proyecto.', 'iquattro'), array('strong' => array())); ?></p>
            <p><?php esc_html_e('Trabajamos de cerca con empresas e instituciones para entender sus necesidades y ofrecer servicios que generen valor sostenible y crecimiento.', 'iquattro'); ?></p>
          </div>
        </div>
        <div class="iq-acerca-mv-card">
          <img src="<?php echo esc_url($icons_uri . 'vision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="48" height="48" loading="lazy">
          <h2 class="iq-acerca-mv-title"><?php esc_html_e('Visión', 'iquattro'); ?></h2>
          <div class="iq-acerca-mv-content">
            <p><?php echo wp_kses(__('Aspiramos a ser reconocidos como <strong>empresa líder en soluciones tecnológicas integrales</strong> en la región, destacando por la calidad de nuestro servicio, la innovación constante y la confianza que construimos con cada cliente.', 'iquattro'), array('strong' => array())); ?></p>
            <p><?php esc_html_e('Buscamos expandir nuestro impacto acompañando a más organizaciones en su camino hacia la digitalización y la mejora continua de sus procesos.', 'iquattro'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-acerca-valores">
    <div class="iq-container">
      <h2 class="iq-acerca-valores-heading">
        <img src="<?php echo esc_url($icons_uri . 'valores.svg'); ?>" alt="" class="iq-acerca-valores-icon" width="40" height="40" loading="lazy">
        <?php esc_html_e('Valores', 'iquattro'); ?>
      </h2>
      <div class="iq-acerca-valores-grid">
        <div class="iq-acerca-valor-card iq-acerca-valor-dark-light">
          <h3 class="iq-acerca-valor-title"><?php esc_html_e('Respeto', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Es el principio que guía nuestra forma de trabajar. Respeto hacia nuestra gente, nuestros clientes y la sociedad a la que pertenecemos.', 'iquattro'); ?></p>
        </div>
        <div class="iq-acerca-valor-card iq-acerca-valor-light-dark">
          <h3 class="iq-acerca-valor-title"><?php esc_html_e('Innovación continua', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Buscamos constantemente nuevas ideas, metodologías y tecnologías que generen soluciones de alto impacto.', 'iquattro'); ?></p>
        </div>
        <div class="iq-acerca-valor-card iq-acerca-valor-dark-light">
          <h3 class="iq-acerca-valor-title"><?php esc_html_e('Excelencia técnica', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Actuamos con rigor profesional, actualización permanente y compromiso con la calidad.', 'iquattro'); ?></p>
        </div>
        <div class="iq-acerca-valor-card iq-acerca-valor-light-dark">
          <h3 class="iq-acerca-valor-title"><?php esc_html_e('Ética y confidencialidad', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Protegemos la información y la confianza de nuestros clientes con responsabilidad y transparencia.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
