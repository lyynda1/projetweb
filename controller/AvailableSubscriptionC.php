<?php 
include_once("../../Config.php");

require_once('../../model/AvailableSubscription.php');

class AvailableSubscriptionC
{
    // Add a new subscription
    public function addAvailableSubscription($AvailableSubscription)
    {
        $sql = "INSERT INTO available_subscriptions (name, description, price,image_path) 
                VALUES (:name, :description, :price, :image_path)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'name' => $AvailableSubscription->getName(),
                'description' => $AvailableSubscription->getDescription(),
                'price' => $AvailableSubscription->getPrice(),
                'image_path' => $AvailableSubscription->getimage_path()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Get all available subscriptions
    public function getAllAvailableSubscriptions()
    {
        $sql = "SELECT * FROM available_subscriptions";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
?>
