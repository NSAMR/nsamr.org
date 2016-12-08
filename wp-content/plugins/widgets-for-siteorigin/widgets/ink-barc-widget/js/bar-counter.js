( function($) {

	$(document).ready( function() {

		$( '.iw-so-bar-counter.iw-so-bars-animated' ).find( '.iw-so-bar-meter' ).waypoint( {
			offset: function() {
				return Waypoint.viewportHeight() - 100
			},
			handler: function() {
				$(this.element).each(function(){
					each_bar_width = $(this).attr( 'aria-valuenow' );
					$(this).width(each_bar_width + '%' );
				});
			}
		} );

	});

})( jQuery );
