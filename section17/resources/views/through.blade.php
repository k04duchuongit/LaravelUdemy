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
        <h3> {{ $country->name }}</h3>
        <ul>
            @foreach ($country->states as $state)
                <h4>
                    Thanh Pho : {{ $state->name }}
                </h4>
                <div> Cac huyen :</div>
                <ul>
                    @foreach ($country->cities as $city)
                        <li>
                            {{ $city->name }}
                        </li>
                    @endforeach
                </ul>
            @endforeach
        </ul>
    </div>
</body>

</html>
