export const documentReady = ( fn ) => {
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', fn );
	} else {
		fn();
	}
};

export const isMobile = window.matchMedia('(max-width: 991px)').matches;
