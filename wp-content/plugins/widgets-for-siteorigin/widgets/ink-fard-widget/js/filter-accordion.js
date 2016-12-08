(
	function ( $ ) {

	$.fn.iwInitFtrAccordion = function(){
		"use strict";

		if( $( '.iw-so-accordion' ).length ) {
			$( '.iw-so-accordion' ).each( function() {

				$(this).find( '.iw-so-acc-item .iw-so-acc-content' ).hide();
				$(this).find( '.iw-so-acc-item.iw-so-acc-item-active .iw-so-acc-content' ).show();

				$(this).find( '.iw-so-acc-item' ).children( '.iw-so-acc-title' ).click( function( e ) {

					if( $(this).parent().parent().hasClass('iw-so-acc-toggle') && ( $(this).parent().siblings().hasClass('iw-so-acc-item-active') || !$(this).parent().parent().children().hasClass('iw-so-acc-item-active') ) ) {
						e.preventDefault();
						$(this).parent().toggleClass( 'iw-so-acc-item-active' );
						$(this).siblings( '.iw-so-acc-content' ).slideToggle( '300ms' );
					} else if( !$(this).parent().parent().hasClass('iw-so-acc-toggle') ) {
						e.preventDefault();
						$(this).parent().toggleClass( 'iw-so-acc-item-active' );
						$(this).siblings( '.iw-so-acc-content' ).slideToggle( '300ms' );
					} else {
						e.preventDefault();
					}

					if( $(this).parent().parent().hasClass('iw-so-acc-singleExpand') ) {
						$(this).parent().siblings('.iw-so-acc-item.iw-so-acc-item-active').removeClass( 'iw-so-acc-item-active' ).children( '.iw-so-acc-content' ).slideUp( '300ms' );
					}

				} );

			} );
		}
	}

	}
)( jQuery );

jQuery( function ( $ ) {
	$(document).iwInitFtrAccordion();

	if (window.location.hash) {
		var $target = $('body').find(window.location.hash);
		if ($target.hasClass('iw-so-acc-title')) {
			$(window.location.hash).trigger("click");
		}
	}
} );
