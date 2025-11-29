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

/**
 * Sets a cookie with the specified name, value, and expiration time.
 *
 * @param {string} name - The name of the cookie.
 * @param {string} value - The value to assign to the cookie.
 * @param {number} [days=3650] - The number of days until the cookie expires. Defaults to 10 years.
 */
export const setCookie = ( name, value, days = 365 * 10 ) => {
	const date = new Date();
	date.setTime( date.getTime() + days * 24 * 60 * 60 * 1000 );
	document.cookie = `${ name }=${ value }; expires=${ date.toUTCString() }; path=/`;
};

/**
 * Retrieves the value of a specific cookie by its name.
 *
 * This function searches through the document's cookies and extracts the value
 * of the cookie that matches the specified name. If no matching cookie is found,
 * it returns null.
 *
 * @param {string} name - The name of the cookie to retrieve.
 * @returns {string|null} The value of the cookie if found, or null if no such cookie exists.
 */
export const getCookie = ( name ) => {
	const nameEQ  = `${ name }=`;
	const cookies = document.cookie.split( ';' );
	for ( let c of cookies ) {
		c = c.trim();
		if ( c.indexOf( nameEQ ) === 0 ) {
			return c.substring( nameEQ.length );
		}
	}
	return null;
};

/**
 * Removes a specific cookie by its name.
 * Sets the cookie's expiration date to a past date, effectively removing it from the browser.
 *
 * @param {string} name - The name of the cookie to be removed.
 */
export const removeCookie = ( name ) => {
	document.cookie = `${ name }=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
};

/**
 * Scrolls the page smoothly to the specified element while accounting for a sticky header's height.
 *
 * @param {Element} el - The DOM element to which the page should scroll.
 */
export const scrollToElem = ( el ) => {

	const header = document.querySelector( '.x-header' );
	const offset = header ? header.offsetHeight : 0; // keep in mind the sticky header height
	const topPos = el.getBoundingClientRect().top + window.scrollY - offset;

	window.scrollTo( { top: topPos, behavior: 'smooth' } );
}
