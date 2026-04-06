<!-- Details Modal -->
<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 15px; border: none; overflow: hidden;">
            <div class="modal-body p-0" id="modalBody">
                <!-- Content will be injected via AJAX/JS from .row-details -->
                <div class="text-center p-5">
                    <div class="premium-loader mx-auto"></div>
                </div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary btn-glow" data-dismiss="modal">
                    {!! __('general.close') !!}
                </button>
            </div>
        </div>
    </div>
</div>
