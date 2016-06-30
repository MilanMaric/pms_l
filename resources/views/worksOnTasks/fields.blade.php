{{--<!-- Task Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('task_id', 'Task Id:') !!}--}}
    {{--{!! Form::number('task_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Person Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('person_id', 'Person Id:') !!}
    {!! Form::number('person_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Activity Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('activity_id', 'Activity Id:') !!}
    {!! Form::number('activity_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Startdate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('StartDate', 'Startdate:') !!}
    {!! Form::date('StartDate', null, ['class' => 'form-control']) !!}
</div>

{{--<!-- Created At Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('created_at', 'Created At:') !!}--}}
    {{--{!! Form::date('created_at', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Updated At Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('updated_at', 'Updated At:') !!}--}}
    {{--{!! Form::date('updated_at', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<!-- Deleted At Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('deleted_at', 'Deleted At:') !!}--}}
    {{--{!! Form::date('deleted_at', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('worksOnTasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
