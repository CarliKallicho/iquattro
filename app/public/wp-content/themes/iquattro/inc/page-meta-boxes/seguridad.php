<?php
$cards = isset($data['seguridad_cards']) ? $data['seguridad_cards'] : array();
$ejecucion_cards = isset($data['ejecucion_cards']) ? $data['ejecucion_cards'] : array();
$servicios_complementarios_cards = isset($data['servicios_complementarios_cards']) ? $data['servicios_complementarios_cards'] : array();
$estandares_cards = isset($data['estandares_cards']) ? $data['estandares_cards'] : array();
$experiencia_cards = isset($data['experiencia_cards']) ? $data['experiencia_cards'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_hero_bg_id', __('Imagen de fondo del hero (por defecto: fondo-seguridad.jpg)', 'iquattro'), $data['hero_bg_id']);
  ?>
  <p>
    <label><?php esc_html_e('Posición horizontal del fondo (X)', 'iquattro'); ?></label><br>
    <input type="text" name="iq_page_hero_bg_pos_x" value="<?php echo esc_attr(isset($data['hero_bg_pos_x']) ? $data['hero_bg_pos_x'] : 'center'); ?>" class="widefat" placeholder="center | left | right | 70%">
  </p>
  <p>
    <label><?php esc_html_e('Posición vertical del fondo (Y)', 'iquattro'); ?></label><br>
    <input type="text" name="iq_page_hero_bg_pos_y" value="<?php echo esc_attr(isset($data['hero_bg_pos_y']) ? $data['hero_bg_pos_y'] : 'center'); ?>" class="widefat" placeholder="center | top | bottom | 35%">
  </p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_title" value="<?php echo esc_attr($data['hero_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc" class="widefat" rows="4"><?php echo esc_textarea($data['hero_desc']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn" value="<?php echo esc_attr($data['hero_btn']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('¿Qué protegemos?', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_que_protegemos_title" value="<?php echo esc_attr($data['que_protegemos_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto principal (derecha)', 'iquattro'); ?></label><br><textarea name="iq_page_que_protegemos_intro" class="widefat" rows="4"><?php echo esc_textarea($data['que_protegemos_intro']); ?></textarea></p>
  <p><label><?php esc_html_e('Líneas con flecha (una por línea)', 'iquattro'); ?></label><br><textarea name="iq_page_que_protegemos_points" class="widefat" rows="5"><?php echo esc_textarea(isset($data['que_protegemos_points']) ? $data['que_protegemos_points'] : ''); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_que_protegemos_btn" value="<?php echo esc_attr(isset($data['que_protegemos_btn']) ? $data['que_protegemos_btn'] : ''); ?>" class="widefat"></p>
  <p><?php esc_html_e('Card principal (icono + título)', 'iquattro'); ?></p>
  <?php for ($i = 0; $i < 1; $i++) : $c = isset($cards[$i]) ? $cards[$i] : array('icon'=>'','icon_id'=>0,'title'=>'','desc'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php esc_html_e('Card principal', 'iquattro'); ?></strong>
      <p><input type="text" name="iq_page_seguridad_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr($c['icon']); ?>" placeholder="icon.svg" style="width:140px">
      <input type="text" name="iq_page_seguridad_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" class="widefat" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_seguridad_cards_' . (int) $i . '_icon_id',
        __('Icono desde medios (opcional; si hay, reemplaza el archivo en assets/icons)', 'iquattro'),
        isset($c['icon_id']) ? (int) $c['icon_id'] : 0
      );
      ?>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Cómo lo ejecutamos', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_ejecucion_title" value="<?php echo esc_attr(isset($data['ejecucion_title']) ? $data['ejecucion_title'] : ''); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 5; $i++) : $s = isset($ejecucion_cards[$i]) ? $ejecucion_cards[$i] : array('number'=>'','title'=>'','desc'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Paso %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_ejecucion_cards_<?php echo $i; ?>_number" value="<?php echo esc_attr(isset($s['number']) ? $s['number'] : ''); ?>" placeholder="<?php esc_attr_e('Número (01)', 'iquattro'); ?>" style="width:160px"></p>
      <p><input type="text" name="iq_page_ejecucion_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr(isset($s['title']) ? $s['title'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>"></p>
      <p><textarea name="iq_page_ejecucion_cards_<?php echo $i; ?>_desc" class="widefat" rows="2" placeholder="<?php esc_attr_e('Descripción', 'iquattro'); ?>"><?php echo esc_textarea(isset($s['desc']) ? $s['desc'] : ''); ?></textarea></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Servicios complementarios', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_servicios_complementarios_title" value="<?php echo esc_attr(isset($data['servicios_complementarios_title']) ? $data['servicios_complementarios_title'] : ''); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto corto', 'iquattro'); ?></label><br><textarea name="iq_page_servicios_complementarios_intro" class="widefat" rows="2"><?php echo esc_textarea(isset($data['servicios_complementarios_intro']) ? $data['servicios_complementarios_intro'] : ''); ?></textarea></p>
  <?php for ($i = 0; $i < 2; $i++) : $c = isset($servicios_complementarios_cards[$i]) ? $servicios_complementarios_cards[$i] : array('icon'=>'','icon_id'=>0,'title'=>'','desc'=>'','points'=>'','btn_txt'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_servicios_complementarios_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr(isset($c['icon']) ? $c['icon'] : ''); ?>" placeholder="insignia.svg" style="width:160px"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_servicios_complementarios_cards_' . (int) $i . '_icon_id',
        __('Icono desde medios (opcional)', 'iquattro'),
        isset($c['icon_id']) ? (int) $c['icon_id'] : 0
      );
      ?>
      <p><input type="text" name="iq_page_servicios_complementarios_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr(isset($c['title']) ? $c['title'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>"></p>
      <p><textarea name="iq_page_servicios_complementarios_cards_<?php echo $i; ?>_desc" class="widefat" rows="3" placeholder="<?php esc_attr_e('Descripción', 'iquattro'); ?>"><?php echo esc_textarea(isset($c['desc']) ? $c['desc'] : ''); ?></textarea></p>
      <p><textarea name="iq_page_servicios_complementarios_cards_<?php echo $i; ?>_points" class="widefat" rows="4" placeholder="<?php esc_attr_e('Viñetas (una por línea)', 'iquattro'); ?>"><?php echo esc_textarea(isset($c['points']) ? $c['points'] : ''); ?></textarea></p>
      <p><input type="text" name="iq_page_servicios_complementarios_cards_<?php echo $i; ?>_btn_txt" value="<?php echo esc_attr(isset($c['btn_txt']) ? $c['btn_txt'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Texto botón', 'iquattro'); ?>"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Estándares internacionales (7 cards)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_estandares_title" value="<?php echo esc_attr(isset($data['estandares_title']) ? $data['estandares_title'] : ''); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto corto', 'iquattro'); ?></label><br><textarea name="iq_page_estandares_intro" class="widefat" rows="2"><?php echo esc_textarea(isset($data['estandares_intro']) ? $data['estandares_intro'] : ''); ?></textarea></p>
  <?php for ($i = 0; $i < 7; $i++) : $c = isset($estandares_cards[$i]) ? $estandares_cards[$i] : array('title'=>'','subtitle'=>'','detail'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_estandares_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr(isset($c['title']) ? $c['title'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Texto superior', 'iquattro'); ?>"></p>
      <p><input type="text" name="iq_page_estandares_cards_<?php echo $i; ?>_subtitle" value="<?php echo esc_attr(isset($c['subtitle']) ? $c['subtitle'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Texto medio', 'iquattro'); ?>"></p>
      <p><input type="text" name="iq_page_estandares_cards_<?php echo $i; ?>_detail" value="<?php echo esc_attr(isset($c['detail']) ? $c['detail'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Texto inferior', 'iquattro'); ?>"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Experiencia (4 cards)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título de la sección', 'iquattro'); ?></label><br><input type="text" name="iq_page_experiencia_title" value="<?php echo esc_attr(isset($data['experiencia_title']) ? $data['experiencia_title'] : ''); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 4; $i++) : $c = isset($experiencia_cards[$i]) ? $experiencia_cards[$i] : array('icon' => '', 'icon_id' => 0, 'stat' => '', 'desc' => ''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i + 1)); ?></strong>
      <p><input type="text" name="iq_page_experiencia_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr(isset($c['icon']) ? $c['icon'] : ''); ?>" placeholder="insignia.svg" style="width:160px"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_experiencia_cards_' . (int) $i . '_icon_id',
        __('Icono desde medios (opcional)', 'iquattro'),
        isset($c['icon_id']) ? (int) $c['icon_id'] : 0
      );
      ?>
      <p><input type="text" name="iq_page_experiencia_cards_<?php echo $i; ?>_stat" value="<?php echo esc_attr(isset($c['stat']) ? $c['stat'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Dato central (20+)', 'iquattro'); ?>"></p>
      <p><input type="text" name="iq_page_experiencia_cards_<?php echo $i; ?>_desc" value="<?php echo esc_attr(isset($c['desc']) ? $c['desc'] : ''); ?>" class="widefat" placeholder="<?php esc_attr_e('Texto inferior', 'iquattro'); ?>"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Sección contacto', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_contact_side_bg_id', __('Imagen de fondo del costado (por defecto: fondo-servicios-costado.jpg)', 'iquattro'), $data['contact_side_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
