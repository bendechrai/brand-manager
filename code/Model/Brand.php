<?php

class BenDechrai_BrandManager_Model_Brand extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('bendechrai_brandmanager/brand');
    }

    public function save() {

      if(trim($this->getUrlkey()) == '') {
        $urlkey = trim($this->getName());
        $urlkey = strtolower($urlkey);
        $urlkey = preg_replace('#[^a-z0-9]#', '-', $urlkey);
        $urlkey = trim($urlkey, '-');
        $this->setUrlkey($urlkey);
      }

      parent::save();

    }

}
