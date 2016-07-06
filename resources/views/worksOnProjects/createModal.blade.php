<div id="worksOnProjectCreateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="taskModalTitle">Add worker</h4>
            </div>
            {!! Form::open(['route' => 'worksOnProjects.store']) !!}

            <div class="modal-body">

                <!-- Person Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('person_id', 'Person Id:') !!}
                    {!! Form::select('person_id', $personsA, ['class' => 'form-control']) !!}
                </div>

                <!-- Project Id Field -->
                <div class="form-group col-sm-6 hidden">
                    {!! Form::label('project_id', 'Project Id:') !!}
                    {!! Form::hidden('project_id', $project->Id, ['class' => 'form-control']) !!}
                </div>

                <!-- Role Id Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('role_id', 'Role Id:') !!}
                    {!! Form::select('role_id', $rolesA, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>

    </div>
</div>