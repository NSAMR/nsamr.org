(
	function ( $ ) {

	$.fn.iwInitTabs = function(){
		"use strict";

		if( $( '.iw-so-tabs' ).length ) {
			$( '.iw-so-tabs' ).each( function() {

				if( !$(this).children('.iw-so-tabs-nav').children().hasClass('iw-so-tab-active') ) {
					$(this).children('.iw-so-tabs-nav').children().first().addClass('iw-so-tab-active');
					$(this).children('.iw-so-tabs-content').children().first().addClass('iw-so-tab-active');
				}

				$(this).find('.iw-so-tabs-nav a').click( function(e) {
					e.preventDefault();

					$(this).closest('.iw-so-tabs').find('.iw-so-tab-active').removeClass('iw-so-tab-active');
					$(this).parent().addClass('iw-so-tab-active');

					var id = $(this).attr('href');
					$(this).closest('.iw-so-tabs').find(id).addClass('iw-so-tab-active');
				} );
			} );
		}
	}

	}
)( jQuery );

jQuery( function ( $ ) {
	$(document).iwInitTabs();

	if (window.location.hash) {
		var $target = $('body').find(window.location.hash);
		if ($target.hasClass('iw-so-tab-title')) {
			$(window.location.hash).find('a').trigger("click");
		}
	}
} );
