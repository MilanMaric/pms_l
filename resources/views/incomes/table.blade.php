<table class="table table-responsive" id="incomes-table">
    <thead>
        <th>Project Id</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Activity Id</th>
        <th>Date</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($incomes as $income)
        <tr>
            <td>{!! $income->project_id !!}</td>
            <td>{!! $income->Description !!}</td>
            <td>{!! $income->Amount !!}</td>
            <td>{!! $income->activity_id !!}</td>
            <td>{!! $income->Date !!}</td>
            <td>{!! $income->created_at !!}</td>
            <td>{!! $income->updated_at !!}</td>
            <td>{!! $income->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['incomes.destroy', $income->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('incomes.show', [$income->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('incomes.edit', [$income->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
