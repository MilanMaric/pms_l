@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Works_On_Project</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($worksOnProject, ['route' => ['worksOnProjects.update', $worksOnProject->id], 'method' => 'patch']) !!}

            @include('worksOnProjects.fields')

            {!! Form::close() !!}
        </div>
@endsection
