<!DOCTYPE HTML>
<html>
<head><title>Hello</title></head>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        border: 1px solid black;
    }

    thead {
        height: 20px;
    }

    thead {
        background-color: #f1f1f1;
    }

    .project-details {
        background-color: #aaa;
    }

    .wop {
        background-color: #bbb;
    }

    .in {
        background-color: #ccc;
    }

    .ex {
        background-color: #ddd;
    }

    .tasks{
        background-color: #ddd;
    }
</style>

<body>
<div class="project-details">
    <h1>{{$project->Title}}</h1>
    <p>Start: {{$project->StartDate}}</p>
    <p>End: {{$project->EndDate}}</p>
    <p>Description: {{$project->Description}}</p>
    <p>Budget: {{$project->Budget}}</p>
</div>
<hr>
<div class="wop">
    <h2>Works on project</h2>
    <table>
        <thead>
        <tr>
            <td>
                Name
            </td>
            <td>
                Last name
            </td>
            <td>
                Address
            </td>
            <td>
                Phone number
            </td>
            <td>
                Mobile number
            </td>
            <td>
                Role
            </td>
        </tr>
        </thead>
        <tbody>
        @foreach($project->persons as $person)
            <tr>
                <td>
                    {{ $person->Name}}
                </td>
                <td>
                    {{ $person->LastName}}
                </td>
                <td>
                    {{ $person->Address}}
                </td>
                <td>
                    {{ $person->PhoneNumber}}
                </td>
                <td>
                    {{ $person->MobileNumber}}
                </td>
                <td>
                    {{$person->role}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<hr>
<div class="in">
    {{--Incomes--}}
    <h2>Incomes</h2>

    <table>
        <thead>
        <tr>
            <td>Description</td>
            <td>Amount</td>
            <td>Date</td>
        </tr>
        </thead>
        <tbody>
        @foreach($project->incomes as $income)
            <tr>
                <td>{{$income->Description}}</td>
                <td>{{$income->Amount}}</td>
                <td>{{$income->Date}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<hr>

<div class="ex">
    <h2>Expenses</h2>

    <table>
        <thead>
        <tr>
            <td>Description</td>
            <td>Amount</td>
            <td>Date</td>
        </tr>
        </thead>
        <tbody>
        @foreach($project->expenses as $income)
            <tr>
                <td>{{$income->Description}}</td>
                <td>{{$income->Amount}}</td>
                <td>{{$income->Date}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<hr>
<div class="tasks">
    <h2> Tasks</h2>

    @foreach($project->tasks as $task)
        <h3>{{$task->Title}}</h3>
        <p>Start: {{$task->Start}}</p>
        <p>End: {{$task->End}}</p>
        <p>Deadline: {{$task->Deadline}}</p>
        <p>Percentage done: {{$task->PercentageDone}}</p>
        <table>
            <thead>
            <tr>
                <td>
                    Description
                </td>
                <td>
                    Date
                </td>
                <td>
                    Hours
                </td>
            </tr>
            </thead>
            <tbody>
            @foreach($task->activities as $activity)
                <tr>
                    <td>
                        {{$activity->Description}}
                    </td>
                    <td>
                        {{$activity->Date}}
                    </td>
                    <td>
                        {{$activity->hours}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
</div>

</body>
</html>