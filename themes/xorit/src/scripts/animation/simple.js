import { gsap } from 'gsap'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

export default () => {
	gsap.registerPlugin( ScrollTrigger )

	gsap.utils.toArray( '.js-x-fade-up-item' ).forEach( ( el ) => {
		const delay = parseFloat( el.dataset.delay ) || 0

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
		} )
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
		} )
	} )
}
