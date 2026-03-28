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
          <div class="iq-acerca-mv-head">
            <img src="<?php echo esc_url($icons_uri . 'mision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="30" height="30" loading="lazy">
            <h2 class="iq-acerca-mv-title"><?php esc_html_e('Misión', 'iquattro'); ?></h2>
          </div>
          <div class="iq-acerca-mv-content">
            <p><?php echo wp_kses(__('Impulsar el <strong>crecimiento tecnológico y profesional</strong> de empresas, instituciones y personas, ofreciendo <strong>soluciones integrales</strong> en capacitación, ciberseguridad, infraestructura, soporte y consultoría.', 'iquattro'), array('strong' => array())); ?></p>
            <p><?php echo wp_kses(__('Trabajamos como <strong>asesores tecnológicos y de innovación</strong>, apoyando a nuestros clientes en la generación de valor, competitividad y eficiencia mediante talento especializado, calidad técnica y agilidad en la ejecución.', 'iquattro'), array('strong' => array())); ?></p>
          </div>
        </div>
        <div class="iq-acerca-mv-card">
          <div class="iq-acerca-mv-head">
            <img src="<?php echo esc_url($icons_uri . 'vision.svg'); ?>" alt="" class="iq-acerca-mv-icon" width="30" height="30" loading="lazy">
            <h2 class="iq-acerca-mv-title"><?php esc_html_e('Visión', 'iquattro'); ?></h2>
          </div>
          <div class="iq-acerca-mv-content">
            <p><?php echo wp_kses(__('Ser reconocidos como una <strong>empresa líder en soluciones tecnológicas integrales</strong> en Bolivia y un referente regional, destacando por nuestra excelencia técnica, innovación constante y capacidad de generar impacto real en la transformación digital de nuestros clientes.', 'iquattro'), array('strong' => array())); ?></p>
            <p><?php echo wp_kses(__('Aspiramos a <strong>construir un ecosistema tecnológico</strong> más competitivo, seguro y sostenible para la región.', 'iquattro'), array('strong' => array())); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="iq-section iq-acerca-valores">
    <div class="iq-container">
      <div class="iq-acerca-valores-panel">
        <h2 class="iq-acerca-valores-heading">
          <img src="<?php echo esc_url($icons_uri . 'valores.svg'); ?>" alt="" class="iq-acerca-valores-icon" width="30" height="30" loading="lazy">
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
    </div>
  </section>
</main>

<?php get_footer(); ?>
