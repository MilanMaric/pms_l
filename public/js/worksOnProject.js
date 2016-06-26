function roleToString(role) {
    switch (role) {
        case 1:
            return "admin";
        default:
            return "admin";
    }
}

function dataRow(row) {
    var tableRow = "<tr>";
    if (row.person) {
        tableRow += "<td>" + row.person.Name + "</td>";
        tableRow += "<td>" + row.person.LastName + "</td>";
        tableRow += "<td>" + row.person.MobileNumber + "</td>";
        tableRow += "<td>" + row.person.PhoneNumber + "</td>";
        tableRow += "<td>" + roleToString(row.person.role) + "</td>";
    }
    tableRow += "</tr>";
    return tableRow;
}
function dataToTable(data) {
    var table = "<tr><td>Name</td><td>Last name</td><td>Mobile number</td><td>Phone number</td></tr>"
    for (var i = 0; i < data.length; i++) {
        table += dataRow(data[i]);
    }
    return table;
}

function getProject(projectId) {
    $.get("/api/v1/worksOnProjects/" + projectId, "", function (data, status) {
        $("#worksOnProjects-table").html(dataToTable(data.data));
    });
}
