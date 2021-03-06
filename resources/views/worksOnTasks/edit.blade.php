@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Edit WorksOnTask</h1>
        </div>
    </div>

    {{--        @include('core-templates::common.errors')--}}
    @include('errors.errors')

    <div class="row">
        {!! Form::model($worksOnTask, ['route' => ['worksOnTasks.update', $worksOnTask->id], 'method' => 'patch']) !!}

        @include('worksOnTasks.fields')

        {!! Form::close() !!}
    </div>
@endsection
