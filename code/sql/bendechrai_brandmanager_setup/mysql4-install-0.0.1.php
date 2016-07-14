<?php

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

$installer->run("

    DROP TABLE IF EXISTS {$this->getTable('bendechrai_brandmanager/brand')};
    CREATE TABLE {$this->getTable('bendechrai_brandmanager/brand')} (
        `brand_id` int(11) unsigned NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `product_brand_id` int(11) unsigned NOT NULL UNIQUE,
        `name` varchar(255) NOT NULL DEFAULT '',
        `description` text NOT NULL,
        `image` varchar(255) NOT NULL DEFAULT ''
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");

$installer->endSetup();
