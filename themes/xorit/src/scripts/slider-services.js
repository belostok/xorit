import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
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
					modules: [ Autoplay ],
					slidesPerView: 1,
					spaceBetween: 20,
					loop: true,
					autoplay: isAutoplay && slides.length > 1 ? autoplay : false,
				} );
			}
		} );
	} else {
		let sliders = [];

		sliderContainersMobile.forEach( ( el, index ) => {
			sliders[ index ] = null;
		} );

		sliderContainersMobile.forEach( ( sliderContainer, index ) => {
			if ( sliders[ index ] === null ) {
				const slides     = sliderContainer.querySelectorAll( '.swiper-slide' );
				const isAutoplay = sliderContainer.dataset.autoplay;

				const autoplay   = {
					delay: 5000,
					disableOnInteraction: true
				};
				sliders[ index ] = new Swiper( sliderContainer, {
					modules: [ Autoplay, Navigation, Pagination ],
					slidesPerView: 'auto',
					centeredSlides: true,
					spaceBetween: 7,
					loop: true,
					autoplay: isAutoplay && slides.length > 1 ? autoplay : false,
					navigation: {
						prevEl: sliderContainer.querySelector( '.js-x-nav-prev' ),
						nextEl: sliderContainer.querySelector( '.js-x-nav-next' ),
					},
					pagination: {
						el: sliderContainer.querySelector( '.js-x-pagination' ),
						type: 'bullets',
					}
				} );
			}
		} );
	}
}
