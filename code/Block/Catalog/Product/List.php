<?php   
            
class BenDechrai_BrandManager_Block_Catalog_Product_List extends Mage_Catalog_Block_Product_List
{                   
                    
    protected function _getProductCollection()
    {       
        parent::_getProductCollection();

        $this->_productCollection->addAttributeToFilter('brand', Mage::registry('brand')->getProductBrandId());

        return $this->_productCollection;
    }

    
}

