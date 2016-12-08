( function($) {

	$(document).ready( function() {

		$( '.iw-so-circle-chart' ).waypoint( {
			offset: function() {
				return Waypoint.viewportHeight() - 100
			},
			handler: function() {
				$(this.element).easyPieChart();
				$(this.element).css( 'min-height', 'auto' )
				$(this.element).find( '.iw-so-circle-timer.iw-so-circle-timer-active' ).countTo();
			}
		} );

	});

})( jQuery );
