<?php
?>
<div class="iq-page-meta-box" style="display:grid;gap:1rem;">
  <p><label><?php esc_html_e('Título de la página', 'iquattro'); ?></label><br>
    <input type="text" name="iq_page_page_title" value="<?php echo esc_attr($data['page_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Mensaje cuando no hay cursos programados', 'iquattro'); ?></label><br>
    <textarea name="iq_page_empty_message" class="widefat" rows="2"><?php echo esc_textarea($data['empty_message']); ?></textarea></p>
</div>
