<div id="incomesCreateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="taskModalTitle">Add income</h4>
            </div>
            {!! Form::open(['route' => 'incomes.store']) !!}
            <div class="modal-body">


                <div class="form-group col-sm-6 hidden">
                    {!! Form::label('project_id', 'Project :') !!}
                    {!! Form::select('project_id', \App\Models\Project::getProjectSelectArray([$project]), ['class' => 'form-control']) !!}
                </div>

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


            </div>
            <div class="modal-footer">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{!! route('incomes.index') !!}" class="btn btn-default">Cancel</a>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>