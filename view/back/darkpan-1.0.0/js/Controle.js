function validateForm() {
    console.log("validateForm called");

    var nom_produit = document.getElementById("nomProduit").value;
    var description = document.getElementById("description").value;
    var prix = document.getElementById("prix").value;
    var image = document.getElementById("image").value;

    var nomPerror = document.getElementById("nomPerror");
    var descerror = document.getElementById("descerror");
    var prixerror = document.getElementById("prixerror");
    var imgerror = document.getElementById("imgerror");

    var isValid = true;

    // Nom Produit Validation
    if (nom_produit.trim() === "") {
        nomPerror.innerHTML = "Nom produit est requis";
        isValid = false;
    } else if (!/[A-Z]/.test(nom_produit)) {
        nomPerror.innerHTML = "Le produit doit contenir une lettre majuscule";
        isValid = false;
    } else if (nom_produit.length < 5) {
        nomPerror.innerHTML = "Le produit doit contenir au moins 5 caractères";
        isValid = false;
    } else {
        nomPerror.innerHTML = "";
    }

    // Description Validation
    if (description.length < 20) {
        descerror.innerHTML = "La description doit contenir au moins 20 caractères";
        isValid = false;
    } else if (description.trim() === "") {
        descerror.innerHTML = "Description est requis";
        isValid = false;
    } else {
        descerror.innerHTML = "";
    }

    // Prix Validation
    if (prix.trim() === "") {
        prixerror.innerHTML = "Le Prix est requis";
        isValid = false;
    } else if (prix < 0) {
        prixerror.innerHTML = "Le Prix doit être positif";
        isValid = false;
    } else {
        prixerror.innerHTML = "";
    }

    // Image Validation (JPEG only)
    var allowedExtensions = /(\.jpg)$/i;
    if (!allowedExtensions.exec(image)) {
        imgerror.innerHTML = "Veuillez sélectionner une image JPEG valide.";
        isValid = false;
    } else {
        imgerror.innerHTML = "";
    }

    return isValid; // Return false to prevent form submission if validation fails
}
