
    function addToCart(id) {
        fetch("{{ route('cart.add') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ id: id })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Item added to cart');
            } else {
                alert('Failed to add item to cart');
            }
        })
        .catch(error => console.error('Error:', error));
    }
