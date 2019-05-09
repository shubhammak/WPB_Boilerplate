<?php

/*
Element Description: Directory
*/

// Element Class
class vcInfoBox extends WPBakeryShortCode
{

    // Element Init
    public function __construct()
    {
        add_action('init', array( $this, 'vc_infobox_mapping' ));
        add_shortcode('vc_infobox', array( $this, 'vc_infobox_html' ));
    }

    // Element Mapping
    public function vc_infobox_mapping()
    {

        // Stop all if VC is not enabled
        if (!defined('WPB_VC_VERSION')) {
            return;
        }

        // Map the block with vc_map()
        vc_map(
            array(
                'name' => __('Listing', 'text-domain'),
                'base' => 'vc_infobox',
                'class' => 'wpc-text-class',
                'description' => __('Add new listing', 'text-domain'),
                'category' => __('WPC Directory', 'text-domain'),
                'icon' => plugin_dir_path(__FILE__) . 'assets/img/note.png',
                'params' => array(

                    array(
                        'type' => 'attach_image',
                        'holder' => 'img',
                        //'class' => 'text-class',
                        'heading' => __('Image', 'text-domain'),
                        'param_name' => 'bgimg',
                        // 'value' => __( 'Default value', 'text-domain' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Listing',
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __('Business Name', 'text-domain'),
                        'param_name' => 'title',
                        'value' => __('', 'text-domain'),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Listing',
                    ),

                    array(
                        'type' => 'textarea_html',
                        'holder' => 'div',
                        'class' => 'wpc-text-class',
                        'heading' => __('Description', 'text-domain'),
                        'param_name' => 'content',
                        'value' => __('', 'text-domain'),
                        'description' => __('To add link highlight text or url and click the chain to apply hyperlink', 'text-domain'),
                        // 'admin_label' => false,
                        // 'weight' => 0,
                        'group' => 'Listing',
                    ),

                ),
            )
        );
    }

    // Element HTML
    public function vc_infobox_html($atts, $content)
    {

        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'bgimg' => 'bgimg',
                    'title'   => '',
                ),
                $atts
            )
        );

        $img_url = wp_get_attachment_image_src($bgimg, "large");

        // Fill $html var with data
        $html = '
        <div class="wpc-directory-wrap">

            <img class="wpc-directory-image" src="'. $img_url[0] .'">

            <h2 class="wpc-directory-title">' . $title . '</h2>

            <div class="wpc-directory-text">'. $content .'</div>

        </div>';

        return $html;
    }
}


new vcInfoBox();
