( function( api ) {

	// Extends our custom "tatoo-lite" section.
	api.sectionConstructor['tatoo-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );