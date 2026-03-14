<?php
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Título e imagen superior', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título del evento', 'iquattro'); ?></label><br><input type="text" name="iq_page_event_title" value="<?php echo esc_attr($data['event_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Imagen de fondo (nombre en assets/images/)', 'iquattro'); ?></label><br><input type="text" name="iq_page_event_hero_image" value="<?php echo esc_attr($data['event_hero_image']); ?>" class="widefat" placeholder="fondo-evento.jpg"></p>

  <p><strong><?php esc_html_e('Expositor / persona del evento', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Imagen de la persona (nombre en assets/images/)', 'iquattro'); ?></label><br><input type="text" name="iq_page_speaker_image" value="<?php echo esc_attr($data['speaker_image']); ?>" class="widefat" placeholder="persona-evento.jpg"></p>
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
