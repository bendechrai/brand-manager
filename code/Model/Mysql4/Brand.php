<?php

class BenDechrai_BrandManager_Model_Mysql4_Brand extends Mage_Core_Model_Mysql4_Abstract {

    public function _construct() {
        $this->_init('bendechrai_brandmanager/brand', 'brand_id');
    }

}
