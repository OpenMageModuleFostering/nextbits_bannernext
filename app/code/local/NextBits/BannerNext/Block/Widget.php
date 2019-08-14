<?php
class NextBits_BannerNext_Block_Widget extends Mage_Core_Block_Template implements Mage_Widget_Block_Interface
{
	protected $_collection;
	protected $_isActive = 1;
	
	protected function _construct() {
		parent::_construct();
	}
	
	protected function _getCollection() {
		
		if(!Mage::helper('bannernext')->isBannerNextModuleEnabled()){
			return new Varien_Data_Collection();
		}
		if ($this->_collection) {
			return $this->_collection;
		}
		$storeId = Mage::app()->getStore()->getId();
		$bannerId = $this->getData('banner_id');
		$this->_collection = Mage::getModel('bannernext/bannernext')->getCollection();
		$this->_collection->addEnableFilter($this->_isActive);
		$this->_collection->addStoreFilter($storeId);
		$this->_collection->addFieldToFilter('bannernext_id',$bannerId);
		return $this->_collection;		
    }
	
	public function _getBannerImageCollection($bannerCollection){
		return $bannerCollection->getData();	
	}
}