var incomeSum = 0;
function incomeRow(row) {
    var tableRow = "<tr >";
    if (row) {
        console.log(row);
        tableRow += "<td>" + row.Description + "</td>";
        tableRow += "<td>" + row.Amount + "</td>";
        tableRow += "<td>" + new Date(row.Date).toLocaleDateString() + "</td>";
        incomeSum += row.Amount;
        // tableRow += "<td> <button class='btn btn-primary' data-toggle='toggle' data-target='act" + row.Id + "'>Activities</button></td> ";
    }
    tableRow += "</tr>";
    tableRow += insertActivities(row.Id, row.activities);
    return tableRow;
}

function incomesToTable(data) {
    tasks = data;
    var table = "<thead><tr><td>Description</td><td>Amount</td><td>Date</td></tr></thead>"
    table += "<tbody>";
    for (var i = 0; i < data.length; i++) {
        table += incomeRow(data[i]);
    }
    table += "</tbody>";
    return table;
}

function getIncomes(projectId) {
    $.get(apiURL+"income/" + projectId, "", function (data, status) {
        incomeSum = 0;
        var ttt = incomesToTable(data.data);
        $("#incomeHolder").html(incomeSum);
        $("#incomes-table").html(ttt);
        console.log(budget);
        var p = 100 * incomeSum / (budget);
        $("#incomeProgress").width(p + "%");
        $("#budgetProgress").width((100 - p) + "%");
        $("#incomeProgressDescription").html(p.toLocaleString()+ "% of budget");
        $("#budgetProgressDescription").html((100 - p).toLocaleString()+ "% budget remaning");
        // $("#incomeProgressDescription").html()
    });
}