<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract {

  /**
   * Render image, or "No image available" if not available
   *
   * @access public
   * @param Varien_Object $row
   * @return string
   */
  public function render(Varien_Object $row) {
    if($row->image=='') {
      return Mage::helper('bendechrai_brandmanager')->__("No image available");
    } else {
      $url = Mage::getBaseUrl('media') . $row->image;
      return "<img src=\"{$url}\" width=\"97px\"/>";
    }
  }

}
