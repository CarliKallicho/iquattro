<?php
/**
 * Plantilla Catálogo de cursos
 *
 * @package iQuattro
 */

get_header();

global $post;
$data = iquattro_get_editable_page_data($post);

$catalog_categories = array();
$categoria_terms = get_terms(array(
  'taxonomy'   => 'categoria_curso',
  'hide_empty' => false,
));
if (!is_wp_error($categoria_terms) && !empty($categoria_terms)) {
  foreach ($categoria_terms as $categoria_term) {
    $catalog_categories[] = array(
      'id'    => $categoria_term->slug,
      'name'  => $categoria_term->name,
      'color' => iquattro_curso_get_term_color($categoria_term),
    );
  }
} else {
  $defaults = iquattro_curso_category_default_colors();
  foreach ($defaults as $slug => $hex) {
    $catalog_categories[] = array(
      'id'    => $slug,
      'name'  => $slug,
      'color' => $hex,
    );
  }
}

$catalog_query = new WP_Query(array(
  'post_type'      => 'curso',
  'post_status'    => 'publish',
  'posts_per_page' => -1,
  'orderby'        => 'title',
  'order'          => 'ASC',
));

$icons_uri = get_template_directory_uri() . '/assets/icons/';
?>

<main id="main" class="iq-main iq-catalogo-page">
  <div class="iq-capacitacion-wrap">
    <?php iquattro_render_capacitacion_topbar(); ?>
    <div class="iq-catalogo-wrap">
    <h1 class="iq-catalogo-title"><?php echo esc_html($data['page_title']); ?></h1>

    <div class="iq-catalogo-toolbar">
      <div class="iq-catalogo-search-wrap">
        <span class="iq-catalogo-search-icon" aria-hidden="true"></span>
        <input type="search" id="iq-catalogo-search" class="iq-catalogo-search" placeholder="<?php echo esc_attr($data['search_placeholder']); ?>" autocomplete="off">
      </div>
      <div class="iq-catalogo-dropdown-wrap">
        <button type="button" id="iq-catalogo-filter-btn" class="iq-catalogo-filter-btn" aria-expanded="false" aria-haspopup="listbox" aria-label="<?php echo esc_attr($data['filter_label']); ?>">
          <span><?php echo esc_html($data['filter_label']); ?></span>
          <span class="iq-catalogo-chevron" aria-hidden="true"></span>
        </button>
        <ul id="iq-catalogo-dropdown" class="iq-catalogo-dropdown" role="listbox" hidden>
          <li role="option" data-category=""><?php echo esc_html($data['filter_all']); ?></li>
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
      <?php
      if ($catalog_query->have_posts()) :
        while ($catalog_query->have_posts()) :
          $catalog_query->the_post();
          $cid = get_the_ID();
          $card_title = get_the_title();
          $desc = get_post_meta($cid, '_curso_desc', true);
          $icon = get_post_meta($cid, '_curso_icon', true) ?: 'bulbo.svg';
          $programado = get_post_meta($cid, '_curso_programado', true) === '1';
          $terms = get_the_terms($cid, 'categoria_curso');
          $cat_ids = array();
          $colors = array();
          if (is_array($terms)) {
            foreach ($terms as $t) {
              $cat_ids[] = $t->slug;
              $colors[] = iquattro_curso_get_term_color($t);
            }
          }
          if (empty($colors)) {
            $colors[] = '#47C281';
          }
          $search_text = $card_title . ' ' . $desc;
          $search_key = function_exists('mb_strtolower') ? mb_strtolower($search_text, 'UTF-8') : strtolower($search_text);
          $categories_attr = implode(' ', $cat_ids);
          $bg_style = count($colors) >= 2
            ? 'background: linear-gradient(135deg, ' . esc_attr($colors[0]) . ', ' . esc_attr($colors[1]) . ');'
            : 'background-color: ' . esc_attr($colors[0]) . ';';
          ?>
        <a href="<?php the_permalink(); ?>" class="iq-catalogo-card" data-categories="<?php echo esc_attr($categories_attr); ?>" data-search="<?php echo esc_attr($search_key); ?>" data-category-filter="" style="<?php echo $bg_style; ?>">
          <div class="iq-catalogo-card-inner">
            <div class="iq-catalogo-card-icon-wrap">
              <img src="<?php echo esc_url($icons_uri . $icon); ?>" alt="" class="iq-catalogo-card-icon" loading="lazy">
            </div>
            <div class="iq-catalogo-card-text">
              <h3 class="iq-catalogo-card-title iq-sr-only"><?php echo esc_html($card_title); ?></h3>
              <?php
              $desc_lines = preg_split('/\r\n|\r|\n/', (string) $desc, -1, PREG_SPLIT_NO_EMPTY);
              if (empty($desc_lines)) {
                echo '<p class="iq-catalogo-card-desc"></p>';
              } else {
                foreach ($desc_lines as $line) {
                  echo '<p class="iq-catalogo-card-desc">' . esc_html(trim($line)) . '</p>';
                }
              }
              ?>
            </div>
            <?php if ($programado) : ?>
              <div class="iq-catalogo-card-programado">
                <img src="<?php echo esc_url($icons_uri . 'icon-programado.svg'); ?>" alt="" width="24" height="24" class="iq-catalogo-card-programado-icon" loading="lazy">
                <span><?php esc_html_e('Programado', 'iquattro'); ?></span>
              </div>
            <?php endif; ?>
          </div>
        </a>
          <?php
        endwhile;
        wp_reset_postdata();
      else :
        ?>
        <p class="iq-catalogo-empty"><?php esc_html_e('No hay cursos publicados todavía.', 'iquattro'); ?></p>
      <?php endif; ?>
    </div>
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
