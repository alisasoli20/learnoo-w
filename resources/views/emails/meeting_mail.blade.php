<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learnoo</title>
</head>
<body>
    <h1>Hello</h1>
    <p>You have been invited to a meeting by your instructor from learnoo.com</p>
    <p>You can join throw the link </p>
    <p>{{ $meeting['join_url'] }}</p>
    <p>Or you can join through Meeting Id and Password</p>
    <p>Meeting Id: <strong>{{ $meeting['meeting_id'] }}</strong></p>
    <p>Meeting Password: <strong>{{ $meeting['meeting_password'] }}</strong></p>
</body>
</html>
