<?php

$installer = $this;
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();

// Create product attribute to store whether description is available
$setup->removeAttribute('catalog_product', 'bd_bm_description_empty');
$setup->addAttribute('catalog_product', 'bd_bm_description_available', array(
  'group' => 'Brand Manager',
  'input' => 'boolean',
  'type' => 'int',
  'label' => 'Brand Description Available',
  'backend' => '',
  'frontend' => '',
  'visible' => true,
  'required' => false,
  'user_defined' => true,
  'searchable' => false,
  'filterable' => false,
  'filterable_in_search' => false,
  'comparable' => false,
  'visible_on_front' => false,
  'visible_in_advanced_search' => false,
  'is_html_allowed_on_front' => false,
  'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
  'sort_order' => 50,
  'default' => false,
));

// Create product attribute to store whether image is available
$setup->removeAttribute('catalog_product', 'bd_bm_image_empty');
$setup->addAttribute('catalog_product', 'bd_bm_image_available', array(
  'group' => 'Brand Manager',
  'input' => 'boolean',
  'type' => 'int',
  'label' => 'Brand Image Available',
  'backend' => '',
  'frontend' => '',
  'visible' => true,
  'required' => false,
  'user_defined' => true,
  'searchable' => false,
  'filterable' => false,
  'filterable_in_search' => false,
  'comparable' => false,
  'visible_on_front' => false,
  'visible_in_advanced_search' => false,
  'is_html_allowed_on_front' => false,
  'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
  'sort_order' => 50,
  'default' => false,
));

$installer->endSetup();
