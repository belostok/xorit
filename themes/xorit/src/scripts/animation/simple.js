import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'
import { isMobile } from '../helpers';

export default () => {
	gsap.registerPlugin( ScrollTrigger );

	gsap.utils.toArray( '.js-x-fade-up-item' ).forEach( ( el ) => {
		const delay = parseFloat( el.dataset.delay ) || 0;

		gsap.from( el, {
			opacity: 0,
			duration: 0.6,
			delay: delay,
			ease: 'power1.out',
			scrollTrigger: {
				trigger: el,
				start: 'top 80%',
				toggleActions: 'play none none reverse'
			}
		} );
	} );

	gsap.utils.toArray( '.js-x-fade-item' ).forEach( ( el ) => {
		gsap.from( el, {
			opacity: 0,
			duration: 1,
			ease: 'power1.out',
			scrollTrigger: {
				trigger: el,
				start: 'top 80%',
				toggleActions: 'play none none reverse'
			}
		} );
	} );

	if ( ! isMobile ) {

		// Scale + rotate, then fade next element
		gsap.utils.toArray( '.js-x-scale-rotate-hero' ).forEach( ( el ) => {
			const nextEls = document.querySelectorAll( '.js-x-fade-in-hero' );

			const tl = gsap.timeline();

			tl.to( el, {
				scale: 1,
				rotate: 45,
				opacity: 1,
				duration: 1,
				ease: 'power2.out',
			} );

			nextEls.forEach( ( item ) => {
				tl.to( item, {
					opacity: 1,
					y: 0,
					duration: 0.3,
					ease: 'power1.in',
				} );
			} );
		} );
	}
}
