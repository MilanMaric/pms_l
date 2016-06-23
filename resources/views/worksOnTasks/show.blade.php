@extends('layouts.app')

@section('content')
    @include('worksOnTasks.show_fields')

    <div class="form-group">
           <a href="{!! route('worksOnTasks.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
