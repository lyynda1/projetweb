<?php
include_once 'connect.php'; // Include your connect.php file for database connection

class SupplementController {

    // Method to fetch all supplements
    public function getAllSupplements() {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT r.id_supplement, e.nom_evenement, r.nom, r.prix
                    FROM supplement r
                    JOIN evenements e ON r.id_evenement = e.id_evenement";
            return $conn->query($sql)->fetchAll();
        } catch (PDOException $e) {
            die("Error fetching supplements: " . $e->getMessage());
        }
    }

    // Method to fetch a supplement by its ID
    public function getSupplementById($id_supplement) {
        $conn = config::getConnexion();
        try {
            $sql = "SELECT * FROM supplement WHERE id_supplement = :id_supplement";
            $stmt = $conn->prepare($sql);
            $stmt->execute([':id_supplement' => $id_supplement]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            die("Error fetching supplement: " . $e->getMessage());
        }
    }

    // Method to add a supplement
    public function addSupplement($data) {
        $conn = config::getConnexion();
        try {
            // Check if the evenement exists in the 'evenements' table
            $sql_check = "SELECT COUNT(*) FROM evenements WHERE id_evenement = :id_evenement";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->execute([':id_evenement' => $data[':id_evenement']]);
            $event_exists = $stmt_check->fetchColumn();

            if ($event_exists == 0) {
                throw new Exception("Event ID does not exist.");
            }

            // Corrected SQL query
            $sql = "INSERT INTO Supplement (id_evenement, nom, prix) 
                    VALUES (:id_evenement, :nom, :prix)";  // Notice the placeholders

            $stmt = $conn->prepare($sql);
            return $stmt->execute($data);  // Execute with $data array
        } catch (PDOException $e) {
            die("Error creating supplement: " . $e->getMessage());
        } catch (Exception $e) {
            die($e->getMessage()); // Handle the case where the event does not exist
        }
    }

    // Method to update a supplement
    public function updateSupplement($data) {
        $conn = config::getConnexion();
        try {
            // Check if the evenement exists in the 'evenements' table
            $sql_check = "SELECT COUNT(*) FROM evenements WHERE id_evenement = :id_evenement";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->execute([':id_evenement' => $data[':id_evenement']]);
            $event_exists = $stmt_check->fetchColumn();

            if ($event_exists == 0) {
                throw new Exception("Event ID does not exist.");
            }

            $sql = "UPDATE Supplement 
                    SET id_evenement = :id_evenement, nom = :nom, prix = :prix 
                    WHERE id_supplement = :id_supplement";
            $stmt = $conn->prepare($sql);
            return $stmt->execute($data);  // Execute with $data array
        } catch (PDOException $e) {
            die("Error updating supplement: " . $e->getMessage());
        } catch (Exception $e) {
            die($e->getMessage()); // Handle the case where the event does not exist
        }
    }

    // Method to delete a supplement
    public function deleteSupplement($id_supplement) {
        $conn = config::getConnexion();
        try {
            $sql = "DELETE FROM Supplement WHERE id_supplement = :id_supplement";
            $stmt = $conn->prepare($sql);
            return $stmt->execute([':id_supplement' => $id_supplement]);
        } catch (PDOException $e) {
            die("Error deleting supplement: " . $e->getMessage());
        }
    }
}
?>
