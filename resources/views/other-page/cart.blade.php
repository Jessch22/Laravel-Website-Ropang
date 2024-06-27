<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/root.css">
</head>
<body>
    <div class="container">
        <div class="shopping-cart">
            <a href="/#menu" onclick="continueShopping()" class="back-link">← Continue Shopping</a>
            <h2>Shopping Cart</h2>
            <div class="cart-items">
                @if(!empty($cart))
                    @foreach($cart as $id => $details)
                        <div class="cart-item" id="item-{{ $id }}">
                            <img src="{{ asset($details['image']) }}" alt="{{ $details['name'] }}">
                            <div class="item-details">
                                <p>{{ $details['name'] }}</p>
                                <p>{{ $details['description'] }}</p>
                                <div class="item-controls">
                                    <span class="item-quantity">{{ $details['quantity'] }}</span>
                                    <span class="item-price">${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Your cart is empty</p>
                @endif
            </div>
        </div>
        <div class="payment-details">
            <h3>Card Details</h3>
            <form action="{{ route('cart.checkout') }}" method="post">
                @csrf
                <div class="card-type">
                    <label>
                        <input type="radio" name="card-type" value="mastercard" checked>
                        <img src="https://i.pinimg.com/564x/56/65/ac/5665acfeb0668fe3ffdeb3168d3b38a4.jpg" alt="MasterCard">
                    </label>
                    <label>
                        <input type="radio" name="card-type" value="visa">
                        <img src="https://i.pinimg.com/564x/de/72/b5/de72b5cd21b9c827639853f666b51b50.jpg" alt="Visa">
                    </label>
                    <label>
                        <input type="radio" name="card-type" value="gopay">
                        <img src="https://i.pinimg.com/564x/92/38/ad/9238ad5545b986874ac753855c4f3439.jpg" alt="Gopay">
                    </label>
                    <label>
                        <input type="radio" name="card-type" value="paypal">
                        <img src="https://i.pinimg.com/564x/7c/81/52/7c8152cb8959cd0155c5f8d6cc3c7cd6.jpg" alt="PayPal">
                    </label>
                </div>
                <div class="input-group">
                    <label for="card-name">Name on Card</label>
                    <input type="text" id="card-name" name="card-name" value="{{ old('card-name') }}">
                </div>
                <div class="input-group">
                    <label for="card-number">Card Number</label>
                    <input type="text" id="card-number" name="card-number" value="{{ old('card-number') }}">
                </div>
                <div class="input-group">
                    <label for="card-expiration">Expiration Date</label>
                    <input type="text" id="card-expiration" name="card-expiration" value="{{ old('card-expiration') }}">
                </div>
                <div class="input-group">
                    <label for="card-cvv">CVV</label>
                    <input type="text" id="card-cvv" name="card-cvv" value="{{ old('card-cvv') }}">
                </div>
                <div class="order-total">
                    <p>Total : <span id="total">${{ number_format($total, 2) }}</span></p>
                </div>
                <button type="submit" onclick="checkout()">Checkout</button>
            </form>
        </div>
    </div>
    <script src="assets/js/cart.js" defer></script>
</body>
</html>
