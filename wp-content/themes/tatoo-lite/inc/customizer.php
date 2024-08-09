<?php
/**
 * Tatoo Lite Theme Customizer
 *
 * @package Tatoo Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tatoo_lite_customize_register( $wp_customize ) {
	function tatoo_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->tatoo_lite         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->tatoo_lite  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => '.site-name-desc a',
	    'render_callback' => 'tatoo-lite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => '.site-name-desc p',
	    'render_callback' => 'tatoo-lite_customize_partial_blogdescription',
	) );

	/*========================
	==	Theme Colors Start
	========================*/

	$wp_customize->add_setting('color_scheme', array(
		'default' => '#beaa73',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','tatoo-lite'),
			'description'	=> __('Select theme main color from here.','tatoo-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);

	$wp_customize->add_setting('tatoo_headerbg-color', array(
		'default' => '#000000',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'tatoo_headerbg-color',array(
			'label' => __('Header Background Color','tatoo-lite'),
			'description'	=> __('Select background color for header.','tatoo-lite'),
			'section' => 'colors',
			'settings' => 'tatoo_headerbg-color'
		))
	);

	$wp_customize->add_setting('tatoo_footer-color', array(
		'default' => '#beaa73',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'tatoo_footer-color',array(
			'label' => __('Footer Background Color','tatoo-lite'),
			'description'	=> __('Select background color for footer.','tatoo-lite'),
			'section' => 'colors',
			'settings' => 'tatoo_footer-color'
		))
	);

	/*========================
	==	Theme Colors End
	========================*/
	
	/*========================
	==	Slider Start
	========================*/
	$wp_customize->add_section(
        'tatoo_theme_slider',
        array(
            'title' => __('Setting Up Theme Slider', 'tatoo-lite'),
            'priority' => null,
			'description'	=> __('Recommended image size (1600x900). Slider will work only when you select the static front page.','tatoo-lite'),	
        )
    );

    $wp_customize->add_setting('slidesmlttl',array(
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slidesmlttl',array(
		'type'	=> 'text',
		'label'	=> __('Add sub title for all slides','tatoo-lite'),
		'section'	=> 'tatoo_theme_slider'
	));

	$wp_customize->add_setting('theme-slide1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('theme-slide1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide one:','tatoo-lite'),
		'section'	=> 'tatoo_theme_slider'
	));	

	$wp_customize->add_setting('theme-slide2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('theme-slide2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide two:','tatoo-lite'),
		'section'	=> 'tatoo_theme_slider'
	));	

	$wp_customize->add_setting('theme-slide3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',	
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('theme-slide3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for slide three:','tatoo-lite'),
		'section'	=> 'tatoo_theme_slider'
	));	
	
	$wp_customize->add_setting('slide_read_more',array(
		'default'	=> __('','tatoo-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('slide_read_more',array(
		'label'	=> __('Add slider link button text.','tatoo-lite'),
		'section'	=> 'tatoo_theme_slider',
		'setting'	=> 'slide_read_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('hide_theme_slider',array(
		'default' => true,
		'sanitize_callback' => 'tatoo_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'hide_theme_slider', array(
	   'settings' => 'hide_theme_slider',
	   'section'   => 'tatoo_theme_slider',
	   'label'     => __('Check this to hide slider.','tatoo-lite'),
	   'type'      => 'checkbox'
    ));
	/*========================
	==	Slider End
	========================*/
	
	/*========================
	==	fisrt Section Start
	========================*/

	$wp_customize->add_section(
        'tatoo_featured_sec',
        array(
            'title' => __('Setting Up Featured Boxes Section', 'tatoo-lite'),
            'priority' => null,
			'description'	=> __('Select pages for setting up first / featured section. This section will be displayed only when you select the static front page.','tatoo-lite'),	
        )
    );
	
	$wp_customize->add_setting('tatoo_feat_ttl',array(
		'default'	=> __('','tatoo-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('tatoo_feat_ttl',array(
		'label'	=> __('Add section title text here.','tatoo-lite'),
		'section'	=> 'tatoo_featured_sec',
		'setting'	=> 'tatoo_feat_ttl',
		'type'	=> 'text'
	));

    $wp_customize->add_setting('tatoo_feat1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_feat1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 1st column','tatoo-lite'),
			'section'	=> 'tatoo_featured_sec'
	));
	
	$wp_customize->add_setting('tatoo_feat2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_feat2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 2nd column','tatoo-lite'),
			'section'	=> 'tatoo_featured_sec'
	));
	
	$wp_customize->add_setting('tatoo_feat3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_feat3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 3rd column','tatoo-lite'),
			'section'	=> 'tatoo_featured_sec'
	));
	
	$wp_customize->add_setting('tatoo_feat4',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_feat4',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 4th column','tatoo-lite'),
			'section'	=> 'tatoo_featured_sec'
	));
	
	$wp_customize->add_setting('tatoo_feat_more',array(
		'default'	=> __('Read More','tatoo-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('tatoo_feat_more',array(
		'label'	=> __('Add Read More text here.','tatoo-lite'),
		'section'	=> 'tatoo_featured_sec',
		'setting'	=> 'tatoo_feat_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('tatoo_feat_hide',array(
			'default' => true,
			'sanitize_callback' => 'tatoo_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'tatoo_feat_hide', array(
		   'settings' => 'tatoo_feat_hide',
    	   'section'   => 'tatoo_featured_sec',
    	   'label'     => __('Check this to hide section.','tatoo-lite'),
    	   'type'      => 'checkbox'
     ));

	/*========================
	==	First Section End
	========================*/
	
	/*========================
	==	Second Section Start
	========================*/

	$wp_customize->add_section(
        'tatoo_service_sec',
        array(
            'title' => __('Setting Up Services Section', 'tatoo-lite'),
            'priority' => null,
			'description'	=> __('Select pages for setting up second / services section. This section will be displayed only when you select the static front page.','tatoo-lite'),	
        )
    );

    $wp_customize->add_setting('tatoo_ser_ttl',array(
		'default'	=> __('','tatoo-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('tatoo_ser_ttl',array(
		'label'	=> __('Add section title here','tatoo-lite'),
		'section'	=> 'tatoo_service_sec',
		'setting'	=> 'tatoo_ser_ttl',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('tatoo_service1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_service1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 1st column','tatoo-lite'),
			'section'	=> 'tatoo_service_sec'
	));

	$wp_customize->add_setting('tatoo_service2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_service2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 2nd column','tatoo-lite'),
			'section'	=> 'tatoo_service_sec'
	));
	
	$wp_customize->add_setting('tatoo_service3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));
	
	$wp_customize->add_control('tatoo_service3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for 3rd column','tatoo-lite'),
			'section'	=> 'tatoo_service_sec'
	));

	$wp_customize->add_setting('tatoo_ser_hide',array(
			'default' => true,
			'sanitize_callback' => 'tatoo_lite_sanitize_checkbox',
			'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'tatoo_ser_hide', array(
		   'settings' => 'tatoo_ser_hide',
    	   'section'   => 'tatoo_service_sec',
    	   'label'     => __('Check this to hide section.','tatoo-lite'),
    	   'type'      => 'checkbox'
     ));

	/*========================
	==	Second Section End
	========================*/
	
}
add_action( 'customize_register', 'tatoo_lite_customize_register' );	

function tatoo_lite_css(){
		?>
        <style>
			a, 
			.tm_client strong,
			.postmeta a:hover,
			#sidebar ul li a:hover,
			.blog-post h3.entry-title,
			a.blog-more:hover,
			#commentform input#submit,
			input.search-submit,
			.blog-date .date,
			.sitenav ul li.current_page_item a,
			.sitenav ul li a:hover, 
			.sitenav ul li.current_page_item ul li a:hover,
			.site-name-desc p,
			.caption-holder h4,
			.caption-holder a.slide-button:hover,
			.read-more a:hover,
			.service-data .ser-more{
				color:<?php echo esc_attr(get_theme_mod('color_scheme','#beaa73')); ?>;
			}
			.nivo-controlNav a.active{
				border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#beaa73')); ?>;
			}
			h3.widget-title,
			.nav-links .current,
			.nav-links a:hover,
			p.form-submit input[type="submit"],
			.social a:hover,
			.nivo-controlNav a.active,
			a.nivo-prevNav,
			a.nivo-nextNav,
			a.slide-button:before,
			a.slide-button:after,
			.read-more a:before,
			.read-more a:after,
			.service-heading,
			.service-data{
				background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#beaa73')); ?>;
			}	
			#header,
			.sitenav ul li.menu-item-has-children:hover > ul,
			.sitenav ul li.menu-item-has-children:focus > ul,
			.sitenav ul li.menu-item-has-children.focus > ul{
				background-color:<?php echo esc_attr(get_theme_mod('tatoo_headerbg-color','#000000')); ?>;
			}
			.copyright-wrapper{
				background-color:<?php echo esc_attr(get_theme_mod('tatoo_footer-color','#beaa73')); ?>;
			}
		</style>
	<?php }
add_action('wp_head','tatoo_lite_css');

function tatoo_lite_customize_preview_js() {
	wp_enqueue_script( 'tatoo-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'tatoo_lite_customize_preview_js' );