<?php
include_once 'connect.php'; // Include your connect.php file for database connection

class SponsorController {
    private $pdo;

    public function __construct() {
        // Use the connection from config::getConnexion()
        $this->pdo = config::getConnexion();
    }

    public function addSponsor($data) {
        try {
            $stmt = $this->pdo->prepare("
                INSERT INTO Sponsor (id_evenement, nom, prix) 
                VALUES (:id_evenement, :nom, :prix)
            ");
            $stmt->execute([
                ':id_evenement' => $data['id_evenement'],
                ':nom' => $data['nom'],
                ':prix' => $data['prix']
            ]);
        } catch (PDOException $e) {
            error_log("Error adding sponsor: " . $e->getMessage());
            throw $e;
        }
    }

    public function updateSponsor($data) {
        try {
            $stmt = $this->pdo->prepare("
                UPDATE Sponsor 
                SET id_evenement = :id_evenement, nom = :nom, prix = :prix 
                WHERE id_sponsor = :id_sponsor
            ");
            $stmt->execute([
                ':id_evenement' => $data['id_evenement'],
                ':nom' => $data['nom'],
                ':prix' => $data['prix'],
                ':id_sponsor' => $data['id_sponsor']
            ]);
        } catch (PDOException $e) {
            error_log("Error updating sponsor: " . $e->getMessage());
            throw $e;
        }
    }

    public function deleteSponsor($id_sponsor) {
        try {
            $stmt = $this->pdo->prepare("
                DELETE FROM Sponsor 
                WHERE id_sponsor = :id_sponsor
            ");
            $stmt->execute([':id_sponsor' => $id_sponsor]);
        } catch (PDOException $e) {
            error_log("Error deleting sponsor: " . $e->getMessage());
            throw $e;
        }
    }

    public function getAllSponsors() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM Sponsor");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Error fetching sponsors: " . $e->getMessage());
            throw $e;
        }
    }
}
?>
