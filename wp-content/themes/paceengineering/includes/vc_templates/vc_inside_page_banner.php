<?php
vc_map( array(
    "name"                    => __( "Inside Page Banner" ),
    "base"                    => "p_inside_banner",
    "category"                => __( 'Content' ),
    'icon' => 'icon-wpb-single-image',
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => __("Banner Image"),
            "param_name" => "banner",
        ),
    )
) );

add_shortcode( 'p_inside_banner', 'insideBanner' );

function insideBanner($atts) {
    $args = shortcode_atts( array(
        'banner' => ''
    ), $atts);
    $imageid= intval($args['banner']);
    $img = wp_get_attachment_image_src($imageid, 'inside-banner');
    $html = '
    <div class="inside-banner-wrapper">
        <img src="' . $img[0] . '" alt="" />
    </div>
    <div class="spacer-50"></div>';

    return $html;
}