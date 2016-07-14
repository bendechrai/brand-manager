<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

  public function __construct() {
    parent::__construct();
    $this->setId('brands_tabs');
    $this->setDestElementId('edit_form');
    $this->setTitle(Mage::helper('bendechrai_brandmanager')->__('Sections'));
  }

  protected function _beforeToHtml() {
    $this->addTab('info', array(
      'label'     => Mage::helper('bendechrai_brandmanager')->__('General'),
      'content'   => $this->getLayout()->createBlock('bendechrai_brandmanager/adminhtml_brands_edit_tab_info')->initForm()->toHtml(),
    ));
    return parent::_beforeToHtml();
  }

}
