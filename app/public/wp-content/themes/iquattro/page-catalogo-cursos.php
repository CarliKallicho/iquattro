<?php
/**
 * Plantilla Catálogo de cursos
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);
$data = is_array($data) && !empty($data) ? $data : array();
$catalog_page_title = isset($data['page_title']) ? $data['page_title'] : __('Catálogo de cursos', 'iquattro');
$catalog_search_placeholder = isset($data['search_placeholder']) ? $data['search_placeholder'] : __('Buscar cursos', 'iquattro');
$catalog_filter_label = isset($data['filter_label']) ? $data['filter_label'] : __('Filtrar por', 'iquattro');
$catalog_filter_all = isset($data['filter_all']) ? $data['filter_all'] : __('Todas las categorías', 'iquattro');

$catalog_categories = array(
  array('id' => 'datos-ia', 'name' => __('Datos e Inteligencia Artificial', 'iquattro'), 'color' => '#2d5a3d'),
  array('id' => 'seguridad', 'name' => __('Seguridad de la Información', 'iquattro'), 'color' => '#D7263D'),
  array('id' => 'desarrollo', 'name' => __('Desarrollo de Software', 'iquattro'), 'color' => '#1e3a5f'),
  array('id' => 'ofimatica', 'name' => __('Ofimática', 'iquattro'), 'color' => '#47C281'),
  array('id' => 'gestion', 'name' => __('Gestión y Estrategia', 'iquattro'), 'color' => '#7B4B94'),
  array('id' => 'infraestructura', 'name' => __('Infraestructura y Cloud', 'iquattro'), 'color' => '#60a5fa'),
);

$catalog_cards = array(
  array('title' => __('GitOps', 'iquattro'), 'desc' => __('Metodología y herramientas para operar con Git.', 'iquattro'), 'categories' => array('infraestructura'), 'icon' => 'bulbo.svg', 'programado' => true),
  array('title' => __('Spring Boot & Apache Kafka', 'iquattro'), 'desc' => __('Desarrollo de aplicaciones con Spring Boot y mensajería Kafka.', 'iquattro'), 'categories' => array('desarrollo'), 'icon' => 'insignia.svg', 'programado' => false),
  array('title' => __('COBIT 2019 Foundation', 'iquattro'), 'desc' => __('Gobierno y gestión de TI con COBIT.', 'iquattro'), 'categories' => array('gestion'), 'icon' => 'verificacion.svg', 'programado' => true),
  array('title' => __('Docker & Kubernetes', 'iquattro'), 'desc' => __('Contenedores y orquestación en la nube.', 'iquattro'), 'categories' => array('infraestructura', 'desarrollo'), 'icon' => 'bulbo.svg', 'programado' => false),
  array('title' => __('ORACLE Database 12c', 'iquattro'), 'desc' => __('Administración y optimización de bases de datos Oracle.', 'iquattro'), 'categories' => array('datos-ia', 'ofimatica'), 'icon' => 'insignia.svg', 'programado' => false),
  array('title' => __('Bases de Datos con MongoDB', 'iquattro'), 'desc' => __('Bases de datos NoSQL y MongoDB.', 'iquattro'), 'categories' => array('datos-ia'), 'icon' => 'verificacion.svg', 'programado' => false),
  array('title' => __('Managing Microsoft Teams', 'iquattro'), 'desc' => __('Gestión y administración de Microsoft Teams.', 'iquattro'), 'categories' => array('infraestructura', 'ofimatica'), 'icon' => 'bulbo.svg', 'programado' => false),
  array('title' => __('Pentesting Web', 'iquattro'), 'desc' => __('Pruebas de penetración y seguridad web.', 'iquattro'), 'categories' => array('seguridad'), 'icon' => 'insignia.svg', 'programado' => true),
  array('title' => __('Managing Professional (MP) y Strategic Leader (SL)', 'iquattro'), 'desc' => __('Certificación PRINCE2 para dirección de proyectos.', 'iquattro'), 'categories' => array('gestion'), 'icon' => 'verificacion.svg', 'programado' => true),
  array('title' => __('Administración de protección de la información y cumplimiento en Microsoft 365', 'iquattro'), 'desc' => __('Seguridad y cumplimiento en el ecosistema Microsoft 365.', 'iquattro'), 'categories' => array('seguridad', 'ofimatica'), 'icon' => 'bulbo.svg', 'programado' => false),
  array('title' => __('Machine Learning aplicado', 'iquattro'), 'desc' => __('Fundamentos y prácticas de machine learning.', 'iquattro'), 'categories' => array('datos-ia'), 'icon' => 'insignia.svg', 'programado' => false),
  array('title' => __('Ciberseguridad ofensiva', 'iquattro'), 'desc' => __('Técnicas de ethical hacking y red team.', 'iquattro'), 'categories' => array('seguridad'), 'icon' => 'verificacion.svg', 'programado' => false),
  array('title' => __('DevOps y CI/CD', 'iquattro'), 'desc' => __('Pipeline de integración y despliegue continuo.', 'iquattro'), 'categories' => array('desarrollo', 'infraestructura'), 'icon' => 'bulbo.svg', 'programado' => false),
  array('title' => __('Excel avanzado', 'iquattro'), 'desc' => __('Análisis de datos y automatización con Excel.', 'iquattro'), 'categories' => array('ofimatica'), 'icon' => 'insignia.svg', 'programado' => false),
  array('title' => __('Gestión de proyectos ágil', 'iquattro'), 'desc' => __('Scrum, Kanban y metodologías ágiles.', 'iquattro'), 'categories' => array('gestion'), 'icon' => 'verificacion.svg', 'programado' => false),
  array('title' => __('Azure Fundamentals', 'iquattro'), 'desc' => __('Introducción a servicios en la nube Microsoft Azure.', 'iquattro'), 'categories' => array('infraestructura'), 'icon' => 'bulbo.svg', 'programado' => false),
  array('title' => __('Python para datos', 'iquattro'), 'desc' => __('Análisis y visualización de datos con Python.', 'iquattro'), 'categories' => array('datos-ia', 'desarrollo'), 'icon' => 'insignia.svg', 'programado' => false),
  array('title' => __('ISO 27001 y gestión de riesgos', 'iquattro'), 'desc' => __('Normativa de seguridad de la información.', 'iquattro'), 'categories' => array('seguridad', 'gestion'), 'icon' => 'verificacion.svg', 'programado' => false),
);

$icons_uri = get_template_directory_uri() . '/assets/icons/';
$images_uri = get_template_directory_uri() . '/assets/images/';
?>

<main id="main" class="iq-main iq-catalogo-page">
  <div class="iq-catalogo-wrap">
    <h1 class="iq-catalogo-title"><?php echo esc_html($catalog_page_title); ?></h1>

    <div class="iq-catalogo-toolbar">
      <div class="iq-catalogo-search-wrap">
        <span class="iq-catalogo-search-icon" aria-hidden="true"></span>
        <input type="search" id="iq-catalogo-search" class="iq-catalogo-search" placeholder="<?php echo esc_attr($catalog_search_placeholder); ?>" autocomplete="off">
      </div>
      <div class="iq-catalogo-dropdown-wrap">
        <button type="button" id="iq-catalogo-filter-btn" class="iq-catalogo-filter-btn" aria-expanded="false" aria-haspopup="listbox" aria-label="<?php echo esc_attr($catalog_filter_label); ?>">
          <span><?php echo esc_html($catalog_filter_label); ?></span>
          <span class="iq-catalogo-chevron" aria-hidden="true"></span>
        </button>
        <ul id="iq-catalogo-dropdown" class="iq-catalogo-dropdown" role="listbox" hidden>
          <li role="option" data-category=""><?php echo esc_html($catalog_filter_all); ?></li>
          <?php foreach ($catalog_categories as $cat) : ?>
            <li role="option" data-category="<?php echo esc_attr($cat['id']); ?>"><?php echo esc_html($cat['name']); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="iq-catalogo-category-buttons" id="iq-catalogo-category-buttons">
      <?php foreach ($catalog_categories as $cat) : ?>
        <button type="button" class="iq-catalogo-cat-btn" data-category="<?php echo esc_attr($cat['id']); ?>" style="background-color: <?php echo esc_attr($cat['color']); ?>"><?php echo esc_html($cat['name']); ?></button>
      <?php endforeach; ?>
    </div>

    <div class="iq-catalogo-grid" id="iq-catalogo-grid">
      <?php foreach ($catalog_cards as $card) :
        $cat_ids = $card['categories'];
        $colors = array();
        foreach ($cat_ids as $cid) {
          foreach ($catalog_categories as $c) {
            if ($c['id'] === $cid) {
              $colors[] = $c['color'];
              break;
            }
          }
        }
        $search_text = $card['title'] . ' ' . $card['desc'];
        $categories_attr = implode(' ', $cat_ids);
      ?>
        <article class="iq-catalogo-card" data-categories="<?php echo esc_attr($categories_attr); ?>" data-search="<?php echo esc_attr(mb_strtolower($search_text)); ?>" data-category-filter="" style="<?php echo count($colors) === 2 ? 'background: linear-gradient(135deg, ' . esc_attr($colors[0]) . ', ' . esc_attr($colors[1]) . ');' : 'background-color: ' . esc_attr($colors[0]) . ';'; ?>">
          <div class="iq-catalogo-card-inner">
            <div class="iq-catalogo-card-icon-wrap">
              <img src="<?php echo esc_url($icons_uri . $card['icon']); ?>" alt="" class="iq-catalogo-card-icon" loading="lazy">
            </div>
            <div class="iq-catalogo-card-text">
              <h3 class="iq-catalogo-card-title"><?php echo esc_html($card['title']); ?></h3>
              <p class="iq-catalogo-card-desc"><?php echo esc_html($card['desc']); ?></p>
            </div>
            <?php if (!empty($card['programado'])) : ?>
              <div class="iq-catalogo-card-programado">
                <img src="<?php echo esc_url($icons_uri . 'icon-programado.svg'); ?>" alt="" width="16" height="16" loading="lazy">
                <span><?php esc_html_e('Programado', 'iquattro'); ?></span>
              </div>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</main>

<script>
(function() {
  var searchInput = document.getElementById('iq-catalogo-search');
  var filterBtn = document.getElementById('iq-catalogo-filter-btn');
  var dropdown = document.getElementById('iq-catalogo-dropdown');
  var categoryBtns = document.querySelectorAll('.iq-catalogo-cat-btn');
  var cards = document.querySelectorAll('.iq-catalogo-card');
  var currentDropdownCategory = '';
  var currentButtonCategory = '';

  function normalize(s) { return (s || '').toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, ''); }
  function showCard(el, show) { el.style.display = show ? '' : 'none'; }
  function updateCards() {
    var q = normalize(searchInput ? searchInput.value : '');
    var catFilter = currentDropdownCategory || currentButtonCategory;
    cards.forEach(function(card) {
      var searchOk = !q || card.getAttribute('data-search').indexOf(q) !== -1;
      var cats = (card.getAttribute('data-categories') || '').split(/\s+/).filter(Boolean);
      var categoryOk = !catFilter || cats.indexOf(catFilter) !== -1;
      showCard(card, searchOk && categoryOk);
    });
  }

  if (searchInput) {
    searchInput.addEventListener('input', updateCards);
  }

  if (filterBtn && dropdown) {
    filterBtn.addEventListener('click', function() {
      var open = dropdown.getAttribute('hidden') === null;
      dropdown.toggleAttribute('hidden', open);
      filterBtn.setAttribute('aria-expanded', !open);
    });
    dropdown.querySelectorAll('[role="option"]').forEach(function(opt) {
      opt.addEventListener('click', function() {
        currentDropdownCategory = this.getAttribute('data-category') || '';
        currentButtonCategory = '';
        categoryBtns.forEach(function(b) { b.classList.remove('iq-cat-btn-active'); });
        dropdown.setAttribute('hidden', '');
        filterBtn.setAttribute('aria-expanded', 'false');
        filterBtn.querySelector('span').textContent = this.textContent.trim() || 'Filtrar por';
        updateCards();
      });
    });
  }

  document.addEventListener('click', function(e) {
    if (dropdown && filterBtn && !dropdown.contains(e.target) && e.target !== filterBtn) {
      dropdown.setAttribute('hidden', '');
      filterBtn.setAttribute('aria-expanded', 'false');
    }
  });

  categoryBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      var cat = this.getAttribute('data-category');
      if (currentButtonCategory === cat) {
        currentButtonCategory = '';
        this.classList.remove('iq-cat-btn-active');
      } else {
        currentButtonCategory = cat;
        categoryBtns.forEach(function(b) { b.classList.remove('iq-cat-btn-active'); });
        this.classList.add('iq-cat-btn-active');
      }
      currentDropdownCategory = '';
      if (dropdown) dropdown.setAttribute('hidden', '');
      if (filterBtn) { filterBtn.querySelector('span').textContent = 'Filtrar por'; filterBtn.setAttribute('aria-expanded', 'false'); }
      updateCards();
    });
  });
})();
</script>

<?php get_footer(); ?>
