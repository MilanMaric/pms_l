<table class="table table-responsive table-bordered" id="projects-table">
    <thead>
    <th>Title</th>
    <th>Startdate</th>
    <th>Enddate</th>
    <th>Description</th>
    <th>Budget</th>
    {{--<th>Created At</th>--}}
    {{--<th>Updated At</th>--}}
    {{--<th>Deleted At</th>--}}
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->Title !!}</td>
            <td>{!! $project->StartDate !!}</td>
            <td>{!! $project->EndDate !!}</td>
            <td>{!! $project->Description !!}</td>
            <td>{!! $project->Budget !!}</td>
            {{--            <td>{!! $project->created_at !!}</td>--}}
            {{--            <td>{!! $project->updated_at !!}</td>--}}
            {{--            <td>{!! $project->deleted_at !!}</td>--}}
            <td>
                {!! Form::open(['route' => ['projects.destroy', $project->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('projects.show', [$project->Id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('projects.edit', [$project->Id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
