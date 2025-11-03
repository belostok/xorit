import './styles/main.scss'; // main styles file

// Here is a list of scripts, that must be loaded before the user interaction
import { documentReady } from './scripts/helpers';
import header from './scripts/header';
import sliderServices from './scripts/slider-services';
import tabs from './scripts/tabs';
import simple from './scripts/animation/simple';

documentReady( () => {
	header();
	sliderServices();
	tabs();

	// Animation
	simple();
} );
