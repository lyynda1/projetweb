// Function to display accessories in the first table
function displayAccessoriesCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartTableBody = document.querySelector('#cart-items');
    cartTableBody.innerHTML = '';
    cart.filter(item => !item.size).forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="product-thumbnail hide-from-sm">&nbsp;</td>
            <td class="product-name">${item.name}</td>
            <td class="product-price">${item.price}DT</td>
            <td class="product-quantity hide-from-sm">${item.quantity}</td>
            <td class="product-subtotal">${(item.price * item.quantity).toFixed(2)}DT</td>
            <td class="product-remove">
                <button type="button" class="remove-item" data-product="${item.name}" data-quantity="${item.quantity}">Remove</button>
            </td>
        `;
        cartTableBody.appendChild(row);
    });
    updateCartTotals();
}
function displayClothesCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const clothesTableBody = document.querySelector('#cart-items2');
    clothesTableBody.innerHTML = '';

    // Loop through each cart item and add it to the clothes table if it has a size
    cart.filter(item => item.size).forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td class="product-thumbnail hide-from-sm">&nbsp;</td>
            <td class="product-name">${item.name}</td>
            <td class="product-price">${item.price}DT</td>
            <td class="product-size">${item.size}</td>
            <td class="product-quantity hide-from-sm">${item.quantity}</td>
            <td class="product-subtotal">${(item.price * item.quantity).toFixed(2)}DT</td>
            <td class="product-remove">
                <button type="button" class="remove-item" data-product="${item.name}" data-size="${item.size}" data-quantity="${item.quantity}">Remove</button>
            </td>
        `;
        clothesTableBody.appendChild(row);
    });

    // Update cart totals for clothes (optional if you have a separate total)
    updateCartTotals();
}

// Function to update cart totals
function updateCartTotals() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const subtotal = cart.reduce((acc, item) => acc + (item.price * item.quantity), 0);
    const total = subtotal; 

    document.querySelector('#subtotal').textContent = `${subtotal.toFixed(2)}DT`;
    document.querySelector('#total').textContent = `${total.toFixed(2)}DT`;
}

// Event Listener for Removing Items from the Cart (applies to both tables)
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('remove-item')) {
        const productName = event.target.getAttribute('data-product');
        const productSize = event.target.getAttribute('data-size') || null;  // Use size if available
        const productQuantity = parseInt(event.target.getAttribute('data-quantity'), 10); // Quantity to remove
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Remove the item based on the product name, size, and quantity
        cart = cart.filter(item => 
            !(item.name === productName && 
              (item.size === productSize || !item.size) && // Check for size if available
              item.quantity === productQuantity) // Match the quantity
        );

        // Update the cart in localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Re-display the updated cart for both tables
        displayAccessoriesCart();
        displayClothesCart();
    }
});

// Call the display functions for both tables when the page loads
displayAccessoriesCart();
displayClothesCart();
