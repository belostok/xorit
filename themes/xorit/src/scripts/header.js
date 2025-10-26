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
}
