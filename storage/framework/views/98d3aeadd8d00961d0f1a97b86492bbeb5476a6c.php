<script type="text/javascript">
$(document).ready( function(){
    $("select.accounts-dropdown").select2({
        ajax: {
            url: '<?php echo e(route("accounts-dropdown"), false); ?>',
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data
                }
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateResult: function(data) {
            return data.html;
        },
        templateSelection: function(data) {
            return data.text;
        }
    });
});
$(document).on('mouseover', '.select2-selection__rendered', function(){
    $(this).removeAttr('title');
});
$(document).on('shown.bs.modal', '.modal', function(){
    $(this).find('select.accounts-dropdown').select2({
        dropdownParent: $(this),
        ajax: {
            url: '<?php echo e(route("accounts-dropdown"), false); ?>',
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: data
                }
            },
        },
        escapeMarkup: function(markup) {
            return markup;
        },
        templateResult: function(data) {
            return data.html;
        },
        templateSelection: function(data) {
            return data.text;
        }
    });
});
</script><?php /**PATH /home/u371716713/domains/ziscoplus.com/public_html/alizazip/Modules/Accounting/Providers/../Resources/views/accounting/common_js.blade.php ENDPATH**/ ?>