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
        @foreach ($posts as $post)
            <h4>{{ $post->name }}t</5>
                <h5>author : @if ($post->user)
                        {{ $post->user->name }}
                    @endif
                </h5>
                <p>Tag : @if ($post->tags)
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }} ___
                        @endforeach
                    @endif
                </p>
                <hr>
        @endforeach
    </div>
</body>

</html>
