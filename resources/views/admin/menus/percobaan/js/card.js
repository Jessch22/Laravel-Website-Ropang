function continueShopping() {
    // Implement functionality to continue shopping
}

function updateQuantity(itemId, change) {
    const quantityInput = document.getElementById(`${itemId}-quantity`);
    let quantity = parseInt(quantityInput.value) + change;
    if (quantity < 1) quantity = 1;
    quantityInput.value = quantity;
    const unitPrice = parseInt(document.getElementById(`${itemId}-price`).getAttribute('data-unit-price'));
    const priceElement = document.getElementById(`${itemId}-price`);
    priceElement.innerText = `Rp. ${unitPrice * quantity}`;
    updateTotals();
}

function removeItem(itemId) {
    document.getElementById(itemId).remove();
    updateTotals();
}

    
function updateTotals() {
    const items = document.querySelectorAll('.cart-item');
    let subtotal = 0;
    items.forEach(item => {
        const quantity = parseInt(item.querySelector('input').value);
        const unitPrice = parseInt(item.querySelector('.item-price').getAttribute('data-unit-price'));
        subtotal += quantity * unitPrice;
    });
    
    const shipping = subtotal > 0 ? 5.000 : 0; // Example shipping cost
    const total = subtotal + shipping;
    document.getElementById('subtotal').innerText = `Rp. ${subtotal}`;
    document.getElementById('shipping').innerText = `Rp. ${shipping}`;
    document.getElementById('total').innerText = `Rp. ${total}`;
}

function checkout() {
    const items = document.querySelectorAll('.cart-item');
    if (items.length === 0) {
        alert('Your cart is empty.');
        return;
    }
    const invoiceData = [];
    items.forEach(item => {
        const description = item.querySelector('.item-details p').innerText;
        const quantity = item.querySelector('input').value;
        const unitPrice = item.querySelector('.item-price').getAttribute('data-unit-price');
        const total = quantity * unitPrice;
        invoiceData.push({ description, quantity, unitPrice, total });
    });

    const subtotal = document.getElementById('subtotal').innerText;
    const shipping = document.getElementById('shipping').innerText;
    const total = document.getElementById('total').innerText;


    localStorage.setItem('invoiceData', JSON.stringify(invoiceData));
    localStorage.setItem('invoiceSubtotal', subtotal);
    localStorage.setItem('invoiceShipping', shipping);
    localStorage.setItem('invoiceTotal', total);

    window.location.href = 'invoice.html';
}
