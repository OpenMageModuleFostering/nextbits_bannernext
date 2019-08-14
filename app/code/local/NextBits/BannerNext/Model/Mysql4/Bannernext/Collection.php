<?php
class NextBits_BannerNext_Model_Mysql4_Bannernext_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('bannernext/bannernext');
    }
	
	 public function addEnableFilter($status = 1) {
        $this->getSelect()->where('main_table.status = ?', $status);
        return $this;
    }
	
	public function addStoreFilter($store) {
        if (!Mage::app()->isSingleStoreMode()) {
			
			$this->getSelect()->where('(FIND_IN_SET('.$store.',main_table.stores) or main_table.stores in (0))');
			// $this->getSelect()->where('main_table.stores in (?)', array(0, $store));			
            return $this;
        }
        return $this;
    }
	
	 public function addPageFilter($page) {
        //$this->getSelect()->where('main_table.page_id in (?)', $page);
		 $this->getSelect()->where('FIND_IN_SET('.$page.',main_table.page_id)');
        return $this;
    }
	
	public function addPositionFilter($position) {
        $this->getSelect()->where('main_table.position = ?', $position);
        return $this;
    }
	
	 public function addCategoryFilter($category) {
        $this->getSelect()->where('FIND_IN_SET('.$category.',main_table.category_id)');
        return $this;
    }
}