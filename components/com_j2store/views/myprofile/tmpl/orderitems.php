<?php
/**
 * @package J2Store
 * @copyright Copyright (c)2014-17 Ramesh Elamathi / J2Store.org
 * @license GNU GPL v3 or later
 * This file is for email.
 */
// No direct access to this file
defined ( '_JEXEC' ) or die ();
$order = $this->order;
$items = $this->order->getItems();
$currency = J2Store::currency();

?>
<style>

 .emailtemplate-table td {    
   font-style: normal; 
   font-variant: normal; 
   font-weight: normal; 
   font-size: 11px; 
   line-height: 1.35em;  
   padding: 7px 9px 9px; 
   border-width: 0px 1px 1px; 
   border-right: 1px solid rgb(190, 188, 183); 
   border-bottom: 1px solid rgb(190, 188, 183); 
   border-left: 1px solid rgb(190, 188, 183);
   
 }
  
 .emailtemplate-table th {
   padding: 5px 9px 6px; 
   border-top: 1px solid rgb(190, 188, 183); 
   border-right: 1px solid rgb(190, 188, 183); 
   border-left: 1px solid rgb(190, 188, 183); 
   border-style: solid solid none; 
   line-height: 1em;
 }
  
  .emailtemplate-table-footer td {
    text-align: right;    
  }

</style>

	<h3><?php echo JText::_('J2STORE_ORDER_SUMMARY')?></h3>
	<table class="emailtemplate-table table table-bordered" width="100%" border="0" cellspacing="" cellpadding="0">
		<thead>
			<tr>
				<th><?php echo JText::_('J2STORE_CART_LINE_ITEM'); ?></th>
				<th><?php echo JText::_('J2STORE_CART_LINE_ITEM_QUANTITY'); ?></th>
				<th><?php echo JText::_('J2STORE_CART_LINE_ITEM_TOTAL'); ?></th>
			</tr>
			</thead>
			<tbody>

				<?php foreach ($items as $item): ?>
				<?php
					$registry = new JRegistry;
					$registry->loadString($item->orderitem_params);
					$item->params = $registry;
					$thumb_image = $item->params->get('thumb_image', '');
				?>
				<tr valign="top">
					<td>					
						<span class="cart-product-name">
							<?php echo $item->orderitem_name; ?>  
						</span>
						<br />
						<?php if(isset($item->orderitemattributes)): ?>
							<span class="cart-item-options">
							<?php foreach ($item->orderitemattributes as $attribute):
								if($attribute->orderitemattribute_type == 'file') {
									unset($table);
									$table = F0FTable::getInstance('Upload', 'J2StoreTable')->getClone();
									if($table->load(array('mangled_name'=>$attribute->orderitemattribute_value))) {
										$attribute_value = $table->original_name;
									}
								}else {
									$attribute_value = $attribute->orderitemattribute_value;
								}
							?>
								<small>
								- <?php echo JText::_($attribute->orderitemattribute_name); ?> : <?php echo $attribute_value; ?>
								</small>
             				   	<br />
							<?php endforeach;?>
							</span>
						<?php endif; ?>

						<?php if($this->params->get('show_price_field', 1)): ?>

							<span class="cart-product-unit-price">
								<span class="cart-item-title"><?php echo JText::_('J2STORE_CART_LINE_ITEM_UNIT_PRICE'); ?></span>								
								<span class="cart-item-value">
									<?php echo $currency->format($this->order->get_formatted_order_lineitem_price($item, $this->params->get('checkout_price_display_options', 1)), $this->order->currency_code, $this->order->currency_value);?>
								</span>
							</span>
						<?php endif; ?>
						
						<?php if($this->params->get('show_sku', 1) && !empty($item->orderitem_sku)): ?>						
						<br />
							<span class="cart-product-sku">
								<span class="cart-item-title"><?php echo JText::_('J2STORE_CART_LINE_ITEM_SKU'); ?></span>
								<span class="cart-item-value"><?php echo $item->orderitem_sku; ?></span>
							</span>

						<?php endif; ?>
					</td>
					<td><?php echo $item->orderitem_quantity; ?></td>
					<td class="cart-line-subtotal" style="text-align: right;">
						<?php echo $currency->format($this->order->get_formatted_lineitem_total($item, $this->params->get('checkout_price_display_options', 1)), $this->order->currency_code, $this->order->currency_value ); ?>					
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<?php $colspan = '2';?>
			<tfoot class="emailtemplate-table-footer" style="text-align: right;">
				<?php if($totals = $this->order->get_formatted_order_totals()): ?>
					<?php foreach($totals as $total): ?>
						<tr valign="top">
							<th scope="row" colspan="2"> <?php echo $total['label']; ?></th>
							<td><?php echo $total['value']; ?></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tfoot>
			</table>