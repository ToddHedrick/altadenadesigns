<?php

/**
 * Altadena functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Altadena
 * @since Altadena 1.0
 */
//  ============================================================================
//   CUSTOM FUNCTIONS
//  ============================================================================

function menu_items() {
    $pages = get_pages('sort_column=menu_order');
    $Output = "";
    foreach ($pages as $page) {
        if ($page->post_title !== ''):
            $Output .= '<p><a href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a></p>';
        endif;
    }
    echo $Output;
}

function header_text_display() {
// Has the text been hidden?
    if (display_header_text() == 1):
        return "inline-block";
    else:
        return "none";
    endif;
}

function header_textshadow_settings(){
    if (get_theme_mod('display_header_textshadow') == '')://if the box is not checked, do not display text shadow
        return "";
    else:
        return "0 0 4px";
    endif;
}

function header_bg_image_settings() {
    $header_settings_array = array();
    if (get_theme_mod('display_header_img_as_header_bg') == '')://if the box is not checked, display image to the left
        $header_settings_array["header_img_display"] = "block";
        $header_settings_array["header_img"] = esc_url(get_header_image());
        $header_settings_array["header_bg_img"] = "";
        $header_settings_array["text_align"] = "left";
        $header_settings_array["header_bg_size"] = "";
        $header_settings_array["header_bg_repeat"] = "";
        $header_settings_array["header_bg_position"] = "";
        return $header_settings_array;
    else:
        $header_settings_array["header_img_display"] = "none";
        $header_settings_array["header_img"] = "";
        $header_settings_array["header_bg_img"] = esc_url(get_header_image());
        $header_settings_array["text_align"] = "center";
        $header_settings_array["header_bg_position"] = "center";
        switch (get_theme_mod('header_bg_img_style')):
            case "repeat":
                $header_settings_array["header_bg_size"] = "contain";
                $header_settings_array["header_bg_repeat"] = "repeat";
                break;
            case "stretch":
                $header_settings_array["header_bg_size"] = "100%, 100%";
                $header_settings_array["header_bg_repeat"] = "no-repeat";
                break;
            default:
                $header_settings_array["header_bg_size"] = "auto, 100%";
                $header_settings_array["header_bg_repeat"] = "no-repeat";

        endswitch;


        return $header_settings_array;
    endif;
}

//  ============================================================================
//   THEME SUPPORT
//  ============================================================================

add_theme_support('custom-header', array(
    'width' => 190,
    'height' => 100,
    'default-image' => get_template_directory_uri() . '/images/header.jpg',
    'random-default' => false,
    'uploads' => true,
    'flex-height' => true,
    'flex-width' => true,
    'default-text-color' => '#333333',
    'header-text' => true,
    'wp-head-callback' => '',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
));

//add_theme_support('title-tag');

add_theme_support('custom-background', array(
    'default-color' => '#006666',
    'default-image' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
));

//  ============================================================================
//   THEME CUSTOMIZE REGISTER
//  ============================================================================

function altadena_customize_register($wp_customize) {

    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('altadena_header_textshadow_color', array(
        'default' => '#B2C3D3'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_textshadow_color', array(
        'label' => __('Header Text Shadow Color', 'altadena'),
        'section' => 'colors',
        'settings' => 'altadena_header_textshadow_color',
    )));
    $wp_customize->add_setting('display_header_textshadow');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'display_header_textshadow', array(
        'type' => 'checkbox',
        'label' => 'Display Header Text Shadow',
        'section' => 'colors',
    )));
    //--------------------------------------------------------------------------
    $wp_customize->add_setting('altadena_header_bg_color', array(
        'default' => '#B2C3D3'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label' => __('Header Background Color', 'altadena'),
        'section' => 'colors',
        'settings' => 'altadena_header_bg_color',
    )));
    //--------------------------------------------------------------------------
    $wp_customize->add_setting('altadena_content_bg_color', array(
        'default' => '#FFFFFF'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'content_bg_color', array(
        'label' => __('Content Background Color', 'altadena'),
        'section' => 'colors',
        'settings' => 'altadena_content_bg_color',
    )));
    //--------------------------------------------------------------------------
    $wp_customize->add_setting('altadena_text_color', array(
        'default' => '#000000'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label' => __('Text Color', 'altadena'),
        'section' => 'colors',
        'settings' => 'altadena_text_color',
    )));
    //--------------------------------------------------------------------------
    $wp_customize->add_setting('altadena_nav_color', array(
        'default' => '#006666'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'nav_color', array(
        'label' => __('Navigation Color', 'altadena'),
        'section' => 'colors',
        'settings' => 'altadena_nav_color',
    )));
    //--------------------------------------------------------------------------
    $wp_customize->add_setting('altadena_link_color', array(
        'default' => '#0000EE'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
        'label' => __('Hyperlink Color', 'altadena'),
        'section' => 'colors',
        'settings' => 'altadena_link_color',
    )));
    //--------------------------------------------------------------------------
    //
    //  =============================
    //  = Check Box                 =
    //  =============================

    $wp_customize->add_setting('display_header_img_as_header_bg');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'display_header_img_as_header_bg', array(
        'type' => 'checkbox',
        'label' => 'Display Header Image as header background',
        'section' => 'header_image',
    )));
    //--------------------------------------------------------------------------
    //  =============================
    //  = Radio Button              =
    //  =============================

    $wp_customize->add_setting('header_bg_img_style', array('default' => 'no-repeat'));
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_bg_img_style', array(
        'type' => 'radio',
        'label' => 'Header background Image style',
        'section' => 'header_image',
        'choices' => array(
            'no-repeat' => 'No Repeat (default)',
            'repeat' => 'Repeat',
            'stretch' => 'Stretch',
        )
    )));
}

add_action('customize_register', 'altadena_customize_register');

//  ============================================================================
//   LIVE CSS SUPPORT
//  ============================================================================


function altadena_customizer_css() {
    $header_settings = header_bg_image_settings();
    ?><style type="text/css">
        a { color: <?php echo get_theme_mod('altadena_link_color'); ?>; }
        body { color: <?php echo get_theme_mod('altadena_text_color'); ?>; }
        #header { background-color: <?php echo get_theme_mod('altadena_header_bg_color'); ?>;
                  text-align: <?php echo $header_settings["text_align"]; ?>;
                  background-image: url("<?php echo $header_settings["header_bg_img"]; ?>");
                  background-size: <?php echo $header_settings["header_bg_size"]; ?>;
                  background-repeat: <?php echo $header_settings["header_bg_repeat"]; ?>;
                  background-position: <?php echo $header_settings["header_bg_position"]; ?>;
		  text-shadow: <?php echo header_textshadow_settings(); ?><?php echo get_theme_mod('altadena_header_textshadow_color'); ?>;
        }
        #header img { display: <?php echo $header_settings["header_img_display"]; ?>; }
        #container { background-color: <?php echo get_theme_mod('altadena_content_bg_color'); ?>; }
        #nav a { color: <?php echo get_theme_mod('altadena_nav_color'); ?>; }
        #nav a:visited { color: <?php echo get_theme_mod('altadena_nav_color'); ?>; }
        .site-title, .site-description, .page-title { display: <?php echo header_text_display(); ?>; }
    </style>
<?php
}
add_action('wp_head', 'altadena_customizer_css');