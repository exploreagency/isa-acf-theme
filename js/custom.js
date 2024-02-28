jQuery(document).ready(function($) {
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    
    function loadEvents(categorySlug, pageNumber) {
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'load_events_by_category',
                category_slug: categorySlug,
                page: pageNumber,
                nonce: '<?php echo wp_create_nonce('load_events_nonce'); ?>'
            },
            success: function(response) {
                $('.events-list').html(response.events);
                $('.events-pagination').html(response.pagination);
            },
            error: function() {
                alert('Error loading events.');
            }
        });
    }

    $('.event-category').on('click', function(e) {
        e.preventDefault();
        $('.event-category').removeClass('active');
        $(this).addClass('active');
        var categorySlug = $(this).data('slug');
        loadEvents(categorySlug, 1);
    });

    // Delegate click event for dynamically loaded pagination links
    $('.events-pagination').on('click', 'a.page-numbers', function(e) {
        e.preventDefault();
        
        // Check if the clicked element has a page number
        var page = $(this).attr('href').match(/paged=(\d+)/);
        page = page ? page[1] : false;
        
        // If it's a next or prev button, find the current active page and increment or decrement
        if (!page) {
            var currentPage = parseInt($('.events-pagination .current').text(), 10);
            if ($(this).hasClass('prev')) {
                page = currentPage - 1;
            } else if ($(this).hasClass('next')) {
                page = currentPage + 1;
            }
        }
        
        if(page) {
            var categorySlug = $('.event-categories .active').data('slug');
            loadEvents(categorySlug, page);
        }
    });
    
    $('.event-categories .event-category').first().trigger('click');
});