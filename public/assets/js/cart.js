function updateQuantity(itemId, change) {
  const quantityInput = document.getElementById(`${itemId}-quantity`);
  let quantity = parseInt(quantityInput.value);
  quantity += change;
  if (quantity < 1) quantity = 1;
  quantityInput.value = quantity;
  updatePrice(itemId);
}

function updatePrice(itemId) {
  const quantityInput = document.getElementById(`${itemId}-quantity`);
  const quantity = parseInt(quantityInput.value);
  const unitPrice = parseFloat(document.getElementById(`${itemId}-price`).dataset.unitPrice);
  const totalPrice = quantity * unitPrice;
  document.getElementById(`${itemId}-price`).textContent = `$${totalPrice.toFixed(2)}`;
  updateTotal();
}

function removeItem(itemId) {
  document.getElementById(itemId).remove();
  updateTotal();
}

function updateTotal() {
  const itemPrices = document.querySelectorAll('.item-price');
  let total = 0;
  itemPrices.forEach(price => {
    total += parseFloat(price.textContent.replace('$', ''));
  });
  document.getElementById('total').textContent = `$${total.toFixed(2)}`;
}

function checkout() {
  alert('Proceeding to checkout');
}

function continueShopping() {
  alert('Continuing shopping');
}

document.addEventListener('DOMContentLoaded', updateTotal);
