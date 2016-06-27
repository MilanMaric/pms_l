{{--<!-- Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('Id', 'Id:') !!}--}}
{{--{!! Form::number('Id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

        <!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Amount', 'Amount:') !!}
    {!! Form::number('Amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project:') !!}
    {!! Form::select('project_id', $projects, ['class' => 'form-control']) !!}
</div>

{{--<!-- Activity Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('activity_id', 'Activity Id:') !!}--}}
{{--{!! Form::number('activity_id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

        <!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Date', 'Date:') !!}
    {!! Form::date('Date', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('expenses.index') !!}" class="btn btn-default">Cancel</a>
</div>
