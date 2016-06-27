var expenseSum = 0;
function expensesRow(row) {
    var tableRow = "<tr >";
    if (row) {
        console.log(row);
        tableRow += "<td>" + row.Description + "</td>";
        tableRow += "<td>" + row.Amount + "</td>";
        tableRow += "<td>" + new Date(row.Date).toLocaleDateString() + "</td>";
        expenseSum += row.Amount;
        // tableRow += "<td> <button class='btn btn-primary' data-toggle='toggle' data-target='act" + row.Id + "'>Activities</button></td> ";
    }
    tableRow += "</tr>";
    tableRow += insertActivities(row.Id, row.activities);
    return tableRow;
}

function expensesToTable(data) {
    tasks = data;
    var table = "<thead><tr><td>Description</td><td>Amount</td><td>Date</td></tr></thead>"
    table += "<tbody>";
    for (var i = 0; i < data.length; i++) {
        table += expensesRow(data[i]);
    }
    table += "</tbody>";
    return table;
}

function getExpenses(projectId) {
    $.get("/api/v1/expense/" + projectId, "", function (data, status) {
        expenseSum = 0;
        var ttt = expensesToTable(data.data);
        $("#expenseHolder").html(expenseSum);
        $("#expenses-table").html(ttt);
        var t = 100 * expenseSum / (incomeSum + budget);
        $("#expenseProcess").width(t + "%");
        $("#expenseProcessDescription").html(t.toPrecision(2) + " % money spent");
    });
}