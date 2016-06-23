@extends('layouts.app')

@section('content')
    @include('incomes.show_fields')

    <div class="form-group">
           <a href="{!! route('incomes.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
