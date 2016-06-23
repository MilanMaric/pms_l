<table class="table table-responsive" id="documents-table">
    <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Project Id</th>
        <th>Date</th>
        <th>File</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Deleted At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->Title !!}</td>
            <td>{!! $document->Description !!}</td>
            <td>{!! $document->project_id !!}</td>
            <td>{!! $document->Date !!}</td>
            <td>{!! $document->file !!}</td>
            <td>{!! $document->created_at !!}</td>
            <td>{!! $document->updated_at !!}</td>
            <td>{!! $document->deleted_at !!}</td>
            <td>
                {!! Form::open(['route' => ['documents.destroy', $document->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('documents.show', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('documents.edit', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
