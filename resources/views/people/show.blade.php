@extends('layouts.app')

@section('content')
    @include('people.show_fields')

    <div class="form-group">
           <a href="{!! route('people.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
