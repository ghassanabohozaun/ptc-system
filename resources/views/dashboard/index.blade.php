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
                    <h3 class="content-header-title mb-0 d-inline-block">{!! __('dashboard.dashboard') !!}</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{!! route('dashboard.index') !!}">
                                        {!! __('dashboard.home') !!}
                                    </a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end: content header left-->
            </div> <!-- end :content header -->

            {{-- <!-- begin: staticstics -->
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-user-following  info font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! adminCount() !!}</h3>
                                        <span>{!! __('children.admins_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-users primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! childCount() !!}</h3>
                                        <span>{!! __('children.children_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-user dark font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! childMaleCount() !!}</h3>
                                        <span>{!! __('children.male_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-user-female warning font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! childFemaleCount() !!}</h3>
                                        <span>{!! __('children.female_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pointer success font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! governorateCount() !!}</h3>
                                        <span>{!! __('children.governorates_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-pointer danger font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>{!! cityCount() !!}</h3>
                                        <span>{!! __('children.cities_count') !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: staticstics -->

             --}}




        </div> <!-- end: content wrapper  -->
    </div><!-- end: content app  -->
@endsection
