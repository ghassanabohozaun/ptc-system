<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px; border: none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title text-primary font-weight-bold" id="detailsModalLabel">
                    <i class="la la-info-circle mr-1"></i> {!! __('general.details') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content loaded from row-details via AJAX JS -->
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-light-dark font-weight-bold" style="height: 42px; border-radius: 10px;" data-dismiss="modal">
                    <i class="la la-times mr-1"></i> {!! __('general.close') !!}
                </button>
            </div>
        </div>
    </div>
</div>
