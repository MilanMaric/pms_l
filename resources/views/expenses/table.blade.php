<table class="table table-responsive" id="expenses-table">
    <thead>
        <th>Description</th>
        <th>Amount</th>
        <th>Projectid</th>
        <th>Activityid</th>
        <th>Date</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($expenses as $expense)
        <tr>
            <td>{!! $expense->Description !!}</td>
            <td>{!! $expense->Amount !!}</td>
            <td>{!! $expense->ProjectId !!}</td>
            <td>{!! $expense->ActivityId !!}</td>
            <td>{!! $expense->Date !!}</td>
            <td>{!! $expense->created_at !!}</td>
            <td>{!! $expense->updated_at !!}</td>
            <td>{!! $expense->created_by !!}</td>
            <td>{!! $expense->updated_by !!}</td>
            <td>
                {!! Form::open(['route' => ['expenses.destroy', $expense->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('expenses.show', [$expense->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('expenses.edit', [$expense->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
