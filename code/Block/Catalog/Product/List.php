<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Catalog_Product_List extends Mage_Catalog_Block_Product_List {

    protected function _getProductCollection()
    {       
        parent::_getProductCollection();
        if(Mage::registry('brand')) {
            $this->_productCollection->addAttributeToFilter('brand', Mage::registry('brand')->getProductBrandId());
        }
        return $this->_productCollection;
    }
    
}

