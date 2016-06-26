{{--<!-- Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('Id', 'Id:') !!}--}}
{{--{!! Form::number('Id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

        <!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project:') !!}
    {!! Form::select('project_id',$projects, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Start', 'Start:') !!}
    {!! Form::date('Start', null, ['class' => 'form-control']) !!}
</div>

<!-- End Field -->
<div class="form-group col-sm-6">
    {!! Form::label('End', 'End:') !!}
    {!! Form::date('End', null, ['class' => 'form-control']) !!}
</div>

<!-- Deadline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Deadline', 'Deadline:') !!}
    {!! Form::date('Deadline', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Title', 'Title:') !!}
    {!! Form::text('Title', null, ['class' => 'form-control']) !!}
</div>

<!-- Manhour Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ManHour', 'Manhour:') !!}
    {!! Form::number('ManHour', null, ['class' => 'form-control']) !!}
</div>

<!-- Percentagedone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PercentageDone', 'Percentagedone:') !!}
    {!! Form::number('PercentageDone', null, ['class' => 'form-control']) !!}
</div>

<!-- Hours Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Hours', 'Hours:') !!}
    {!! Form::number('Hours', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>
