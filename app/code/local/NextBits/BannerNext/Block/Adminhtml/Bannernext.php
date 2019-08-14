<?php
class NextBits_BannerNext_Block_Adminhtml_Bannernext extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_bannernext';
    $this->_blockGroup = 'bannernext';
    $this->_headerText = Mage::helper('bannernext')->__('Banner Manager');
    $this->_addButtonLabel = Mage::helper('bannernext')->__('Add Banner');
    parent::__construct();
  }
}