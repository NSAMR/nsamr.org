( function($) {

	$(document).ready( function() {

		$( '.iw-so-number-timer' ).waypoint( {
			offset: function() {
				return Waypoint.viewportHeight() - 100
			},
			handler: function() {
				$(this.element).countTo();
				this.destroy()
			}
		} );

	});

})( jQuery );
