<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The OSC Dealership!</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/') }}/styles.css">

</head>

<br>
<script src="js/scripts.js"></script>
<h1>The Open Study College Dealership</h1>
<a href="{{ URL::to('/dbstart') }}" class="submit">Populate Database</a>
<br></br>
@if(session('status'))
    <div class="alert">
        {{ session('status') }}
    </div>
@endif
@if(!empty($data))
    @foreach($data as $i)
        <div class="loop">
            <img src="{{url($i->img_path)}}" class="preview">
            <h3>{{ $i->manufacturer . ' ' . $i->model }}</h3>
            <p>Price: £{{ number_format($i->price, 0, '', ',') }}</p>
            <p>Mileage: {{ number_format($i->mileage, 0, '', ',') }}</p>
            <a href="{{ URL::to('/basket?')."id=".$i->id }}" class="add-link">Add to cart</a>
        </div>
    @endforeach
@else
    <h3>No data found</h3>
@endif

</body>
</html>
