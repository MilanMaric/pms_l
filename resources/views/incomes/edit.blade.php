@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Income</h1>
            </div>
        </div>

{{--        @include('core-templates::common.errors')--}}
        @include('errors.errors')

        <div class="row">
            {!! Form::model($income, ['route' => ['incomes.update', $income->Id], 'method' => 'patch']) !!}

            @include('incomes.fields')

            {!! Form::close() !!}
        </div>
@endsection
