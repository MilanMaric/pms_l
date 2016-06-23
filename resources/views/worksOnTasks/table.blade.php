<table class="table table-responsive" id="worksOnTasks-table">
    <thead>
        <th>Task Id</th>
        <th>Person Id</th>
        <th>Activity Id</th>
        <th>Startdate</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($worksOnTasks as $worksOnTask)
        <tr>
            <td>{!! $worksOnTask->task_id !!}</td>
            <td>{!! $worksOnTask->person_id !!}</td>
            <td>{!! $worksOnTask->activity_id !!}</td>
            <td>{!! $worksOnTask->StartDate !!}</td>
            <td>{!! $worksOnTask->created_at !!}</td>
            <td>{!! $worksOnTask->updated_at !!}</td>
            <td>{!! $worksOnTask->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['worksOnTasks.destroy', $worksOnTask->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('worksOnTasks.show', [$worksOnTask->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('worksOnTasks.edit', [$worksOnTask->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
