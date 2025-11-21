import { isMobile } from './helpers';

export default () => {
	const header = document.querySelector( '.js-x-header' );

	if ( ! header ) {
		return null;
	}

	const stickyCl = 'x-header_sticky';
	const hiddenCl = 'x-header_hidden';
	const offset   = 100;

	let lastY = window.scrollY;

	window.addEventListener( 'scroll', () => {
		const currentY = window.scrollY;

		// Below offset → reset
		if ( currentY < offset ) {
			header.classList.remove( stickyCl );
			header.classList.remove( hiddenCl );
			lastY = currentY;
			return;
		}

		// Scroll direction
		if ( currentY < lastY ) {
			// Up → show
			header.classList.add( stickyCl );
			header.classList.remove( hiddenCl );
		} else {
			// Down → hide
			header.classList.remove( stickyCl );
			header.classList.add( hiddenCl );
		}

		lastY = currentY;
	} );

	if ( isMobile ) {
		const firstMenuItem = document.querySelector( '.x-header__menu-inner > ul > li:first-child' );

		if ( firstMenuItem ) {
			firstMenuItem.classList.add( 'x-menu-item-opened' );
		}

		document.addEventListener( 'click', ( e ) => {
			const target = e.target;

			if ( target.classList.contains( 'js-x-mobile-menu-button' ) ) {
				document.body.classList.toggle( 'x-menu-opened' );
			}

			if (
				( target.classList.contains( 'menu-item-has-children' ) ||
					target.closest( '.menu-item-has-children' ) ) &&
				target.closest( '.x-header__menu-inner' ) &&
				! target.closest( '.sub-menu' )
			) {
				target.classList.toggle( 'x-menu-item-opened' );
			}
		} );
	}
}
