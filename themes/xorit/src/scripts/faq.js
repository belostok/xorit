export default () => {
	const faqContainers = document.querySelectorAll( '.js-x-faq-container' );

	if ( ! faqContainers || faqContainers.length === 0 ) {
		return null;
	}

	faqContainers.forEach( ( container ) => {
		const inputs = container.querySelectorAll( '.js-x-faq-item' );

		if ( ! inputs || inputs.length === 0 ) {
			return null;
		}

		inputs.forEach( ( input ) => {
			input.addEventListener( 'change', () => {
				if ( ! input.checked ) {
					return null;
				}

				inputs.forEach( ( other ) => {
					if ( other !== input ) {
						other.checked = false;
					}
				} );
			} );
		} );
	} );
}
