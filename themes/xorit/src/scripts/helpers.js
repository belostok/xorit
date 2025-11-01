export const isMobile = window.matchMedia( '(max-width: 991px)' ).matches;

/**
 * @param fn
 */
export const documentReady = ( fn ) => {
	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', fn );
	} else {
		fn();
	}
};

/**
 * @param el
 * @param className
 * @returns {null}
 */
export const addClass = ( el, className ) => {
	if ( ! el || ! className ) {
		return null;
	}

	const prepareCl = `${ className }_prepare`;
	const activeCl  = `${ className }_active`;

	el.classList.add( prepareCl );
	setTimeout( () => {
		el.classList.add( activeCl );
	}, 0 );
}

/**
 * @param el
 * @param className
 * @param timeout
 * @param force
 * @returns {null}
 */
export const removeClass = ( el, className, force = false, timeout = 300 ) => {
	if ( ! el || ! className ) {
		return null;
	}

	const prepareCl = `${ className }_prepare`;
	const activeCl  = `${ className }_active`;

	el.classList.remove( activeCl );

	if ( force ) {
		el.classList.remove( prepareCl );
	} else {
		setTimeout( () => {
			el.classList.remove( prepareCl );
		}, timeout );
	}
}
