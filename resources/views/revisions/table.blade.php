<table class="table table-responsive" id="revisions-table">
    <thead>
        <th>Date</th>
        <th>Number</th>
        <th>Description</th>
        <th>Documentid</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($revisions as $revision)
        <tr>
            <td>{!! $revision->Date !!}</td>
            <td>{!! $revision->Number !!}</td>
            <td>{!! $revision->description !!}</td>
            <td>{!! $revision->DocumentId !!}</td>
            <td>{!! $revision->created_at !!}</td>
            <td>{!! $revision->updated_at !!}</td>
            <td>{!! $revision->deleted_at !!}</td>
            <td>{!! $revision->created_by !!}</td>
            <td>{!! $revision->updated_by !!}</td>
            <td>
                {!! Form::open(['route' => ['revisions.destroy', $revision->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('revisions.show', [$revision->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('revisions.edit', [$revision->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
