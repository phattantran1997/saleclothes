<?php
/**
 * zamura Theme Customizer
 *
 * @package zamura
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zamura_customize_register( $wp_customize ) {

	global $zamuraPostsPagesArray, $zamuraYesNo, $zamuraSliderType, $zamuraServiceLayouts, $zamuraAvailableCats, $zamuraBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'zamura_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'zamura_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'zamura_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'zamura'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'zamura_general';
	$wp_customize->get_section( 'background_image' )->panel = 'zamura_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'zamura');
	$wp_customize->get_section( 'header_image' )->panel = 'zamura_general';
	$wp_customize->get_section( 'header_image' )->title = __('Header Settings', 'zamura');
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_control( 'header_image' )->active_callback = 'zamura_show_wp_header_control';	
	$wp_customize->get_section( 'static_front_page' )->panel = 'zamura_business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'zamura');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'zamura' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'zamura_business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'zamura'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'zamura_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new zamura_Customize_Control_Upgrade(
		$wp_customize,
		'zamura_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'zamura' ),
			'settings'   => 'zamura_show_sliderr',
			'priority'   => 10,
			'section'    => 'zamura_business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'zamura_business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'zamura'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'zamura_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new zamura_Customize_Control_Guide(
		$wp_customize,
		'zamura_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'zamura' ),
			'settings'   => 'zamura_show_sliderrr',
			'priority'   => 10,
			'section'    => 'zamura_business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );
	
	/* Header Section */
	$wp_customize->add_setting( 'zamura_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_show_slider',
		array(
			'label'      => __( 'Show header?', 'zamura' ),
			'settings'   => 'zamura_show_slider',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $zamuraYesNo,
		)
	) );	
	$wp_customize->add_setting( 'zamura_header_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_header_type',
		array(
			'label'      => __( 'Header type :', 'zamura' ),
			'settings'   => 'zamura_header_type',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $zamuraSliderType,
		)
	) );	
	
	
	/* Business page panel */
	$wp_customize->add_panel( 'zamura_business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'zamura'),
		'active_callback' => '',
	) );
	
	$wp_customize->add_section( 'zamura_business_page_layout_selection', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select FrontPage Layout', 'zamura'),
		'active_callback' => 'zamura_front_page_sections',
		'panel'  => 'zamura_business_page',
	) );
	$wp_customize->add_setting( 'zamura_business_page_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_business_page_layout_type',
		array(
			'label'      => __( 'Layout type :', 'zamura' ),
			'settings'   => 'zamura_business_page_layout_type',
			'priority'   => 10,
			'section'    => 'zamura_business_page_layout_selection',
			'type'    => 'select',
			'choices' => $zamuraBusinessLayoutType,
		)
	) );	
	
	
	$wp_customize->add_section( 'zamura_business_page_layout_six', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Six settings', 'zamura'),
		'active_callback' => 'zamura_front_page_sections',
		'panel'  => 'zamura_business_page',
	) );
	$wp_customize->add_setting( 'zamura_six_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_six_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'zamura' ),
			'settings'   => 'zamura_six_welcome_post',
			'priority'   => 10,
			'section'    => 'zamura_business_page_layout_six',
			'type'    => 'select',
			'choices' => $zamuraPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'zamura_six_post_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_six_post_one',
		array(
			'label'      => __( 'Post one :', 'zamura' ),
			'settings'   => 'zamura_six_post_one',
			'priority'   => 20,
			'section'    => 'zamura_business_page_layout_six',
			'type'    => 'select',
			'choices' => $zamuraPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'zamura_six_post_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_six_post_two',
		array(
			'label'      => __( 'Post one :', 'zamura' ),
			'settings'   => 'zamura_six_post_two',
			'priority'   => 30,
			'section'    => 'zamura_business_page_layout_six',
			'type'    => 'select',
			'choices' => $zamuraPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'zamura_six_post_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_six_post_three',
		array(
			'label'      => __( 'Post one :', 'zamura' ),
			'settings'   => 'zamura_six_post_three',
			'priority'   => 40,
			'section'    => 'zamura_business_page_layout_six',
			'type'    => 'select',
			'choices' => $zamuraPostsPagesArray,
		)
	) );	
	
	
	$wp_customize->add_section( 'business_page_layout_wooone', array(
		'priority'       => 60,
		'capability'     => 'edit_theme_options',
		'title'      => __('Woo One settings', 'zamura'),
		'active_callback' => 'zamura_front_page_sections',
		'panel'  => 'zamura_business_page',
	) );

	$wp_customize->add_setting( 'zamura_wooone_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_wooone_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'zamura' ),
			'settings'   => 'zamura_wooone_welcome_post',
			'priority'   => 10,
			'section'    => 'business_page_layout_wooone',
			'type'    => 'select',
			'choices' => $zamuraPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'zamura_wooone_latest_heading',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_wooone_latest_heading',
		array(
			'label'      => __( 'Products Heading :', 'zamura' ),
			'settings'   => 'zamura_wooone_latest_heading',
			'priority'   => 20,
			'section'    => 'business_page_layout_wooone',
			'type'    => 'text',
		)
	) );
	$wp_customize->add_setting( 'zamura_wooone_latest_text',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_wooone_latest_text',
		array(
			'label'      => __( 'Products Text :', 'zamura' ),
			'settings'   => 'zamura_wooone_latest_text',
			'priority'   => 30,
			'section'    => 'business_page_layout_wooone',
			'type'    => 'text',
		)
	) );	

	$wp_customize->add_section( 'zamura_business_page_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'zamura'),
		'active_callback' => '',
		'panel'  => 'zamura_general',
	) );
	$wp_customize->add_setting( 'zamura_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_show_quote',
		array(
			'label'      => __( 'Show quote?', 'zamura' ),
			'settings'   => 'zamura_show_quote',
			'priority'   => 10,
			'section'    => 'zamura_business_page_quote',
			'type'    => 'select',
			'choices' => $zamuraYesNo,
		)
	) );
	$wp_customize->add_setting( 'zamura_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_quote_post',
		array(
			'label'      => __( 'Select post', 'zamura' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'zamura' ),
			'settings'   => 'zamura_quote_post',
			'priority'   => 11,
			'section'    => 'zamura_business_page_quote',
			'type'    => 'select',
			'choices' => $zamuraPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'zamura_business_page_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'zamura'),
		'active_callback' => '',
		'panel'  => 'zamura_general',
	) );	
	$wp_customize->add_setting( 'zamura_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'zamura_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'zamura_show_social',
		array(
			'label'      => __( 'Show social?', 'zamura' ),
			'settings'   => 'zamura_show_social',
			'priority'   => 10,
			'section'    => 'zamura_business_page_social',
			'type'    => 'select',
			'choices' => $zamuraYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'zamura' ),
	  'description' => __( 'Enter your facebook url.', 'zamura' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'zamura' ),
	  'description' => __( 'Enter your flickr url.', 'zamura' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'zamura' ),
	  'description' => __( 'Enter your gplus url.', 'zamura' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'zamura' ),
	  'description' => __( 'Enter your linkedin url.', 'zamura' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'zamura' ),
	  'description' => __( 'Enter your reddit url.', 'zamura' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'zamura' ),
	  'description' => __( 'Enter your stumble url.', 'zamura' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'zamura_business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'zamura' ),
	  'description' => __( 'Enter your twitter url.', 'zamura' ),
	) );	
	
}
add_action( 'customize_register', 'zamura_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zamura_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zamura_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zamura_customize_preview_js() {
	wp_enqueue_script( 'zamura-customizer', esc_url( get_template_directory_uri() ) . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'zamura_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function zamura_sanitize_yes_no_setting( $value ){
	global $zamuraYesNo;
    if ( ! array_key_exists( $value, $zamuraYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function zamura_sanitize_post_selection( $value ){
	global $zamuraPostsPagesArray;
    if ( ! array_key_exists( $value, $zamuraPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function zamura_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function zamura_show_wp_header_control(){
	
	$value = false;
	
	if( 'header' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function zamura_show_header_one_control(){
	
	$value = false;
	
	if( 'header-one' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function zamura_sanitize_slider_type_setting( $value ){

	global $zamuraSliderType;
    if ( ! array_key_exists( $value, $zamuraSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function zamura_sanitize_cat_setting( $value ){
	
	global $zamuraAvailableCats;
	
	if( ! array_key_exists( $value, $zamuraAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function zamura_sanitize_layout_type( $value ){
	
	global $zamuraBusinessLayoutType;
	
	if( ! array_key_exists( $value, $zamuraBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'zamura_load_customize_classes', 0 );
function zamura_load_customize_classes( $wp_customize ) {
	
	class zamura_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'zamura-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="zamura-upgrade-container" class="zamura-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .zamura-upgrade-container -->
			
		<?php }	
		
	}
	
	class zamura_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'zamura-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="zamura-upgrade-container" class="zamura-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .zamura-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'zamura_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'zamura_Customize_Control_Guide' );
	
	
}