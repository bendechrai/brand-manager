<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Model_Observer
{   
    public function catalogProductSaveBefore($observer) {
        $product = $observer->getProduct();
        $brand = Mage::getModel('bendechrai_brandmanager/brand')->load($product->getBrand(), 'product_brand_id');

        $product->setBdBmDescription(trim($brand->getDescription()));
        $product->setBdBmImage($brand->getImage());
        $product->setBdBmDescriptionAvailable((trim($brand->getDescription())!='' ? '1' : '0'));
        $product->setBdBmImageAvailable((trim($brand->getImage())!='' ? '1' : '0'));
    }
}

