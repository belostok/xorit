import { isMobile } from '../helpers';

export default ( gsap, ScrollTrigger ) => {
	if ( isMobile ) {
		return null;
	}

	const stopElement  = document.querySelector( '.js-x-clients-stop' );
	const startElement = document.querySelector( '.js-x-clients-start' );
	const header       = document.querySelector( '.js-x-header' );
	const titleElement = document.querySelector( '.js-x-clients-title' );

	if ( ! stopElement || ! startElement || ! titleElement ) {
		return null;
	}

	const offset      = header ? header.offsetHeight : 0;
	const titleHeight = titleElement.offsetHeight;

	ScrollTrigger.create( {
		trigger: stopElement,
		start: `top ${ offset }px`,
		endTrigger: startElement,
		end: `bottom ${ offset + titleHeight }px`,
		pin: '.js-x-clients-title',
		pinSpacing: false
	} );
};
