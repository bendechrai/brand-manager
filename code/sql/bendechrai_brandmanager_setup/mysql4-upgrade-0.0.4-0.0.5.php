<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

$installer->run("

    ALTER TABLE {$this->getTable('bendechrai_brandmanager/brand')}
      ADD `urlkey` varchar(255) NOT NULL DEFAULT '',
      ADD `show_in_front` tinyint(1) NOT NULL DEFAULT 1;

");

$installer->endSetup();
