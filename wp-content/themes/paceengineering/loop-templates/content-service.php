<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package understrap
 */
$service = new Service($post);
$imageid = getImageID($service->getBannerImage());
$img = wp_get_attachment_image_src($imageid, 'inside-banner');
($service->getFullName() == "") ? $title = $service->getTitle() : $title = $service->getFullName();
$setting = new Setting(28);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inside-banner-wrapper">
        <img src="<?=$img[0]?>" alt="<?=$service->getTitle()?>" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="spacer-50"></div>
                <h1><?=$title?></h1>
                <div class="spacer-15"></div>
                <div class="page-content">
                    <?=$service->getContent()?>
                </div>
                <div class="gallery-wrapper">
                    <?=getServiceGallery()?>
                </div>
                <div class="lets-talk-wrapper">
                    <h2>Lets Talk!</h2>
                    <?=$setting->letsTalkServices()?>
                    <a href="<?=get_page_link(17)?>" class="btn btn-primary">Get in Touch</a>
                </div>
                <div class="spacer-100"></div>
            </div>
        </div>
    </div>

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->