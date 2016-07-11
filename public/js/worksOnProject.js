function roleToString(role) {
    console.log("Role: " + role);
    switch (role) {
        case 1:
            return "Creator";
        case 2:
            return "Manager";
        case 3:
            return "Administration";
        case 4:
            return "Worker";
        case 5:
            return "Customer";
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
        tableRow += "<td>" + roleToString(row.role_id) + "</td>";
        tableRow += "<td><a href='../people/" + row.person.Id + "'><i class='fa fa-eye'></i></a></td>"
    }
    tableRow += "</tr>";
    return tableRow;
}

function dataToTable(data) {
    var table = "<tr><td>Name</td><td>Last name</td><td>Mobile number</td><td>Phone number</td><td>Role</td></td></tr>"
    for (var i = 0; i < data.length; i++) {
        table += dataRow(data[i]);
    }
    return table;
}

function getProject(projectId) {
    $.get(apiURL + "worksOnProject/" + projectId, "", function (data, status) {
        $("#worksOnProjects-table").html(dataToTable(data.data));
    });
}
