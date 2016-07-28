<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands_Edit_Tab_Info extends Mage_Adminhtml_Block_Widget_Form {

  public function initForm() {

    // Get model from registry
    $brand = Mage::registry('brand');

    // Build form
    $form = new Varien_Data_Form();
    $fieldset = $form->addFieldset('brands_form', array('legend' => Mage::helper('bendechrai_brandmanager')->__('Brand'),));

    $brandAttribute = Mage::helper('bendechrai_brandmanager')->getProductBrand();
    $brandAttributeEditUrl = $this->getUrl('adminhtml/catalog_product_attribute/edit', array('attribute_id'=>$brandAttribute->getAttributeId()));
    $nameField = $fieldset->addField('name', 'text', array(
      'name' => 'name',
      'label' => Mage::helper('bendechrai_brandmanager')->__('Name'),
      'title' => Mage::helper('bendechrai_brandmanager')->__('Name'),
      'required' => true,
      'disabled' => true,
      'after_element_html' =>
        '<span class="note">'
        . 'This is taken from the product brand, and cannot be edited here. '
        . '<a href="'.$brandAttributeEditUrl.'">Edit the Brand attribute here instead.</a>'
      . '</span>',
    ));

    $urlkeyField = $fieldset->addField('urlkey', 'text', array(
      'name' => 'urlkey',
      'label' => Mage::helper('bendechrai_brandmanager')->__('URL Key'),
      'title' => Mage::helper('bendechrai_brandmanager')->__('URL Key'),
      'required' => true,
    ));

    $descriptionField = $fieldset->addField('description', 'textarea', array(
      'name' => 'description',
      'label' => Mage::helper('bendechrai_brandmanager')->__('Description'),
      'title' => Mage::helper('bendechrai_brandmanager')->__('Description'),
      'required' => true,
    ));

    $imageField = $fieldset->addField('image', 'image', array(
      'name' => 'image',
      'label' => Mage::helper('bendechrai_brandmanager')->__('Image'),
      'title' => Mage::helper('bendechrai_brandmanager')->__('Image'),
      'required' => false,
    ));

    $showInFrontField = $fieldset->addField('show_in_front', 'checkbox', array(
      'name' => 'show_in_front',
      'label' => Mage::helper('bendechrai_brandmanager')->__('Show In Front?'),
      'title' => Mage::helper('bendechrai_brandmanager')->__('Show In Front?'),
      'checked' => $brand->getShowInFront(),
      'value' => 1,
    ));

    $brandField = $fieldset->addField('brand_id', 'hidden', array(
      'name' => 'brand_id',
    ));
    $form->setValues($this->getRequest()->getParam('id'));

    if($brand) {
      $form->setValues($brand->getData());
    }

    $this->setForm($form);
    return $this;
  }

}
