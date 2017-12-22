<?php
vc_map( array(
    "name"                    => __( "Team Members" ),
    "base"                    => "p_team_members",
    "category"                => __( 'Content' ),
    'show_settings_on_create' => false
) );

add_shortcode( 'p_team_members', 'teamMembers' );

function teamMembers() {
    $html = '
    <div class="row">';
        foreach(getTeamMembers() as $team) {
            $imageid = getImageID($team->getProfilePicture());
            $img = wp_get_attachment_image_src($imageid, 'team');
            $html .= '
            <div class="col-xs-12 col-md-6 col-lg-3 member">
                <div class="image-wrapper">
                    <img src="' . $img[0] . '" alt="' . $team->getTitle() . '" />
                </div>
                <p class="name">' . $team->getTitle() . '</p>
                <p class="position">' . $team->getPosition() . '</p>
                <div class="member-contact-details-wrapper">
                    <div><span>T:</span><a href="tel:' . formatPhoneNumber($team->getPhone()) . '">' . $team->getPhone() . '</a></div>
                    <div><span>F:</span><a href="javascript:;">' . $team->getFax() . '</a></div>
                    <div><span>M:</span><a href="tel:' . formatPhoneNumber($team->getMobile()) . '">' . $team->getMobile() . '</a></div>
                    <div><span>E:</span><a href="mailto:' . $team->getEmail() . '">' . $team->getEmail() . '</a></div>
                </div>
            </div>';
        }
    $html .= '
    </div>';

    return $html;
}