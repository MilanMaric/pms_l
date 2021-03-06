<table class="table table-responsive" id="tasks-table">
    <thead>
    <th>Project Id</th>
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
    <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{!! $task->project_id !!}</td>
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
            <td>
                {!! Form::open(['route' => ['tasks.destroy', $task->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tasks.show', [$task->Id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tasks.edit', [$task->Id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
