import { getCookie, setCookie } from './helpers';

export default () => {
	const cookieName = 'x-accepted-cookies';

	if ( getCookie( cookieName ) ) {
		return null;
	}

	const container = document.querySelector( '.js-x-cookies' );

	if ( ! container ) {
		return null;
	}

	const cookieCl = 'x-cookies_active';
	container.classList.add( cookieCl );

	container.addEventListener( 'click', ( e ) => {
		const target = e.target;

		if ( target.classList.contains( 'js-x-cookies-button' ) ) {
			setCookie( cookieName, '1' );
			container.classList.remove( cookieCl );
		}
	} );
}
