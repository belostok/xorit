export default () => {
	const links = document.querySelectorAll( 'a[href="#services"]' );

	if ( ! links.length ) {
		return null;
	}

	const scrollToServices = () => {
		const target = document.querySelector( '#services' );

		if ( ! target ) {
			return false;
		}

		target.scrollIntoView( { behavior: 'smooth' } );
		return true;
	};

	if ( sessionStorage.getItem( 'scrollToServices' ) ) {
		sessionStorage.removeItem( 'scrollToServices' );

		window.addEventListener( 'load', () => {
			scrollToServices();
		} );
	}

	links.forEach( ( link ) => {
		link.addEventListener( 'click', ( e ) => {
			e.preventDefault();

			const scrolled = scrollToServices();

			if ( ! scrolled ) {
				sessionStorage.setItem( 'scrollToServices', '1' );
				window.location.href = '/';
			}
		} );
	} );
};
