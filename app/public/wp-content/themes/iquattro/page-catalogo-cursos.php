<?php
/**
 * Plantilla Catálogo de cursos
 * Los cards son posts tipo "curso"; al hacer clic se abre Detalle Curso (single-curso.php).
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

$catalog_categories = get_terms(array('taxonomy' => 'categoria_curso', 'hide_empty' => false));
if (is_wp_error($catalog_categories)) {
  $catalog_categories = array();
}
$categorias_map = array();
foreach ($catalog_categories as $t) {
  $categorias_map[$t->slug] = array('id' => $t->slug, 'name' => $t->name, 'color' => iquattro_curso_get_term_color($t));
}

$query = new WP_Query(array(
  'post_type' => 'curso',
  'posts_per_page' => -1,
  'orderby' => 'menu_order title',
  'order' => 'ASC',
  'post_status' => 'publish',
));

$icons_uri = get_template_directory_uri() . '/assets/icons/';
$images_uri = get_template_directory_uri() . '/assets/images/';
?>

<?php $cronograma_url = get_permalink(get_page_by_path('cronograma')) ?: home_url('/cronograma/'); ?>
<main id="main" class="iq-main iq-catalogo-page">
  <div class="iq-catalogo-wrap">
    <div class="iq-catalogo-header">
      <h1 class="iq-catalogo-title"><?php echo esc_html($catalog_page_title); ?></h1>
      <a href="<?php echo esc_url($cronograma_url); ?>" class="iq-catalogo-cronograma-btn"><?php esc_html_e('Ver Cronograma', 'iquattro'); ?></a>
    </div>

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
            <li role="option" data-category="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="iq-catalogo-category-buttons" id="iq-catalogo-category-buttons">
      <?php foreach ($catalog_categories as $cat) : ?>
        <button type="button" class="iq-catalogo-cat-btn" data-category="<?php echo esc_attr($cat->slug); ?>" style="background-color: <?php echo esc_attr(iquattro_curso_get_term_color($cat)); ?>"><?php echo esc_html($cat->name); ?></button>
      <?php endforeach; ?>
    </div>

    <div class="iq-catalogo-grid" id="iq-catalogo-grid">
      <?php
      if ($query->have_posts()) :
        while ($query->have_posts()) :
          $query->the_post();
          $pid = get_the_ID();
          $card_title = get_the_title();
          $card_desc = get_post_meta($pid, '_curso_desc', true);
          $card_icon = get_post_meta($pid, '_curso_icon', true);
          $card_programado = get_post_meta($pid, '_curso_programado', true) === '1';
          if ($card_icon === '') $card_icon = 'bulbo.svg';

          $term_list = get_the_terms($pid, 'categoria_curso');
          $cat_ids = array();
          $colors = array();
          if (is_array($term_list)) {
            foreach ($term_list as $t) {
              $cat_ids[] = $t->slug;
              $colors[] = iquattro_curso_get_term_color($t);
            }
          }
          $search_text = mb_strtolower($card_title . ' ' . $card_desc);
          $categories_attr = implode(' ', $cat_ids);
          $card_url = get_permalink();
      ?>
        <a href="<?php echo esc_url($card_url); ?>" class="iq-catalogo-card-link" data-categories="<?php echo esc_attr($categories_attr); ?>" data-search="<?php echo esc_attr($search_text); ?>" data-category-filter="" style="<?php echo count($colors) === 2 ? 'background: linear-gradient(135deg, ' . esc_attr($colors[0]) . ', ' . esc_attr($colors[1]) . ');' : (count($colors) === 1 ? 'background-color: ' . esc_attr($colors[0]) . ';' : 'background-color: #47C281;'); ?>">
          <article class="iq-catalogo-card">
            <div class="iq-catalogo-card-inner">
              <div class="iq-catalogo-card-icon-wrap">
                <img src="<?php echo esc_url($icons_uri . $card_icon); ?>" alt="" class="iq-catalogo-card-icon" loading="lazy">
              </div>
              <div class="iq-catalogo-card-text">
                <h3 class="iq-catalogo-card-title"><?php echo esc_html($card_title); ?></h3>
                <p class="iq-catalogo-card-desc"><?php echo esc_html($card_desc); ?></p>
              </div>
              <?php if ($card_programado) : ?>
                <div class="iq-catalogo-card-programado">
                  <img src="<?php echo esc_url($icons_uri . 'icon-programado.svg'); ?>" alt="" width="16" height="16" loading="lazy">
                  <span><?php esc_html_e('Programado', 'iquattro'); ?></span>
                </div>
              <?php endif; ?>
            </div>
          </article>
        </a>
      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>
  </div>
</main>

<script>
(function() {
  var searchInput = document.getElementById('iq-catalogo-search');
  var filterBtn = document.getElementById('iq-catalogo-filter-btn');
  var dropdown = document.getElementById('iq-catalogo-dropdown');
  var categoryBtns = document.querySelectorAll('.iq-catalogo-cat-btn');
  var cards = document.querySelectorAll('.iq-catalogo-card-link');
  var currentDropdownCategory = '';
  var currentButtonCategory = '';

  function normalize(s) { return (s || '').toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, ''); }
  function showCard(el, show) { el.style.display = show ? '' : 'none'; }
  function updateCards() {
    var q = normalize(searchInput ? searchInput.value : '');
    var catFilter = currentDropdownCategory || currentButtonCategory;
    cards.forEach(function(card) {
      var searchOk = !q || (card.getAttribute('data-search') || '').indexOf(q) !== -1;
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
