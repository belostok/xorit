import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

import simple from './simple';
import clients from './clients';

gsap.registerPlugin( ScrollTrigger );

export default () => {
	simple( gsap );
	clients( gsap, ScrollTrigger );
};
