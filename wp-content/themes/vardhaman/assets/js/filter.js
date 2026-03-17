jQuery(function($) {
    $('.category-dropdown').on('change', function() {
        var val = $(this).val();
        if (val !== '') {
            $(this).closest('form').submit();   // auto filter on select
        }
         else {
            // All categories → go to main shop
            window.location.href = "<?php echo esc_url(wc_get_page_permalink('shop')); ?>";
        }
    });

        // $('#filter-form select').on('change', function() {
        //     var catVal   = $('.category-dropdown').val();
        //     var priceVal = $('.price-dropdown').val();

        //     if (catVal === '' && priceVal === '') {
        //         window.location.href = '<?php echo esc_url(wc_get_page_permalink('/shop/')); ?>';
        //         return;
        //     }

        //     $('#filter-form').submit();  // auto submit on any change
        // });
    });