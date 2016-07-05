@extends('layouts.app')

@section('content')
    @include('errors.errors')
    @include('flash::message')
    <h1>{{$project->Title}}</h1>
    <div class="col-xs-12">
        {{--<div class="col-md-3 col-sm-6 col-xs-12">--}}
        {{--<div class="info-box bg-aqua">--}}
        {{--<span class="info-box-icon">--}}
        {{--<i class="fa fa-money"></i>--}}
        {{--</span>--}}
        {{--<div class="info-box-content">--}}
        {{--<span class="info-box-text">Budget</span>--}}
        {{--<span class="info-box-number">{{$project->Budget}}</span>--}}
        {{--<div class="progress">--}}
        {{--<div class="progress-bar" style="width: 100%" id="budgetProgress"></div>--}}
        {{--</div>--}}
        {{--<span class="progress-description" id="budgetProgressDescription">--}}
        {{--Increase in 30 Days--}}
        {{--</span>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
        <span class="info-box-icon">
           <i class="fa fa-area-chart"></i>
        </span>
                <div class="info-box-content">
                    <span class="info-box-text">Income</span>
                    <span class="info-box-number" id="incomeHolder"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%" id="incomeProgress"></div>
                    </div>
                    <span class="progress-description" id="incomeProgressDescription">
                     Increase in 30 Days
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
        <span class="info-box-icon">
           <i class="fa fa-area-chart"></i>
        </span>
                <div class="info-box-content">
                    <span class="info-box-text">Expenses</span>
                    <span class="info-box-number" id="expenseHolder"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%" id="expenseProcess"></div>
                    </div>
                    <span class="progress-description" id="expenseProcessDescription">
                     Increase in 30 Days
                  </span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12 collapse" id="tasksDiv">
            <div class="info-box bg-yellow">
        <span class="info-box-icon">
           <i class="fa fa-calculator"></i>
        </span>
                <div class="info-box-content">
                    <span class="info-box-text">Tasks</span>
                    <span class="info-box-number" id="tasksHolder"></span>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%" id="tasksProgress"></div>
                    </div>
                    <span class="progress-description" id="tasksProgressDescription">
                     Increase in 30 Days
                  </span>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4">
        <div class="box ">
            <div class="box-header with-border">
                <h3>Project</h3>
            </div>
            <div class="box-body">
                @include('projects.show_fields')
            </div>
        </div>
    </div>



    <div class="col-lg-7">
        <div class="box box-default collapsed-box">
            <div class="box-header with-border">
                <h3>Works on project</h3>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" onclick="getProject({{$project->Id}})"><i
                                class="fa fa-plus fa-2x"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dataTable" id="worksOnProjects-table" role="grid">

                </table>
                @if($role->Id>0 && $role->Id<=3)
                    <a class="btn btn-primary" href="{!! route('worksOnProjects.create') !!}">
                        <i class="fa fa-plus fa-2x"></i>
                    </a>
                @endif
                {{--{{$role}}--}}
            </div>
        </div>
        @if($role->Id>0 && $role->Id<5)
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3>Tasks</h3>
                    <div class="box-tools right">
                        <button class="btn btn-box-tool" data-widget="collapse" onclick="getTasks({{$project->Id}})"><i
                                    class="fa fa-plus fa-2x"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable" id="tasks-table" role="grid">

                    </table>
                    <a class="btn btn-primary" href="{!! route('tasks.create') !!}">
                        <i class="fa fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3>Incomes</h3>
                    <div class="box-tools right">
                        <button class="btn btn-box-tool" data-widget="collapse"
                                onclick="getIncomes({{$project->Id}},{{$project->Budget}})"><i
                                    class="fa fa-plus fa-2x"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable" id="incomes-table" role="grid">

                    </table>
                    <a class="btn btn-primary" href="{!! route('incomes.create') !!}">
                        <i class="fa fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3>Expenses</h3>
                    <div class="box-tools right">
                        <button class="btn btn-box-tool" data-widget="collapse" onclick="getExpenses({{$project->Id}})">
                            <i
                                    class="fa fa-plus fa-2x"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped dataTable" id="expenses-table" role="grid">

                    </table>
                    <a class="btn btn-primary" href="{!! route('expenses.create') !!}">
                        <i class="fa fa-plus fa-2x"></i>
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script>
        getIncomes({{$project->Id}});
        getExpenses({{$project->Id}});
        getTasks({{$project->Id}});
    </script>

    @include('tasks.modal')
    @include('worksOnTasks.modal')


@endsection


@section('scripts')
    <script src="/js/worksOnProject.js"></script>
    <script src="/js/tasks.js"></script>
    <script src="/js/incomes.js"></script>
    <script src="/js/expenses.js"></script>
    <script> var budget ={{$project->Budget}};

        var project ={!! $project !!}</script>
@endsection