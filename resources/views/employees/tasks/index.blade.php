@extends('layouts.employees.app')

@section('content')
    <div class="content-wrapper">
        @livewire('employee.tasks.todo-list')
    </div>
@endsection
