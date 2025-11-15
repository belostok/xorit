import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import { isMobile } from './helpers';

export default () => {
	const sliderContainers = document.querySelectorAll( '.js-x-stack-slider' );

	if ( ! isMobile || ! sliderContainers || sliderContainers.length === 0 ) {
		return null;
	}
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
				modules: [ Autoplay, Navigation, Pagination ],
				slidesPerView: 2,
				spaceBetween: 7,
				loop: true,
				autoplay: isAutoplay && slides.length > 2 ? autoplay : false,
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
