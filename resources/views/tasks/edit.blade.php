@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Task</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'patch']) !!}

            @include('tasks.fields')

            {!! Form::close() !!}
        </div>
@endsection
