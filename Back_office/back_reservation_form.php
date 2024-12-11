<?php
// Include the necessary files
require_once '../../Controller/ReservationController.php';
include_once '../../Controller/connect.php';
require_once '../../Controller/EventController.php';

$eventController = new EventController();
$reservationController = new ReservationController();
// Fe tch all events for the dropdown list
$events = $eventController->getEvents();

// If modifying a reservation, fetch its details
$reservation = null;
if (isset($_GET['id_reservation'])) {
    $reservation = $reservationController->getReservationById($_GET['id_reservation']);
}
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
                        <h6 class="mb-0">John Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="evenement.php" class="nav-item nav-link active"><i class="fa fa-calendar me-2"></i>Events</a>
                    <a href="evenement_calendar.php" class="nav-item nav-link"><i class="fa fa-calendar-alt me-2"></i>Events Calendar</a>
                    <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                    <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
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
            </nav>
            <!-- Navbar End -->


            <!-- Event Management Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="col-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <h1 class="text-center">Reservation Form</h1>
                                <form id="reservationForm" action="back_reservation_form.php" method="POST">
                                    <input type="hidden" name="action" value="<?= $reservation ? 'update_reservation' : 'add_reservation' ?>">
                                    <input type="hidden" name="id_reservation" value="<?= $reservation ? $reservation['id_reservation'] : '' ?>">

                                    <div class="mb-3">
                                        <label for="id_evenement" class="form-label">Event</label>
                                        <select id="id_evenement" name="id_evenement" class="form-select" required>
                                            <?php foreach ($events as $event): ?>
                                                <option value="<?= $event['id_evenement'] ?>" <?= ($reservation && $reservation['id_evenement'] == $event['id_evenement']) ? 'selected' : '' ?>>
                                                    <?= htmlspecialchars($event['nom_evenement']) ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nom_client" class="form-label">Client Name</label>
                                        <input type="text" id="nom_client" name="nom_client" class="form-control"
                                            value="<?= $reservation ? htmlspecialchars($reservation['nom_client']) : '' ?>">
                                        <div id="nameError" class="text-danger"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email_client" class="form-label">Client Email</label>
                                        <input type="email" id="email_client" name="email_client" class="form-control"
                                            value="<?= $reservation ? htmlspecialchars($reservation['email_client']) : '' ?>">
                                        <div id="emailError" class="text-danger"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="date_reservation" class="form-label">Reservation Date</label>
                                        <input type="date" id="date_reservation" name="date_reservation" class="form-control"
                                            value="<?= $reservation ? htmlspecialchars($reservation['date_reservation']) : '' ?>">
                                        <div id="dateError" class="text-danger"></div>
                                    </div>

                                    <button type="button" name="submit_reservation" class="btn btn-primary" onclick="window.location.href='evenement.php'">
                                        <?= $reservation ? 'Update Reservation' : 'Add Reservation' ?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Event Management End -->

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('reservationForm');

            form.addEventListener('submit', function(event) {
                let valid = true;

                // Clear previous errors
                document.getElementById('nameError').textContent = '';
                document.getElementById('emailError').textContent = '';
                document.getElementById('dateError').textContent = '';

                // Validate Client Name
                const nomClient = document.getElementById('nom_client').value.trim();
                const namePattern = /^[A-Za-zÀ-ÿ\s'-]+$/;
                if (!namePattern.test(nomClient) || nomClient === '') {
                    document.getElementById('nameError').textContent = 'Invalid name. Only letters, spaces, hyphens are allowed.';
                    valid = false;
                }

                // Validate Client Email
                const emailClient = document.getElementById('email_client').value.trim();
                if (!emailClient.includes('@') || !emailClient.includes('.')) {
                    document.getElementById('emailError').textContent = 'Invalid email format.';
                    valid = false;
                }

                // Validate Reservation Date
                const dateReservation = document.getElementById('date_reservation').value;
                const today = new Date().toISOString().split('T')[0];
                if (dateReservation < today) {
                    document.getElementById('dateError').textContent = 'Reservation date cannot be in the past.';
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>
    <script>
        var messageText = "<?= $_SESSION['status'] ?? '';        ?>";
        if (messageText != '') {
            alert(messageText);
        }
        Swal.fire({
            title: 'Success!',
            text: messageText,
            icon: 'success',
            confirmButtonText: 'OK'
        });
        <?php
        unset($_SESSION['status']);
        ?>
    </script>
</body>

</html>