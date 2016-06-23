@extends('layouts.app')

@section('content')
    @include('tasks.show_fields')

    <div class="form-group">
           <a href="{!! route('tasks.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
