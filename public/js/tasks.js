var sumDone = 0;
function insertActivities(taskId, activities) {
    var table = "";
    if (activities && activities.length > 0) {
        table += "<tr>";

        table += "<td id=act" + taskId + " colspan='7' >";
        table += "<h4>Activities</h4>";
        table += "<table class='table table-bordered'>"
        table += "<tr><td>Description</td><td>Date</td></tr>";
        for (var i = 0; i < activities.length; i++) {
            table += "<tr><td>" + activities[i].Description + "</td><td>" + new Date(activities[i].Date).toLocaleDateString() + "</td></tr>";
        }
        table += "</table>";
        table += "</td>";
        table += "</tr>";
    }
    return table;
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
        sumDone += row.Done;
        tableRow += "<td>";
        tableRow += ' <div class="progress progress-xs"><div class="progress-bar progress-bar-yellow" style="width: ' + row.PercentageDone + '%"></div></div>';
        tableRow += "</td>";
        // tableRow += "<td> <button class='btn btn-primary' data-toggle='toggle' data-target='act" + row.Id + "'>Activities</button></td> ";
    }
    tableRow += "</tr>";
    tableRow += insertActivities(row.Id, row.activities);
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
        var ttt = tasksToTable(data.data);
        $("#tasks-table").html(ttt);
    });
}