import { addClass, isMobile, removeClass } from './helpers';

export default () => {
	const containers = document.querySelectorAll( '.js-x-tabs-container' );

	if ( ! containers || containers.length === 0 ) {
		return null;
	}

	const buttonCl  = 'x-tabs__button';
	const contentCl = 'x-tabs__content';

	containers.forEach( ( container ) => {
		container.addEventListener( 'click', ( e ) => {
			const target = e.target;

			if ( target.classList.contains( 'js-x-tabs-button' ) && ! target.classList.contains( `${ buttonCl }_active` ) ) {
				const buttonData = target.dataset.tab;

				if ( ! buttonData ) {
					return null;
				}

				const buttons  = container.querySelectorAll( '.js-x-tabs-button' );
				const contents = container.querySelectorAll( '.js-x-tabs-content' );

				const currentContent = container.querySelector( `.js-x-tabs-content[data-tab="${ buttonData }"]` );

				if ( ! currentContent ) {
					return null;
				}

				if ( buttons?.length ) {
					buttons.forEach( ( button ) => button.classList.remove( `${ buttonCl }_active` ) );
				}
				if ( contents?.length ) {
					contents.forEach( ( content ) => removeClass( content, contentCl, true ) );
				}

				target.classList.add( `${ buttonCl }_active` );
				addClass( currentContent, contentCl );

				if ( isMobile ) {
					const y = currentContent.getBoundingClientRect().top + window.scrollY - 150;
					window.scrollTo( { top: y, behavior: 'smooth' } );
				}
			}
		} );
	} );
}
