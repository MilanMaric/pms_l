@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Revision</h1>
            </div>
        </div>

{{--        @include('core-templates::common.errors')--}}

        <div class="row">
            {!! Form::model($revision, ['route' => ['revisions.update', $revision->id], 'method' => 'patch']) !!}

            @include('revisions.fields')

            {!! Form::close() !!}
        </div>
@endsection
