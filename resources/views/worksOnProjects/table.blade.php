<table class="table table-responsive" id="worksOnProjects-table">
    <thead>
    <th>Person Id</th>
    <th>Project Id</th>
    <th>Role Id</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Deleted At</th>
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($worksOnProjects as $worksOnProject)
        <tr>
            <td>{!! \App\Models\Person::find($worksOnProject->person_id)->Name !!}</td>
            <td>{!! \App\Models\Project::f$worksOnProject->project_id !!}</td>
            <td>{!! $worksOnProject->role_id !!}</td>
            <td>{!! $worksOnProject->created_at !!}</td>
            <td>{!! $worksOnProject->updated_at !!}</td>
            <td>{!! $worksOnProject->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['worksOnProjects.destroy', $worksOnProject->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('worksOnProjects.show', [$worksOnProject->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('worksOnProjects.edit', [$worksOnProject->id]) !!}"
                       class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
