@extends('layouts.app')

@section('content')
    <h1>{{$project->Title}}</h1>
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
                <h3>Persons</h3>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse" onclick="getTasks({{$project->Id}})"><i
                                class="fa fa-plus fa-2x"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped dataTable" id="worksOnProjects-table" role="grid">

                </table>
            </div>
        </div>

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
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-green">
        <span class="info-box-icon">
           <i class="fa fa-area-chart"></i>
        </span>
            <div class="info-box-content">
                <span class="info-box-text">Budget</span>
                <span class="info-box-number">{{$project->Budget}}</span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%" id="budget"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        getProject({{$project->Id}});
    </script>



@endsection


@section('scripts')
    <script src="/js/worksOnProject.js"></script>
    <script src="/js/tasks.js"></script>
@endsection