<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Adminhtml_BrandmanagerController extends Mage_Adminhtml_Controller_Action {

  /**
   * Render index page
   */
  public function indexAction() {
    $this->loadLayout()->_setActiveMenu('brand/index');
    $this
      ->_title($this->__('Brand Manager'))
      ->_title($this->__('List'))
      ->_addBreadcrumb($this->__('Brand Manager'), $this->__('Brand Manager'))
      ->_addBreadcrumb($this->__('List'), $this->__('List'))
      ->_addContent($this->getLayout()->createBlock('bendechrai_brandmanager/adminhtml_brands'))
      ->renderLayout();
  }

  /**
   * Make sure there's a bendechrai/brand for every product brand
   */
  public function syncAction() {

    $product_brands = Mage::Helper('bendechrai_brandmanager')->getProductBrands();

    foreach($product_brands as $product_brand) {

      $bendechrai_brand = Mage::getModel('bendechrai_brandmanager/brand')->load($product_brand['value'], 'product_brand_id');

      if(!$bendechrai_brand->getId()) {
        $bendechrai_brand->unsetData();
        $bendechrai_brand->setProductBrandId($product_brand['value']);
      }

      $bendechrai_brand->setName($product_brand['label']);
      $bendechrai_brand->save();

    }

    $this->_redirect('*/*/index');

  }

  /**
   * Render edit page
   */
  public function editAction() {

    $id = $this->getRequest()->getParam('id');
    if ($id) {

      // Load the brand
      $model = Mage::getModel('bendechrai_brandmanager/brand')->load($id);

      // Not found? Error.
      if (!$model->getId()) {
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bendechrai_brandmanager')->__('Couldn\'t find brand %d', $id));
        $this->_redirect('*/*/');
        return;
      }

      // Save the model in registry for the edit object to access
      Mage::register('brand', $model);
    }

    // Render
    $this->loadLayout()->_setActiveMenu('brand/index');
    $this
      ->_title($this->__('Brand Manager'))
      ->_title($this->__('Edit'))
      ->_addBreadcrumb($this->__('Brand Manager'), $this->__('Brand Manager'))
      ->_addBreadcrumb($this->__('Edit'), $this->__('Edit'))
      ->_addContent($this->getLayout()->createBlock('bendechrai_brandmanager/adminhtml_brands_edit'))
      ->_addLeft($this->getLayout()->createBlock('bendechrai_brandmanager/adminhtml_brands_edit_tabs'))
      ->renderLayout();

  }

  public function saveAction() {

    // Process POST payloads
    if ($this->getRequest()->getPost()) {

      $id = $this->getRequest()->getPost('brand_id');
      $data = $this->getRequest()->getPost();
      $brand = Mage::getModel('bendechrai_brandmanager/brand')->load($id);

      // Update non image settings
      $brand->setDescription($data['description']);
      $brand->setUrlkey($data['urlkey']);
      $brand->setShowInFront($data['show_in_front']?1:0);

      // Handle image
      if(isset($data['image']) && isset($data['image']['delete']) && $data['image']['delete']) {

        // Delete image
        unlink(Mage::getBaseDir( 'media' ) . DS . 'brands' . DS . $brand->getImage());
        $brand->setImage('');

      } else {

        // Handle upload
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
          try {
            $uploader = new Varien_File_Uploader('image');
            $uploader->setAllowedExtensions(array('jpg', 'jpeg', 'gif', 'png'));
            $uploader->setAllowRenameFiles(true);
            $uploader->setFilesDispersion(false);
            $path = Mage::getBaseDir('media') . DS . 'brands' . DS;
            $img = $uploader->save($path, $_FILES['images']['name']);
            $brand->setImage("brands/{$img['file']}");
          } catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bendechrai_brandmanager')->__('Coudn\'t save image'));
            $this->_redirect('*/*/edit', array('id' => $brand->getId()));
            return;
          }
        }
      }

      // Save brand
      try {
        $brand->save();
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('bendechrai_brandmanager')->__('Brand saved successfully'));
      } catch ( Exception $e ) {
        Mage::getSingleton('adminhtml/session')->addError(Mage::helper('bendechrai_brandmanager')->__('Coudn\'t save brand'));
        $this->_redirect('*/*/edit', array('id' => $brand->getId()));
        return;
      }

      // Update all products that link to this brand
      $data = array(
        'bd_bm_description' => trim($brand->getDescription()),
        'bd_bm_image' => $brand->getImage(),
        'bd_bm_description_available' => (trim($brand->getDescription())!='' ? '1' : '0'),
        'bd_bm_image_available' => (trim($brand->getImage())!='' ? '1' : '0'),
      );
      $productIds = Mage::getModel('catalog/product')
        ->getCollection()
        ->addAttributeToFilter('brand', $brand->getProductBrandId())
        ->getAllIds();
      $updater = Mage::getSingleton('catalog/product_action');    
      $updater->updateAttributes($productIds, $data, 0);

    }

    // Back to brand list
    $this->_redirect( '*/*/' );

  }

}
