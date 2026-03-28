<?php
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_hero_bg_id', __('Imagen de fondo del hero (por defecto: fondo-consultoria.jpg)', 'iquattro'), $data['hero_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_title" value="<?php echo esc_attr($data['hero_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Descripción', 'iquattro'); ?></label><br><textarea name="iq_page_hero_desc" class="widefat" rows="3"><?php echo esc_textarea($data['hero_desc']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn" value="<?php echo esc_attr($data['hero_btn']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Pensamos la tecnología', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_pensamos_title" value="<?php echo esc_attr($data['pensamos_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Intro', 'iquattro'); ?></label><br><textarea name="iq_page_pensamos_intro" class="widefat" rows="2"><?php echo esc_textarea($data['pensamos_intro']); ?></textarea></p>
  <p><label><?php esc_html_e('Subtítulo', 'iquattro'); ?></label><br><input type="text" name="iq_page_pensamos_subtitle" value="<?php echo esc_attr($data['pensamos_subtitle']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Soluciones (una por línea)', 'iquattro'); ?></label><br><textarea name="iq_page_pensamos_soluciones" class="widefat" rows="4"><?php echo esc_textarea($data['pensamos_soluciones']); ?></textarea></p>

  <p><strong><?php esc_html_e('Expertos', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_expertos_title" value="<?php echo esc_attr($data['expertos_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Intro', 'iquattro'); ?></label><br><textarea name="iq_page_expertos_intro" class="widefat" rows="3"><?php echo esc_textarea($data['expertos_intro']); ?></textarea></p>
  <p><label><?php esc_html_e('Subtítulo diferenciales', 'iquattro'); ?></label><br><input type="text" name="iq_page_expertos_subtitle" value="<?php echo esc_attr($data['expertos_subtitle']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Diferenciales (una por línea)', 'iquattro'); ?></label><br><textarea name="iq_page_expertos_diferenciales" class="widefat" rows="4"><?php echo esc_textarea($data['expertos_diferenciales']); ?></textarea></p>

  <p><strong><?php esc_html_e('Sección contacto', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_contact_side_bg_id', __('Imagen de fondo del costado (por defecto: fondo-consultoria-costado.jpg)', 'iquattro'), $data['contact_side_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
