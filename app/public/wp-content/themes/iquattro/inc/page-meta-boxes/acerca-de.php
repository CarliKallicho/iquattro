<?php
$valores = isset($data['valores_cards']) ? $data['valores_cards'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_title" value="<?php echo esc_attr($data['hero_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc" class="widefat" rows="4"><?php echo esc_textarea($data['hero_desc']); ?></textarea></p>
  <p><label><?php esc_html_e('Subtítulo', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_subtitle" value="<?php echo esc_attr($data['hero_subtitle']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Misión', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_mision_title" value="<?php echo esc_attr($data['mision_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Contenido (párrafos separados por línea en blanco)', 'iquattro'); ?></label><br><textarea name="iq_page_mision_content" class="widefat" rows="5"><?php echo esc_textarea($data['mision_content']); ?></textarea></p>

  <p><strong><?php esc_html_e('Visión', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_vision_title" value="<?php echo esc_attr($data['vision_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Contenido', 'iquattro'); ?></label><br><textarea name="iq_page_vision_content" class="widefat" rows="5"><?php echo esc_textarea($data['vision_content']); ?></textarea></p>

  <p><strong><?php esc_html_e('Valores', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título sección', 'iquattro'); ?></label><br><input type="text" name="iq_page_valores_heading" value="<?php echo esc_attr($data['valores_heading']); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 6; $i++) : $c = isset($valores[$i]) ? $valores[$i] : array('title'=>'','text'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Valor %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_valores_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" class="widefat" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>"></p>
      <p><textarea name="iq_page_valores_cards_<?php echo $i; ?>_text" class="widefat" rows="2"><?php echo esc_textarea(isset($c['text'])?$c['text']:''); ?></textarea></p>
    </div>
  <?php endfor; ?>
</div>
