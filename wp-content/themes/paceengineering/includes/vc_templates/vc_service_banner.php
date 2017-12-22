<?php
vc_map( array(
    "name"                    => __( "Service Banner" ),
    "base"                    => "p_service_banner",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'p_service_banner', 'serviceBanner' );

function serviceBanner() {
    global $post;
    $service = new Service($post->ID);
    $imageid = getImageID($service->getBannerImage());
    $img = wp_get_attachment_image_src($imageid, 'inside-banner');
    $html = '
    <div class="inside-banner-wrapper">
        <img src="' . $img[0] . '" alt="' . $service->getTitle() . '" />
    </div>';

    return $html;
}