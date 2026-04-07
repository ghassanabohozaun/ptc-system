$(document).ready(function() {
     /** 
     * PTC Advanced Filtering System (Indestructible Version)
     * Uses MutationObserver to fight against external scripts trying to hide the UI.
     */
    
    // Debounce function to prevent constant AJAX calls
    function debounce(func, wait) {
        let timeout;
        return function(...args) {
            const context = this;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
    }

    function initFilterSystem() {
        const $chips = $('.js-filter-chip');
        const $panels = $('.ptc-query-panel');

        const closeAll = () => {
            $panels.removeClass('ptc-show').attr('data-is-open', 'false');
            $chips.removeClass('popover-open');
        };

        // MutationObserver to prevent external hiding
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.type === 'attributes') {
                    const target = mutation.target;
                    const $target = $(target);
                    if ($target.attr('data-is-open') === 'true' && !$target.hasClass('ptc-show')) {
                        $target.addClass('ptc-show');
                    }
                }
            });
        });

        $panels.each(function() {
            observer.observe(this, { attributes: true, attributeFilter: ['class', 'style'] });
        });

        $chips.off('click').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $chip = $(this);
            const targetId = $chip.data('filter-target');
            const $panel = $('#' + targetId);
            const isOpen = $panel.attr('data-is-open') === 'true';

            if (!isOpen) {
                closeAll();
                $panel.addClass('ptc-show').attr('data-is-open', 'true');
                $chip.addClass('popover-open');

                const $select = $panel.find('.js-select2');
                if ($select.length && !$select.hasClass("select2-hidden-accessible")) {
                    $select.select2({
                        dropdownParent: $panel,
                        width: '100%',
                        placeholder: $select.attr('placeholder') || 'Select...'
                    });
                }
                
                setTimeout(() => {
                    $panel.find('input, select').filter(':visible').first().focus();
                }, 100);
            } else {
                closeAll();
            }
        });

        $panels.off('click').on('click', function(e) {
            e.stopPropagation();
        });

        $(document).off('click.filterSystem').on('click.filterSystem', function(e) {
            if (!$(e.target).closest('.js-filter-chip').length && 
                !$(e.target).closest('.ptc-query-panel').length &&
                !$(e.target).closest('.select2-container').length) {
                closeAll();
            }
        });

        $('.js-apply-filter').off('click').on('click', function(e) {
            e.preventDefault();
            const $panel = $(this).closest('.ptc-query-panel');
            const targetId = $panel.attr('id');
            const $chip = $('.js-filter-chip[data-filter-target="' + targetId + '"]');
            const $form = $chip.closest('form');
            
            let hasValue = false;
            $panel.find('input, select').each(function() {
                const val = $(this).val();
                if (val && val !== "" && (Array.isArray(val) ? val.length > 0 : true)) {
                    hasValue = true;
                }
            });

            $chip.toggleClass('active', hasValue);
            closeAll();
            $form.trigger('submit');
        });

        $('.js-reset-btn').off('click').on('click', function(e) {
            e.preventDefault();
            const $form = $(this).closest('form');
            $form[0].reset();
            $form.find('.js-select2').val(null).trigger('change');
            $form.find('.js-filter-chip').removeClass('active');
            closeAll();
            $form.trigger('submit');
        });

    }

    initFilterSystem();

    $(document).on('submit', '.js-filter-form', function(e) {
        e.preventDefault();
        const $form = $(this);
        const actionUrl = $form.attr('action') || window.location.pathname;
        const targetContainer = $form.data('container') || '#table_data';
        const targetLoader = $form.data('loader') || '.table-loader-overlay';
        const formData = $form.serializeArray().filter(item => item.value !== "").map(item => encodeURIComponent(item.name) + '=' + encodeURIComponent(item.value)).join('&');
        
        // Construct visual URL for pushState (completely clean if no data)
        const fullUrl = formData ? (actionUrl + (actionUrl.includes('?') ? '&' : '?') + formData) : actionUrl;

        $.ajax({
            url: actionUrl,
            data: formData,
            type: 'GET',
            beforeSend: function() {
                $(targetLoader).addClass('active');
                $(targetContainer).css('opacity', '0.6');
            },
            success: function(response) {
                $(targetContainer).html(response);
                $(targetContainer).css('opacity', '1');
                $(targetLoader).removeClass('active');
                
                // Update URL without refresh
                window.history.pushState(null, "", fullUrl);

                if (typeof window.initTablePlugins === 'function') {
                    window.initTablePlugins(targetContainer);
                }
                initFilterSystem();
            },
            error: function() {
                $(targetLoader).removeClass('active');
                $(targetContainer).css('opacity', '1');
            }
        });
    });
});
