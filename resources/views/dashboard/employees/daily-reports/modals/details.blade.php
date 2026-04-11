<!-- Standard Details Modal for Daily Reports (Premium V2.0 Style) -->
<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content shadow-premium border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="modal-header border-0 bg-white pb-0">
                <h5 class="modal-title text-primary font-weight-bold" id="detailsModalLabel">
                    <i class="la la-info-circle mr-1" style="font-size: 20px; vertical-align: middle;"></i> 
                    {!! __('general.details') !!}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 24px;">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0" id="modalBody">
                <!-- Content loaded from row-details via AJAX JS -->
                <div class="text-center p-5">
                    <span class="premium-loader"></span>
                </div>
            </div>
            <div class="modal-footer border-0 p-2 justify-content-center">
                <button type="button" class="btn btn-premium-secondary" 
                        data-dismiss="modal" 
                        style="height: 42px; border-radius: 10px; min-width: 120px;">
                    {!! __('general.close') !!}
                </button>
            </div>
        </div>
    </div>
</div>
