@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection

@section('content')
    <div class="app-content content">

        <div class="content-wrapper">
            <!-- begin: content header -->
            <div class="content-header row">
                <!-- begin: content header left-->
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('employees.employees') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.employees.index') !!}">
                                        {!! __('employees.employees') !!}
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">
                                    <a href="">
                                        {!! __('employees.update_employee') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->

            </div> <!-- end :content header -->

            <!-- begin: content body -->
            <div class="content-body">

                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <!-- begin: card content -->
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        @livewire('dashboard.employee.edit', compact('employee', 'employeeID', 'governorates', 'cities', 'employeeStatuses', 'departments'))
                                    </div>
                                    <!-- end: card content -->
                                </div>
                            </div> <!-- end: card  -->
                        </div><!-- end: row  -->
                    </div>
                </section><!-- end: sections  -->
            </div><!-- end: content body  -->
        </div> <!-- end: content wrapper  -->

    </div><!-- end: content app  -->
@endsection



{{-- @push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('showFullScreenModal', () => {
                $('#fullScreenModal').modal('show');
            });
        });
    </script>
@endpush --}}
