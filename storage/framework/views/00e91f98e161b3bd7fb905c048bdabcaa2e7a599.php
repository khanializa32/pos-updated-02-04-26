<tr>
	<td>
		<?php echo e($ingredient['full_name'], false); ?>

		<input type="hidden" class="ingredient_price" value="<?php echo e($ingredient['dpp_inc_tax'], false); ?>">
		<input type="hidden" name="ingredients[<?php echo e($ingredient['id'], false); ?>][variation_id]"  class="ingredient_id" value="<?php echo e($ingredient['variation_id'], false); ?>">
		<input type="hidden" class="unit_quantity" value="<?php echo e($ingredient['unit_quantity'], false); ?>">
		<input type="hidden" name="ingredients[<?php echo e($ingredient['id'], false); ?>][mfg_ingredient_group_id]" value="<?php echo e($ingredient['mfg_ingredient_group_id'], false); ?>">
	</td>
	<td>
		<?php
			$variation = $ingredient['variation'];
			$multiplier = $ingredient['multiplier'];
			$allow_decimal = $ingredient['allow_decimal'];
			$qty_available = 0;
			if($ingredient['enable_stock'] == 1) {
				$max_qty_rule = !empty($variation->variation_location_details[0]->qty_available) ? $variation->variation_location_details[0]->qty_available : 0;
				$qty_available = $max_qty_rule;
				$max_qty_rule = $max_qty_rule / $multiplier;
				$max_qty_msg = __('validation.custom-messages.quantity_not_available', ['qty'=> number_format($max_qty_rule, 2), 'unit' => $ingredient['unit']  ]);
			}
			
		?>
		<div class="<?php if(!empty($ingredient['sub_units'])): ?> input_inline <?php else: ?> input-group <?php endif; ?>">
			<input 
			type="text" 
			data-min="1" 
			class="form-control input-sm input_number mousetrap total_quantities" 
			value="<?php echo e(number_format($ingredient['quantity'], session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" 
			name="ingredients[<?php echo e($ingredient['id'], false); ?>][quantity]" 
			data-allow-overselling="<?php if(empty($pos_settings['allow_overselling'])): ?><?php echo e('false', false); ?><?php else: ?><?php echo e('true', false); ?><?php endif; ?>"
			<?php if($allow_decimal): ?> 
				data-decimal=1 
			<?php else: ?> 
				data-decimal=0 
				data-rule-abs_digit="true" 
				data-msg-abs_digit="<?php echo app('translator')->get('lang_v1.decimal_value_not_allowed'); ?>" 
			<?php endif; ?> 
				data-rule-required="true" 
				data-msg-required="<?php echo app('translator')->get('validation.custom-messages.this_field_is_required'); ?>" 
			<?php if($ingredient['enable_stock'] == 1 && empty($pos_settings['allow_overselling']) ): ?> 	
				data-rule-max-value="<?php echo e($max_qty_rule, false); ?>"  
				data-msg-max-value="<?php echo e($max_qty_msg, false); ?>" 
				data-qty_available=<?php echo e($qty_available, false); ?>

			<?php endif; ?> 

			<?php if(!empty($manufacturing_settings['disable_editing_ingredient_qty'])): ?>
			readonly
			<?php endif; ?>
			>
			<span class="<?php if(empty($ingredient['sub_units'])): ?> input-group-addon <?php endif; ?> line_unit_span">
			<?php if(empty($ingredient['sub_units'])): ?> 
				<?php echo e($ingredient['unit'], false); ?>

			<?php else: ?>
				<select name="ingredients[<?php echo e($ingredient['id'], false); ?>][sub_unit_id]" class="input-sm form-control sub_unit" 
				<?php if(!empty($manufacturing_settings['disable_editing_ingredient_qty'])): ?>
				disabled="" 
				<?php endif; ?>
			>
					<?php $__currentLoopData = $ingredient['sub_units']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option 
							value="<?php echo e($key, false); ?>" 
							data-allow_decimal="<?php echo e($value['allow_decimal'], false); ?>"
							data-multiplier="<?php echo e($value['multiplier'], false); ?>"
							data-unit_name="<?php echo e($value['name'], false); ?>"
							<?php if($ingredient['sub_unit_id'] == $key): ?> selected <?php endif; ?>><?php echo e($value['name'], false); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<?php if(!empty($manufacturing_settings['disable_editing_ingredient_qty'])): ?>
					<input type="hidden" name="ingredients[<?php echo e($ingredient['id'], false); ?>][sub_unit_id]" value="<?php echo e($ingredient['sub_unit_id'], false); ?>">
				<?php endif; ?>
			<?php endif; ?>
			</span>
		</div>
	</td>
	<td>
		<div class="input-group">
			<input type="text" name="ingredients[<?php echo e($ingredient['id'], false); ?>][mfg_waste_percent]" value="<?php echo e(number_format($ingredient['waste_percent'], session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?>" class="form-control input-sm input_number mfg_waste_percent">
			<span class="input-group-addon"><i class="fa fa-percent"></i></span>
		</div>
	</td>
	<td>
		<span class="row_final_quantity"><?php echo e(number_format($ingredient['final_quantity'], session('business.quantity_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span> <span class="row_unit_text"><?php echo e($ingredient['unit'], false); ?></span>
	</td>
	<td>
		<span class="ingredient_total_price display_currency" data-currency_symbol="true"><?php echo e(number_format($ingredient['total_price'], session('business.currency_precision', 2), session('currency')['decimal_separator'], session('currency')['thousand_separator']), false); ?></span>
		<input type="hidden" class="total_price" value="<?php echo e($ingredient['total_price'], false); ?>">
	</td>
</tr><?php /**PATH C:\laragon\www\POS\alizazip\Modules\Manufacturing\Providers/../Resources/views/recipe/ingredient_row_for_production.blade.php ENDPATH**/ ?>