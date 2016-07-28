<?php

/**
 * BenDechrai_BrandManager extension
 * @category   BenDechrai
 * @package    BenDechrai_BrandManager
 * @copyright  Ben Dechrai
 * @author     Ben Dechrai <ben@dechrai.com> https://bendechrai.com.
 */

class BenDechrai_BrandManager_Block_Adminhtml_Brands_Grid extends Mage_Adminhtml_Block_Widget_Grid {

  public function __construct() {
    parent::__construct();
    $this->setId('brandsGrid');
    $this->setDefaultSort('name');
    $this->setDefaultDir('ASC');
    $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection() {
    $collection = Mage::getModel('bendechrai_brandmanager/brand')->getCollection();
    $this->setCollection($collection);
    return parent::_prepareCollection();
  }

  protected function _prepareColumns() {
    $this->addColumn('brand_id', array(
      'header'    => Mage::helper('bendechrai_brandmanager')->__('ID'),
      'align'     =>'right',
      'width'     => '50',
      'index'     => 'brand_id',
    ));

    $this->addColumn('urlkey', array(
      'header'    => Mage::helper('bendechrai_brandmanager')->__('URL Key'),
      'align'     =>'left',
      'width'     => '50',
      'index'     => 'urlkey',
    ));

    $this->addColumn('image', array(
      'header'    => Mage::helper('bendechrai_brandmanager')->__('Image'),
      'align'     =>'left',
      'index'     => 'image',
      'renderer'  => 'BenDechrai_BrandManager_Block_Adminhtml_Brands_Grid_Renderer_Image',
      'filter'    => false,
      'width'     => 100,
    ));

    $this->addColumn('name', array(
      'header'    => Mage::helper('bendechrai_brandmanager')->__('Name'),
      'align'     =>'left',
      'index'     => 'name',
    ));

    $this->addColumn('description', array(
      'header'    => Mage::helper('bendechrai_brandmanager')->__('Description'),
      'align'     =>'left',
      'index'     => 'description',
    ));

    $this->addColumn('show_in_front', array(
      'header'    => Mage::helper('bendechrai_brandmanager')->__('Show In Front?'),
      'width'     => '50',
      'align'     => 'center',
      'index'     => 'show_in_front',
      'type'      => 'options',
      'options'   => array(
        '0' => 'Hide',
        '1' => 'Show',
      ),
    ));

    $this->addColumn('action',
      array(
        'header'    =>  Mage::helper('bendechrai_brandmanager')->__('Action'),
        'width'     => '50',
        'type'      => 'action',
        'getter'    => 'getId',
        'actions'   => array(
          array(
            'caption'   => Mage::helper('bendechrai_brandmanager')->__('Edit'),
            'url'       => array('base'=> '*/*/edit'),
            'field'     => 'id'
          ),
        ),
        'filter'    => false,
        'sortable'  => false,
        'index'     => 'stores',
        'is_system' => true,
      )
    );

    return parent::_prepareColumns();
  }

  public function getRowUrl($row) {
    return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}
