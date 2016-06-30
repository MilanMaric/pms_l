@extends('layouts.app')

@section('content')
        <h1 class="pull-left">Incomes</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('incomes.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')
        @include('errors.errors')

        <div class="clearfix"></div>

        @include('incomes.table')
        
@endsection
