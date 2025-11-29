import { scrollToElem } from './helpers';

export default () => {
	document.addEventListener( 'click', ( e ) => {
		const target = e.target;
		if ( ! target ) {
			return null;
		}

		const href = target.getAttribute( 'href' );
		if ( ! href ) {
			return null;
		}

		if ( href.startsWith( '#' ) && target.closest( '.menu-item' ) ) {
			e.preventDefault();

			const id = href.slice( 1 );
			const el = document.getElementById( id );
			if ( el ) {
		  		scrollToElem( el );
			}
		}
	} );
};
