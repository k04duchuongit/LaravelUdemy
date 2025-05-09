<!DOCTYPE html>
<html class=''>

<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    
    <meta name="selected_contact" content="">
    <meta name="auth_id" content="{{ auth()->user()?->id }}">
    <meta name="base_url" content="{{ url('/') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch'
        href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>

    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>

<body>

    {{ $slot }}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
        <script type="module" src="https://cdn.jsdelivr.net/npm/ldrs/dist/auto/square.js"></script>
    {{ $scripts ?? '' }}
</body>


</html>
