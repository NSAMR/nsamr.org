function wk_render_iframe(el, path, opts) {
  var iframe_url = webkite_admin_object.webkite_hbs_url + path;

  iframe = document.createElement('iframe');
  iframe.setAttribute('class', el.className);
  iframe.setAttribute('src', iframe_url);
  _(opts).each(function(val, prop) {
    iframe.setAttribute(prop, val);
  });
  jQuery(el).replaceWith(iframe);
};

window.addEventListener('message', function(e) {
  window.jc_uuid = e.data;

  if (window.jc_uuid === "hide insert"){
    jQuery('#webkite-list-dialog')
      .closest('.ui-dialog')
      .find('.ui-dialog-buttonpane')
      .find('.button-primary').prop("disabled",true);
  }
  if (window.jc_uuid === "show insert"){
    jQuery('#webkite-list-dialog')
      .closest('.ui-dialog')
      .find('.ui-dialog-buttonpane')
      .find('.button-primary').prop("disabled",false);
  }
});

jQuery(document).ready(function($) {
  $('#webkite-list-dialog-frame').each(function(i, el) {
    wk_render_iframe(el, '/shortcode.html', {'scrolling': 'no'});
  });
});
