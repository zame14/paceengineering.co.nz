<?php
vc_map( array(
    "name"                    => __( "Services Panel" ),
    "base"                    => "p_services_panel",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'p_services_panel', 'servicePanel' );

function servicePanel() {
    $html = '
    <div class="row">';
    foreach(getServices('ASC') as $service) {
        $imageid = getImageID($service->getFeatureImage());
        $img = wp_get_attachment_image_src($imageid, 'feature');
        $html .= '
        <div class="col-xs-12 col-sm-6 col-lg-4 services-panel-wrapper">
            <div class="service-panel">
                <a href="' . $service->link() . '">
                    <img src="' . $img[0] . '" alt="' . $service->getTitle() . '" />
                    <div class="title">' . $service->getTitle() . '</div>
                </a>
            </div>
        </div>';
    }
    $html .= '
    </div>';

    return $html;
}