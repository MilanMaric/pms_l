@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Project</h1>
            </div>
        </div>

        {{--@include('core-templates::common.errors')--}}
        @include('errors.errors')

        <div class="row">
            {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}

            @include('projects.fields')

            {!! Form::close() !!}
        </div>
@endsection
