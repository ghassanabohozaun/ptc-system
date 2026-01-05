<button type="button" class="btn btn-outline-primary px-2" id="dailyReportDetailModal"
    daily-report-details="{{ $dailyReport->details }}">
    {!! __('dailyReports.show_details') !!}
</button>


<!-- begin: modal-->
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="dailyReportDetailModalLabel"
    aria-hidden="true" style="z-index: 10001">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="dailyReportDetailModalLabel">{!! $dailyReport->employee->EmployeeShortName() !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <textarea rows="20" id="details" name="details" class="form-control details_summernote"></textarea>
                    </div>
                </div>
            </div>
            <!--end::modal body-->
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
