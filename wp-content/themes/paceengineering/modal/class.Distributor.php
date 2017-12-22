<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/17/2017
 * Time: 10:11 PM
 */
class Distributor extends PaceBase
{
    public function getLogo()
    {
        return $this->getPostMeta('distributor-logo');
    }

    public function output() {
        $html = '<img src="' . $this->getLogo() . '" alt="' . $this->getTitle() . '" />';

        return $html;
    }
}