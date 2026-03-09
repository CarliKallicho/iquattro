<?php
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Título de página', 'iquattro'); ?></strong></p>
  <p><input type="text" name="iq_page_page_title" value="<?php echo esc_attr($data['page_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Placeholder búsqueda', 'iquattro'); ?></label><br><input type="text" name="iq_page_search_placeholder" value="<?php echo esc_attr($data['search_placeholder']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Etiqueta filtro', 'iquattro'); ?></label><br><input type="text" name="iq_page_filter_label" value="<?php echo esc_attr($data['filter_label']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Opción todas las categorías', 'iquattro'); ?></label><br><input type="text" name="iq_page_filter_all" value="<?php echo esc_attr($data['filter_all']); ?>" class="widefat"></p>
</div>
