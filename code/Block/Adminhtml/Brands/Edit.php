<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

  public function __construct() {

    $this->_objectId = 'brand_id';
    $this->_controller = 'adminhtml_brands';
    $this->_blockGroup = 'bendechrai_brandmanager';

    parent::__construct();

    $this->_updateButton('save', 'label', Mage::helper('bendechrai_brandmanager')->__('Save Brand'));
    $this->_removeButton('delete');

  }

  public function getHeaderText() {
    if (Mage::registry('brand') && Mage::registry('brand')->getId()) {
      return Mage::helper('bendechrai_brandmanager')->__("Edit Brand '%s'", $this->htmlEscape(Mage::registry('brand')->getName()));
    } else {
      return Mage::helper('bendechrai_brandmanager')->__('New Brand');
    }
  }

}
