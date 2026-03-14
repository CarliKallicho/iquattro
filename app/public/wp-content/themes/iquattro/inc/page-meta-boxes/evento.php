<?php
$hero_id  = isset($data['event_hero_image']) && $data['event_hero_image'] !== '' ? $data['event_hero_image'] : '';
$speaker_id = isset($data['speaker_image']) && $data['speaker_image'] !== '' ? $data['speaker_image'] : '';
$hero_url  = is_numeric($hero_id) ? wp_get_attachment_image_url((int) $hero_id, 'medium') : '';
$speaker_url = is_numeric($speaker_id) ? wp_get_attachment_image_url((int) $speaker_id, 'medium') : '';
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Título e imagen superior', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título del evento', 'iquattro'); ?></label><br><input type="text" name="iq_page_event_title" value="<?php echo esc_attr($data['event_title']); ?>" class="widefat"></p>
  <p>
    <label><?php esc_html_e('Imagen de fondo', 'iquattro'); ?></label><br>
    <input type="hidden" name="iq_page_event_hero_image" id="iq_page_event_hero_image" value="<?php echo esc_attr($hero_id); ?>">
    <button type="button" class="button iq-select-image" data-target="iq_page_event_hero_image" data-preview="iq_hero_preview"><?php esc_html_e('Seleccionar imagen desde Medios', 'iquattro'); ?></button>
    <button type="button" class="button iq-remove-image" data-target="iq_page_event_hero_image" data-preview="iq_hero_preview" <?php echo $hero_id ? '' : ' style="display:none;"'; ?>><?php esc_html_e('Quitar', 'iquattro'); ?></button>
    <span id="iq_hero_preview" class="iq-image-preview"><?php if ($hero_url) : ?><img src="<?php echo esc_url($hero_url); ?>" alt="" style="max-width:200px;height:auto;display:block;margin-top:8px;"><?php endif; ?></span>
  </p>

  <p><strong><?php esc_html_e('Expositor / persona del evento', 'iquattro'); ?></strong></p>
  <p>
    <label><?php esc_html_e('Imagen de la persona', 'iquattro'); ?></label><br>
    <input type="hidden" name="iq_page_speaker_image" id="iq_page_speaker_image" value="<?php echo esc_attr($speaker_id); ?>">
    <button type="button" class="button iq-select-image" data-target="iq_page_speaker_image" data-preview="iq_speaker_preview"><?php esc_html_e('Seleccionar imagen desde Medios', 'iquattro'); ?></button>
    <button type="button" class="button iq-remove-image" data-target="iq_page_speaker_image" data-preview="iq_speaker_preview" <?php echo $speaker_id ? '' : ' style="display:none;"'; ?>><?php esc_html_e('Quitar', 'iquattro'); ?></button>
    <span id="iq_speaker_preview" class="iq-image-preview"><?php if ($speaker_url) : ?><img src="<?php echo esc_url($speaker_url); ?>" alt="" style="max-width:200px;height:auto;display:block;margin-top:8px;"><?php endif; ?></span>
  </p>
  <p><label><?php esc_html_e('Nombre', 'iquattro'); ?></label><br><input type="text" name="iq_page_speaker_name" value="<?php echo esc_attr($data['speaker_name']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Datos profesionales / credenciales', 'iquattro'); ?></label><br><input type="text" name="iq_page_speaker_credentials" value="<?php echo esc_attr($data['speaker_credentials']); ?>" class="widefat" placeholder="(PMP, Scrum Master...)"></p>
  <p><label><?php esc_html_e('Biografía', 'iquattro'); ?></label><br><textarea name="iq_page_speaker_bio" class="widefat" rows="5"><?php echo esc_textarea($data['speaker_bio']); ?></textarea></p>

  <p><strong><?php esc_html_e('Descripción del evento', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_descripcion" class="widefat" rows="4"><?php echo esc_textarea($data['descripcion']); ?></textarea></p>

  <p><strong><?php esc_html_e('Datos del evento', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Modalidad', 'iquattro'); ?></label><br><input type="text" name="iq_page_modalidad" value="<?php echo esc_attr($data['modalidad']); ?>" class="widefat" placeholder="Presencial / Virtual"></p>
  <p><label><?php esc_html_e('Fecha', 'iquattro'); ?></label><br><input type="text" name="iq_page_fecha" value="<?php echo esc_attr($data['fecha']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Horario', 'iquattro'); ?></label><br><input type="text" name="iq_page_horario" value="<?php echo esc_attr($data['horario']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Lugar', 'iquattro'); ?></label><br><input type="text" name="iq_page_lugar" value="<?php echo esc_attr($data['lugar']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Observaciones', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Observaciones', 'iquattro'); ?></label><br><textarea name="iq_page_observaciones" class="widefat" rows="2"><?php echo esc_textarea($data['observaciones']); ?></textarea></p>

  <p><strong><?php esc_html_e('Formulario de inscripción', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título de la sección', 'iquattro'); ?></label><br><input type="text" name="iq_page_form_title" value="<?php echo esc_attr($data['form_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Título del recuadro CTA (costado del formulario)', 'iquattro'); ?></label><br><input type="text" name="iq_page_form_cta_title" value="<?php echo esc_attr($data['form_cta_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto del recuadro CTA', 'iquattro'); ?></label><br><textarea name="iq_page_form_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['form_cta_text']); ?></textarea></p>
</div>
