@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Expense</h1>
            </div>
        </div>

{{--        @include('core-templates::common.errors')--}}

        <div class="row">
            {!! Form::model($expense, ['route' => ['expenses.update', $expense->id], 'method' => 'patch']) !!}

            @include('expenses.fields')

            {!! Form::close() !!}
        </div>
@endsection
