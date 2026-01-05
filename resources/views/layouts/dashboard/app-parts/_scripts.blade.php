    <!-- BEGIN VENDOR JS-->
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/extensions/sweetalert.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/vendors/js/timeline/horizontal-timeline.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/core/app.js" type="text/javascript"></script>
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{!! asset('assets/dashbaord') !!}/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>
    {{-- <script src="{!! asset('assets/dashbaord') !!}/js/scripts/sweetalert2@11.js" type="text/javascript"></script> --}}

    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{!! asset(path: 'assets/dashbaord') !!}/js/scripts/extensions/sweet-alerts.js" type="text/javascript"></script>
    <script src="{!! asset(path: 'assets/dashbaord') !!}/js/scripts/my-scripts.js" type="text/javascript"></script>
    <script src="{!! asset('vendor/flasher/flasher.min.js') !!}" type="text/javascript"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script src="{!! asset('vendor/summernote/summernote.js') !!}"></script>




    {{--  file input --}}
    <script src="{!! asset('vendor/fileInput/js/fileinput.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/fileInput/themes/fa5/theme.min.js') !!}" type="text/javascript"></script>

    @if (Lang() == 'ar')
        <script src="{!! asset('vendor/fileInput/js/locales/LANG.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('vendor/fileInput/js/locales/ar.js') !!}" type="text/javascript"></script>
    @endif
    {{-- end dataTables --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
