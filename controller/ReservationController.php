<?php
include_once 'connect.php';  // Assuming 'connect.php' contains the PDO connection setup

class ReservationController
{
    // Fetch all reservations with event details
    public function getReservations()
    {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT r.id_reservation, e.nom_evenement, r.nom_client, r.email_client, r.date_reservation
                    FROM reservation r
                    JOIN evenements e ON r.id_evenement = e.id_evenement";
            return $conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            die("Error fetching reservations: " . $e->getMessage());
        }
    }
    public function orderevenements($tri_reservation)
    {
        $conn = config::getConnexion();
        try {
            switch ($tri_reservation) {
                case 'nom_croissant':
                    $order =  'nom_client ASC';
                    break;
                case 'nom_decroissant':
                    $order = 'nom_client DESC';
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
    // Fetch a reservation by ID
    public function getReservationById($id_reservation)
    {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT * FROM reservation WHERE id_reservation = :id_reservation";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id_reservation' => $id_reservation]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Error fetching reservation: " . $e->getMessage());
        }
    }
    public function filterreservations($nom_client)
    {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT * FROM reservation WHERE (nom_client LIKE concat('%', :nom_client, '%'))";
            $stmt = $conn->prepare($sql);
            $stmt->execute(['nom_client' => $nom_client]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            die("Error fetching events: " . $e->getMessage());
        }
    }
    // Create a new reservation
    public function createReservation($data)
    {
        $conn = config::getConnexion();
        try {
            $sql = "INSERT INTO reservation (id_evenement, nom_client, email_client, date_reservation)
                    VALUES (:id_evenement, :nom_client, :email_client, :date_reservation)";
            $stmt = $conn->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            die("Error creating reservation: " . $e->getMessage());
        }
    }

    // Update a reservation
    public function updateReservation($data)
    {
        $conn = config::getConnexion();
        try {
            $sql = "UPDATE reservation
                    SET id_evenement = :id_evenement, nom_client = :nom_client, email_client = :email_client, date_reservation = :date_reservation
                    WHERE id_reservation = :id_reservation";
            $stmt = $conn->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            die("Error updating reservation: " . $e->getMessage());
        }
    }

    // Delete a reservation
    public function deleteReservation($id_reservation)
    {
        $conn = config::getConnexion();
        try {
            $sql = "DELETE FROM reservation WHERE id_reservation = :id_reservation";
            $stmt = $conn->prepare($sql);
            return $stmt->execute([':id_reservation' => $id_reservation]);
        } catch (PDOException $e) {
            die("Error deleting reservation: " . $e->getMessage());
        }
    }
}