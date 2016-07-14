# Brand Manager

Enhances the default Brand attribute in Magento, by allowing the association of a description and an image. The values are automatically stored against each product of that brand, making the data available to the store templating system, as well as other extensions like M2ePro.

## Theme Example

```
  <?php if($this->getProduct()->getBdBmDescriptionAvailable()=='Yes'): ?>
    <div class="std brand">
      <h4>About <?=$this->getProduct()->getAttributeText('brand')?></h4>
      <?php if($this->getProduct()->getBdBmImageAvailable()=='Yes'): ?>
        <div class="image">
          <img src="<?=Mage::getBaseUrl('media').$this->getProduct()->getBdBmImage()?>"
               title="<?=$this->getProduct()->getAttributeText('brand')?>"
               alt="<?=$this->getProduct()->getAttributeText('brand')?> Logo"/>
        </div>
      <?php endif; ?>
      <?=$this->getProduct()->getBdBmDescription()?>
    </div>
  <?php endif; ?>
```

## M2ePro Example

M2ePro doesn't provide for conditional checks in its policy templates.

One workaround for this is to maintain multiple description policies (one for products with no brand, one for brand description, and one for brand description and image), but this solution doesn't scale.

Another option is to calculate the desired HTML and store it in another product attribute, but this requires all products to be updated to make HTML changes.

This module includes two calculated fields, `bd_bm_description_available` and `bd_bm_image_available`, which can be used to create conditional display rules through CSS.

For example, the following HTML in the description policy:

```
  <div class="brand has-image-#bd_bm_image_available# has-description-#bd_bm_description_available# ">
    <h4>About #brand#</h4>
    <div class="image">
      <img src="https://example.com/media/#bd_bm_image#" title="#brand#" alt="#brand# Logo"/>
    </div>
    #bd_bm_description#
  </div>
```

Can be conditionally controlled with the following CSS:

```
  div.brand,
  div.brand div.image {
    display: none;
  }
  div.brand.has-description-Yes,
  div.brand.has-image-Yes div.image {
    display: block;
  }
```

## Installation

This module is installable using [modman](https://github.com/colinmollenhour/modman). 

1. https://github.com/colinmollenhour/modman#installation
2. Go to the base Magento directory
3. Run `modman clone https://github.com/bendechrai/brand-manager`
