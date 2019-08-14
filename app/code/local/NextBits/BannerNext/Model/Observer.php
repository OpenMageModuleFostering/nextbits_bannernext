<?php
class NextBits_BannerNext_Model_Observer extends Varien_Object
{

   public function prepareLayoutBefore(Varien_Event_Observer $observer)
   {
	
       /* @var $block Mage_Page_Block_Html_Head */
	   if (!Mage::helper('bannernext')->isJqueryEnabled()) {
            return $this;
        }
       $block = $observer->getEvent()->getBlock();

       if ("head" == $block->getNameInLayout()) {
           foreach (Mage::helper('bannernext')->getFiles() as $file) {
               $block->addJs(Mage::helper('bannernext')->getJQueryPath($file));
           }
       }
       return $this;
   }
}