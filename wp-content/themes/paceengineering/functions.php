<?php
require_once('modal/class.Base.php');
require_once('modal/class.Setting.php');
require_once('modal/class.Partner.php');
require_once('modal/class.Distributor.php');
require_once('modal/class.Service.php');
require_once('modal/class.Team.php');
require_once(STYLESHEETPATH . '/includes/wordpress-tweaks.php');
// Load custom visual composer templates
loadVCTemplates();
add_action( 'wp_enqueue_scripts', 'p_enqueue_styles');
function p_enqueue_styles() {
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css?' . filemtime(get_stylesheet_directory() . '/css/bootstrap.min.css'));
    wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css?' . filemtime(get_stylesheet_directory() . '/css/font-awesome.css'));
    wp_enqueue_style( 'understrap-theme', get_stylesheet_directory_uri() . '/style.css?' . filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:400,700');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.css');
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js?' . filemtime(get_stylesheet_directory() . '/js/bootstrap.min.js'), array('jquery'));
    wp_enqueue_script( 'animationframe', get_stylesheet_directory_uri() . '/js/jquery.requestAnimationFrame.js');
    wp_enqueue_script('understap-theme', get_stylesheet_directory_uri() . '/js/theme.js?' . filemtime(get_stylesheet_directory() . '/js/theme.js'), array('jquery'));
    wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/slick-carousel/slick/slick.js');
}
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



add_filter( 'vc_load_default_templates', 'p_vc_load_default_templates' ); // Hook in
function p_vc_load_default_template( $data ) {
    return array();
}

add_image_size( 'inside-banner', 2000, 800, true);
add_image_size( 'gallery', 767, 511, true);
add_image_size( 'feature', 767, 511, true);
add_image_size( 'team', 360, 450, true);



function request($name) {
    $value = '';
    if(isset($_REQUEST[$name])) {
        $value = $_REQUEST[$name];
        if(is_string($value)) $value = trim($value);
    }
    return $value;
}

function formatPhoneNumber($ph) {
    $ph = str_replace('(', '', $ph);
    $ph = str_replace(')', '', $ph);
    $ph = str_replace(' ', '', $ph);
    $ph = str_replace('+64', '0', $ph);

    return $ph;

}

function getPartners() {
    $partners = Array();
    $posts_array = get_posts([
        'post_type' => 'partner',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ]);
    foreach ($posts_array as $post) {
        $partner = new Partner($post);
        $partners[] = $partner;
    }
    return $partners;
}

function getTeamMembers() {
    $members = Array();
    $posts_array = get_posts([
        'post_type' => 'team-member',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ]);
    foreach ($posts_array as $post) {
        $member = new Team($post);
        $members[] = $member;
    }
    return $members;
}

function getDistributors() {
    $distributors = Array();
    $posts_array = get_posts([
        'post_type' => 'distributor',
        'post_status' => 'publish',
        'numberposts' => -1,
        'orderby' => 'ID',
        'order' => 'ASC'
    ]);
    foreach ($posts_array as $post) {
        $distributor = new Distributor($post);
        $distributors[] = $distributor;
    }
    return $distributors;
}

function getServices($order, $limit = -1) {
    $services = Array();
    $posts_array = get_posts([
        'post_type' => 'service',
        'post_status' => 'publish',
        'numberposts' => $limit,
        'orderby' => 'ID',
        'order' => $order,
    ]);
    foreach ($posts_array as $post) {
        $service = new Service($post);
        $services[] = $service;
    }
    return $services;
}

function partnerLogos() {
    $i = 1;
    $html = '
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <ul class="item active">';
            foreach(getPartners() as $partner) {
                if($i == 0) {
                    $html .= '<ul class="item">';
                    $i++;
                }
                $html .= '<li>' . $partner->output() . '</li>';
                if(($i % 5) == 0) {
                    $html .= '</ul>';
                    $i = 0;
                }
                if($i <> 0) {
                    $i++;
                }
            }
        $html .= '    
        </div>
    </div>';

    return $html;
}

function distributorLogos() {
    $i = 1;
    $html = '
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <ul class="item active">';
    foreach(getDistributors() as $distributor) {
        if($i == 0) {
            $html .= '<ul class="item">';
            $i++;
        }
        $html .= '<li>' . $distributor->output() . '</li>';
        if(($i % 5) == 0) {
            $html .= '</ul>';
            $i = 0;
        }
        if($i <> 0) {
            $i++;
        }
    }
    $html .= '    
        </div>
    </div>';

    return $html;
}

function getImageID($image_url)
{
    global $wpdb;
    $sql = 'SELECT post_id FROM wp_toolset_post_guid_id WHERE guid = "' . $image_url . '"';
    $result = $wpdb->get_results($sql);

    return $result[0]->post_id;
}

function getServiceGallery() {
    global $post;
    $n = 1;
    $service = new Service($post->ID);
    $html = '
    <div class="service-thumbnail-wrapper">';
    foreach($service->getGalleryImages() as $image) {
        $imageid = getImageID($image);
        $img = wp_get_attachment_image_src($imageid, 'gallery');
        $html .= '
        <div class="service-thumbnail">
            <img src="' . wp_make_link_relative($img[0]) . '" alt="" onclick="openModal();currentSlide(' . $n . ')" />
        </div>';
        $n++;
    }
    $html .= '
    </div>';

    //Lightbox
    $slides = count($service->getGalleryImages());
    $i = 1;
    $m = 1;
    $html .= '
    <div id="galleryModal" class="modal">
        <span class="fa fa-times" onclick="closeModal()"></span>
        <input type="hidden" name="viewed" class="viewed" value="" />
        <div class="modal-content">';
            foreach($service->getGalleryImages() as $image) {
                $html .= '
                <div class="slides slide' . $m . '">
                    <div class="navtext">' . $service->getTitle() . ' - ' . $m . ' / ' . $slides . '</div>
                    <img src="' . wp_make_link_relative($image) . '" alt="" />
                </div>';
                $m++;
            }
            $html .= '
            <a class="prev fa fa-angle-left" onclick="plusSlides(-1)"></a>
            <a class="next fa fa-angle-right" onclick="plusSlides(1)"></a>
            <div class="modal-thumbnail-wrapper">';
                foreach($service->getGalleryImages() as $image) {
                    $html .= '
                    <div class="modal-thumbnail">
                        <img src="' . wp_make_link_relative($image) . '" alt="" onclick="currentSlide(' . $i . ')" class="preview' . $i . '" />
                    </div>';
                    $i++;
                }
                $html .= '        
            </div>
        </div>
    </div>';

    return $html;
}