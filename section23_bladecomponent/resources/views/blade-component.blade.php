<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h3>helllo</h3>
    <x-alert style="color:blue" text="Đây là data test"></x-alert>

    @php
        $courses = ['laravel', 'php', 'html', 'css', 'js'];
    @endphp

    @foreach ($courses as $course)
        <x-alert style="color:blue" :text="$course"></x-alert>
    @endforeach

    {{-- //component-attribute blade --}}
    <x-forms.button style="background: red"></x-button>

        {{-- //component-attribute-slot blade --}}
        <x-forms.button2>test slot</x-button>

            {{-- //component-attribute-slot blade (nhiều slot) --}}
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-4">
                        <x-card>
                            <x-slot name="name">Camera canon m341</x-slot>
                            <x-slot name="content">Camera thế hệ mới của canon</x-slot>
                        </x-card>
                    </div>

                </div>
            </div>
</body>

</html>
