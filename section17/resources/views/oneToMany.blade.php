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
            <p>Address : {{ $user->address_OneToMany }}</p>
            <hr>
        @endforeach
    </div>

    {{-- <div>
        @foreach ($address as $address)
            <h4>{{ $address->country }}</h4>
            <p>User: {{ optional($address->user)->name ?? 'No name available' }}</p>
            <hr>
        @endforeach
    </div> --}}
</body>

</html>
