<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/18/2017
 * Time: 9:39 AM
 */
class Service extends PaceBase
{
    public function getFullName()
    {
        return $this->getPostMeta('full-name');
    }
    public function getFeatureImage()
    {
        return $this->getPostMeta('service-feature-image');
    }
    public function getBannerImage()
    {
        return $this->getPostMeta('service-banner-image');
    }
    public function getGalleryImages()
    {
        $gallery = Array();
        $field = get_post_meta($this->id());
        foreach($field['wpcf-service-gallery-images'] as $image) {
            $gallery[] = $image;
        }
        return $gallery;
    }

}