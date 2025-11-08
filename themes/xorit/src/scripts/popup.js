export default () => {
	const popups = document.querySelectorAll( '.js-x-popup' );

	if ( ! popups || popups.length === 0 ) {
		return null;
	}

	const popupCl      = 'x-popup_active';
	const onHashChange = () => {
		let hash = location.hash;

		if ( ! hash ) {
			return null;
		}

		const type = location.hash.replace( /^#/, '' )

		if ( ! type ) {
			return null;
		}

		const popup = document.querySelector( `.js-x-popup[data-type="${ type }"]` );

		if ( ! popup || popup.classList.contains( popupCl ) ) {
			return null;
		}

		popups.forEach( ( el ) => el.classList.remove( popupCl ) );
		popup.classList.add( popupCl );
	}

	window.addEventListener( 'hashchange', onHashChange );
	onHashChange();

	document.addEventListener( 'click', ( e ) => {
		const target = e.target;

		if ( target.classList.contains( 'js-x-popup-close' ) ) {
			popups.forEach( ( el ) => el.classList.remove( popupCl ) );
			history.replaceState( null, '', location.pathname + location.search );
		}
	} );
}
