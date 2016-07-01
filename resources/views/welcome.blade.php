<!DOCTYPE html>
<html>
<head>
    <title>PMS</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            /*font-weight: 300;*/
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title"><i class="fa fa-eye fa-3x"></i></div>
        <div class="title">PMS</div>
        <div>Project management system</div>
        <hr style='width:100%;'>
        <a href="{!! route('projects.index') !!}" class="btn" style="padding-top: 80px">Login</a>
        {{--<a                href='register'>Register</a>--}}
    </div>
</div>
</body>
</html>
