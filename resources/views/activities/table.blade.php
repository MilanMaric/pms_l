<table class="table table-responsive" id="activities-table">
    <thead>
        <th>Description</th>
        <th>Date</th>
        <th>Taskid</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($activities as $activity)
        <tr>
            <td>{!! $activity->Description !!}</td>
            <td>{!! $activity->Date !!}</td>
            <td>{!! $activity->TaskId !!}</td>
            <td>{!! $activity->created_at !!}</td>
            <td>{!! $activity->updated_at !!}</td>
            <td>{!! $activity->created_by !!}</td>
            <td>{!! $activity->updated_by !!}</td>
            <td>
                {!! Form::open(['route' => ['activities.destroy', $activity->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('activities.show', [$activity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('activities.edit', [$activity->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
