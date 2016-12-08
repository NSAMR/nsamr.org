(
	function ( $ ) {

	$.fn.iwInitBlog = function(){

		if( $( '.iw-so-blog' ).length ) {
			$( '.iw-so-blog .iw-so-blog-equal-height' ).each( function() {
				$( this ).find( '.iw-so-article' ).matchHeight({
					byRow: false,
					property: 'height',
					target: null,
					remove: false
				});
			});
		}

	}
} )( jQuery );

jQuery( function ( $ ) {
	$( document ).iwInitBlog();

	function onElementHeightChange(elm, callback){
		var lastHeight = elm.clientHeight, newHeight;
		(function run(){
			newHeight = elm.clientHeight;
			if( lastHeight != newHeight )
				callback();
			lastHeight = newHeight;

			if( elm.onElementHeightChangeTimer )
				clearTimeout(elm.onElementHeightChangeTimer);

			elm.onElementHeightChangeTimer = setTimeout(run, 200);
		})();
	}

	onElementHeightChange(document.body, function(){
	  $( document ).iwInitBlog();
	});
} );
