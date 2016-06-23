@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Document</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($document, ['route' => ['documents.update', $document->id], 'method' => 'patch']) !!}

            @include('documents.fields')

            {!! Form::close() !!}
        </div>
@endsection
