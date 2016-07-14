<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands extends Mage_Adminhtml_Block_Widget_Grid_Container {

  public function __construct() {
    $this->_controller = 'adminhtml_brands';
    $this->_blockGroup = 'bendechrai_brandmanager';
    $this->_headerText = Mage::helper('bendechrai_brandmanager')->__('Brands Manager');
    parent::__construct();

    $this->_removeButton('add');
    $this->addButton('bendechrai_brand_sync', array(
      'label'     => 'Syncronize Brands',
      'onclick'   => 'setLocation(\' '  . Mage::helper("adminhtml")->getUrl('*/*/sync') . '\')',
    ));
  }

}
