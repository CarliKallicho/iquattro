<?php
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Banner', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_banner_bg_id', __('Imagen de fondo del banner (por defecto: fondo-contacto-titulo.jpg)', 'iquattro'), $data['banner_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_banner_title" value="<?php echo esc_attr($data['banner_title']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Sección principal', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_contact_side_bg_id', __('Imagen de fondo del costado del formulario (tema por defecto)', 'iquattro'), $data['contact_side_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_main_title" value="<?php echo esc_attr($data['main_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Intro', 'iquattro'); ?></label><br><textarea name="iq_page_intro" class="widefat" rows="2"><?php echo esc_textarea($data['intro']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto CTA (costado del formulario)', 'iquattro'); ?></label><br><textarea name="iq_page_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['cta_text']); ?></textarea></p>

  <p><strong><?php esc_html_e('Canales de contacto', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título (sobre teléfonos/correos/horario)', 'iquattro'); ?></label><br><input type="text" name="iq_page_channels_title" value="<?php echo esc_attr($data['channels_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Título card Teléfonos', 'iquattro'); ?></label><br><input type="text" name="iq_page_channel_tel_title" value="<?php echo esc_attr($data['channel_tel_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Título card Correos', 'iquattro'); ?></label><br><input type="text" name="iq_page_channel_email_title" value="<?php echo esc_attr($data['channel_email_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Título card Horario', 'iquattro'); ?></label><br><input type="text" name="iq_page_channel_horario_title" value="<?php echo esc_attr($data['channel_horario_title']); ?>" class="widefat"></p>
  <p class="description"><?php esc_html_e('Los números de teléfono, correos y horario se editan en Apariencia → Personalizar → Contacto.', 'iquattro'); ?></p>
</div>
