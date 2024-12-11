<?php
include_once 'connect.php';
require_once 'ReservationController.php';
require 'SupplementController.php';
require 'SponsorController.php';
class EventController
{
    // Fetch all events from the "evenements" table
    public function getEvents()
    {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT * FROM evenements";
            return $conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            die("Error fetching events: " . $e->getMessage());
        }
    }

    // Order Events
    public function OrderEvents($tri_evenemt)
    {
        $conn = config::getConnexion();
        try {
            switch ($tri_evenemt) {
                case 'nom_croissant':
                    $order =  'nom_evenement ASC';
                    break;
                case 'nom_decroissant':
                    $order = 'nom_evenement DESC';
                    break;
                case 'prix_croissant':
                    $order =  'prix_evenement ASC';
                    break;
                case 'prix_decroissant':
                    $order =  'prix_evenement DESC';
                    break;
            }

            $sql = "SELECT * FROM evenements ORDER BY $order";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Error fetching events: " . $e->getMessage());
        }
    }

    // Filter events
    public function filterEvents($nom_evenement)
    {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT * FROM evenements WHERE (nom_evenement LIKE concat('%', :nom_evenement, '%'))";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['nom_evenement' => $nom_evenement]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Error fetching events: " . $e->getMessage());
        }
    }
    // Create a new event
    public function createEvent($nom_evenement, $desc_evenement, $date_evenement, $lieu_evenement, $prix_evenement, $capacite)
    {
        $conn = config::getConnexion();
        try {
            $sql = "INSERT INTO evenements (nom_evenement, desc_evenement, date_evenement, lieu_evenement, prix_evenement, capacite) 
                    VALUES (:nom_evenement, :desc_evenement, :date_evenement, :lieu_evenement, :prix_evenement, :capacite)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'nom_evenement' => $nom_evenement,
                'desc_evenement' => $desc_evenement,
                'date_evenement' => $date_evenement,
                'lieu_evenement' => $lieu_evenement,
                'prix_evenement' => $prix_evenement,
                'capacite' => $capacite
            ]);
        } catch (PDOException $e) {
            die("Error creating event: " . $e->getMessage());
        }
    }

    // Update an existing event
    public function updateEvent($id_evenement, $nom_evenement, $desc_evenement, $date_evenement, $lieu_evenement, $prix_evenement, $capacite)
    {
        $conn = config::getConnexion();
        try {
            $sql = "UPDATE evenements 
                    SET nom_evenement = :nom_evenement, desc_evenement = :desc_evenement, date_evenement = :date_evenement, 
                        lieu_evenement = :lieu_evenement, prix_evenement = :prix_evenement, capacite = :capacite 
                    WHERE id_evenement = :id_evenement";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'id_evenement' => $id_evenement,
                'nom_evenement' => $nom_evenement,
                'desc_evenement' => $desc_evenement,
                'date_evenement' => $date_evenement,
                'lieu_evenement' => $lieu_evenement,
                'prix_evenement' => $prix_evenement,
                'capacite' => $capacite
            ]);
        } catch (PDOException $e) {
            die("Error updating event: " . $e->getMessage());
        }
    }

    // Delete an event
    public function deleteEvent($id_evenement)
    {
        $conn = config::getConnexion();
        try {
            $sql = "DELETE FROM evenements WHERE id_evenement = :id_evenement";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id_evenement' => $id_evenement]);
        } catch (PDOException $e) {
            die("Error deleting event: " . $e->getMessage());
        }
    }
    public function getEventById($id_evenement)
    {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT * FROM evenements WHERE id_evenement = :id_evenement";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['id_evenement' => $id_evenement]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error fetching event by ID: " . $e->getMessage());
        }
    }
}




// Initialize the ReservationController
$reservationController = new ReservationController();

// Handle the different actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    if ($action === 'add_reservation') {
        $data = [
            ':id_evenement' => $_POST['id_evenement'],
            ':nom_client' => $_POST['nom_client'],
            ':email_client' => $_POST['email_client'],
            ':date_reservation' => $_POST['date_reservation'],
        ];
        $reservationController->createReservation($data);
        header('Location: ../vue/Front_office/events.php?message=created'); // Redirect to index page
        exit();
    }

    if ($action === 'update_reservation') {
        $data = [
            ':id_reservation' => $_POST['id_reservation'],
            ':id_evenement' => $_POST['id_evenement'],
            ':nom_client' => $_POST['nom_client'],
            ':email_client' => $_POST['email_client'],
            ':date_reservation' => $_POST['date_reservation'],
        ];
        $reservationController->updateReservation($data);
        header('Location: ../vue/Back_office/evenement.php?message=updated'); // Redirect to index page
        exit();
    }
    if ($action === 'delete_reservation') {
        $id_reservation = $_POST['id_reservation'];
        $reservationController->deleteReservation($id_reservation);
        header('Location: ../vue/Back_office/evenement.php?message=deleted');
        exit();
    }
}
$supplementController = new SupplementController();

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'add_supplement') {
        // Collect the data from the form
        $data = [
            ':id_evenement' => $_POST['id_evenement'],
            ':nom' => $_POST['nom'],
            ':prix' => $_POST['prix']
        ];

        // Call the addSupplement method
        try {
            $supplementController->addSupplement($data);
            header('Location: ../vue/Back_office/evenement.php?message=created'); // Redirect to evenement page with success message
        } catch (Exception $e) {
            header('Location: ../vue/Back_office/evenement.php?message=' . $e->getMessage()); // Redirect with error message
        }
        exit();
    }

    if ($action === 'update_supplement') {
        $data = [
            ':id_supplement' => $_POST['id_supplement'],
            ':id_evenement' => $_POST['id_evenement'],
            ':nom' => $_POST['nom'],
            ':prix' => $_POST['prix']
        ];

        // Call the updateSupplement method
        try {
            $supplementController->updateSupplement($data);
            header('Location: ../vue/Back_office/evenement.php?message=updated'); // Redirect to evenement page with updated message
        } catch (Exception $e) {
            header('Location: ../vue/Back_office/evenement.php?message=' . $e->getMessage()); // Redirect with error message
        }
        exit();
    }

    if ($action === 'delete_supplement') {
        $id_supplement = $_POST['id_supplement'];
        $supplementController->deleteSupplement($id_supplement);
        header('Location: ../vue/Back_office/evenement.php?message=deleted');
        exit();
    }
}
/*
        // Handle Sponsors
        if ($action === 'add_sponsor' || $action === 'update_sponsor') {
            $id_evenement = $_POST['id_evenement'];
            $nom = $_POST['nom'];
            $montant = $_POST['prix'];

            if ($action === 'add_sponsor') {
                $sponsorController->addSponsor([
                    'id_evenement' => $id_evenement,
                    'nom' => $nom,
                    'prix' => $montant
                ]);
            } else {
                $id_sponsor = $_POST['id_sponsor'];
                $sponsorController->updateSponsor([
                    'id_sponsor' => $id_sponsor,
                    'id_evenement' => $id_evenement,
                    'nom' => $nom,
                    'prix' => $montant
                ]);
            }
            header('Location: sponsor_list.php?message=success');
            exit();
        } elseif ($action === 'delete_sponsor') {
            $id_sponsor = $_POST['id_sponsor'];
            $sponsorController->deleteSponsor($id_sponsor);
            header('Location: sponsor_list.php?message=deleted');
            exit();
        }
    } catch (Exception $e) {
        // Log error and display friendly message
        error_log("Error handling action '$action': " . $e->getMessage());
        header('Location: error.php?message=An error occurred');
        exit();
    }
}
?>

*/
