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

// Create product attribute to store brand description
$setup->addAttribute('catalog_product', 'bd_bm_description', array(
  'group' => 'Brand Manager',
  'input' => 'textarea',
  'type' => 'text',
  'label' => 'Brand Description',
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
));

// Create product attribute to store brand image
$setup->addAttribute('catalog_product', 'bd_bm_image', array(
  'group' => 'Brand Manager',
  'input' => 'text',
  'type' => 'varchar',
  'label' => 'Brand Image',
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
));

$installer->endSetup();
