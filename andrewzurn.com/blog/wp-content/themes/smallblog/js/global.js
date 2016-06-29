(function ( $ ) {
	$( document ).ready( function () {


		/**
		 * Useful variables
		 *
		 */
		size = {
			'sm': 768,
			'md': 992,
			'lg': 1200
		};


		/**
		 * A simple anchor animation.
		 * This used function to scroll to top of page.
		 */
		$( '.anchor' ).click( function ( event ) {
			event.preventDefault();
			var targetOffset = $( 'body' ).offset();
			var targetTop = targetOffset.top;
			animateTop = $( 'html, body' ).animate( { scrollTop: targetTop }, 800 );
		} );


		/**
		 * A simple form validation for the post comments.
		 * This functionality use jQuery-validate plugin.
		 * http://jqueryvalidation.org/
		 */
		var commentForm = $( '#commentform' );
		if ( commentForm.length ) {
			commentForm.validate( {
				errorElement: 'span',
				rules: {
					'author': {
						required: true
					},
					'email': {
						required: true,
						email: true
					},
					'comment': {
						required: true
					}
				}
			} );
		}


		/**
		 * Off-canvas
		 * Animation which opens a container in one of the sides of the page.
		 *
		 * @since 1.1
		 *
		 * @param obj
		 */
		function odsOffCanvas( obj ) {
			var a = $( '.off-canvas' ),
			    b = obj ? $( obj ) : $( '[data-off-canvas="true"]' ),
			    c = $( 'body, .off-canvas .off-canvas-headline .icon-close' );


			/**
			 * Click event
			 * Open and closed the off-canvas.
			 */
			b.click( function ( event ) {
				event.preventDefault();
				event.stopPropagation();
				var canvas = $( this ).data( 'off-canvas-id' );
				$( canvas ).toggleClass( 'off-canvas-open' );
			} );


			/**
			 * Click event.
			 * Reset the off-canvas.
			 */
			c.click( function () {
				a.removeClass( 'off-canvas-open' );
			} );


			/**
			 * Stop Propagation to off-canvas:
			 */
			a.click( function ( e ) {
				e.stopPropagation();
			} );

		}

		odsOffCanvas();


		/**
		 * A creative animate navigation.
		 * This functionality allows at multiple levels
		 * on a animation of opening and closing the sub-menus.
		 *
		 * @since 1.0
		 *
		 * @param obj
		 * @constructor
		 */
		function odsAnimateNav( obj ) {
			var a = obj ? $( obj ) : $( '#navigation' ),
			    b = a.find( '.sub-menu' ),
			    c = b.parent( '.menu-item-has-children' );


			/**
			 * Create back button.
			 */
			b.each( function () {
				$( this ).prepend( '<li class="menu-item-back"><a href="#"><span class="icon-arrow-left"></span>' + objectL10n.back + '</a></li>' );
			} );


			/**
			 * Create button icon-plus for the sub-navigation.
			 */
			c.each( function () {
				$( '> a:first-child', this ).append( '<span class="icon-plus"></span>' );
			} );


			/**
			 * Click event.
			 * Open and closed the sub-navigation.
			 */
			c.find( '.icon-plus' ).click( function ( e ) {
				e.preventDefault();
				$( this ).parent().next( '.sub-menu' ).addClass( 'sub-menu-open' );
			} );


			/**
			 * Click event.
			 * Back to the parent item.
			 */
			c.find( '.menu-item-back' ).click( function ( e ) {
				e.preventDefault();
				$( this ).parent().removeClass( 'sub-menu-open' );
			} );
		}

		odsAnimateNav();


		/**
		 * video wrap content
		 */
		var theContent = $( '.single-post .the-content' );
		if ( theContent.length ) {
			$( 'iframe', theContent ).first().remove();

			$( 'iframe', theContent ).each( function () {
				$( this ).wrap( '<div class="embed-responsive embed-responsive-16by9"></div>' );
			} );
		}


		/**
		 * A simple dialog for the search.
		 *
		 * @since 1.1
		 *
		 */
		function odsSearchDialog( obj ) {
			var a = obj ? $( obj ) : $( '[data-search-dialog="true"]' ),
			    b = $( '.search-dialog .cl' ),
			    c = a.attr( 'href' ),
			    k = 45;


			/**
			 * Click event.
			 * Open the search Dialog.
			 */
			a.click( function ( e ) {
				e.preventDefault();
				var dialog = $( this ).attr( 'href' );

				$( dialog ).addClass( 'open' );

				setTimeout( function () {
					$( 'form input[name="s"]', dialog ).focus();
				}, 1000 );

			} );


			/**
			 * Click event.
			 * Closed the search Dialog.
			 */
			b.click( function ( e ) {
				e.preventDefault();

				$( this ).parent().removeClass( 'open' );

			} );


			/**
			 * Remove Attribute auto-complete of the input field.
			 */
			if ( $( c ).length )
				$( '.search-field', c ).attr( 'autocomplete', 'off' );

		}

		odsSearchDialog();


	} );
})( jQuery );

