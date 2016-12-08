jQuery(function(){
  // unset refresh page flag on page load
  localStorage.removeItem('intercom-refresh');

  jQuery('.wk_error_msg_try_again').on('click', function(e) {
    e.preventDefault();
    location.reload();
  });
  wk_render_iframes();

  var settings = localStorage.getItem('intercom');
  if (settings !== null) {
    Intercom('boot', JSON.parse(settings));
  }
});

function wk_render_iframe(el, path) {
  var iframe_url = webkite_admin_object.webkite_hbs_url + path;

  iframe = document.createElement('iframe');
  iframe.setAttribute('class', el.className);
  iframe.setAttribute('src', iframe_url);
  iframe.setAttribute('id', 'webkite-iframe');
  jQuery(el).replaceWith(iframe);
}

function wk_render_iframes() {
  jQuery('#webkite-lists-iframe').each(function(i, el) {
    wk_render_iframe(el, '/index.html');
  });
}

window.addEventListener('message', function(e) {
  if (e.origin !== webkite_admin_object.webkite_iframe_origin)
    return;

  if (e.data === 'init') {
    var message = 'Initialize iFrangasus';
    if (jQuery('#show-welcome-screen').data('show') === true) {
      message += ' Upgrade';
    }
    document.getElementById('webkite-iframe').contentWindow.postMessage(message, webkite_admin_object.webkite_iframe_origin);
    return;
  }

  if (e.data === 'welcome shown') {
    jQuery.ajax({
      type: 'POST',
      url: webkite_admin_object.ajax_endpoint,
      dataType: 'json',
      data: {
        action: 'webkite_unset_welcome_screen_ajax'
      }
    }).done(function(response) {
      // TODO: something on success
    }).fail(function(error) {
      // TODO: something on fail
    });
  }

  // TODO: handle intercom data better
  if (e.data.indexOf('{') >= 0 && e.data.indexOf('app_id') >= 0) {
    // if refresh flag, refresh
    if (localStorage.getItem('intercom-refresh') === 'true') {
      location.reload();
    } else {
      localStorage.setItem('intercom', e.data);
      var data = JSON.parse(e.data);
      Intercom('boot', data);
    }
  }

  if (e.data.indexOf('logout') >= 0) {
    localStorage.removeItem('intercom');
    Intercom('shutdown');
    // set refresh flag
    localStorage.setItem('intercom-refresh', 'true');
  }
});
