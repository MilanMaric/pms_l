@extends('layouts.app')

@section('content')
    <div class="col-lg-4">
        <div class="box">
            <div class="box-header with-border">
                <h3>Project</h3>
            </div>
            <div class="box-body">
                @include('projects.show_fields')

            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="box">
            <div class="box-header with-border">
                <h3>Persons</h3>
            </div>
            <table class="table table-bordered table-striped dataTable" id="worksOnProjects-table">

            </table>
        </div>
    </div>
    <div class="form-group">
        <a href="{!! route('projects.index') !!}" class="btn btn-default">Back</a>
    </div>
    <script>
        getProject({{$project->Id}});
    </script>

@endsection


@section('scripts')
    <script src="/js/worksOnProject.js"></script>
@endsection