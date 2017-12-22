<?php

class Setting extends PaceBase
{
    public function getEmail()
    {
        return $this->getPostMeta('contact-email');
    }
    public function getPhoneNumber()
    {
        return $this->getPostMeta('phone-number');
    }
    public function getFaxNumber()
    {
        return $this->getPostMeta('fax-number');
    }
    public function getFacebookLink()
    {
        return $this->getPostMeta('facebook-link');
    }
    public function getAddress()
    {
        return $this->getPostMeta('address');
    }
    public function letsTalkFooter()
    {
        return wpautop($this->getPostMeta('lets-talk-content-footer'));
    }
    public function letsTalkServices()
    {
        return wpautop($this->getPostMeta('lets-talk-content-services'));
    }
}