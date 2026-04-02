<span id="view_contact_page"></span>
<div class="row">
    <div class="col-md-12">
        <div class="col-sm-6">
            <?php echo $__env->make('contact.contact_basic_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <div class="col-md-12" style="margin-top:-30px;padding-bottom:3px">
                <div class="row">
                    
                    
                        <h5>Deuda Actual</h5>
                    
                    <div class="col-md-6">
                         <h1 class="text-muted">
                            <span class="contact_balance_due_value">$0</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        

        <?php if($contact->type == 'supplier' || $contact->type == 'both'): ?>
            <div class="clearfix"></div>
            <div class="col-sm-12">
                <?php if($contact->total_purchase - $contact->purchase_paid > 0): ?>
                    <a href="<?php echo e(action([\App\Http\Controllers\TransactionPaymentController::class, 'getPayContactDue'], [$contact->id]), false); ?>?type=purchase"
                        class="pay_purchase_due tw-dw-btn tw-dw-btn-warning tw-text-black sm pull-right"><i class="fas fa-dollar-sign" style='font-size:24px;color:white'aria-hidden="true"></i> <p style="font-size:24px;">Pagar a Proveedor</p></a>
                <?php endif; ?>
            </div>
           
        <?php endif; ?>
        <div class="col-sm-12">
            
            
            </div> 
             <a href="<?php echo e(route('postPayContactDue'). '/' . $contact->id, false); ?>?type=sell" class="pay_sale_due tw-dw-btn bg-info tw-text-white "><i class="fas fa-dollar-sign" style='font-size:24px;color:white'aria-hidden="true"></i> <p style="font-size:24px;">Abonar Cliente</p></a>
          </div>
    </div>
    
    
</div>
<?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/resources/views/contact/partials/contact_info_tab.blade.php ENDPATH**/ ?>