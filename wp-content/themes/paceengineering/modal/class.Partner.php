<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/15/2017
 * Time: 2:09 PM
 */
class Partner extends PaceBase
{
    public function getLogo()
    {
        return $this->getPostMeta('partner-logo');
    }

    public function output() {
        $html = '<img src="' . $this->getLogo() . '" alt="' . $this->getTitle() . '" />';

        return $html;
    }
}