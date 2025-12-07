<div class="text-center" style="width: 150px;">

    <div class="position-relative d-inline-block">
        @if (!empty($ticket->photo))
            <img src='{!! asset('/uploads/tickets/' . $ticket->photo) !!}' width="100" height="100" class="img-fluid img-responsive">
            <a href="#" data-target="#fullScreenModal_{!! $ticket->id !!}" data-toggle="modal"
                class="badge badge-sm bg-info  position-absolute" style="top: 5px; left: 2px;">
                <i class="la la-arrows"></i>
            </a>
        @else
            <img src='{!! asset('assets/dashbaord/images/images-empty.png') !!}' width="80" height="80" class="img-fluid">
        @endif

    </div>
</div>

<!-- begin: modal-->
<div class="modal fade" id="fullScreenModal_{!! $ticket->id !!}" tabindex="-1" role="dialog"
    aria-labelledby="fullScreenModalLabel" aria-hidden="true" style="z-index: 10001">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <!--begin::modal header-->
            <div class="modal-header">
                <h5 class="modal-title test_answer_header" id="fullScreenModalLabel">{!! $ticket->name !!}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--end::modal header-->

            <!--begin::modal body-->
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div id="carouselExampleControlsModal_{!! $ticket->id !!}" class="carousel slide"
                            data-ride="carousel" style="width: 100%">
                            <div class="carousel-inner">
                                <div>
                                    <img src="{!! asset('uploads/tickets/' . $ticket->photo) !!}" class="d-block w-100" alt="...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::modal body-->
        </div>
    </div>
</div>
<!-- end: modal-->
