function control() {
    var productId = document.getElementById("product-id").value.trim();
    var productName = document.getElementById("product-name").value.trim();
    var productCategory = document.getElementById("product-category").value.trim();
    var productPrice = document.getElementById("product-price").value.trim();
    var stock = document.getElementById("stock").value.trim();
    var productQuantity = document.getElementById("product-quantity").value.trim();
    var productOldPrice = document.getElementById("product-old-price").value.trim();
    var alphabetic = /^[A-Za-z\s]+$/; 
    var num = /^[0-9]+(\.[0-9]+)?$/; 
    if (!alphabetic.test(productId)) {
        alert("product id can only be  alphabetic ");
        return false;
    }
    if (!alphabetic.test(productName)) {
        alert("Product name can only be alphabetic");
        return false;
    }
    if (!alphabetic.test(productCategory)) {
        alert("Product category can only be alphabetic");
        return false;
    }
    if (!num.test(productPrice) || parseFloat(productPrice) <= 0) {
        alert("Product price is a positive number ");
        return false;
    }
    if (!num.test(stock) || parseFloat(stock) < 0) {
        alert("Stock should be >=0 ");
        return false;
    }
    if (!num.test(productQuantity) || parseFloat(productQuantity) <= 0) {
        alert("Product quantity >=0");
        return false;
    }
    if (productOldPrice !== "" && (!num.test(productOldPrice) || parseFloat(productOldPrice) < 0)) {
        alert("Old price null or >=0 ");
        return false;
    }
    return true;
}
