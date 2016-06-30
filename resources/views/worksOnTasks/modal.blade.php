<div id="worksOnTaskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="taskModalTitle"></h4>
            </div>
            <div class="modal-body">
                <h4>People</h4>
                <table class="table table-bordered" id="modalPeopleTable">
                </table>
                <div class="btn btn-primary" data-toggle="collapse" data-target="#peopleFields"><i
                            class="fa fa-plus"></i></div>
                <div id="peopleFields" class="collapse">
                    <!-- Person Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('person_id', 'Person:') !!}
                        {!! Form::select('person_id', [0=>"Select one"], ['class' => 'form-control col-xs-12','id'=>'wModalPersonId']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::hidden('task_id', null, ['class' => 'form-control','id'=>'wModalTaskId']) !!}
                    </div>

                    <!-- Activity Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('activity_id', 'Activity Id:') !!}
                        {!! Form::select('activity_id', [0=>"Select one"], ['class' => 'form-control col-xs-12','id'=>'wModalActivities']) !!}
                    </div>

                    <!-- Startdate Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('StartDate', 'Start date:') !!}
                        {!! Form::date('Start date', null, ['class' => 'form-control','id'=>'wModalStartDate']) !!}
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-group-justified" onclick="saveWorkOnTask()">Assign to people
                        </button>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>