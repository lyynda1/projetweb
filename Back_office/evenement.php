<?php
// Include the PHP backend controller
include_once '../../Controller/connect.php';

require_once '../../Controller/EventController.php';
require_once '../../Controller/ReservationController.php';
require_once '../../Controller/SponsorController.php';
require_once '../../Controller/SupplementController.php';




// Instantiate the EventController class
$eventController = new EventController();
// $reservationController = new ReservationController();
// $sponsorController = new SponsorController();
// $supplementController = new SupplementController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['nom_evenement_recherche']) and empty($_POST['tri_evenement'])) {
        if (!empty($_POST["delete_id_evenement"])) { // Supprimer
            $id_evenement = $_POST["delete_id_evenement"];
            $eventController->deleteEvent($id_evenement);
        } else { // modification ou ajout
            $nom_evenement = $_POST["nom_evenement"];
            $desc_evenement = $_POST["desc_evenement"];
            $date_evenement = $_POST["date_evenement"];
            $lieu_evenement  = $_POST["lieu_evenement"];
            $prix_evenement = $_POST["prix_evenement"];
            $capacite = $_POST["capacite"];
            if (!empty($_POST["id_evenement"])) { // Modification
                $id_evenement = $_POST["id_evenement"];
                $eventController->updateEvent($id_evenement, $nom_evenement, $desc_evenement, $date_evenement, $lieu_evenement, $prix_evenement, $capacite);
            } else { // Ajout
                $eventController->createEvent($nom_evenement, $desc_evenement, $date_evenement, $lieu_evenement, $prix_evenement, $capacite);
            }
        }
    }
}

// Fetch the events, après finir tous 
if (!empty($_POST['tri_evenement'])) {
    $tri_evenemt = $_POST['tri_evenement'];
    $events = $eventController->orderEvents($tri_evenemt);
} else if (!empty($_POST['nom_evenement_recherche'])) {
    $nom_evenement_recherche = $_POST['nom_evenement_recherche'];
    $events = $eventController->filterEvents($nom_evenement_recherche);
} else {
    $events = $eventController->getEvents();
}


// if (!empty($_POST['nom_client_recherche'])) {
//     $nom_client_recherche = $_POST['nom_client_recherche'];
//     $events = $eventController->filterEvents($nom_client_recherche);
// } else {
//     $events = $eventController->getEvents();
// }
$reservations = $reservationController->getReservations();
// $sponsors =$sponsorController->getAllSponsors();
// $supplements = $supplementController->getAllSupplements();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kanzi</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Kanzi</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="evenement.php" class="nav-item nav-link active"><i class="fa fa-calendar me-2"></i>Events</a>
                    <a href="evenement_calendar.php" class="nav-item nav-link"><i class="fa fa-calendar-alt me-2"></i>Events Calendar</a>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>events</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="button.html" class="dropdown-item">Buttons</a>
                            <a href="typography.html" class="dropdown-item">Typography</a>
                            <a href="evenement.php" class="dropdown-item active">Other Elements</a>
                        </div>
                    </div> -->
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
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
                            <span class="d-none d-lg-inline-flex">Notification</span>
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
                            <span class="d-none d-lg-inline-flex">John Doe</span>
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
            <!-- Other Elements Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">

                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Table des Evenements</h6>
                            <div class="row justify-content-between align-items-center mb-2">

                                <div class="col-6 ">
                                    <form action="evenement.php" method="POST" style="display:inline;">
                                        <div class="row">
                                            <div class="col-11">
                                                <input placeholder="Recherche..." type="text" class="form-control" id="nom_evenement_recherche" name="nom_evenement_recherche" value="<?= htmlspecialchars($_POST['nom_evenement_recherche'] ?? ''); ?>" required>
                                            </div>
                                            <div class="col-1">
                                                <button type="submit" style="background-color: #d1cb19; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <form action="evenement.php" method="POST" style="display:inline;">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" id="tri_evenement" name="tri_evenement" onchange="this.form.submit()"
                                                aria-label="Floating label select example">
                                                <option selected> Choisir</option>
                                                <option value="nom_croissant">Nom croissant</option>
                                                <option value="nom_decroissant">Nom Decroissant</option>
                                                <option value="prix_croissant">Prix Croissant</option>
                                                <option value="prix_decroissant">Prix Decroissant</option>
                                            </select>
                                            <label for="tri_evenement">Trier</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <a href="../Back_office/evenement_form.php" class="btn btn-success">Ajouter Evenement</a>

                                <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; text-align: center;">
                                    <thead style="background-color: #f2f2f2;">
                                        <tr>
                                            <th>ID</th>
                                            <th>Event Name</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Location</th>
                                            <th>Price</th>
                                            <th>Capacity</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($events as $event): ?>
                                            <tr>

                                                <td><?= htmlspecialchars($event['id_evenement']); ?></td>
                                                <td><?= htmlspecialchars($event['nom_evenement']); ?></td>
                                                <td><?= htmlspecialchars($event['desc_evenement']); ?></td>
                                                <td><?= htmlspecialchars($event['date_evenement']); ?></td>
                                                <td><?= htmlspecialchars($event['lieu_evenement']); ?></td>
                                                <td><?= htmlspecialchars($event['prix_evenement']); ?></td>
                                                <td><?= htmlspecialchars($event['capacite']); ?></td>
                                                <td>
                                                    <!-- Modifier Button -->
                                                    <form action="evenement_form.php" method="POST" style="display:inline;">
                                                        <input type="hidden" name="id_evenement" value="<?= htmlspecialchars($event['id_evenement']); ?>">
                                                        <input type="hidden" name="nom_evenement" value="<?= htmlspecialchars($event['nom_evenement']); ?>">
                                                        <input type="hidden" name="desc_evenement" value="<?= htmlspecialchars($event['desc_evenement']); ?>">
                                                        <input type="hidden" name="date_evenement" value="<?= htmlspecialchars($event['date_evenement']); ?>">
                                                        <input type="hidden" name="lieu_evenement" value="<?= htmlspecialchars($event['lieu_evenement']); ?>">
                                                        <input type="hidden" name="prix_evenement" value="<?= htmlspecialchars($event['prix_evenement']); ?>">
                                                        <input type="hidden" name="capacite" value="<?= htmlspecialchars($event['capacite']); ?>">

                                                        <button type="submit" style="background-color: #d1cb19; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                                            Modifier
                                                        </button>
                                                    </form>

                                                    <!-- Supprimer Button -->
                                                    <form action="evenement.php" method="POST" style="display:inline;">
                                                        <input type="hidden" name="delete_id_evenement" value="<?= htmlspecialchars($event['id_evenement']); ?>">
                                                        <button type="submit" style="background-color: #f44336; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Other Elements End -->


            <!-- Other Elements Start - Reservation -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Table des Reservations</h6>
                            <div class="row justify-content-between align-items-center mb-2">

                                <!-- CHANGE THIS NIDHAL -->
                                <!-- <div class="row justify-content-between align-items-center mb-2">
                                    <div class="col-6 ">
                                        <form action="evenement.php" method="POST" style="display:inline;">
                                            <div class="row">
                                                <div class="col-11">
                                                    <input placeholder="Recherche..." type="text" class="form-control" id="nom_client_recherche" name="nom_client_recherche" value="<?= htmlspecialchars($_POST['nom_client_recherche'] ?? ''); ?>" required>
                                                </div>
                                                <div class="col-1">
                                                    <button type="submit" style="background-color: #d1cb19; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <form action="evenement.php" method="POST" style="display:inline;">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="tri_reservation" name="tri_reservation" onchange="this.form.submit()"
                                                    aria-label="Floating label select example">
                                                    <option selected> Choisir</option>
                                                    <option value="nom_croissant">Nom croissant</option>
                                                    <option value="nom_decroissant">Nom Decroissant</option>
                                                    <option value="prix_croissant">Prix Croissant</option>
                                                    <option value="prix_decroissant">Prix Decroissant</option>
                                                </select>
                                                <label for="floatingSelect">Trier</label>
                                            </div>
                                        </form>
                                    </div>
                                </div> -->
                                <div class="table-responsive">
                                    <a href="../Front_office/reservation_form.php" class="btn btn-success">Ajouter Reservation</a>

                                    <table border="1" cellspacing="0" cellpadding="10" style="width: 100%; text-align: center;">
                                        <thead style="background-color: #f2f2f2;">
                                            <tr>
                                                <th>ID</th>
                                                <th>Event</th>
                                                <th>Client Name</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($reservations as  $reservation): ?>
                                                <tr>
                                                    <td><?= $reservation['id_reservation'] ?></td>
                                                    <td><?= $reservation['nom_evenement'] ?></td>
                                                    <td><?= $reservation['nom_client'] ?></td>
                                                    <td><?= $reservation['email_client'] ?></td>
                                                    <td><?= $reservation['date_reservation'] ?></td>
                                                    <td>
                                                        <a href="back_reservation_form.php?id_reservation=<?= $reservation['id_reservation'] ?>" class="btn btn-warning">Modifier</a>
                                                        <form action="../../Controller/EventController.php" method="POST" style="display:inline-block;">
                                                            <input type="hidden" name="action" value="delete_reservation">
                                                            <input type="hidden" name="id_reservation" value="<?= $reservation['id_reservation'] ?>">
                                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Supprimer</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Other Elements End -->

                <!-- Other Elements Start - Supplements -->
                <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">supplement Table</h6>
                            <div class="table-responsive mb-4">
                                <a href="supplement_form.php" class="btn btn-success mb-3">Add supplement</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID supplement</th>
                                            <th>nom evenement</th>
                                            <th>nom supplement</th>
                                            <th>price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($supplements as $supplement): ?>
                                            <tr>
                                                <td><?= $supplement['id_supplement'] ?></td>
                                                <td><?= $supplement['nom_evenement'] ?></td>
                                                <td><?= $supplement['nom'] ?></td>
                                                <td><?= $supplement['prix'] ?></td>
                                                <td>
                                                    <a href="supplement_form.php?id_supplement=<?= $supplement['id_supplement'] ?>" class="btn btn-warning">Edit</a>
                                                    <form action="../crud/controller.php" method="POST" style="display:inline-block;">
                                                        <input type="hidden" name="action" value="delete_supplement">
                                                        <input type="hidden" name="id_supplement" value="<?= $supplement['id_supplement'] ?>">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
                <!-- Supplements Table End - Sponsors -->
                <!-- <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                    </div>
                    <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">sponsor Table</h6>
                            <div class="table-responsive">
                                <a href="sponsor_form.php" class="btn btn-success mb-3">Add sponsor</a>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Event</th>
                                            <th>Sponsor Name</th>
                                            <th>Amount</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($sponsors as $sponsor): ?>
                                            <tr>
                                                <td><?= $reservation['nom_evenement'] ?></td>
                                                <td><?= htmlspecialchars($sponsor['nom']) ?></td>
                                                <td><?= number_format($sponsor['montant'], 2) ?> TND</td>
                                                <td>
                                                    <a href="sponsor_form.php?id_sponsor=<?= $sponsor['id_sponsor'] ?>" class="btn btn-warning">Edit</a>
                                                    <form action="../crud/controller.php" method="POST" style="display:inline-block;">
                                                        <input type="hidden" name="action" value="delete_sponsor">
                                                        <input type="hidden" name="id_sponsor" value="<?= $sponsor['id_sponsor'] ?>">
                                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
                <!-- Other Elements End -->







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
                <!-- Footer End -->
            </div>
            <!-- Content End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
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