<table class="table table-striped table-th-green text-center" id="ingredients_for_unit_recipe_table">
	<thead>
		<tr>
			<th><?php echo app('translator')->get('manufacturing::lang.ingredient'); ?></th>
			<th><?php echo app('translator')->get('manufacturing::lang.input_quantity'); ?></th>
			<th><?php echo app('translator')->get('manufacturing::lang.waste_percent'); ?></th>
			<th><?php echo app('translator')->get('manufacturing::lang.final_quantity'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.final_quantity_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
			<th><?php echo app('translator')->get('manufacturing::lang.total_price'); ?> <?php
                if(session('business.enable_tooltip')){
                    echo '<i class="fa fa-info-circle text-info hover-q no-print " aria-hidden="true" 
                    data-container="body" data-toggle="popover" data-placement="auto bottom" 
                    data-content="' . __('manufacturing::lang.total_price_tooltip') . '" data-html="true" data-trigger="hover"></i>';
                }
                ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
			$total_ingredient_price = 0;
			$ingredient_groups = [];
		?>
		<?php if(!empty($ingredients)): ?>
			<?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(empty($ingredient['mfg_ingredient_group_id'])): ?>
					<?php echo $__env->make('manufacturing::recipe.ingredient_row_for_production', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php else: ?>
					<?php
						$ingredient_groups[$ingredient['mfg_ingredient_group_id']][] = $ingredient;
					?>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $ingredient_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient_group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr class="bg-gray ingredient_group_row">
					<td colspan="5" style="text-align: left;"><strong><?php echo e($ingredient_group[0]['ingredient_group_name'] ?? '', false); ?></strong></td>
				</tr>
				<?php $__currentLoopData = $ingredient_group; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo $__env->make('manufacturing::recipe.ingredient_row_for_production', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="4" style="text-align: right;"><strong><?php echo app('translator')->get('manufacturing::lang.ingredients_cost'); ?></strong></td>
			<td><span class="display_currency" data-currency_symbol="true" id="total_ingredient_price"><?php echo e($total_ingredient_price, false); ?></span>
			<input type="hidden" id="waste_percent" value="<?php echo e($recipe->waste_percent ?? 0, false); ?>">
			</td>
		</tr>
	</tfoot>
</table><?php /**PATH C:\laragon\www\POS\alizazip\Modules\Manufacturing\Providers/../Resources/views/recipe/ingredients_for_production.blade.php ENDPATH**/ ?>