<!-- Person Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('person_id', 'Person Id:') !!}
    {!! Form::select('person_id', $persons, ['class' => 'form-control']) !!}
</div>

<!-- Project Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('project_id', 'Project Id:') !!}
    {!! Form::select('project_id', $projects, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::select('role_id', $roles, ['class' => 'form-control']) !!}
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
    <a href="{!! route('worksOnProjects.index') !!}" class="btn btn-default">Cancel</a>
</div>
