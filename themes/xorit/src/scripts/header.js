import { isMobile } from './helpers';

export default () => {
	const header = document.querySelector( '.js-x-header' );

	if ( ! header ) {
		return null;
	}

	const stickyCl = 'x-header_sticky';
	const offset = 100;

	window.addEventListener( 'scroll', () => {
		if ( window.scrollY > offset ) {
			header.classList.add( stickyCl );
		} else {
			header.classList.remove( stickyCl );
		}
	} );

	if ( isMobile ) {
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
