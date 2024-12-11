<?php
require_once '../../Controller/ReclamationC.php';
require_once '../../Controller/ReponseC.php';

$reclamationC = new ReclamationC();
$listeReclamation = $reclamationC->afficherReclamations();

//----------------------------email-------------------


if (isset($_POST['addResponse'])) {//pour verifier l'existance de la reponse 
    require_once '../../Model/Reponse.php'; //permet d'acceder a le fichier reponse.oho

    $responseText = $_POST['responseText'];
    $idReclamation = $_POST['idReclamation'];

    // creation apres l'insersion a la bd 
    $response = new Reponse($responseText, $idReclamation);
    $responseC = new ReponseC();

    $responseC->ajouterReponse($response); //pour ajouter a la base de donne 

    //parametre de l'email 
 $to = "abbesyassmine03@gmail.com"; // email de destionation 

 $subject = "Kenzi Response"; // objet de l'email

 $attachmentLink = ""; //toujours vide , il n'a pas des fichier attacher a l'email
 $attachmentName = ""; // toujours vide

 $responseAdmin = "Admin Answer: $responseText"; // la reponse de l'administrateur 


 //--> les parametre necessaire : id de templatedId // to : adresse email // attachmentLink et attachmentName : Ces paramètres sont vides  / message : Le message (la réponse de l'administrateur)
 $url = "https://api.backendflow.io/v1/email?templateId=zusyJs2fxNMtItr3jpuz&to=" . urlencode($to) . "&subject=" . urlencode($subject) . "&attachmentLink=" . urlencode($attachmentLink) . "&attachmentName=" . urlencode($attachmentName) . "&message=" . urlencode($responseAdmin);



 // le corps de la requete json  
 $body = json_encode([
     "sk-bf-59fe9e9a-2677-48e1-8159-c5e8b2cabe5e" => ""//contient le cle de API qui est vide
 ]);

  //emvoi de la requete via cURL

 $ch = curl_init(); //Initialisation de cURL
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification in development
 curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Timeout after 30 seconds
 curl_setopt($ch, CURLOPT_POST, true); // Send as POST request
 curl_setopt($ch, CURLOPT_POSTFIELDS, $body); // Attach body data
 curl_setopt($ch, CURLOPT_HTTPHEADER, [
     'Content-Type: application/json'
 ]);


//Exécution de la requête cURL et gestion des erreurs :
 $response = curl_exec($ch);

// Gestion des erreurs de cURL :
 if ($response === false) {
     $error = "Error sending email: " . curl_error($ch);//afficher un message d'erreur 
     echo "<script>console.error('cURL Error: $error');</script>";
 } else {
     echo "<script>console.log('Email sent successfully. Response: $response');</script>";
 }
 //Si la requête réussit, un message indiquant que l'email a été envoyé avec succès
 // est affiché dans la console du navigateur




 // fermeture de la session url
 curl_close($ch);

    //mise a jour du statut de la reclamationn
    //apres avoir envoyer l'email le statut de la reclamation est mis a jour pour 
    //indiquer qu'une réponse a été fournie
    $reclamationC->updateReclamationStatus($idReclamation);

    //  l'uti derige pour eviter que le formulaire ne soit soumis plusieurs fois si la page
    header("Location: listReclamations.php");
    exit();
}
$stats = $reclamationC->getReclamationStats(); /// appel de function getReclamationStats

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>REclamations</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- statistiques Dependencies -->
     
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        #searchByName {
    background-color: #fff8e1;
    border: 1px solid #ffc107;
    color: #333;
}

.form-check-label {
    color: #856404;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
    color: #856404;
    font-weight: bold;
}

.stat-card {
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            color: white;
            font-weight: bold;
            font-size: 0.9rem;
            margin-right: 10px;
        }
        .bg-warning { background-color: #ffc107 !important; }
        .bg-success { background-color: #28a745 !important; }
        .bg-danger { background-color: #dc3545 !important; }
        .bg-info { background-color: #17a2b8 !important; }
        .chart-container {
            flex: 1;
        }
        .stats-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .stats-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .chart-wrapper {
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>kanzi</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">nidhal zneti</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="listReclamations.php" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>FeedBacks</a>
                    <a href="listAvis.php" class="nav-item nav-link"><i class="fa fa-star me-2"></i>Reviews</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">nidhal zneti</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
          

          
<!-- /////////////////////////////////////////Stats//////////////////////////////////////// -->

            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
        <div class="col-12">
            <div class="stats-container">
                <div class="stats-box">
                    <!--un tableau  stats -->

                    <div class="stat-card bg-warning">
                        <h6>Total Reclamations</h6>
                        <p><?php echo $stats['totalReclamations']; ?></p> <!--totalReclamations : Le nombre total de réclamations.-->
                    </div>


                    <div class="stat-card bg-success">
                        <h6>Answered</h6>
                        <p><?php echo $stats['answeredReclamations']; ?></p><!--answeredReclamations : Le nombre de réclamations répondues.-->
                    </div>


                    <div class="stat-card bg-danger">
                        <h6>Pending</h6>
                        <p><?php echo $stats['pendingReclamations']; ?></p><!--pendingReclamations : Le nombre de réclamations en attente-->
                    </div>


                    <div class="stat-card bg-info">
                        <h6>Total Responses</h6>
                        <p><?php echo $stats['totalResponses']; ?></p><!--pendingReclamations : Le nombre de réclamations en attente-->
                    </div>

                </div>

                <!-- ********** affichage du graphique /*/********** */ -->
                <div class="chart-container chart-wrapper"><!--pour styliser le graphique -->
                    <h6 class="mb-3">Weekly Reclamation Statistics</h6><!--titre-->
                    <canvas id="weeklyChart"></canvas>
                </div>
            </div>
        </div>

<script>


            // script pour js  pour générer le graphique****************

    const lastWeekReclamations = <?php echo $stats['lastWeekReclamations']; ?>;
    const thisWeekReclamations = <?php echo $stats['thisWeekReclamations']; ?>;

    // affichage d'un graphique dans une page web 
    const ctx = document.getElementById('weeklyChart').getContext('2d'); //dessiner un graphique en 2 dimension un ave x et y
    new Chart(ctx, { //biblio
        type: 'bar',
        data: {
            labels: ['Last Week', 'This Week'],
            datasets: [{
                label: 'Reclamations',
                data: [lastWeekReclamations, thisWeekReclamations],
                backgroundColor: ['#ffc107', '#007bff'],
                borderColor: ['#d39e00', '#0056b3'],
                borderWidth: 1
            }]
        },
        options: {//options : Définit les options du graphique

            responsive: true,//il s'ajuste automatiquement à la taille de l'écran
            
            scales: {  //Définit l'échelle de l'axe Y pour commencer à zéro.
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>

        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Reclamations</h6>


                    <!-- ////////////////////// recherche / Filter / triier ////////////////////// -->
 <!--/partie jaune -->

                    <div class="container-fluid pt-4 px-4">
    <div class="row g-4 mb-3 align-items-center" style="background-color: #fff3cd; padding: 10px; border-radius: 5px;">
        <div class="col-md-3">
            <input type="text" class="form-control" id="searchByName" placeholder="Search by Subject" style="background-color: #fff8e1; border-color: #ffc107;">
        </div>
        <div class="col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filterAnswered" style="background-color: #ffc107;">
                <label class="form-check-label" for="filterAnswered">Repondue</label>
            </div>


            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="filterPending" style="background-color: #ffc107;">
                <label class="form-check-label" for="filterPending">En attente</label>
            </div>

        </div>

        <div class="col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sortMostRecent" style="background-color: #ffc107;">
                <label class="form-check-label" for="sortMostRecent">Le plus récent</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="sortOldest" style="background-color: #ffc107;">
                <label class="form-check-label" for="sortOldest">Le plus ancien</label>
            </div>
        </div>
    </div>

<!--partie ili tahtha -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead style="color: white;">
                                <tr>
                                    <th style="color: white;">#</th>
                                    <th style="color: white;">UserName</th>
                                    <th style="color: white;">Subject</th>
                                    <th style="color: white;">Message</th>
                                    <th style="color: white;">Status</th>
                                    <th style="color: white;">Date</th>
                                    <th style="color: white;">Answer</th>
                                    <th style="color: white;">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listeReclamation as $reclamation): ?>
                                <tr>
                                    <th style="color: white;"><?php echo $reclamation['idReclamation']; ?></th>
                                    <td style="color: white;">UserName</td>
                                    <td style="color: white;"><?php echo $reclamation['subject']; ?></td>
                                    <td style="color: white;"><?php echo $reclamation['description']; ?></td>
                                    <td style="color: white;"><?php echo $reclamation['etat']; ?></td>
                                    <td style="color: white;"><?php echo $reclamation['date']; ?></td>
                                    <td>

                                            <?php if ($reclamation['etat'] == 'Pending'): ?>
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#answerModal<?php echo $reclamation['idReclamation']; ?>">
                                                    Answer
                                                </button>


                                            <?php else: ?>
                                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewResponseModal<?php echo $reclamation['idReclamation']; ?>">
                                                    View Response
                                                </button>

                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <form action="deleteReclamations.php" method="post" onsubmit="return confirm('Are you sure you want to delete this Feedback?');">
                                                <input type="hidden" name="id" value="<?php echo $reclamation['idReclamation']; ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- *****fenetre pour ajouter une reponse a une reclamation l -->
                                    <div class="modal fade" id="answerModal<?php echo $reclamation['idReclamation']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title">Answer Reclamation #<?php echo $reclamation['idReclamation']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>


                                                </div>


                                                <form method="post" action="">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="responseText" class="form-label">Response</label>
                                                            <textarea class="form-control" id="responseText" name="responseText" rows="3" required></textarea>
                                                        </div>


                                                        <input type="hidden" name="idReclamation" value="<?php echo $reclamation['idReclamation']; ?>">


                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="submit" name="addResponse" class="btn btn-primary">Submit</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <!-- ****sert à afficher la réponse à une réclamation spécifique. -->
                                    <div class="modal fade" id="viewResponseModal<?php echo $reclamation['idReclamation']; ?>" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Response for Reclamation #<?php echo $reclamation['idReclamation']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><?php 
                                                    $responseC = new ReponseC(); 
                                                    $response = $responseC->getResponseByReclamationId($reclamation['idReclamation']); 
                                                    echo $response['text'] ?? 'No response found.';
                                                    ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






    
    <script>

        //sert a filter et de tri pour une table de reclamtion  avec le tri qui est a travers la date 
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchByName");
        const filterAnswered = document.getElementById("filterAnswered");
        const filterPending = document.getElementById("filterPending");
        const sortMostRecent = document.getElementById("sortMostRecent");
        const sortOldest = document.getElementById("sortOldest");
        const tableBody = document.querySelector("table tbody");
        const rows = Array.from(tableBody.querySelectorAll("tr"));

        const filterRows = () => {
            const searchValue = searchInput.value.toLowerCase(); //Récupère la valeur de recherche saisie par l'utilisateur
            const isAnsweredChecked = filterAnswered.checked;//verifer si il sont cocher ou non les vase answerd
            const isPendingChecked = filterPending.checked;//mm chose
            const isSortRecent = sortMostRecent.checked;//si l'utilisateur a selectionner un critere de tri baser sur les date 
            const isSortOldest = sortOldest.checked;

            let filteredRows = rows;//contient toutes les lignes du tableau






            // *****************************filtrage par recherche ------------
            if (searchValue) {//si l'ut a saisi une valeur atravere il subject 
                filteredRows = filteredRows.filter(row => {
                    const subject = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
                    return subject.includes(searchValue);
                });
            }

           // Filtrage par statut repondu ou en attente  
            // pour  afficher qui sont repondues u en attente selon ce que l'ut a slectionne
            if (isAnsweredChecked || isPendingChecked) {
                filteredRows = filteredRows.filter(row => {
                    const status = row.querySelector("td:nth-child(5)").textContent.trim();
                    return (isAnsweredChecked && status === "Answered") || 
                           (isPendingChecked && status === "Pending");
                });
            }

            // tri par date (les plus recent ou plus ancienne )
            if (isSortRecent || isSortOldest) {
                filteredRows.sort((a, b) => {
                    const dateA = new Date(a.querySelector("td:nth-child(6)").textContent.trim());
                    const dateB = new Date(b.querySelector("td:nth-child(6)").textContent.trim());
                    return isSortRecent ? dateB - dateA : dateA - dateB;
                });
            }

            // Render the filtered rows
            tableBody.innerHTML = ""; // Clear existing rows
            filteredRows.forEach(row => tableBody.appendChild(row));
        };

        // Add event listeners
        searchInput.addEventListener("input", filterRows);
        filterAnswered.addEventListener("change", filterRows);
        filterPending.addEventListener("change", filterRows);
        sortMostRecent.addEventListener("change", filterRows);
        sortOldest.addEventListener("change", filterRows);
    });
</script>


            <!-- Widgets End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                            <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        


      
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>