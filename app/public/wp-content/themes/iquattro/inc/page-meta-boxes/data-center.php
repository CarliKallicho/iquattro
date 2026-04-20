<?php
$dc_hardware_url  = get_permalink(get_page_by_path('data-center-hardware')) ?: home_url('/data-center-hardware/');
$dc_software_url  = get_permalink(get_page_by_path('data-center-software')) ?: home_url('/data-center-software/');
$dc_servicios_url = get_permalink(get_page_by_path('data-center-servicios')) ?: home_url('/data-center-servicios/');
$servicios_cards = isset($data['servicios_cards']) ? $data['servicios_cards'] : array();
$implementation_cards = isset($data['implementation_cards']) ? $data['implementation_cards'] : array();
$soluciones_cards = isset($data['soluciones_cards']) ? $data['soluciones_cards'] : array();
$fabricantes_cards = isset($data['fabricantes_cards']) ? $data['fabricantes_cards'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_hero_bg_id', __('Imagen de fondo del hero (por defecto: fondo-datacenter.jpg)', 'iquattro'), $data['hero_bg_id']);
  ?>
  <p>
    <label><?php esc_html_e('Título (dos líneas: separa con el carácter |)', 'iquattro'); ?></label><br>
    <textarea name="iq_page_hero_title" class="widefat" rows="2" placeholder="<?php esc_attr_e('Primera línea|segunda línea', 'iquattro'); ?>"><?php echo esc_textarea($data['hero_title']); ?></textarea>
  </p>
  <p><label><?php esc_html_e('Descripción 1', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc_1" class="widefat" rows="2"><?php echo esc_textarea($data['hero_desc_1']); ?></textarea></p>
  <p><label><?php esc_html_e('Descripción 2', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc_2" class="widefat" rows="2"><?php echo esc_textarea($data['hero_desc_2']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn" value="<?php echo esc_attr($data['hero_btn']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto botón 2', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn_2" value="<?php echo esc_attr(isset($data['hero_btn_2']) ? $data['hero_btn_2'] : ''); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Cards debajo del hero', 'iquattro'); ?></strong></p>
  <?php for ($i = 1; $i <= 4; $i++) : ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i)); ?></strong>
      <p><label><?php esc_html_e('Número', 'iquattro'); ?></label><br><input type="text" name="iq_page_infra_card_<?php echo (int) $i; ?>_value" value="<?php echo esc_attr(isset($data['infra_card_' . $i . '_value']) ? $data['infra_card_' . $i . '_value'] : ''); ?>" class="widefat"></p>
      <p><label><?php esc_html_e('Texto', 'iquattro'); ?></label><br><input type="text" name="iq_page_infra_card_<?php echo (int) $i; ?>_text" value="<?php echo esc_attr(isset($data['infra_card_' . $i . '_text']) ? $data['infra_card_' . $i . '_text'] : ''); ?>" class="widefat"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Bloque debajo de cards', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título (izquierda)', 'iquattro'); ?></label><br><input type="text" name="iq_page_portfolio_title" value="<?php echo esc_attr(isset($data['portfolio_title']) ? $data['portfolio_title'] : ''); ?>" class="widefat"></p>
  <p>
    <label><?php esc_html_e('Texto (derecha)', 'iquattro'); ?></label>
    <span class="description"><?php esc_html_e('Puedes usar negrita con &lt;strong&gt;...&lt;/strong&gt;.', 'iquattro'); ?></span><br>
    <textarea name="iq_page_portfolio_text" class="widefat" rows="6"><?php echo esc_textarea(isset($data['portfolio_text']) ? $data['portfolio_text'] : ''); ?></textarea>
  </p>

  <p><strong><?php esc_html_e('Nuestros servicios', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_servicios_title" value="<?php echo esc_attr($data['servicios_title']); ?>" class="widefat"></p>
  <p>
    <label><?php esc_html_e('Intro', 'iquattro'); ?></label>
    <span class="description"><?php esc_html_e('Párrafos con &lt;p&gt;…&lt;/p&gt; o texto plano (saltos de línea).', 'iquattro'); ?></span><br>
    <textarea name="iq_page_servicios_intro" class="widefat" rows="6"><?php echo esc_textarea($data['servicios_intro']); ?></textarea>
  </p>
  <p><?php esc_html_e('Cards (icono = nombre en assets/icons/; puedes usar un pill por línea)', 'iquattro'); ?></p>
  <?php for ($i = 0; $i < 5; $i++) : $c = isset($servicios_cards[$i]) ? $servicios_cards[$i] : array('icon'=>'','icon_id'=>0,'title'=>'','subtitle_1'=>'','subtitle_2'=>'','desc'=>'','pills'=>'','btn_txt'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Card %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr($c['icon']); ?>" placeholder="hardware.svg" style="width:140px">
      <input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>" class="widefat"></p>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_subtitle_1" value="<?php echo esc_attr(isset($c['subtitle_1']) ? $c['subtitle_1'] : ''); ?>" placeholder="<?php esc_attr_e('Subtítulo 1', 'iquattro'); ?>" class="widefat"></p>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_subtitle_2" value="<?php echo esc_attr(isset($c['subtitle_2']) ? $c['subtitle_2'] : ''); ?>" placeholder="<?php esc_attr_e('Subtítulo 2', 'iquattro'); ?>" class="widefat"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_servicios_cards_' . (int) $i . '_icon_id',
        __('Icono desde medios (opcional)', 'iquattro'),
        isset($c['icon_id']) ? (int) $c['icon_id'] : 0
      );
      ?>
      <p><textarea name="iq_page_servicios_cards_<?php echo $i; ?>_desc" class="widefat" rows="2" placeholder="<?php esc_attr_e('Descripción', 'iquattro'); ?>"><?php echo esc_textarea(isset($c['desc'])?$c['desc']:''); ?></textarea></p>
      <p><textarea name="iq_page_servicios_cards_<?php echo $i; ?>_pills" class="widefat" rows="3" placeholder="<?php esc_attr_e('Pills (uno por línea)', 'iquattro'); ?>"><?php echo esc_textarea(isset($c['pills']) ? $c['pills'] : ''); ?></textarea></p>
      <p><input type="text" name="iq_page_servicios_cards_<?php echo $i; ?>_btn_txt" value="<?php echo esc_attr(isset($c['btn_txt'])?$c['btn_txt']:''); ?>" placeholder="<?php esc_attr_e('Texto botón', 'iquattro'); ?>" class="widefat"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Sección implementación (4 cards)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_implementation_title" value="<?php echo esc_attr(isset($data['implementation_title']) ? $data['implementation_title'] : ''); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 4; $i++) : $c = isset($implementation_cards[$i]) ? $implementation_cards[$i] : array('number'=>'','title'=>'','text'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Paso %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_implementation_cards_<?php echo $i; ?>_number" value="<?php echo esc_attr(isset($c['number']) ? $c['number'] : ''); ?>" placeholder="<?php esc_attr_e('Número (ej: 01)', 'iquattro'); ?>" class="widefat"></p>
      <p><input type="text" name="iq_page_implementation_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr(isset($c['title']) ? $c['title'] : ''); ?>" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>" class="widefat"></p>
      <p><textarea name="iq_page_implementation_cards_<?php echo $i; ?>_text" class="widefat" rows="3" placeholder="<?php esc_attr_e('Texto', 'iquattro'); ?>"><?php echo esc_textarea(isset($c['text']) ? $c['text'] : ''); ?></textarea></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Soluciones (cards naranja)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_soluciones_title" value="<?php echo esc_attr($data['soluciones_title']); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 6; $i++) : $c = isset($soluciones_cards[$i]) ? $soluciones_cards[$i] : array('icon'=>'','icon_id'=>0,'title'=>'','text'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Solución %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_soluciones_cards_<?php echo $i; ?>_icon" value="<?php echo esc_attr(isset($c['icon']) ? $c['icon'] : ''); ?>" placeholder="insignia.svg" style="width:160px"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_soluciones_cards_' . (int) $i . '_icon_id',
        __('Icono desde medios (opcional)', 'iquattro'),
        isset($c['icon_id']) ? (int) $c['icon_id'] : 0
      );
      ?>
      <p><input type="text" name="iq_page_soluciones_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr($c['title']); ?>" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>" class="widefat"></p>
      <p>
        <span class="description"><?php esc_html_e('Texto: puedes usar &lt;p&gt; y &lt;strong&gt; para negritas.', 'iquattro'); ?></span><br>
        <textarea name="iq_page_soluciones_cards_<?php echo $i; ?>_text" class="widefat" rows="8"><?php echo esc_textarea(isset($c['text']) ? $c['text'] : ''); ?></textarea>
      </p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Sección fabricantes (5 cards)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_fabricantes_title" value="<?php echo esc_attr(isset($data['fabricantes_title']) ? $data['fabricantes_title'] : ''); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 5; $i++) : $c = isset($fabricantes_cards[$i]) ? $fabricantes_cards[$i] : array('title'=>'','subtitle'=>''); ?>
    <div style="border:1px solid #ccc;padding:10px;margin-bottom:8px;background:#f9f9f9;">
      <strong><?php echo esc_html(sprintf(__('Fabricante %d', 'iquattro'), $i+1)); ?></strong>
      <p><input type="text" name="iq_page_fabricantes_cards_<?php echo $i; ?>_title" value="<?php echo esc_attr(isset($c['title']) ? $c['title'] : ''); ?>" placeholder="<?php esc_attr_e('Título', 'iquattro'); ?>" class="widefat"></p>
      <p><input type="text" name="iq_page_fabricantes_cards_<?php echo $i; ?>_subtitle" value="<?php echo esc_attr(isset($c['subtitle']) ? $c['subtitle'] : ''); ?>" placeholder="<?php esc_attr_e('Texto pequeño', 'iquattro'); ?>" class="widefat"></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Sección contacto', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_contact_side_bg_id', __('Imagen de fondo del costado (por defecto: fondo-datacenter-costado.jpg)', 'iquattro'), $data['contact_side_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA (costado)', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
