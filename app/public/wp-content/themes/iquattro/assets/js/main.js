/**
 * iQuattro - Script principal
 * Formulario de contacto vía AJAX (Contacto y Servicios)
 */
(function($) {
  'use strict';

  var $forms = $('#iq-contact-form, #iq-servicios-form, #iq-consultoria-form, #iq-seguridad-form, #iq-datacenter-form, #iq-capacitacion-form');
  if (!$forms.length) return;

  function getMessageEl($form) {
    var id = $form.attr('id');
    if (id === 'iq-servicios-form') return $('#iq-serv-form-message');
    if (id === 'iq-consultoria-form') return $('#iq-cons-form-message');
    if (id === 'iq-seguridad-form') return $('#iq-seg-form-message');
    if (id === 'iq-datacenter-form') return $('#iq-dc-form-message');
    if (id === 'iq-capacitacion-form') return $('#iq-cap-form-message');
    return $('#iq-form-message');
  }

  $forms.on('submit', function(e) {
    e.preventDefault();
    var $form = $(this);
    var $message = getMessageEl($form);
    var $submit = $form.find('button[type="submit"]');

    function showMessage(text, isError) {
      $message.removeClass('iq-success iq-error').addClass(isError ? 'iq-error' : 'iq-success').text(text).attr('aria-live', 'polite');
    }

    function setLoading(loading) {
      $submit.prop('disabled', loading);
    }

    if (typeof iquattroData === 'undefined' || !iquattroData.ajaxUrl || !iquattroData.nonce) {
      showMessage('Configuración del formulario no disponible.', true);
      return;
    }

    var data = {
      action: 'iquattro_contact',
      nonce: $form.find('[name="iq_contact_nonce"]').val(),
      nombre: $form.find('[name="nombre"]').val(),
      email: $form.find('[name="email"]').val(),
      telefono: $form.find('[name="telefono"]').val(),
      empresa: $form.find('[name="empresa"]').val(),
      mensaje: $form.find('[name="mensaje"]').val()
    };

    setLoading(true);
    showMessage('');

    $.post(iquattroData.ajaxUrl, data)
      .done(function(response) {
        if (response.success && response.data && response.data.message) {
          showMessage(response.data.message, false);
          $form[0].reset();
        } else {
          showMessage((response.data && response.data.message) ? response.data.message : 'Error al enviar.', true);
        }
      })
      .fail(function() {
        showMessage('No se pudo enviar el mensaje. Intenta de nuevo.', true);
      })
      .always(function() {
        setLoading(false);
      });
  });
})(jQuery);
