(
	function ( $ ) {

	$.fn.iwInitAlert = function(){
		"use strict";

		if( $( '.iw-so-alert' ).length ) {
			$( '.iw-so-alert' ).each( function() {
				$(this).find( '.close' ).click( function( e ) {
					e.preventDefault();
					$(this).closest( '.widget_ink-alert' ).fadeOut( 500 );
				} );
			} );
		}
	}

	}
)( jQuery );

jQuery( function ( $ ) {
	$( document ).iwInitAlert();
} );
