@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Project</h1>
        </div>
    </div>

{{--    @include('::common.errors')--}}

    <div class="row">
        {!! Form::open(['route' => 'projects.store']) !!}

            @include('projects.fields')

        {!! Form::close() !!}
    </div>
@endsection
