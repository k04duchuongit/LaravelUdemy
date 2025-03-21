<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>i am home</h1>
    <a href="{{ route('user',['id'=>6,'slug'=>'idnguoidung']) }}">User</a>
    <a href="{{ route('about') }}">About</a>
</body>
</html>