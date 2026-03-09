<?php
$cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_title" value="<?php echo esc_attr($data['hero_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc" class="widefat" rows="4"><?php echo esc_textarea($data['hero_desc']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn" value="<?php echo esc_attr($data['hero_btn']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Qué hacemos', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_que_hacemos_title" value="<?php echo esc_attr($data['que_hacemos_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Subtítulo', 'iquattro'); ?></label><br><input type="text" name="iq_page_que_hacemos_subtitle" value="<?php echo esc_attr($data['que_hacemos_subtitle']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto', 'iquattro'); ?></label><br><textarea name="iq_page_que_hacemos_text" class="widefat" rows="3"><?php echo esc_textarea($data['que_hacemos_text']); ?></textarea></p>
  <p><label><?php esc_html_e('Cajas (una por línea)', 'iquattro'); ?></label><br><textarea name="iq_page_que_hacemos_cajas" class="widefat" rows="4"><?php echo esc_textarea($data['que_hacemos_cajas']); ?></textarea></p>

  <p><strong><?php esc_html_e('Servicios especializados (cards)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_especializados_title" value="<?php echo esc_attr($data['especializados_title']); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 5; $i++) : $c = isset($cards[$i]) ? $cards[$i] : array('title'=>'','pills'=>'','desc'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" class="widefat" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>"></p>
      <p><label><?php esc_html_e('Pills (uno por línea)', 'iquattro'); ?></label><br><textarea name="iq_page_servicios_cards_<?php echo $i; ?>_pills" class="widefat" rows="4"><?php echo esc_textarea(isset($c['pills'])?$c['pills']:''); ?></textarea></p>
      <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_servicios_cards_<?php echo $i; ?>_desc" class="widefat" rows="2"><?php echo esc_textarea(isset($c['desc'])?$c['desc']:''); ?></textarea></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Sección contacto', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
