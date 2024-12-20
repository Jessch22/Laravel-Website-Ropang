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
            alert('Item added to cart!');
        } else {
            alert('Failed to add item to cart.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}