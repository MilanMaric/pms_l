@extends('layouts.app')

@section('content')
    @include('activities.show_fields')

    <div class="form-group">
           <a href="{!! route('activities.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
