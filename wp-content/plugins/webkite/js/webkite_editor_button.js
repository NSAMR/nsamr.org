(function() {
  tinymce.create('tinymce.plugins.Webkite', {
    /**
     * Initializes the plugin, this will be executed after the plugin has been created.
     * This call is done before the editor instance has finished it's initialization so use the onInit event
     * of the editor instance to intercept that event.
     *
     * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
     * @param {string} url Absolute URL to where the plugin is located.
     */
    init : function(ed, url) {
      
      ed.addCommand('webkite_lists', function(){
        webkite_canvas = ed;
        jQuery('#webkite-list-dialog').dialog('open');
      });

      ed.addButton('webkite_lists', {
        title : 'WebKite Lists',
        cmd : 'webkite_lists',
        image : webkite_editor_icon
      });
      
    },

    /**
     * Returns information about the plugin as a name/value array.
     * The current keys are longname, author, authorurl, infourl and version.
     *
     * @return {Object} Name/value array containing information about the plugin.
     */
    getInfo : function() {
      return {
        longname : 'WebKite Lists',
        author : 'WebKite',
        authorurl : 'http://webkite.com',
        version : "1.0"
      };
    }
  });

  // Register plugin
  tinymce.PluginManager.add( 'webkite', tinymce.plugins.Webkite );
})();