<!-- Details Modal -->
<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content radius-15">
            <div class="modal-header bg-primary white radius-top-15">
                <h5 class="modal-title white" id="detailsModalLabel"><i class="ft-info mr-1"></i> {!! __('general.details') !!}</h5>
                <button type="button" class="close white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-0" id="modalBody">
                <!-- Data will be injected here from .row-details -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-glow px-3" data-dismiss="modal">
                    {{ __('general.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
