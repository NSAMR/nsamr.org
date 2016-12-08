jQuery(document).ready(function(){
  var wk_migration_checks = jQuery('.webkite-migrate-checkbox'),
      wk_migration_buttons = jQuery('.webkite-migration-button'),
      wk_migration_form = jQuery('#webkite_migrations');
    
  wk_migration_checks.click(function(){
    wk_migration_buttons.attr("disabled", !wk_migration_checks.is(":checked"));
    if(!jQuery(this).is(':checked')){
      jQuery('.webkite-select-all').prop('checked', false);
    } else {
      var flag = 0;
      wk_migration_checks.each(function(){
        if(!this.checked) {
          flag = 1;
        }
      });
      if(flag == 0){ 
        jQuery('.webkite-select-all').prop("checked", true);
      }
    }
  });
  
  jQuery('#webkite-bulk-migration').on('click', function(e){
    var input = jQuery('<input>')
                  .attr('type','hidden')
                  .attr('name', 'action').val('migrate')
                  .appendTo(wk_migration_form);
    
    wk_migration_form.submit();
  });

  jQuery('#webkite-bulk-delete').on('click', function(e){
    var input = jQuery('<input>')
                  .attr('type','hidden')
                  .attr('name', 'action').val('delete')
                  .appendTo(wk_migration_form);
    
    var count = jQuery('.webkite-migrate-checkbox:checked').length,
        message = 'Are you sure you want to delete this list?';
    
    if (count > 1){
      message = 'Are you sure you want to delete these ' + count + ' lists?';
    }
    
    if (confirm(message)){
      wk_migration_form.submit();    
    }    
  });
  
  
  jQuery('.webkite-select-all').change(function(){
    wk_migration_buttons.attr("disabled", !jQuery(this).is(":checked"));
    if (this.checked){
      wk_migration_checks.each(function(){
        this.checked = true;
      })
    } else {
      wk_migration_checks.each(function(){
        this.checked = false;
      })
    }
  });

  var settings = localStorage.getItem('intercom');
  if (settings !== null) {
    window.Intercom('boot', JSON.parse(settings));
  } else {
    window.Intercom('boot', settingsForIntercom);
  }
});
