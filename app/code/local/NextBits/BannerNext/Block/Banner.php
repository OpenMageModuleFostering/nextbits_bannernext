<?php
class NextBits_BannerNext_Block_Banner extends Mage_Core_Block_Template
{
	protected $_position = null;
    protected $_isActive = 1;
    protected $_collection;

    protected function _getCollection($position = null) {
		$enabled = Mage::getStoreConfig('bannernext/general/active');
		if($enabled){
        if ($this->_collection ){		
            return $this->_collection;
        }
        $storeId = Mage::app()->getStore()->getId();
        $this->_collection = Mage::getModel('bannernext/bannernext')->getCollection()
                ->addEnableFilter($this->_isActive);
        if (!Mage::app()->isSingleStoreMode()) {
            $this->_collection->addStoreFilter($storeId);
        }

        if (Mage::registry('current_category')) {
            $_categoryId = Mage::registry('current_category')->getId();
            $this->_collection->addCategoryFilter($_categoryId);
        } elseif (Mage::app()->getFrontController()->getRequest()->getRouteName() == 'cms') {
            $_pageId = Mage::getBlockSingleton('cms/page')->getPage()->getPageId();
            $this->_collection->addPageFilter($_pageId);
        }

       /*  if ($position) {
            $this->_collection->addPositionFilter($position);
        } elseif ($this->_position) {
            $this->_collection->addPositionFilter($this->_position);
        } */

		/* $this->_collection->getSelect()->group(array('main_table.bannernext_id')) */
		/* echo $this->_collection->getSelect(); */
		/* echo "<pre>";
		print_R($this->_collection->getData());
		echo "</pre>"; */
		//Mage::registry('banner_collection',$this->_collection);
        return $this->_collection;
		}else
		{
			return '';
		}
    }
	
	public function _getBannerImageCollection($bannerCollection){
		return $bannerCollection->addPositionFilter($this->getData('position'))->getData();	
	}
	
	public function getSortedImages($content){
		$imagesArray = json_decode($content,true);
		if(isset($imagesArray) && !empty($imagesArray) && count($imagesArray)>0){
			$temp = array();
			foreach($imagesArray as $key=>$image){
				if($image['disabled']){
					unset($imagesArray[$key]);
					continue;
				}
				$temp[$key] = $image['position'];
			}				
			array_multisort($temp, SORT_ASC, $imagesArray);
		}
		return $imagesArray;
	}
}