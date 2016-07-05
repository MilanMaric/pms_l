var sumDone = 0;
var tasksCount = 0;
function insertActivities(taskId, activities) {
    var table = "";
    if (activities && activities.length > 0) {
        // table += "<tr>";
        //
        // table += "<td id=act" + taskId + " colspan='7' >";
        // table += "<h4>Activities</h4>";
        // table += "<table class='table table-bordered'>"
        table += "<tr><td>Description</td><td>Date</td><td>Hours</td></tr>";
        for (var i = 0; i < activities.length; i++) {
            table += "<tr><td>" + activities[i].Description + "</td><td>" + new Date(activities[i].Date).toLocaleDateString() + "</td>" +
                "<td>" + activities[i].hours + "</td></tr>";

        }
        // table += "</table>";
        // table += "</td>";
        // table += "</tr>";
    }
    return table;
}


function openModal(task) {
    $("#taskModal").modal({show: true});
    $("#taskModalTitle").html(task.Title);
    $("#taskModalDescription").html(task.Description);
    $("#modalActivitiesTable").html(insertActivities(task.Id, task.activities));
    $("#taskIdField").val(task.Id);
}

function saveActivity() {
    var task_id = $("#taskIdField").val();
    var description = $("#aDescription").val();
    var Date = $("#aDate").val();
    var activity = {task_id: task_id, Description: description, Date: Date};
    $.post("/api/v1/activities", activity).success(function (data) {
        $("#taskModal").modal({show: false});
        getTasks();
    }).error(function (err) {
        $("#taskModal").modal({show: false});
        getTasks();
    });
}

function getPeopleRow(wot) {
    var table = "";
    table += "<tr>";
    table += "<td>";
    table += wot.person.Name;
    table += "</td>";
    table += "<td>";
    table += wot.person.LastName;
    table += "</td>";
    table += "<td>";
    table += wot.activity.Description;
    table += "</td>";
    table += "<td>";
    table += wot.StartDate;
    table += "<td>";
    return table;
}
function getPeopleTable(wot) {
    var table = "";
    table += "<tr><td>Name</td><td>LastName</td><td>Activity description</td><td>Start date</td></tr>";

    for (var i = 0; i < wot.length; i++) {
        table += getPeopleRow(wot[i]);
    }
    return table;
}

var gtask;

function openPeopleModal(task) {
    gtask = task;
    $("#worksOnTaskModal").modal({show: true});
    $.get('/api/v1/worksOnTasks/' + task.Id).success(function (data) {
        $("#modalPeopleTable").html(getPeopleTable(data.data));
    });
    var options = [];
    for (var i = 0; i < task.activities.length; i++) {
        var option = $("<option>");
        option.attr('value', task.activities[i].Id).text(task.activities[i].Description);
        options.push(option);
    }
    $("#activity_id").html(options);
    $.get('/api/v1/personas/' + project.Id).success(function (data) {
        var options = [];
        for (var i = 0; i < data.data.length; i++) {
            var option = $("<option>");
            option.attr('value', data.data[i].person.Id).text(data.data[i].person.Name + data.data[i].person.LastName);
            options.push(option);
        }
        $("#person_id").html(options);
    });

}

function saveWorkOnTask() {
    var taskId = gtask.Id;
    var personId = $("#person_id").val();
    // var taskId = $("#wModalTaskId").val();
    var activityId = $("#activity_id").val();
    var start = $("#wModalStartDate").val();
    var wot = {person_id: personId, task_id: taskId, activity_id: activityId, StartDate: start, task_id: taskId};
    $.post("/api/v1/worksOnTasks", wot).success(function (data) {
        if (data.data && data.success) {
            $("#modalPeopleTable").append(getPeopleRow(data.data));
        }
    });
}

function tasksRow(row) {
    var tableRow = "<tr >";
    if (row) {
        tableRow += "<td>" + row.Title + "</td>";
        tableRow += "<td>" + row.Description + "</td>";
        tableRow += "<td>" + new Date(row.Start).toLocaleDateString() + "</td>";
        tableRow += "<td>" + new Date(row.End).toLocaleDateString() + "</td>";
        tableRow += "<td>" + row.ManHour + "</td>";
        tableRow += "<td>" + row.Hours + "</td>";
        sumDone += row.PercentageDone;
        tasksCount++;
        tableRow += "<td>";
        tableRow += ' <div class="progress progress-xs"><div class="progress-bar progress-bar-yellow" style="width: ' + row.PercentageDone + '%"></div></div>';
        tableRow += "</td>";
        tableRow += "<td>";
        //buttons
        tableRow += "<a href='/tasks/" + row.Id + "/edit' role='button' class='btn btn-primary'><i class='glyphicon glyphicon-edit'></i></a>"
        tableRow += "<button  class='btn btn-info' role='button' onclick='openModal(" + JSON.stringify(row) + ")'" +
            "><i class='fa fa-tasks'></i> </button> " +
            "<button class='btn btn-info' onclick='openPeopleModal(" + JSON.stringify(row) + ")'>" +
            "<i class='fa fa-user'></i></button>";
        tableRow += "</td>";
        // tableRow += "<td> <button class='btn btn-primary' data-toggle='toggle' data-target='act" + row.Id + "'>Activities</button></td> ";
    }
    tableRow += "</tr>";
    // tableRow += insertActivities(row.Id, row.activities);
    return tableRow;
}

var tasks;
function tasksToTable(data) {
    tasks = data;
    var table = "<thead><tr><td>Title</td><td>Description</td><td>Start</td><td>End</td><td>Man hours</td><td>Hours</td><td>Done</td></tr></thead>"
    table += "<tbody>";
    for (var i = 0; i < data.length; i++) {
        table += tasksRow(data[i]);
    }
    table += "</tbody>";
    return table;
}

function getTasks(projectId) {
    $.get("/api/v1/task/" + projectId, "", function (data, status) {
        sumDone = 0;
        tasksCount = 0;
        var ttt = tasksToTable(data.data);
        $("#tasks-table").html(ttt);
        var x = tasksCount ? sumDone / tasksCount : 0;
        console.log(sumDone);
        $("#tasksDiv").show(100);
        $("#tasksHolder").html(tasksCount);
        $("#tasksProgress").width(x + "%");
        $("#tasksProgressDescription").html("Average " + x.toLocaleString() + " % done on the tasks");
    });
}