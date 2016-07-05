<div id="taskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="taskModalTitle"></h4>
            </div>
            <div class="modal-body">
                <p var="taskModalDescription"></p>

                <h4>Activities</h4>
                <table class="table table-bordered" id="modalActivitiesTable">
                </table>
                <div class="btn btn-primary" data-toggle="collapse" data-target="#activityFields"><i
                            class="fa fa-plus"></i></div>
                <div id="activityFields" class="collapse">
                    <div class="form-group col-sm-6">
                        {!! Form::label('Description', 'Description:') !!}
                        {!! Form::text('Description', null, ['class' => 'form-control','id'=>'aDescription']) !!}
                    </div>

                    <!-- Date Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('Date', 'Date:') !!}
                        {!! Form::date('Date', null, ['class' => 'form-control','id'=>'aDate']) !!}
                    </div>

                    <!-- Task Id Field -->
                    <div class="form-group col-sm-6">
                        {{--{!! Form::label('task_id', 'Task Id:') !!}--}}
                        {!! Form::hidden('task_id', null, ['class' => 'form-control','id'=>'taskIdField','hidden'=>'true']) !!}
                    </div>


                    <div class="form-group col-sm-6">
                        {!! Form::label('hours','Hours:') !!}
                        {!! Form::number('hours',null,['class'=>'form-control','id'=>'aHours']) !!}
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-group-justified" onclick="saveActivity()">Save new activity
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