import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { documentReady } from '../helpers';

import simple from './simple';
import clients from './clients';

gsap.registerPlugin( ScrollTrigger );

documentReady( () => {
	simple( gsap );
	clients( gsap, ScrollTrigger );
} );
