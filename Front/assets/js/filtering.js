function filterProducts() {
    const selectedColors = [];
    const selectedPrice = document.querySelector('input[name="price"]:checked') ? document.querySelector('input[name="price"]:checked').value : null;
    let matchedProducts = 0; 
    const colorFilters = document.querySelectorAll('.color-filter:checked');
    colorFilters.forEach((filter) => {
        selectedColors.push(filter.value);
    });
    const products = document.querySelectorAll('.product-card');
    products.forEach(product => {
        const productColor = product.getAttribute('data-color');
        const productPrice = parseFloat(product.getAttribute('data-price')); 
        let priceMatches = true;
        if (selectedPrice) {
            const [minPrice, maxPrice] = selectedPrice.split('-').map(Number);
            if (productPrice < minPrice || productPrice > maxPrice) {
                priceMatches = false;
            }
        }
        let colorMatches = true;
        if (selectedColors.length > 0 && !selectedColors.includes(productColor)) {
            colorMatches = false;
        }

        
        if (colorMatches && priceMatches) {
            product.style.display = 'block'; 
            matchedProducts++;
        } else {
            product.style.display = 'none';
        }
    });
    if (matchedProducts === 0) {

        alert("no matches found");
        products.forEach(product => {
            product.style.display = 'block'; 
        });
    }
}
