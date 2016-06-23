<!-- Id Field -->
<div class="form-group">
    {!! Form::label('Id', 'Id:') !!}
    <p>{!! $activity->Id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Description:') !!}
    <p>{!! $activity->Description !!}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('Date', 'Date:') !!}
    <p>{!! $activity->Date !!}</p>
</div>

<!-- Task Id Field -->
<div class="form-group">
    {!! Form::label('task_id', 'Task Id:') !!}
    <p>{!! $activity->task_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $activity->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $activity->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $activity->deleted_at !!}</p>
</div>

