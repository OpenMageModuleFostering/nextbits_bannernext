<?php
class NextBits_BannerNext_Block_Adminhtml_Bannernext_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('bannernext_tabs');
	  $this->setName('bannernext_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('bannernext')->__('Banner Information'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('general_section', array(
          'label'     => Mage::helper('bannernext')->__('General Information'),
          'title'     => Mage::helper('bannernext')->__('General Information'),
          'content'   => $this->getLayout()->createBlock('bannernext/adminhtml_bannernext_edit_tab_form')->toHtml(),
      ));	  
	  
	  
		$content = Mage::getSingleton('core/layout')->createBlock('bannernext/adminhtml_bannernext_edit_tab_gallery');
        $content->setId($this->getHtmlId() . '_content')->setElement($this);       
	   
		$this->addTab('gallery_section', array(
            'label'     => Mage::helper('bannernext')->__('Banner Images'),
            'title'     => Mage::helper('bannernext')->__('Banner Images'),
            'content'   => $content->toHtml(),
        ));
	   
	   
		 $this->addTab('page_section', array(
            'label'     => Mage::helper('bannernext')->__('Display on Pages'),
            'title'     => Mage::helper('bannernext')->__('Display on Pages'),
            'content'   => $this->getLayout()->createBlock('bannernext/adminhtml_bannernext_edit_tab_page')->toHtml(),
        ));
		 $this->addTab('category_section', array(
            'label'     => Mage::helper('bannernext')->__('Display on Categories'),
            'title'     => Mage::helper('bannernext')->__('Display on Categories'),
            'content'   => $this->getLayout()->createBlock('bannernext/adminhtml_bannernext_edit_tab_category')->toHtml(),
        ));  
     
      return parent::_beforeToHtml();
  }
}