<?php

class NextBits_BannerNext_Model_Availablebanners extends Varien_Object
{
	const STATUS_ENABLED = 1;
    public function toOptionArray()
	{
		$collection = Mage::getModel('bannernext/bannernext')->getCollection()->addFilter('status', self::STATUS_ENABLED);		
		$option_array = array ();
		foreach ($collection as $banner)
			$option_array[] = array(
				'value' => $banner->getBannernextId(),
				'label' => $banner->getTitle()
			);
		return $option_array;
	}
}