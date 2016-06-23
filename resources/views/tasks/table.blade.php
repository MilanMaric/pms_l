<table class="table table-responsive" id="tasks-table">
    <thead>
        <th>Projectid</th>
        <th>Description</th>
        <th>Start</th>
        <th>End</th>
        <th>Deadline</th>
        <th>Title</th>
        <th>Manhour</th>
        <th>Percentagedone</th>
        <th>Hours</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{!! $task->ProjectId !!}</td>
            <td>{!! $task->Description !!}</td>
            <td>{!! $task->Start !!}</td>
            <td>{!! $task->End !!}</td>
            <td>{!! $task->Deadline !!}</td>
            <td>{!! $task->Title !!}</td>
            <td>{!! $task->ManHour !!}</td>
            <td>{!! $task->PercentageDone !!}</td>
            <td>{!! $task->Hours !!}</td>
            <td>{!! $task->created_at !!}</td>
            <td>{!! $task->updated_at !!}</td>
            <td>{!! $task->deleted_at !!}</td>
            <td>{!! $task->created_by !!}</td>
            <td>{!! $task->updated_by !!}</td>
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
