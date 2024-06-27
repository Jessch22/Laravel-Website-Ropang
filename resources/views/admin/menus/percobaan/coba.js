document.addEventListener('DOMContentLoaded', () => {
    const cartItems = document.querySelectorAll('.cart-item');
    const subtotalElement = document.getElementById('subtotal');
    const totalElement = document.getElementById('total');
    const adminFee = 5000;

    function updateTotals() {
        let subtotal = 0;
        cartItems.forEach(item => {
            const quantity = item.querySelector('input').value;
            const price = parseInt(item.querySelector('.price').textContent.replace('Rp. ', '').replace('.', ''));
            subtotal += price * quantity;
        });
        subtotalElement.textContent = `Rp. ${subtotal.toLocaleString()}`;
        totalElement.textContent = `Rp. ${(subtotal + adminFee).toLocaleString()}`;
    }

    cartItems.forEach(item => {
        const quantityInput = item.querySelector('input');
        item.querySelector('.plus').addEventListener('click', () => {
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotals();
        });
        item.querySelector('.minus').addEventListener('click', () => {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateTotals();
            }
        });
        item.querySelector('.remove').addEventListener('click', () => {
            item.remove();
            updateTotals();
        });
    });

    updateTotals();

    document.getElementById('checkout-form').addEventListener('submit', event => {
        event.preventDefault();
        alert('Checkout successful!');
    });
});
