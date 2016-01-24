<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 */

// No direct access
defined('_JEXEC') or die;
?>

<?php if(!empty($this->product->variant->sku) && $this->params->get('show_sku', 1)) : ?>
	<div class="product-sku">
		<span class="sku-text"><?php echo JText::_('J2STORE_SKU')?></span>
		<span class="sku"> <?php echo $this->product->variant->sku; ?> </span>
	</div>
<?php endif; ?>

<?php if($this->params->get('show_manufacturer', 0) && !empty($this->product->manufacturer)): ?>
	<span class="manufacturer-brand-text"> <?php echo JText::_('J2STORE_PRODUCT_MANUFACTURER_NAME'); ?> </span>
	<span class="manufacturer-brand"> <?php echo $this->product->manufacturer; ?></span>
<?php endif; ?>