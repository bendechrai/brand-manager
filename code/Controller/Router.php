<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Controller_Router extends Mage_Core_Controller_Varien_Router_Standard {

  public function controllerFrontInitRouters($observer) {
    $front = $observer->getEvent()->getFront();
    $front->addRouter('bendechrai_brandmanager', $this);
  }

  public function match(Zend_Controller_Request_Http $request) {

    if (!$this->_beforeModuleMatch()) {
        return false;
    }

    $path = trim($request->getPathInfo(), '/');
    if ($path) {
      $p = explode('/', $path);
    } else {
      $p = explode('/', $this->_getDefaultPath());
    }

    if($p[0] == 'brands' . Mage::getStoreConfig('catalog/seo/product_url_suffix')) {
      $request->setModuleName('brandmanager')
        ->setControllerName('index')
        ->setActionName('index');
      return true;
    }

    if($p[0] == 'brands') {
      $suffix = Mage::getStoreConfig('catalog/seo/product_url_suffix');
      $expected_pos = strlen($p[1]) - strlen($suffix);
      if( strpos($p[1], Mage::getStoreConfig('catalog/seo/product_url_suffix')) == $expected_pos) {
        $id = substr($p[1], 0, -strlen($suffix));
        $request->setModuleName('brandmanager')
          ->setControllerName('index')
          ->setActionName('view')
          ->setParam('id', $id);
        return true;
      }
    }

    return false;
  }

}

