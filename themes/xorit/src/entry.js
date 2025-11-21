import './styles/main.scss'; // main styles file

// Here is a list of scripts, that must be loaded before the user interaction
import { documentReady } from './scripts/helpers';
import header from './scripts/header';
import sliderServices from './scripts/slider-services';
import tabs from './scripts/tabs';
import simple from './scripts/animation/simple';
import faq from './scripts/faq';
import popup from './scripts/popup';
import sliderStack from './scripts/slider-stack';
import cookies from './scripts/cookies';
import formFields from './scripts/form-fields';

// Prevent browser scroll restoration
if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}
// Force scroll to top
window.scrollTo(0, 0);

documentReady( () => {
	header();
	tabs();
	faq();
	popup();
	cookies();
	formFields();

	// Sliders
	sliderServices();
	sliderStack();

	// Animation
	simple();
} )


// Resize
document.addEventListener( 'resize', () => {
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
