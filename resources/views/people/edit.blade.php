@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Person</h1>
            </div>
        </div>

{{--        @include('core-templates::common.errors')--}}
        @include('errors.errors')

        <div class="row">
            {!! Form::model($person, ['route' => ['people.update', $person->Id], 'method' => 'patch']) !!}

            @include('people.fields')

            {!! Form::close() !!}
        </div>
@endsection
