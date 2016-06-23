@extends('layouts.app')

@section('content')
    @include('expenses.show_fields')

    <div class="form-group">
           <a href="{!! route('expenses.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
