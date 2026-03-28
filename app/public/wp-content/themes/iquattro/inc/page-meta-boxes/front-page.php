<?php
$divisions = isset($data['front_divisions']) ? $data['front_divisions'] : array();
$allies = isset($data['front_allies']) ? $data['front_allies'] : array();
?>
<div class="iq-page-meta-box" style="display:grid;gap:1.5rem;">
  <p><strong><?php esc_html_e('Sección “Somos iQuattro”', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_somos_title" value="<?php echo esc_attr($data['somos_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Párrafo 1', 'iquattro'); ?></label><br><textarea name="iq_page_somos_p1" class="widefat" rows="3"><?php echo esc_textarea($data['somos_p1']); ?></textarea></p>
  <p><label><?php esc_html_e('Párrafo 2', 'iquattro'); ?></label><br><textarea name="iq_page_somos_p2" class="widefat" rows="2"><?php echo esc_textarea($data['somos_p2']); ?></textarea></p>

  <p><strong><?php esc_html_e('Tres pilares (features)', 'iquattro'); ?></strong></p>
  <?php for ($f = 1; $f <= 3; $f++) : ?>
    <div style="border:1px solid #ccd0d4;padding:12px;background:#f6f7f7;">
      <p><label><?php echo esc_html(sprintf(__('Pilar %d — título', 'iquattro'), $f)); ?></label><br>
        <input type="text" name="iq_page_feature<?php echo (int) $f; ?>_title" value="<?php echo esc_attr($data['feature' . $f . '_title']); ?>" class="widefat"></p>
      <p><label><?php echo esc_html(sprintf(__('Pilar %d — texto (HTML permitido)', 'iquattro'), $f)); ?></label><br>
        <textarea name="iq_page_feature<?php echo (int) $f; ?>_text" class="widefat" rows="3"><?php echo esc_textarea($data['feature' . $f . '_text']); ?></textarea></p>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Divisiones', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título de la sección', 'iquattro'); ?></label><br><input type="text" name="iq_page_divisions_title" value="<?php echo esc_attr($data['divisions_title']); ?>" class="widefat"></p>
  <?php for ($i = 0; $i < 5; $i++) : ?>
    <?php
    $d = isset($divisions[ $i ]) ? $divisions[ $i ] : array(
      'slug' => '',
      'label' => '',
      'description' => '',
      'card_class' => '',
      'image_id' => 0,
    );
    ?>
    <div style="border:1px solid #ccd0d4;padding:10px;margin-bottom:8px;background:#fff;">
      <strong><?php echo esc_html(sprintf(__('División %d', 'iquattro'), $i + 1)); ?></strong>
      <p><input type="text" name="iq_page_front_divisions_<?php echo (int) $i; ?>_slug" value="<?php echo esc_attr(isset($d['slug']) ? $d['slug'] : ''); ?>" placeholder="slug-pagina" class="widefat"></p>
      <p><input type="text" name="iq_page_front_divisions_<?php echo (int) $i; ?>_label" value="<?php echo esc_attr(isset($d['label']) ? $d['label'] : ''); ?>" placeholder="<?php esc_attr_e('Etiqueta', 'iquattro'); ?>" class="widefat"></p>
      <p><textarea name="iq_page_front_divisions_<?php echo (int) $i; ?>_description" class="widefat" rows="2" placeholder="<?php esc_attr_e('Descripción', 'iquattro'); ?>"><?php echo esc_textarea(isset($d['description']) ? $d['description'] : ''); ?></textarea></p>
      <p><input type="text" name="iq_page_front_divisions_<?php echo (int) $i; ?>_card_class" value="<?php echo esc_attr(isset($d['card_class']) ? $d['card_class'] : ''); ?>" placeholder="iq-div-dc (clase CSS)" class="widefat"></p>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_front_divisions_' . (int) $i . '_image_id',
        __('Imagen (opcional; si está vacía se usa assets/images/{slug}.jpg)', 'iquattro'),
        isset($d['image_id']) ? (int) $d['image_id'] : 0
      );
      ?>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Confianza (imágenes Z / Y)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_trust_title" value="<?php echo esc_attr($data['trust_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto accesible (aria-label del bloque visual)', 'iquattro'); ?></label><br><textarea name="iq_page_trust_arc_desc" class="widefat" rows="2"><?php echo esc_textarea($data['trust_arc_desc']); ?></textarea></p>
  <?php
  iquattro_page_meta_render_attachment_field('iq_page_trust_z_img_id', __('Imagen capa Z (por defecto: z.png)', 'iquattro'), $data['trust_z_img_id']);
  iquattro_page_meta_render_attachment_field('iq_page_trust_y_img_id', __('Imagen capa Y (por defecto: y.png)', 'iquattro'), $data['trust_y_img_id']);
  ?>

  <p><strong><?php esc_html_e('Aliados', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título de la sección', 'iquattro'); ?></label><br><input type="text" name="iq_page_allies_title" value="<?php echo esc_attr($data['allies_title']); ?>" class="widefat"></p>
  <p class="description"><?php esc_html_e('Slug = nombre del archivo PNG en el tema si no subes logo (p. ej. gitlab → gitlab.png).', 'iquattro'); ?></p>
  <?php for ($i = 0; $i < 12; $i++) : ?>
    <?php
    $a = isset($allies[ $i ]) ? $allies[ $i ] : array('slug' => '', 'logo_id' => 0);
    ?>
    <div style="border:1px solid #ccd0d4;padding:8px;margin-bottom:6px;display:flex;flex-wrap:wrap;gap:12px;align-items:flex-start;">
      <span style="min-width:80px;"><strong><?php echo esc_html(sprintf(__('Aliado %d', 'iquattro'), $i + 1)); ?></strong></span>
      <span style="flex:1;min-width:140px;"><input type="text" name="iq_page_front_allies_<?php echo (int) $i; ?>_slug" value="<?php echo esc_attr(isset($a['slug']) ? $a['slug'] : ''); ?>" placeholder="gitlab" class="widefat"></span>
      <?php
      iquattro_page_meta_render_attachment_field(
        'iq_page_front_allies_' . (int) $i . '_logo_id',
        __('Logo (opcional)', 'iquattro'),
        isset($a['logo_id']) ? (int) $a['logo_id'] : 0
      );
      ?>
    </div>
  <?php endfor; ?>

  <p><strong><?php esc_html_e('Contacto (bloque inferior)', 'iquattro'); ?></strong></p>
  <p><label><?php esc_html_e('Título', 'iquattro'); ?></label><br><input type="text" name="iq_page_contact_title" value="<?php echo esc_attr($data['contact_title']); ?>" class="widefat"></p>
  <p><label><?php esc_html_e('Texto en columna lateral', 'iquattro'); ?></label><br><textarea name="iq_page_contact_side_text" class="widefat" rows="2"><?php echo esc_textarea($data['contact_side_text']); ?></textarea></p>
</div>
