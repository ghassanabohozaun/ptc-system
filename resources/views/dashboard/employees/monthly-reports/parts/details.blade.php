<button type="button" class="btn btn-outline-primary px-2 premium-btn-standard" id="dailyReportDetailModal"
    daily-report-details="{{ $dailyReport->details }}">
    {!! __('dailyReports.show_details') !!}
</button>


<!-- begin: modal-->
<div class="modal modal-pop fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="dailyReportDetailModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content premium-modal-content-styled shadow-lg border-0">
            <!--begin::modal header-->
            <div class="modal-header border-0 pb-0 pt-2 px-2 d-flex justify-content-between align-items-center">
                <h5 class="modal-title font-weight-bold ml-1 mt-1 text-dark" id="dailyReportDetailModalLabel">
                    <i class="la la-info-circle text-primary mr-1"></i> {!! $dailyReport->employee->EmployeeShortName() !!}
                </h5>
                <button type="button" class="close premium-close-button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body pt-3">
                <div class="row">
                    <div class="col-12">
                        <textarea rows="20" id="details" name="details" class="form-control premium-input shadow-none details_summernote premium-textarea-md"></textarea>
                    </div>
                </div>
            </div>
            <!--end::modal body-->
            
            <div class="modal-footer border-0 pt-0 pb-3 px-3">
                <button type="button" class="btn btn-light-dark premium-btn-standard" data-dismiss="modal">
                    <i class="la la-times mr-1"></i> {!! __('general.close') !!}
                </button>
            </div>
        </div>
    </div>
</div>
<!-- end: modal-->
@push('scripts')
    <script type="text/javascript">
        $('body').on('click', '#dailyReportDetailModal', function(e) {

            e.preventDefault();
            var details = $(this).attr('daily-report-details');

            $('.details_summernote').summernote({
                placeholder: '{!! __('general.write_here') !!}',
                tabsize: 2,
                height: 500,
                toolbar: [

                ]
            });
            $('.details_summernote').summernote('code', details);
            $('.details_summernote').summernote('disable');


            $('#detailsModal').modal('show');
        })
    </script>
@endpush
