<!-- Id Field -->
<div class="form-group">
    {!! Form::label('Id', 'Id:') !!}
    <p>{!! $expense->Id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('Description', 'Description:') !!}
    <p>{!! $expense->Description !!}</p>
</div>

<!-- Amount Field -->
<div class="form-group">
    {!! Form::label('Amount', 'Amount:') !!}
    <p>{!! $expense->Amount !!}</p>
</div>

<!-- Projectid Field -->
<div class="form-group">
    {!! Form::label('ProjectId', 'Projectid:') !!}
    <p>{!! $expense->ProjectId !!}</p>
</div>

<!-- Activityid Field -->
<div class="form-group">
    {!! Form::label('ActivityId', 'Activityid:') !!}
    <p>{!! $expense->ActivityId !!}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('Date', 'Date:') !!}
    <p>{!! $expense->Date !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $expense->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $expense->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $expense->deleted_at !!}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{!! $expense->created_by !!}</p>
</div>

<!-- Updated By Field -->
<div class="form-group">
    {!! Form::label('updated_by', 'Updated By:') !!}
    <p>{!! $expense->updated_by !!}</p>
</div>

