<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/21/2017
 * Time: 9:30 AM
 */
class Team extends PaceBase
{
    public function getPosition()
    {
        return $this->getPostMeta('position');
    }
    public function getPhone()
    {
        return $this->getPostMeta('team-phone');
    }
    public function getFax()
    {
        return $this->getPostMeta('team-fax');
    }
    public function getMobile()
    {
        return $this->getPostMeta('team-mobile');
    }
    public function getEmail()
    {
        return $this->getPostMeta('team-email');
    }
    public function getProfilePicture()
    {
        return $this->getPostMeta('profile-picture');
    }
}