<?php

class NextBits_BannerNext_Model_Mysql4_Bannernext extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the bannernext_id refers to the key field in your database table.
        $this->_init('bannernext/bannernext', 'bannernext_id');
    }
}