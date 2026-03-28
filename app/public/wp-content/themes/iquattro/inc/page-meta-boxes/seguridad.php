<?php
$cards = isset($data['seguridad_cards']) ? $data['seguridad_cards'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_hero_bg_id', __('Imagen de fondo del hero (por defecto: fondo-seguridad.jpg)', 'iquattro'), $data['hero_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_title" value="<?php echo esc_attr($data['hero_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc" class="widefat" rows="4"><?php echo esc_textarea($data['hero_desc']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn" value="<?php echo esc_attr($data['hero_btn']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('¿Qué protegemos?', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_que_protegemos_title" value="<?php echo esc_attr($data['que_protegemos_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Intro', 'iquattro'); ?></label><br><textarea name="iq_page_que_protegemos_intro" class="widefat" rows="3"><?php echo esc_textarea($data['que_protegemos_intro']); ?></textarea></p>
  <p><?php esc_html_e('Cards (icono = nombre en assets/icons/)', 'iquattro'); ?></p>
  <?php for ($i = 0; $i < 10; $i++) : $c = isset($cards[$i]) ? $cards[$i] : array('icon'=>'','icon_id'=>0,'title'=>'','desc'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_seguridad_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr($c['icon']); ?>" placeholder="icon.svg" style="width:140px">
      <input type="text" name="iq_page_seguridad_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" class="widefat" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_seguridad_cards_' . (int) $i . '_icon_id',
        __('Icono desde medios (opcional; si hay, reemplaza el archivo en assets/icons)', 'iquattro'),
        isset($c['icon_id']) ? (int) $c['icon_id'] : 0
      );
      ?>
      <p><textarea name="iq_page_seguridad_cards_<?php echo $i; ?>_desc" class="widefat" rows="2"><?php echo esc_textarea(isset($c['desc'])?$c['desc']:''); ?></textarea></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Monitoreo 24/7', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_monitoreo_title" value="<?php echo esc_attr($data['monitoreo_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto', 'iquattro'); ?></label><br><textarea name="iq_page_monitoreo_intro" class="widefat" rows="3"><?php echo esc_textarea($data['monitoreo_intro']); ?></textarea></p>

  <p><strong><?php esc_html_e('Sección contacto', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_contact_side_bg_id', __('Imagen de fondo del costado (por defecto: fondo-servicios-costado.jpg)', 'iquattro'), $data['contact_side_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
