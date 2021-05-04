<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>OSC | Basket</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="{{ asset('css/') }}/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
<script src="{{ asset('js/') }}/app.js"></script>
@foreach($data as $i)
    <div class="basketContainer">
        <div class="basket">
            <h2>Thank you for purchasing your new {{ $i->manufacturer . ' ' . $i->model }}</h2>
            <img src="{{url($i->img_path)}}" class="full-view">
            <p>
                @if($_GET['payment'] == 'full')
                    £{{ $i->price.' has been charged to '.$_GET['name'] }}
                @elseif($_GET['payment'] == 'debit')
                    £{{ number_format(round((($i->price + 100) / 24), 2), 2, '.', '').' will be charged to '.
                        $_GET['name'].', per month for the duration of 24 months' }}
                @else
                    {{ 'Success! Your credit score has been analysed and you have been approved for finance and your
                        contract has been activated, £'.number_format(round((($i->price + 50) / 24), 2), 2, '.', '').
                        ' will be charged to '.$_GET['name'].' for the duration of 24 months.' }}
                @endif
            </p>
            <a class="submit" href="/complete?id={{ $_GET['id'] }}">Go home</a>

@endforeach

</body>
</html>
