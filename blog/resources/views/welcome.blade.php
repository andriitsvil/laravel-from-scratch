<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>
<body class="antialiased">
<div>
    <h1>My Site</h1>
    <ol>
        @can ('edit_forum')
            <li>
                <a href="#"> edit forum</a>
            </li>
        @endcan
        @can ('view_reports')
            <li>
                <a href="/reports"> view reports</a>
            </li>
        @endcan
        @can ('view_all')
            <li>
                <a href="#"> all data</a>
            </li>
        @endcan
    </ol>
</div>
</body>
</html>
