<!-- Taskid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('TaskId', 'Taskid:') !!}
    {!! Form::number('TaskId', null, ['class' => 'form-control']) !!}
</div>

<!-- Personid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PersonId', 'Personid:') !!}
    {!! Form::number('PersonId', null, ['class' => 'form-control']) !!}
</div>

<!-- Activityid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ActivityId', 'Activityid:') !!}
    {!! Form::number('ActivityId', null, ['class' => 'form-control']) !!}
</div>

<!-- Startdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('StartDate', 'Startdate:') !!}
    {!! Form::date('StartDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::date('created_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Created By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_by', 'Created By:') !!}
    {!! Form::number('created_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Updated By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_by', 'Updated By:') !!}
    {!! Form::number('updated_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('worksOnTasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
