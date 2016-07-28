<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {
        $brands = Mage::GetModel('bendechrai_brandmanager/brand')
          ->getCollection()
          ->setOrder('name', 'ASC');
        Mage::register('brands', $brands);

        $this->loadLayout();
        $this->renderLayout();
    }

    public function viewAction() {
        $brand = Mage::GetModel('bendechrai_brandmanager/brand')->load($this->getRequest()->getParam('id'), 'urlkey');

        if(!$brand->getShowInFront()) {
            $this->_redirect('/');
        } else {
            Mage::register('brand', $brand);
            $this->loadLayout();
            $this->renderLayout();
        }
    }

}
