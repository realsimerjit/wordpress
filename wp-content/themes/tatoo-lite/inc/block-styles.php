<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since Tatoo Lite 1.0
	 *
	 * @return void
	 */
	function tatoo_lite_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/columns',
			array(
				'name'  => 'tatoo-lite-columns-overlap',
				'label' => esc_html__( 'Overlap', 'tatoo-lite' ),
			)
		);

		// Cover: Borders.
		register_block_style(
			'core/cover',
			array(
				'name'  => 'tatoo-lite-border',
				'label' => esc_html__( 'Borders', 'tatoo-lite' ),
			)
		);

		// Group: Borders.
		register_block_style(
			'core/group',
			array(
				'name'  => 'tatoo-lite-border',
				'label' => esc_html__( 'Borders', 'tatoo-lite' ),
			)
		);

		// Image: Borders.
		register_block_style(
			'core/image',
			array(
				'name'  => 'tatoo-lite-border',
				'label' => esc_html__( 'Borders', 'tatoo-lite' ),
			)
		);

		// Image: Frame.
		register_block_style(
			'core/image',
			array(
				'name'  => 'tatoo-lite-image-frame',
				'label' => esc_html__( 'Frame', 'tatoo-lite' ),
			)
		);

		// Latest Posts: Dividers.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'tatoo-lite-latest-posts-dividers',
				'label' => esc_html__( 'Dividers', 'tatoo-lite' ),
			)
		);

		// Latest Posts: Borders.
		register_block_style(
			'core/latest-posts',
			array(
				'name'  => 'tatoo-lite-latest-posts-borders',
				'label' => esc_html__( 'Borders', 'tatoo-lite' ),
			)
		);

		// Media & Text: Borders.
		register_block_style(
			'core/media-text',
			array(
				'name'  => 'tatoo-lite-border',
				'label' => esc_html__( 'Borders', 'tatoo-lite' ),
			)
		);

		// Separator: Thick.
		register_block_style(
			'core/separator',
			array(
				'name'  => 'tatoo-lite-separator-thick',
				'label' => esc_html__( 'Thick', 'tatoo-lite' ),
			)
		);

		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'tatoo-lite-social-icons-color',
				'label' => esc_html__( 'Dark gray', 'tatoo-lite' ),
			)
		);
	}
	add_action( 'init', 'tatoo_lite_register_block_styles' );
}
