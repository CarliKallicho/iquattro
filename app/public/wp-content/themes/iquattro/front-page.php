<?php
/**
 * Plantilla de la portada (página de inicio)
 *
 * @package iQuattro
 */

get_header();
?>

<main id="main" class="iq-main iq-front">

  <!-- Somos iQuattro -->
  <section class="iq-section iq-somos">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Somos iQuattro: tu socio tecnológico integral', 'iquattro'); ?></h2>
      <div class="iq-somos-intro">
        <p><?php esc_html_e('Acompañamos a empresas e instituciones en cada etapa de su evolución digital, combinando conocimiento, innovación y experiencia para ofrecer soluciones en capacitación, ciberseguridad, infraestructura, soporte y consultoría tecnológica.', 'iquattro'); ?></p>
        <p><?php esc_html_e('Nuestro propósito es ayudarte a construir entornos más seguros, eficientes y preparados para el futuro.', 'iquattro'); ?></p>
      </div>
      <div class="iq-features">
        <div class="iq-feature">
          <span class="iq-feature-icon iq-icon-innovation" aria-hidden="true"></span>
          <h3 class="iq-feature-title"><?php esc_html_e('Innovación contínua', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Creamos soluciones que anticipan las necesidades tecnológicas de tu organización, integrando nuevas ideas, metodologías y herramientas que impulsan tu crecimiento.', 'iquattro'); ?></p>
        </div>
        <div class="iq-feature">
          <span class="iq-feature-icon iq-icon-shield" aria-hidden="true"></span>
          <h3 class="iq-feature-title"><?php esc_html_e('Seguridad en cada paso', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Protegemos tus datos, procesos e infraestructura con un enfoque integral que combina prevención, respuesta y resiliencia para garantizar continuidad operativa.', 'iquattro'); ?></p>
        </div>
        <div class="iq-feature">
          <span class="iq-feature-icon iq-icon-excellence" aria-hidden="true"></span>
          <h3 class="iq-feature-title"><?php esc_html_e('Excelencia técnica', 'iquattro'); ?></h3>
          <p><?php esc_html_e('Nuestro equipo certificado y multidisciplinario ejecuta cada proyecto con precisión, rigor y calidad, asegurando resultados confiables y medibles.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>

  <!-- Nuestras divisiones -->
  <section class="iq-section iq-divisions">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Nuestras divisiones', 'iquattro'); ?></h2>
      <div class="iq-divisions-grid">
        <?php
        $divisions = array(
          array(
            'slug'         => 'data-center',
            'label'        => __('Data Center', 'iquattro'),
            'class'        => 'iq-div-dc',
            'description'  => __('Provisión de hardware, soluciones de software para resolver desafíos de virtualización, respaldos, comprensión de información entre otros', 'iquattro'),
          ),
          array(
            'slug'         => 'seguridad',
            'label'        => __('Seguridad', 'iquattro'),
            'class'        => 'iq-div-seg',
            'description'  => __('Protección de datos, maximizar la continuidad del negocio, servicios como Ethical Hacking, Antivirus, Data Loss Prevention, Anti Ransomware, entre otros.', 'iquattro'),
          ),
          array(
            'slug'         => 'capacitacion',
            'label'        => __('Capacitación', 'iquattro'),
            'class'        => 'iq-div-cap',
            'description'  => __('Programas y cursos de capacitación y rutas de certificación', 'iquattro'),
          ),
          array(
            'slug'         => 'consultoria',
            'label'        => __('Consultoría', 'iquattro'),
            'class'        => 'iq-div-cons',
            'description'  => __('Analizamos los contextos organizacionales desde el punto de vista ampliamente estratégico hasta el profundamente técnico.', 'iquattro'),
          ),
          array(
            'slug'         => 'servicios',
            'label'        => __('Servicios', 'iquattro'),
            'class'        => 'iq-div-serv',
            'description'  => __('Provisión de soporte técnico en los productos que representamos, servicios de Quality Assurance y Testing.', 'iquattro'),
          ),
        );
        foreach ($divisions as $div) :
          $url    = get_permalink(get_page_by_path($div['slug'])) ?: home_url('/' . $div['slug'] . '/');
          $img_url = get_template_directory_uri() . '/assets/images/' . $div['slug'] . '.jpg';
          ?>
          <a href="<?php echo esc_url($url); ?>" class="iq-division-card <?php echo esc_attr($div['class']); ?>">
            <span class="iq-division-img-wrap" aria-hidden="true" style="background-image: url('<?php echo esc_url($img_url); ?>');"></span>
            <span class="iq-division-label"><?php echo esc_html($div['label']); ?></span>
            <span class="iq-division-hover">
              <span class="iq-division-hover-img" style="background-image: url('<?php echo esc_url($img_url); ?>');" aria-hidden="true"></span>
              <span class="iq-division-hover-title"><?php echo esc_html($div['label']); ?></span>
              <span class="iq-division-desc"><?php echo esc_html($div['description']); ?></span>
              <span class="iq-division-btn"><?php esc_html_e('Ver más', 'iquattro'); ?></span>
            </span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Por qué confían en iQuattro -->
  <section class="iq-section iq-trust">
    <div class="iq-container">
      <h2 class="iq-section-title iq-trust-title"><?php esc_html_e('¿Por qué las empresas confían en iQuattro?', 'iquattro'); ?></h2>
      <div class="iq-trust-visual">
        <div class="iq-trust-sphere" aria-hidden="true" role="img"></div>
        <div class="iq-trust-arcs">
          <!-- Semi-luna exterior: 3 primeros textos -->
          <svg class="iq-trust-arc iq-trust-arc-outer" viewBox="0 0 1346 526" aria-hidden="true">
            <defs>
              <path id="iq-trust-path-outer" d="M 173 426 A 500 500 0 0 0 1173 426" />
            </defs>
            <text fill="#fff" font-size="18" font-weight="500" text-anchor="middle">
              <textPath href="#iq-trust-path-outer" startOffset="12%"><?php echo esc_html(__('Formación altamente especializada', 'iquattro')); ?></textPath>
            </text>
            <text fill="#fff" font-size="18" font-weight="500" text-anchor="middle">
              <textPath href="#iq-trust-path-outer" startOffset="42%"><?php echo esc_html(__('Experiencia local + alianzas globales', 'iquattro')); ?></textPath>
            </text>
            <text fill="#fff" font-size="18" font-weight="500" text-anchor="middle">
              <textPath href="#iq-trust-path-outer" startOffset="72%"><?php echo esc_html(__('Infraestructura robusta con marcas líderes', 'iquattro')); ?></textPath>
            </text>
          </svg>
          <!-- Semi-luna interior: 2 últimos textos -->
          <svg class="iq-trust-arc iq-trust-arc-inner" viewBox="0 0 1346 526" aria-hidden="true">
            <defs>
              <path id="iq-trust-path-inner" d="M 323 426 A 350 350 0 0 0 1023 426" />
            </defs>
            <text fill="#fff" font-size="16" font-weight="500" text-anchor="middle">
              <textPath href="#iq-trust-path-inner" startOffset="25%"><?php echo esc_html(__('Protección integral (ciberseguridad ofensiva, defensiva, respuesta)', 'iquattro')); ?></textPath>
            </text>
            <text fill="#fff" font-size="16" font-weight="500" text-anchor="middle">
              <textPath href="#iq-trust-path-inner" startOffset="72%"><?php echo esc_html(__('Soporte técnico certificado', 'iquattro')); ?></textPath>
            </text>
          </svg>
        </div>
      </div>
    </div>
  </section>

  <!-- Aliados tecnológicos -->
  <section class="iq-section iq-allies">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Aliados tecnológicos de clase mundial', 'iquattro'); ?></h2>
      <div class="iq-allies-grid">
        <?php
        $allies = array( 'gitlab', 'vmware', 'veeam', 'quest', 'microsoft', 'fortinet', 'solarwinds', 'dellemc' );
        foreach ( $allies as $ally_name ) :
          $ally_img = get_template_directory_uri() . '/assets/images/' . esc_attr( $ally_name ) . '.png';
          ?>
          <div class="iq-ally" title="<?php echo esc_attr( $ally_name ); ?>">
            <img class="iq-ally-logo" src="<?php echo esc_url( $ally_img ); ?>" alt="<?php echo esc_attr( $ally_name ); ?>" loading="lazy">
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CTA Transformar infraestructura -->
  <section class="iq-section iq-cta">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('¿Listo para transformar tu infraestructura tecnológica?', 'iquattro'); ?></h2>
      <p><?php esc_html_e('Acompañamos a empresas e instituciones en cada etapa de su evolución digital, combinando conocimiento, innovación y experiencia para ofrecer soluciones en capacitación, ciberseguridad, infraestructura, soporte y consultoría tecnológica.', 'iquattro'); ?></p>
      <p><?php esc_html_e('Nuestro propósito es ayudarte a construir entornos más seguros, eficientes y preparados para el futuro.', 'iquattro'); ?></p>
    </div>
  </section>

  <!-- Innovación continua (destacado) -->
  <section class="iq-section iq-innovation-box">
    <div class="iq-container">
      <div class="iq-innovation-card">
        <h3 class="iq-innovation-title"><?php esc_html_e('Innovación contínua', 'iquattro'); ?></h3>
        <p><?php esc_html_e('Creamos soluciones que anticipan las necesidades tecnológicas de tu organización, integrando nuevas ideas, metodologías y herramientas que impulsan tu crecimiento.', 'iquattro'); ?></p>
      </div>
    </div>
  </section>

  <!-- Contacto -->
  <section class="iq-section iq-contact-section" id="contacto">
    <div class="iq-container">
      <h2 class="iq-section-title"><?php esc_html_e('Estamos listos para ayudarte', 'iquattro'); ?></h2>
      <div class="iq-contact-grid">
        <div class="iq-contact-form-wrap">
          <form id="iq-contact-form" class="iq-contact-form" method="post" novalidate>
            <?php wp_nonce_field('iquattro_contact', 'iq_contact_nonce'); ?>
            <p class="iq-form-field">
              <label for="iq-nombre"><?php esc_html_e('Nombre completo', 'iquattro'); ?></label>
              <input type="text" id="iq-nombre" name="nombre" placeholder="<?php esc_attr_e('Ingresa tu nombre completo', 'iquattro'); ?>" required>
            </p>
            <p class="iq-form-row">
              <span class="iq-form-field">
                <label for="iq-email"><?php esc_html_e('Correo electrónico', 'iquattro'); ?></label>
                <input type="email" id="iq-email" name="email" placeholder="<?php esc_attr_e('Ingresa tu dirección de correo', 'iquattro'); ?>" required>
              </span>
              <span class="iq-form-field">
                <label for="iq-telefono"><?php esc_html_e('Teléfono', 'iquattro'); ?></label>
                <input type="tel" id="iq-telefono" name="telefono" placeholder="<?php esc_attr_e('Ingresa tu número de teléfono', 'iquattro'); ?>">
              </span>
            </p>
            <p class="iq-form-field">
              <label for="iq-empresa"><?php esc_html_e('Empresa', 'iquattro'); ?></label>
              <input type="text" id="iq-empresa" name="empresa" placeholder="<?php esc_attr_e('Ingresa el nombre de tu empresa / Independiente', 'iquattro'); ?>">
            </p>
            <p class="iq-form-field">
              <label for="iq-mensaje"><?php esc_html_e('Mensaje', 'iquattro'); ?></label>
              <textarea id="iq-mensaje" name="mensaje" rows="4" placeholder="<?php esc_attr_e('Ingresa tu mensaje', 'iquattro'); ?>" required></textarea>
            </p>
            <p class="iq-form-actions">
              <button type="submit" class="iq-btn iq-btn-primary"><?php esc_html_e('Enviar', 'iquattro'); ?></button>
            </p>
            <p class="iq-form-message" id="iq-form-message" aria-live="polite"></p>
          </form>
        </div>
        <div class="iq-contact-info">
          <div class="iq-contact-info-bg" aria-hidden="true"></div>
          <p><?php esc_html_e('Ya sea que busques capacitarte, fortalecer la seguridad de tu empresa o desarrollar un proyecto tecnológico, déjanos tus datos y conversemos.', 'iquattro'); ?></p>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
