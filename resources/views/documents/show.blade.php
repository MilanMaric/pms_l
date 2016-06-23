@extends('layouts.app')

@section('content')
    @include('documents.show_fields')

    <div class="form-group">
           <a href="{!! route('documents.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
