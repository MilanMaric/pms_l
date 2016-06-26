@extends('layouts.app')

@section('content')
    @include('projects.show_fields')

    <table class="table table-responsive" id="worksOnProjects-table">

    </table>
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