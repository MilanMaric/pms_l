@extends('layouts.app')

@section('content')
    @include('revisions.show_fields')

    <div class="form-group">
           <a href="{!! route('revisions.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
