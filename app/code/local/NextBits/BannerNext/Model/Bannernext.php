<?php

class NextBits_BannerNext_Model_Bannernext extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bannernext/bannernext');
    }
}