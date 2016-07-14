<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

  protected function _prepareForm() {

    $form = new Varien_Data_Form(array(
      'id' => 'edit_form',
      'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'),
        'store' => $this->getRequest()->getParam('store', 0),
      )),
      'method' => 'post',
      'enctype' => 'multipart/form-data'
    ));

    $form->setUseContainer(true);
    $this->setForm($form);
    return parent::_prepareForm();
  }

}
