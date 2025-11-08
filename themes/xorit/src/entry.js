import './styles/main.scss'; // main styles file

// Here is a list of scripts, that must be loaded before the user interaction
import { documentReady } from './scripts/helpers';
import header from './scripts/header';
import sliderServices from './scripts/slider-services';
import tabs from './scripts/tabs';
import simple from './scripts/animation/simple';
import faq from './scripts/faq';
import popup from './scripts/popup';

documentReady( () => {
	header();
	tabs();
	faq();
	popup();

	// Sliders
	sliderServices();

	// Animation
	simple();
} );

document.addEventListener( 'resize', () => {
	sliderServices();
} );
