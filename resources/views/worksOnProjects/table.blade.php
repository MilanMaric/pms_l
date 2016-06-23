<table class="table table-responsive" id="worksOnProjects-table">
    <thead>
        <th>Personid</th>
        <th>Projectid</th>
        <th>Role</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($worksOnProjects as $worksOnProject)
        <tr>
            <td>{!! $worksOnProject->PersonId !!}</td>
            <td>{!! $worksOnProject->ProjectId !!}</td>
            <td>{!! $worksOnProject->role !!}</td>
            <td>{!! $worksOnProject->created_at !!}</td>
            <td>{!! $worksOnProject->updated_at !!}</td>
            <td>{!! $worksOnProject->deleted_at !!}</td>
            <td>{!! $worksOnProject->created_by !!}</td>
            <td>{!! $worksOnProject->updated_by !!}</td>
            <td>
                {!! Form::open(['route' => ['worksOnProjects.destroy', $worksOnProject->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('worksOnProjects.show', [$worksOnProject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('worksOnProjects.edit', [$worksOnProject->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
