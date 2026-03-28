<?php
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Hero', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><textarea name="iq_page_hero_title" class="widefat" rows="2"><?php echo esc_textarea($data['hero_title']); ?></textarea></p>
  <p><label><?php esc_html_e('Botón principal', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn_primary" value="<?php echo esc_attr($data['hero_btn_primary']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Botón cronograma', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn_schedule" value="<?php echo esc_attr($data['hero_btn_schedule']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Botón evento', 'iquattro'); ?></label><br><input type="text" name="iq_page_hero_btn_event" value="<?php echo esc_attr($data['hero_btn_event']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Beneficios', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_beneficios_title" value="<?php echo esc_attr($data['beneficios_title']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Partner Microsoft', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_partner_title" value="<?php echo esc_attr($data['partner_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto', 'iquattro'); ?></label><br><textarea name="iq_page_partner_text" class="widefat" rows="2"><?php echo esc_textarea($data['partner_text']); ?></textarea></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_partner_logo_id', __('Logo partner (por defecto: microsoft-partner.png)', 'iquattro'), $data['partner_logo_id']);
  ?>

  <p><strong><?php esc_html_e('Evoluciona', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_evoluciona_title" value="<?php echo esc_attr($data['evoluciona_title']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Catálogo / Cronograma', 'iquattro'); ?></strong></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_catalogo_section_bg_id', __('Imagen de fondo del bloque (por defecto: fondo-capacitacion.jpg)', 'iquattro'), $data['catalogo_section_bg_id']);
  ?>
  <p><label><?php esc_html_e('Título sección catálogo', 'iquattro'); ?></label><br><input type="text" name="iq_page_catalogo_section_title" value="<?php echo esc_attr($data['catalogo_section_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto catálogo', 'iquattro'); ?></label><br><textarea name="iq_page_catalogo_section_text" class="widefat" rows="2"><?php echo esc_textarea($data['catalogo_section_text']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón catálogo', 'iquattro'); ?></label><br><input type="text" name="iq_page_catalogo_btn" value="<?php echo esc_attr($data['catalogo_btn']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Título cronograma', 'iquattro'); ?></label><br><input type="text" name="iq_page_cronograma_title" value="<?php echo esc_attr($data['cronograma_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto cronograma', 'iquattro'); ?></label><br><textarea name="iq_page_cronograma_text" class="widefat" rows="2"><?php echo esc_textarea($data['cronograma_text']); ?></textarea></p>
  <p><label><?php esc_html_e('Texto botón cronograma', 'iquattro'); ?></label><br><input type="text" name="iq_page_cronograma_btn" value="<?php echo esc_attr($data['cronograma_btn']); ?>" class="widefat"></p>

  <p><strong><?php esc_html_e('Contacto', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto CTA', 'iquattro'); ?></label><br><textarea name="iq_page_contact_cta_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_cta_text']); ?></textarea></p>
</div>
