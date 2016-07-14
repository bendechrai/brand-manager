<?php

class BenDechrai_BrandManager_Helper_Data extends Mage_Core_Helper_Abstract {

  /**
   * Get all brands available for products
   *
   * @access public
   * @return 
   */
  public function getProductBrand() {
    return Mage::getResourceModel('eav/entity_attribute_collection')
      ->setCodeFilter('brand')
      ->getFirstItem();
  }

  /**
   * Get all brands available for products
   *
   * @access public
   * @return 
   */
  public function getProductBrands() {
    return $this->getProductBrand()
      ->getSource()
      ->getAllOptions(false);
  }

}
