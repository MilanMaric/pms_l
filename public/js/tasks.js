function tasksRow(row) {
    var tableRow = "<tr>";
    if (row) {
        tableRow += "<th>" + row.Title + "</th>";
        tableRow += "<th>" + row.Description + "</th>";
        tableRow += "<th>" + row.Start + "</th>";
        tableRow += "<th>" + row.End + "</th>";
        tableRow += "<th>" + row.ManHour + "</th>";
        tableRow += "<th>" + row.PercentageDone + "</th>";
        tableRow += "<th>" + row.Hours + "</th>";
    }
    tableRow += "</tr>";
    return tableRow;
}
var tasks;
function tasksToTable(data) {
    tasks = data;
    var table = "<tr><td>Title</td><td>Description</td><td>Start</td><td>End</td><td>Man hours</td><td>Done</td></td></tr>"
    for (var i = 0; i < data.length; i++) {
        table += tasksRow(data[i]);
    }
    return table;
}

function getTasks(projectId) {
    $.get("/api/v1/task/" + projectId, "", function (data, status) {
        $("#tasks-table").html(tasksToTable(data.data));
    });
}