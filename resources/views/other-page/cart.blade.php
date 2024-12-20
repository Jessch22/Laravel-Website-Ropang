<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">
        <div class="shopping-cart">
            <a href="/#menu" onclick="continueShopping()" class="back-link">← Continue Shopping</a>
            <h2>Keranjang</h2>
            <div class="cart-items">
                @if(!empty($cart))
                    @foreach($cart as $id => $details)
                        <div class="cart-item" id="item-{{ $id }}">
                            <img src="{{ asset($details['image']) }}" alt="{{ $details['name'] }}">
                            <div class="item-details">
                                <p><strong>{{ $details['name'] }}</strong></p>
                                <p>{{ $details['description'] }}</p>
                                <div class="item-controls">
                                    <button onclick="updateQuantity('item-{{ $id }}', 1)">+</button>
                                    <input type="number" id="item-{{ $id }}-quantity" value="{{ $details['quantity'] }}" readonly>
                                    <button onclick="updateQuantity('item-{{ $id }}', -1)">-</button>
                                    <span class="item-price" id="item-{{ $id }}-price" data-unit-price="{{ $details['price'] }}">
                                        Rp{{ number_format($details['price'], 0, ',', '.') }}
                                    </span>
                                    <button class="delete-btn" onclick="removeItem('item-{{ $id }}')">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Your cart is empty</p>
                @endif
            </div>
            <p>Total : <span id="total">Rp{{ number_format($total, 0, ',', '.') }}</span></p>
        </div>

</body>
<script src="assets/js/addtocart.js"></script>
</html>
