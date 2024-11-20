function control() {
    const cart=JSON.parse(localStorage.getItem('cart')) || [];
    if (cart.length===0) {
        alert("You have nothing to order");
        return false;  
    }
    let isValid = true;
    let errorMessages = [];
    var firstname = document.getElementById("billing-first-name").value.trim();
    var lastname = document.getElementById("billing-last-name").value.trim();
    var email = document.getElementById("billing-email").value.trim();
    var phone = document.getElementById("billing-phone").value.trim();
    var adresse1 = document.getElementById("billing-address-1").value.trim();
    var city = document.getElementById("billing-city").value.trim();
    var state = document.getElementById("billing-state").value.trim();
    var postcode = document.getElementById("billing-postcode").value.trim();
    if (firstname==="" || !/^[a-zA-Z\s]+$/.test(firstname)) {
        errorMessages.push("first name can't be empty and is only alphabetic");
        isValid = false;
    }
    if (lastname=== "" || !/^[a-zA-Z\s]+$/.test(lastname)) {
        errorMessages.push("last name can't be empty and is only alphabetic");
        isValid = false;
    }
    const emailPattern=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/;
    if (email===""||!emailPattern.test(email)) {
        errorMessages.push("enter a valid email ");
        isValid = false;
    }
    if (phone==="" || !/^\d+$/.test(phone)) {
        errorMessages.push("Phone number can't be empty and is only numeric");
        isValid = false;
    }
    if (adresse1==="") {
        errorMessages.push("address can't be empty");
        isValid = false;
    }
    if (city==="") {
        errorMessages.push("city can't be empty");
        isValid=false;
    }
    if (state==="") {
        errorMessages.push("state can't be empty");
        isValid=false;
    }
    if (postcode==="" || !/^\d+$/.test(postcode)) {
        errorMessages.push("postcode can't be empty and only numeric ");
        isValid=false;
    }
    if (!isValid) {
        alert(errorMessages.join("\n")); 
        return false;
    }
    return true;
}