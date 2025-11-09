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


    {{-- begin dataTables --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/dataTables.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- buttons --}}
    <script src="{!! asset('vendor/datatables/buttons/dataTables.buttons.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/buttons.bootstrap5.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/buttons.colVis.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/buttons.html5.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/buttons.print.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/excel/jszip.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/pdf/pdfmake.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/buttons/pdf/vfs_fonts.js') !!}" type="text/javascript"></script>
    {{-- responsive --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.responsive.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/responsive.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- colReorder --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.colReorder.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/colReorder.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- rowReorder --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.rowReorder.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/rowReorder.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- select --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.select.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/select.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- fixedHeader --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.fixedHeader.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/fixedHeader.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- fixedHeader --}}
    <script src="{!! asset('vendor/datatables/js/dataTables.scroller.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('vendor/datatables/js/scroller.bootstrap5.min.js') !!}" type="text/javascript"></script>
    {{-- end dataTables --}}

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
