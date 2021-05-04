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
            <img src="{{url($i->img_path)}}" class="full-view">
            <h3>{{ $i->manufacturer . ' ' . $i->model }}</h3>
            <p>Price: £{{ number_format($i->price, 0, '', ',') }}</p>
            <p>Mileage: {{ number_format($i->mileage, 0, '', ',') }}</p>

            <h3>Payment method</h3>

            <div class="payments">
                <form action="/purchase">
                    <table class="payment-types">
                        <tr>
                            <td>
                                <h4>Pay in Full</h4>
                                <p>Price: £{{ number_format($i->price, 0, '', ',') }}</p>
                            </td>
                            <td>
                                <h4>Direct Debit</h4>
                                <p>Price per month:
                                    £{{ number_format(round((($i->price + 100) / 24), 2), 2, '.', '') }} for
                                    24 months<br>Total: £{{ number_format(($i->price + 100), 0, '', ',') }}</p>
                            </td>
                            <td>
                                <h4>Finance</h4>
                                <p>Price per month:
                                    £{{ number_format(round((($i->price + 50) / 24), 2), 2, '.', '') }} for
                                    24 months<br>Total: £{{ number_format(($i->price + 50), 0, '', ',') }}</p>
                            </td>
                        </tr>
                    </table>
                    <div class="form-group">
                        <label for="cCardNumber" class="text-label">Credit Card Number</label>
                        <input type="text" name="cCardNumber" class="form-input text-input"
                               placeholder="XXXX-XXXX-XXXX-XXXX" required>
                    </div>
                    <div class="form-group">
                        <label for="cCardExp" class="text-label">Expiry Date</label>
                        <input type="text" name="cCardExp" class="form-input text-input"
                               placeholder="MM/YYYY" required>
                    </div>
                    <div class="form-group">
                        <label for="secCode" class="text-label">Security Code</label>
                        <input type="text" name="secCode" class="form-input text-input"
                               placeholder="XXX">
                    </div>
                    <div class="form-group">
                        <label for="name" class="text-label">Full Name</label>
                        <input type="text" name="name" class="form-input text-input"
                               placeholder="as it appears on the card (e.g. John Smith)" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-label">Email Address</label>
                        <input type="email" name="email" class="form-input text-input"
                               placeholder="johnsmith@gmail.com" required>
                    </div>
                    <div class="form-radios">
                        <div class="form-group">
                            <label>
                                <input type="radio" name="payment" class="form-radio" value="full" required>
                                Pay in full
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                            <input type="radio" name="payment" class="form-radio" value="debit" required>
                            Direct Debit
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                            <input type="radio" name="payment" class="form-radio" value="finance" required>
                            Finance
                            </label>
                        </div>
                    </div>
                    <div class="btnHolder">
                        <input type="submit" value="Purchase" class="submit">
                    </div>
                    <input type="hidden" name="id" value="{{ $i->id }}">
                </form>
            </div>
@endforeach

</body>
</html>
