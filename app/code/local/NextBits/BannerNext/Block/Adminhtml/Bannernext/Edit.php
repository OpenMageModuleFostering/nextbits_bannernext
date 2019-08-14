<?php

class NextBits_BannerNext_Block_Adminhtml_Bannernext_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'bannernext';
        $this->_controller = 'adminhtml_bannernext';
        
        $this->_updateButton('save', 'label', Mage::helper('bannernext')->__('Save Banner'));
        $this->_updateButton('delete', 'label', Mage::helper('bannernext')->__('Delete Banner'));
		
        $this->_addButton('saveandcontinue', array(
            'label'     => Mage::helper('adminhtml')->__('Save And Continue Edit'),
            'onclick'   => 'saveAndContinueEdit()',
            'class'     => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('bannernext_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'bannernext_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'bannernext_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if( Mage::registry('bannernext_data') && Mage::registry('bannernext_data')->getId() ) {
            return Mage::helper('bannernext')->__("Edit Banner '%s'", $this->htmlEscape(Mage::registry('bannernext_data')->getTitle()));
        } else {
            return Mage::helper('bannernext')->__('Add Banner');
        }
    }
}