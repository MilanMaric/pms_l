{{--<!-- Id Field -->--}}
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('Id', 'Id:') !!}--}}
{{--{!! Form::number('Id', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('LastName', 'Lastname:') !!}
    {!! Form::text('LastName', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Address', 'Address:') !!}
    {!! Form::text('Address', null, ['class' => 'form-control']) !!}
</div>

<!-- Phonenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('PhoneNumber', 'Phonenumber:') !!}
    {!! Form::text('PhoneNumber', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobilenumber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('MobileNumber', 'Mobilenumber:') !!}
    {!! Form::phone('MobileNumber', null, ['class' => 'form-control']) !!}
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

        <!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User:') !!}
    {!! Form::select('user_id', $users, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('people.index') !!}" class="btn btn-default">Cancel</a>
</div>
