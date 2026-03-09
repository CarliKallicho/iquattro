<?php
$dc_hardware_url  = get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/');
$dc_software_url  = get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/');
$dc_servicios_url = get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/');
$servicios_cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
$soluciones_cards = isset($data['soluciones_cards']) ? $data['soluciones_cards'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_title" value="<?php echo esc_attr($data['hero_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Descripción 1', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc_1" class="widefat" rows="2"><?php echo esc_textarea($data['hero_desc_1']); ?></textarea></p>
  <p><label><?php esc_html_e('Descripción 2', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc_2" class="widefat" rows="2"><?php echo esc_textarea($data['hero_desc_2']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn" value="<?php echo esc_attr($data['hero_btn']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Infraestructura', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_infra_title" value="<?php echo esc_attr($data['infra_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto', 'iquattro'); ?></label><br><textarea name="iq_page_infra_intro" class="widefat" rows="3"><?php echo esc_textarea($data['infra_intro']); ?></textarea></p>

  <p><strong><?php esc_html_e('Cómo trabajamos', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_como_title" value="<?php echo esc_attr($data['como_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Pills (uno por línea)', 'iquattro'); ?></label><br><textarea name="iq_page_como_pills" class="widefat" rows="6"><?php echo esc_textarea($data['como_pills']); ?></textarea></p>

  <p><strong><?php esc_html_e('Nuestros servicios', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_servicios_title" value="<?php echo esc_attr($data['servicios_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Intro', 'iquattro'); ?></label><br><textarea name="iq_page_servicios_intro" class="widefat" rows="2"><?php echo esc_textarea($data['servicios_intro']); ?></textarea></p>
  <p><?php esc_html_e('Cards (icono = nombre en assets/icons/; enlaces Hardware/Software/Servicios se generan automático)', 'iquattro'); ?></p>
  <?php for ($i = 0; $i < 5; $i++) : $c = isset($servicios_cards[$i]) ? $servicios_cards[$i] : array('icon'=>'','title'=>'','desc'=>'','btn_txt'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr($c['icon']); ?>" placeholder="hardware.svg" style="width:140px">
      <input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>" class="widefat"></p>
      <p><textarea name="iq_page_servicios_cards_<?php echo $i; ?>_desc" class="widefat" rows="2" placeholder="<?php esc_attr_e('Descripción', 'iquattro'); ?>"><?php echo esc_textarea(isset($c['desc'])?$c['desc']:''); ?></textarea></p>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_btn_txt" value="<?php echo esc_attr(isset($c['btn_txt'])?$c['btn_txt']:''); ?>" placeholder="<?php esc_attr_e('Texto botón', 'iquattro'); ?>" class="widefat"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Soluciones (cards naranja)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_soluciones_title" value="<?php echo esc_attr($data['soluciones_title']); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 5; $i++) : $c = isset($soluciones_cards[$i]) ? $soluciones_cards[$i] : array('title'=>'','text'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Solución %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_soluciones_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>" class="widefat"></p>
      <p><textarea name="iq_page_soluciones_cards_<?php echo $i; ?>_text" class="widefat" rows="3"><?php echo esc_textarea(isset($c['text'])?$c['text']:''); ?></textarea></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Sección contacto', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA (costado)', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
