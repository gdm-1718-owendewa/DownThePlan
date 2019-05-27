<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="stripe-token" content="{{ env('STRIPE_KEY') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stripe-demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const creditRatio = {{ env('CREDIT_RATIO') }};
        </script>
     
    <title>Laravel eindwerk</title>
</head>
<body>

<div class="section">
    @include('partials/header')

    <div class="container">
        <br>
        @yield('content')
    </div>
    @include('partials/footer')

</div>
<script>
    let convertUrl = "{{route('converter')}}";
</script>
    <script src="{{ asset('js/stripe-demo.js') }}"></script>

</body>
</html>