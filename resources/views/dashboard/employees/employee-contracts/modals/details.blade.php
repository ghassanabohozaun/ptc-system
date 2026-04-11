<!-- Details Modal -->
<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-lg border-0 premium-modal-content-styled">
            <div class="modal-body p-0" id="modalBody">
                <!-- Content will be injected via AJAX/JS from .row-details -->
                <div class="text-center p-5">
                    <div class="premium-loader mx-auto"></div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-premium-standard btn-light-dark font-weight-bold" data-dismiss="modal">
                    <i class="la la-times mr-1"></i> {!! __('general.close') !!}
                </button>
            </div>
        </div>
    </div>
</div>
