function addToCart(menuId) {
    const menuElement = document.querySelector(`.menu-item[data-menu-id="${menuId}"]`);
    if (!menuElement) {
        alert("Menu item not found!");
        return;
    }

    const name = menuElement.querySelector('.menu-content a').textContent;
    const price = parseInt(menuElement.querySelector('.menu-content span').textContent.replace(/\./g, ''));
    const description = menuElement.querySelector('.menu-description').textContent;
    const image = menuElement.querySelector('.menu-img').getAttribute('src');

    fetch('/add-to-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            id: menuId,
            name: name,
            price: price,
            description: description,
            image: image,
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item telah dimasukkan ke keranjang');
        } else {
            alert('Gagal masuk ke keranjang.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// UPDATE QUANTITY
function updateQuantity(itemId, increment) {
    const quantityInput = document.getElementById(`${itemId}-quantity`);
    let currentQuantity = parseInt(quantityInput.value);

    currentQuantity += increment;
    
    if (currentQuantity <= 0) {
        removeItem(itemId);
        return;
    }

    if (currentQuantity <= 0) {
        removeItem(itemId);
        return;
    }
    
    fetch('/update-quantity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            id: itemId.split('-')[1],
            quantity: currentQuantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            quantityInput.value = currentQuantity;
            updateTotal();
        } else {
            alert('Failed to update quantity');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
    
    const unitPrice = parseFloat(document.getElementById(`${itemId}-price`).dataset.unitPrice);
    const newPrice = unitPrice * currentQuantity;
    const formattedPrice = `Rp${newPrice.toLocaleString('id-ID')}`;

    document.getElementById(`${itemId}-price`).innerText = formattedPrice;
    
    updateTotal();
}

// DELETE
function removeItem(itemId) {
    fetch('/remove-item', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ id: itemId.split('-')[1] })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(itemId).remove();
            updateTotal();
        } else {
            alert('Failed to remove item');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

// UPDATE TOTAL
function updateTotal() {
    const itemPrices = document.querySelectorAll('.item-price');
    let total = 0;

    itemPrices.forEach(price => {
        let priceValue = price.innerText.replace('Rp', '').replace('.', '').trim();
        total += parseFloat(priceValue);
    });

    const formattedTotal = `Rp${total.toLocaleString('id-ID')}`;
    document.getElementById('total').innerText = formattedTotal;
}