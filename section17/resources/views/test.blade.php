<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        @foreach ($users as $user)
            <h4>{{ $user->name }}</h4>
            <p>Address: {{ optional($user->address)->country ?? 'No address available' }}</p>
           <p>Page Count {{ $user->Post_OneToMany->count() }}</p>
            <hr>
        @endforeach
    </div>
  
</body>

</html>
