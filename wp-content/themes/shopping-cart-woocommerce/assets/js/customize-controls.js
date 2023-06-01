( function( api ) {

	// Extends our custom "shopping-cart-woocommerce" section.
	api.sectionConstructor['shopping-cart-woocommerce'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );