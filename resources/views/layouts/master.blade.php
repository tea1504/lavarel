<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        .header{
            background-color: red;
            height: 100px;
        }
        .footer{
            background-color: red;
            height: 100px;
        }
        .content{
            background-color: #eee;
        }
    </style>
</head>
<body>
    <div class="header">
        header
    </div>
    <div class="content">
        @yield('content')
    </div>
    <div class="footer">
        footer
    </div>
</body>
</html>