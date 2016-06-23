<!-- Id Field -->
<div class="form-group">
    {!! Form::label('Id', 'Id:') !!}
    <p>{!! $document->Id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('Title', 'Title:') !!}
    <p>{!! $document->Title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Description:') !!}
    <p>{!! $document->Description !!}</p>
</div>

<!-- Project Id Field -->
<div class="form-group">
    {!! Form::label('project_id', 'Project Id:') !!}
    <p>{!! $document->project_id !!}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('Date', 'Date:') !!}
    <p>{!! $document->Date !!}</p>
</div>

<!-- File Field -->
<div class="form-group">
    {!! Form::label('file', 'File:') !!}
    <p>{!! $document->file !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $document->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $document->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $document->deleted_at !!}</p>
</div>

