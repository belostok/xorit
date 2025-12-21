import './styles/main.scss'; // main styles file

// Here is a list of scripts, that must be loaded before the user interaction
import header from './scripts/header';
import sliderServices from './scripts/slider-services';
import tabs from './scripts/tabs';
import faq from './scripts/faq';
import popup from './scripts/popup';
import sliderStack from './scripts/slider-stack';
import cookies from './scripts/cookies';
import formFields from './scripts/form-fields';
import { documentReady } from './scripts/helpers';
import linkScroll from './scripts/linkScroll';
import animation from './scripts/animation';

// Prevent browser scroll restoration
if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}
// Force scroll to top
window.scrollTo(0, 0);

documentReady( () => {
	animation();

	header();
	tabs();
	faq();
	popup();
	cookies();
	formFields();
	linkScroll();

	// Sliders
	sliderServices();
	sliderStack();
} )


// Resize
document.addEventListener( 'resize', () => {
	animation();
	sliderServices();
	sliderStack();
} );

// Contact Form 7
document.addEventListener( 'wpcf7mailsent', function( event ) {
	location.hash = 'success';
}, false );
document.addEventListener( 'wpcf7mailfailed', function( event ) {
	location.hash = 'error';
}, false );
