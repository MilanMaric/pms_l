<!-- Task Id Field -->
<div class="form-group">
    {!! Form::label('task_id', 'Task Id:') !!}
    <p>{!! $worksOnTask->task_id !!}</p>
</div>

<!-- Person Id Field -->
<div class="form-group">
    {!! Form::label('person_id', 'Person Id:') !!}
    <p>{!! $worksOnTask->person_id !!}</p>
</div>

<!-- Activity Id Field -->
<div class="form-group">
    {!! Form::label('activity_id', 'Activity Id:') !!}
    <p>{!! $worksOnTask->activity_id !!}</p>
</div>

<!-- Startdate Field -->
<div class="form-group">
    {!! Form::label('StartDate', 'Startdate:') !!}
    <p>{!! $worksOnTask->StartDate !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $worksOnTask->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $worksOnTask->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $worksOnTask->deleted_at !!}</p>
</div>

