function initPhoneMask() {
	const phones = document.querySelectorAll( '.js-x-phone' );

	if ( ! phones || phones.length === 0 ) {
		return null;
	}

	phones.forEach( ( phone ) => {
		// Skip if already initialized
		if ( phone.dataset.maskInitialized ) {
			return null;
		}

		// Mark as initialized
		phone.dataset.maskInitialized = 'true';

		function formatPhone( digitsOnly ) {
			// Limit to 10 digits
			digitsOnly = digitsOnly.substring( 0, 10 );

			// Build the mask with actual digits
			const template = '+7 (___) ___-__-__';
			let i          = 0;
			return template.replace( /_/g, () => digitsOnly[ i++ ] || '_' );
		}

		function getDigits( value ) {
			let digits = value.replace( /\D/g, '' );
			// Remove leading 7 if present
			if ( digits.startsWith( '7' ) ) {
				digits = digits.substring( 1 );
			}
			return digits;
		}

		function setCursorPosition( formatted, digitCount ) {
			// Find position after the last digit
			let count = 0;
			let pos   = 4; // Default position after "+7 ("

			for ( let i = 0; i < formatted.length; i++ ) {
				if ( /\d/.test( formatted[ i ] ) && formatted[ i ] !== '7' ) {
					count++;
					if ( count === digitCount ) {
						pos = i + 1;
						break;
					}
				}
			}

			setTimeout( () => {
				phone.setSelectionRange( pos, pos );
			}, 0 );
		}

		function handleInput( e ) {
			const digits    = getDigits( phone.value );
			const formatted = formatPhone( digits );
			phone.value     = formatted;
			setCursorPosition( formatted, digits.length );
		}

		function handleFocus() {
			if ( ! phone.value ) {
				phone.value = formatPhone( '' );
				setTimeout( () => {
					phone.setSelectionRange( 4, 4 );
				}, 0 );
			}
		}

		function handleBlur() {
			const digits = getDigits( phone.value );
			if ( digits.length === 0 ) {
				phone.value = '';
			}
		}

		function handleKeyDown( e ) {
			const digits = getDigits( phone.value );

			if ( e.key === 'Backspace' ) {
				e.preventDefault();

				if ( digits.length > 0 ) {
					const newDigits = digits.slice( 0, -1 );
					const formatted = formatPhone( newDigits );
					phone.value     = formatted;
					setCursorPosition( formatted, newDigits.length );
				}
			} else if ( e.key === 'Delete' ) {
				e.preventDefault();
			}
		}

		phone.addEventListener( 'input', handleInput );
		phone.addEventListener( 'focus', handleFocus );
		phone.addEventListener( 'blur', handleBlur );
		phone.addEventListener( 'keydown', handleKeyDown );
	} );
}

export default () => {
	// Initialize on page load
	initPhoneMask();

	// Re-initialize after CF7 forms are loaded
	document.addEventListener( 'wpcf7ready', function() {
		initPhoneMask();
	}, false );
}
