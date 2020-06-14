<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hacka CCR</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <div>
            <form action="/api/auth/login" method="POST">
                <input type="text" placeholder="user" name="user" id="name">
                <input type="password" placeholder="password" name="password" id="password">
                <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>
