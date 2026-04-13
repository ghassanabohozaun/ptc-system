// Global Select2 and UI Initializers
$(document).ready(function () {
    // 1. Select2 Global Defaults (Integrated from datepicker-initializer)
    if (typeof $.fn.select2 !== 'undefined') {
        const isRtl = $('html').attr('dir') === 'rtl' || $('html').attr('data-textdirection') === 'rtl';
        $.fn.select2.defaults.set("dir", isRtl ? "rtl" : "ltr");
        $.fn.select2.defaults.set("width", "100%");
        
        // Apply Arabic translations if available via the bridge
        if (isRtl && typeof window.PTC_I18N !== 'undefined' && window.PTC_I18N.select2) {
            $.fn.select2.defaults.set("language", window.PTC_I18N.select2);
        }
    }

    // 2. General Delete Button Click Handler (Existing Logic)
    // General Delete Button Click Handler
    $("body").on("click", ".delete-confirm", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        var url = $(this).data("route");
        var modelString = $(this).data("model"); // Optional: Generic name for the item being deleted
        var deleteMessage =
            $(this).data("message") ||
            "Are you sure you want to delete this record?";
        var deleteTitle = $(this).data("title") || "Are you sure?";
        var deleteText =
            $(this).data("text") || "You won't be able to revert this!";
        var confirmButtonText =
            $(this).data("confirm-btn") || "Yes, delete it!";
        var cancelButtonText = $(this).data("cancel-btn") || "Cancel";
        var successTitle = $(this).data("success-title") || "Deleted!";
        var successText =
            $(this).data("success-text") || "Your file has been deleted.";

        swal({
            title: deleteTitle,
            text: deleteText,
            icon: "warning",
            buttons: {
                cancel: {
                    text: cancelButtonText,
                    value: null,
                    visible: true,
                    className: "btn-danger",
                    closeModal: true,
                },
                confirm: {
                    text: confirmButtonText,
                    value: true,
                    visible: true,
                    className: "btn-info",
                    closeModal: false,
                },
            },
        }).then((isConfirm) => {
            if (isConfirm) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        id: id,
                        _method: "POST",
                        _token: $('meta[name="csrf-token"]').attr("content"),
                    },
                    beforeSend: function() {
                        if ($('#loading-indicator').length) {
                            $('#loading-indicator').show();
                        }
                    },
                    success: function (data) {
                        if (data.status === true) {
                            swal({
                                title: successTitle,
                                text: successText,
                                icon: "success",
                                timer: 2000,
                                buttons: false,
                            });
                            // Reload table div or datatable gracefully
                            if (typeof window.fetch_data === 'function') {
                                window.fetch_data(window.currentPage || 1);
                            } else {
                                var targetTable = "#myTable";
                                if ($(targetTable).length) {
                                    $(targetTable).load(
                                        location.href + " " + targetTable,
                                        function() {
                                            if ($('#loading-indicator').length) {
                                                $('#loading-indicator').hide();
                                            }
                                        }
                                    );
                                } else {
                                    location.reload();
                                }
                            }
                        } else {
                            if ($('#loading-indicator').length) {
                                $('#loading-indicator').hide();
                            }
                            swal("Error!", "Something went wrong.", "error");
                        }
                    },
                    error: function (xhr) {
                        if ($('#loading-indicator').length) {
                            $('#loading-indicator').hide();
                        }
                        swal("Error!", "Something went wrong.", "error");
                    },
                });
            }
        });
    });
});
