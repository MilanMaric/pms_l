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

function openPeopleModal(task) {
    $("#worksOnTaskModal").modal({show: true});
    
}

function tasksRow(row) {
    var tableRow = "<tr >";
    if (row) {
        console.log(row);
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
        $("#tasksProgressDescription").html("Average " + x.toPrecision(2) + " % done on the tasks");
    });
}