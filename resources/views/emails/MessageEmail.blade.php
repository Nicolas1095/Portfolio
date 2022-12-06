<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message received</title>
</head>
<body>
    <h1>Mensaje de: {{ $msg["name"] }}</h1>
    {{ $msg["message"] }}
</body>
</html>
