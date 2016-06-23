<table class="table table-responsive" id="documents-table">
    <thead>
        <th>Title</th>
        <th>Description</th>
        <th>Projectid</th>
        <th>Date</th>
        <th>Blobfajl</th>
        <th>Size</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Created By</th>
        <th>Updated By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($documents as $document)
        <tr>
            <td>{!! $document->Title !!}</td>
            <td>{!! $document->Description !!}</td>
            <td>{!! $document->ProjectId !!}</td>
            <td>{!! $document->Date !!}</td>
            <td>{!! $document->BlobFajl !!}</td>
            <td>{!! $document->Size !!}</td>
            <td>{!! $document->created_at !!}</td>
            <td>{!! $document->updated_at !!}</td>
            <td>{!! $document->created_by !!}</td>
            <td>{!! $document->updated_by !!}</td>
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
