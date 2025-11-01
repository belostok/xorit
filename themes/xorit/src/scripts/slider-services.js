import Swiper from 'swiper';
import { isMobile } from './helpers';

export default () => {
	const sliderContainers       = document.querySelectorAll( '.js-x-services-slider' );
	const sliderContainersMobile = document.querySelectorAll( '.js-x-services-slider-mobile' );

	if ( ! isMobile ) {
		let sliders = [];

		sliderContainers.forEach( ( el, index ) => {
			sliders[ index ] = null;
		} );

		sliderContainers.forEach( ( sliderContainer, index ) => {
			if ( sliders[ index ] === null ) {
				const slides     = sliderContainer.querySelectorAll( '.swiper-slide' );
				const isAutoplay = sliderContainer.dataset.autoplay;

				const autoplay   = {
					delay: 5000,
					disableOnInteraction: true
				};
				sliders[ index ] = new Swiper( sliderContainer, {
					slidesPerView: 1,
					spaceBetween: 20,
					loop: true,
					autoplay: isAutoplay && slides.length > 1 ? autoplay : false,
				} );
			}
		} );
	} else {

	}
}
