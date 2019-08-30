<?php
function rambo_project_customizer( $wp_customize ) {

$selective_refresh = isset( $wp_customize->selective_refresh ) ? true : false;

//Project panel
	$wp_customize->add_section( 'project_settings' , array(
	'title'      => __('Project settings', 'rambo'),
	'capability'     => 'edit_theme_options',
	'panel'  => 'section_settings',
	'priority'   => 517,
   	) );

		// enable project section
			$wp_customize->add_setting('rambo_pro_theme_options[project_protfolio_enabled]',array(
			'default' => false,
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option'
			) );
			
			$wp_customize->add_control('rambo_pro_theme_options[project_protfolio_enabled]',array(
			'label' => __('Hide project section','rambo'),
			'section' => 'project_settings',
			'type' => 'checkbox',
			) );
			
			
	
			//Project Title
			$wp_customize->add_setting(
			'rambo_pro_theme_options[project_heading_one]',
			array(
				'default' => __('Featured Portfolio Projects','rambo'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'rambo_project_sanitize_html',
				'type' => 'option',
				'transport' => $selective_refresh ? 'postMessage' : 'refresh',
				)
			);	
			$wp_customize->add_control('rambo_pro_theme_options[project_heading_one]',array(
			'label'   => __('Title','rambo'),
			'section' => 'project_settings',
			 'type' => 'text',)  );	
			 
			//Project Description 
			 $wp_customize->add_setting(
			'rambo_pro_theme_options[project_tagline]',
			array(
				'default' => 'Maecenas sit amet tincidunt elit. Pellentesque habitant morbi tristique senectus et netus et Nulla facilisi.',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'rambo_project_sanitize_html',
				'type' => 'option',
				'transport' => $selective_refresh ? 'postMessage' : 'refresh',
				)
			);	
			$wp_customize->add_control( 'rambo_pro_theme_options[project_tagline]',array(
			'label'   => __('Description','rambo'),
			'section' => 'project_settings',
			 'type' => 'textarea',)  );
			 
			 
		//Projects one image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_one_thumb]',array('default' => get_template_directory_uri().'/images/project/port1.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_one_thumb]',
				array(
					'label' => __('Image','rambo'),
					'settings' =>'rambo_pro_theme_options[project_one_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project One Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_one_title]', array(
			'default'        => __('Mobile Apps','rambo'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_one_title]', array(
			'label'   => __('Title', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project One Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_one_text]', array(
			'default'        => "A set of pieces of creative work collected to be shown to potential customers or employers the artist had put together a portfolio of his work",
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_one_text]', array(
			'label'   => __('Description', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		//Projects two image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_two_thumb]',array('default' => get_template_directory_uri().'/images/project/port2.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_two_thumb]',
				array(
					'label' => __('Image','rambo'),
					'settings' =>'rambo_pro_theme_options[project_two_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project two Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_two_title]', array(
			'default'        => __('Super Baby','rambo'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_two_title]', array(
			'label'   => __('Title', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project two Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_two_text]', array(
			'default'        => "A set of pieces of creative work collected to be shown to potential customers or employers the artist had put together a portfolio of his work",
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_two_text]', array(
			'label'   => __('Description', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		//Projects two image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_three_thumb]',array('default' => get_template_directory_uri().'/images/project/port3.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_three_thumb]',
				array(
					'label' => __('Image','rambo'),
					'settings' =>'rambo_pro_theme_options[project_three_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project three Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_three_title]', array(
			'default'        => __('Coffee Break','rambo'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_three_title]', array(
			'label'   => __('Title', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project Three Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_three_text]', array(
			'default'        => "A set of pieces of creative work collected to be shown to potential customers or employers the artist had put together a portfolio of his work",
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_three_text]', array(
			'label'   => __('Description', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		//Projects Four image
		$wp_customize->add_setting( 'rambo_pro_theme_options[project_four_thumb]',array('default' => get_template_directory_uri().'/images/project/port4.jpg',
		'type' => 'option','sanitize_callback' => 'esc_url_raw',));
	 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'rambo_pro_theme_options[project_four_thumb]',
				array(
					'label' => __('Image','rambo'),
					'settings' =>'rambo_pro_theme_options[project_four_thumb]',
					'section' => 'project_settings',
					'type' => 'upload',
				)
			)
		);
		
		//Project Four Title
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_four_title]', array(
			'default'        => __('Mobile Apps','rambo'),
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_project_sanitize_html',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_four_title]', array(
			'label'   => __('Title', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		
		
		//Project One Description
		$wp_customize->add_setting(
		'rambo_pro_theme_options[project_four_text]', array(
			'default'        => "A set of pieces of creative work collected to be shown to potential customers or employers the artist had put together a portfolio of his work",
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'rambo_input_field_sanitize_text',
			'type' => 'option',
		));
		$wp_customize->add_control('rambo_pro_theme_options[project_four_text]', array(
			'label'   => __('Description', 'rambo'),
			'section' => 'project_settings',
			'type' => 'text',
		));
		 function rambo_project_sanitize_html( $input ) {
			return force_balance_tags( $input );
		}

}
add_action( 'customize_register', 'rambo_project_customizer' );



 /**
 * Add selective refresh for project title section controls.
 */
function rambo_register_project_title_section_partials( $wp_customize ) {
				 $wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[project_heading_one]', array(
		'selector'            => '.portfolio_main_content .featured_port_title h1',
		'settings'            => 'rambo_pro_theme_options[project_heading_one]',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'rambo_pro_theme_options[project_tagline]', array(
		'selector'            => '.portfolio_main_content .featured_port_title p',
		'settings'            => 'rambo_pro_theme_options[project_tagline]',
	
	) );
				 
}		 
add_action( 'customize_register', 'rambo_register_project_title_section_partials' );
?>