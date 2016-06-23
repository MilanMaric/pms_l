<table class="table table-responsive" id="people-table">
    <thead>
        <th>Name</th>
        <th>Lastname</th>
        <th>Privileges</th>
        <th>Address</th>
        <th>Phonenumber</th>
        <th>Mobilenumber</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($people as $person)
        <tr>
            <td>{!! $person->Name !!}</td>
            <td>{!! $person->LastName !!}</td>
            <td>{!! $person->privileges !!}</td>
            <td>{!! $person->Address !!}</td>
            <td>{!! $person->PhoneNumber !!}</td>
            <td>{!! $person->MobileNumber !!}</td>
            <td>{!! $person->created_at !!}</td>
            <td>{!! $person->updated_at !!}</td>
            <td>{!! $person->created_by !!}</td>
            <td>{!! $person->updated_by !!}</td>
            <td>
                {!! Form::open(['route' => ['people.destroy', $person->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('people.show', [$person->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('people.edit', [$person->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
