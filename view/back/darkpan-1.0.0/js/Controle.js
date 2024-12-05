function validateForm() {
    console.log("validateForm called");
      var nom_produit = document.getElementById("nom_produit").value;
      var description = document.getElementById("description").value;
      var prix = document.getElementById("prix").value;
      var qte = document.getElementById("qte").value;
      var image = document.getElementById("image").value;
    
      var nomPerror = document.getElementById("nomPerror");
      var descerror = document.getElementById("descerror");
      var prixerror = document.getElementById("prixerror");
      var qteerror = document.getElementById("qteerror");
      var imgerror = document.getElementById("imgerror");

    
      var isValid = true;
    
        if(nom_produit.trim() === "")
        {
            nomPerror.innerHTML = "Nom produit est requis";
            isValid = false;
        } else if(!/[A-Z]/.test(nom_produit))
        {
            nomPerror.innerHTML = "Le produit doit contenir une lettre majuscule";
            isValid = false;
        } else if(nom_produit.length < 5)
        {
            nomPerror.innerHTML = "Le produit doit contenir au moins 5 caractères";
            isValid = false;
        } else 
        {
            nomPerror.innerHTML="";
        }


      if (description.length < 20) {
        descerror.innerHTML = "La description doit contenir au moins 20 caractères";
        isValid = false;
      } else if(description.trim() === "")
      {
        descerror.innerHTML = "Description est requis";
      } else
      {
        descerror.innerHTML = "";
      }


      if(prix.trim() === "")
        {
            prixerror.innerHTML = "le Prix requis";
            isValid = false;
        } else if (prix < 0)
            {
                prixerror.innerHTML = "le Prix doit etre positive";
                isValid = false;   
            }
            else 
            {
                prixerror.innerHTML = "";
            }


            if(qte.trim() === "")
                {
                    qteerror.innerHTML = "le Quantité requis";
                    isValid = false;
                } else if (qte < 0)
                    {
                        qteerror.innerHTML = "le Quantité doit etre positive";
                        isValid = false;   
                    }
                    else 
                    {
                        qteerror.innerHTML = "";
                    }
      

                    var allowedExtensions = /(\.jpg)$/i;

                    if (!allowedExtensions.exec(image)) {
                        imgerror.innerHTML = "Please select a valid JPEG image.";
                        isValid = false;
                    } else {
                        imgerror.innerHTML = "";
                    }
      

      return isValid;    //// true
    }
    