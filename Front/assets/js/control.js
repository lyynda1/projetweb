function control(event) {
    // Prevent form submission until validation is complete
    event.preventDefault();

    // Retrieve the cart from localStorage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Get billing details (adapt this to your actual form field IDs)
    const firstName = document.getElementById('billing-first-name').value.trim();
    const lastName = document.getElementById('billing-last-name').value.trim();
    const email = document.getElementById('billing-email').value.trim();
    const phone = document.getElementById('billing-phone').value.trim();
    const country = document.getElementById('country-select').value.trim();
    const address = document.getElementById('billing-address-1').value.trim();
    const city = document.getElementById('billing-city').value.trim();
    const state = document.getElementById('billing-state').value.trim();
    const postalCode = document.getElementById('billing-postcode').value.trim();
    const orderNotes = document.getElementById('billing-comments').value.trim();

    // Check if the cart is empty
    if (cart.length === 0) {
        alert("You have nothing to order.");
        return; // Exit function if cart is empty
    }

    // Check if all required billing details are provided
    if (!firstName || !lastName || !email || !address || !city || !country || !postalCode || !phone) {
        alert("Please complete all billing details.");
        return;
    }

    // Validate that names contain only alphabetic characters (no numbers or special characters)
    const nameRegex = /^[A-Za-z]+$/;
    if (!nameRegex.test(firstName) || !nameRegex.test(lastName)) {
        alert("Names should only contain alphabetic characters.");
        return;
    }

    // Additional email validation (simple check)
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailRegex.test(email)) {
        alert("Please enter a valid email address.");
        return;
    }

    // Phone number validation (you can adjust this regex for stricter validation if needed)
    const phoneRegex = /^[0-9]{10}$/; // Assuming a 10-digit phone number
    if (!phoneRegex.test(phone)) {
        alert("Please enter a valid phone number (10 digits).");
        return;
    }

    // Postal code validation (you can adapt the regex for different countries' formats)
    const postalCodeRegex = /^[A-Za-z0-9]{3,10}$/;
    if (!postalCodeRegex.test(postalCode)) {
        alert("Please enter a valid postal code.");
        return;
    }

    // If order notes are empty, ask for confirmation
    if (!orderNotes) {
        const confirmOrderNotes = confirm("You have not entered any order notes. Do you still want to proceed?");
        if (!confirmOrderNotes) {
            return; // Exit if the user cancels
        }
    }

    // If all validations pass, proceed with the order
    alert("Proceeding with your order...");

    // Submit the form after validation passes
    document.querySelector("form").submit();
}
