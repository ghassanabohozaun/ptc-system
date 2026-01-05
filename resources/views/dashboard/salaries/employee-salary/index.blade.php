@extends('layouts.dashboard.app')
@section('title')
    {!! $title !!}
@endsection
@push('style')
    <style>
        .form-floating {
            position: relative;
            /* Add margin/padding as needed */
        }

        .form-floating input {
            padding: 0.5rem 0.5rem 0.5rem;
            /* Adjust padding to make space for the label */
            /* Basic input styling */
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
@endpush
@section('content')
    <div class="app-content content">

        @livewire('dashboard.employee-salary.save', compact('id'))
    </div>
    <!-- end: content app  -->
@endsection
