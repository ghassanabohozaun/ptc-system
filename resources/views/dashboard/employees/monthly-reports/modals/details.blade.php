<!-- Modernized Details Modal for Monthly Reports -->
<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg border-0 premium-modal-content-styled">
            
            <!--begin::modal header-->
            <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                <h5 class="modal-title font-weight-bold text-dark ml-1 mt-1" id="detailsModalLabel">
                    <i class="la la-info-circle text-primary mr-1"></i> {!! __('general.details') !!}
                </h5>
                <button type="button" class="close premium-close premium-close-button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <div class="modal-body p-4" id="modalBody">
                <!-- Content loaded from row-details via AJAX JS -->
                <div class="text-center p-5">
                    <div class="premium-loader mx-auto"></div>
                    <p class="text-muted mt-2 font-weight-bold">{!! __('general.loading') !!}...</p>
                </div>
            </div>

            <!--begin::modal footer-->
            <div class="modal-footer border-0 pt-0 pb-3 px-3 d-flex justify-content-end">
                <button type="button" class="btn btn-light-dark premium-btn-standard" data-dismiss="modal">
                    <i class="la la-times-circle mr-1"></i> {!! __('general.close') !!}
                </button>
            </div>
            <!--end::modal footer-->
        </div>
    </div>
</div>
