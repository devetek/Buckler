<?php //Pro Details
function rambo_pro_feature_customizer( $wp_customize ) {
class WP_Pro__Feature_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <div class="rambo-pro-features-customizer">
    <ul class="rambo-pro-features">
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Advance Theme Style Settings','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Slider Settings','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Portfolio Management','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Team Section','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Shop Section','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Client Section','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Call To Action Section','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Latest News Settings','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Multiple Page Templates','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Typography Settings','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Section Reordering','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Support for WPML / Polylang','rambo' ); ?>
        </li>
        <li>
            <span class="rambo-pro-label"><?php _e( 'PRO','rambo' ); ?></span>
            <?php _e( 'Quality Support','rambo' ); ?>
        </li>
    </ul>
    <a target="_blank" href="<?php echo 'https://webriti.com/rambo/';?>" class="rambo-pro-button button-primary"><?php _e( 'UPGRADE TO PRO','rambo' ); ?></a>
    <hr>
</div>
    <?php
    }
}
$wp_customize->add_section( 'rambo_pro_feature_section' , array(
		'title'      => __('View PRO Details', 'rambo'),
		'priority'   => 1,
   	) );

$wp_customize->add_setting(
    'upgrade_pro_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Pro__Feature_Customize_Control( $wp_customize, 'upgrade_pro_feature', array(
		'section' => 'rambo_pro_feature_section',
		'setting' => 'upgrade_pro_feature',
    ))
);
class WP_Feature_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
   
     <div class="rambo-pro-content">
        <ul class="rambo-pro-des">
            <li> 
                <?php _e('Select among predefined color skins, you can even create yours without writing any CSS code.','rambo');?>
            </li>
            <li> 
                <?php _e('Pro version theme comes with add multiple slides in slider and you can select the slider enable / disable option, slider animation etc.','rambo');?>
            </li>
            <li> 
                <?php _e('Portfolio section, select column layout, templates , archives with 3 possible layouts.','rambo');?>
            </li>
            <li> 
                <?php _e('Show all your team members, clients, Shop products and call to action on the frontpage.','rambo');?>
            </li>
            <li> 
                <?php _e('Theme comes with hide/show post meta from latest news section.','rambo');?>
            </li>
            <li> 
                <?php _e('Theme comes with multiple page settings like about us, service etc.','rambo');?>
            </li>
            <li> 
                <?php _e('Typography will helps you to manage custom fonts like paragraph font, menu font etc.','rambo');?>
            </li>
            <li> 
                <?php _e('Theme Layout manager will helps you to rearrange the sections.','rambo');?>
            </li>
            <li> 
                <?php _e('Translation ready supporting popular plugins WPML / Polylang.','rambo');?>
            </li>
            <li> 
                <?php _e('Dedicated support, various widget and sidebar management.','rambo');?>
            </li>
        </ul>
     </div>
    <?php
    }
}

$wp_customize->add_setting(
    'doc_Review_feature',
    array(
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Feature_document_Customize_Control( $wp_customize, 'doc_Review_feature', array(	
		'section' => 'rambo_pro_feature_section',
		'setting' => 'doc_Review_feature',
    ))
);

}
add_action( 'customize_register', 'rambo_pro_feature_customizer' );
?>