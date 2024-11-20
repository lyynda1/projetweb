document.addEventListener('DOMContentLoaded', function() {
    // Select all buttons with the class 'add-to-cart' and attach the click event
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            // Find the closest product card to get the product details
            const productCard = this.closest('.product-card');

            // Retrieve the product data (name, price, quantity)
            const productName = productCard.querySelector('.product-name').textContent;
            const productPrice = productCard.getAttribute('data-price');
            const productQuantity = productCard.querySelector('.cart-plus-minus-box').value;

            // Check if this is a clothing item by looking for a size dropdown
            const sizeDropdown = productCard.querySelector('.product-size');
            const productCategory = sizeDropdown ? 'clothes' : 'accessories';
            
            
            const product = {
                name: productName,
                price: parseFloat(productPrice),  
                quantity: parseInt(productQuantity),
                category: productCategory
            };
            if (productCategory === 'clothes') {
                const productSize = sizeDropdown.value;
                if (!productSize) {
                    alert("select a size");
                    return;
                }
                product.size = productSize;
            }
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart.push(product);
            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${productName} has been added to your cart `);
        });
    });
});
