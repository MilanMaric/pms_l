@extends('layouts.app')

@section('content')
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
    <div class="col-lg-8">
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