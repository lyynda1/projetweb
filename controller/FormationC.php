<?php

require "ContenueC.php";


class FormationC
{
    public function enregistrerHistorique($id, $action)
    {
        $fichier = 'historique.txt';
        $date = date('Y-m-d H:i:s');//nekhou date actuelle du systeme

        $line = "action = $action, id_form = $id, date: [$date]" . PHP_EOL ."\n";
        if ($handle = fopen($fichier, 'a')) {
            fwrite($handle, $line);
            fclose($handle);
        }
    }
    public function recupererHistorique()
    {
        $fichier = 'historique.txt';
        $tableau = [];

        // Vérifier si le fichier existe
        if (file_exists($fichier)) {
            $lignes = file($fichier, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lignes as $ligne) {
                // Exemple de ligne : "supprimer = supprimer, id_form = 1, date: [2024-12-10 14:45:00]"
                if (preg_match('/action = (.*?), id_form = (.*?), date: \[(.*?)\]/', $ligne, $matches)) {
                    $tableau[] = [
                        'action' => $matches[1],
                        'id_form' => $matches[2],
                        'date' => $matches[3]
                    ];
                }
            }
        } else {
            echo "Le fichier historique n'existe pas.";
        }

        return $tableau;
    }
    public function statistique()
    {
        $conn = config::getConnexion();

        // Récupérer toutes les dates triées par ordre croissant
        $requette = $conn->prepare("SELECT DISTINCT date FROM Formation ORDER BY date ASC");
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);

        $tab = []; // Initialiser le tableau final

        foreach ($resultats as $resultat) {
            $date = $resultat["date"]; // Récupérer la date actuelle

            // Préparer et exécuter la requête pour calculer la somme des prix pour chaque date
            $requette2 = $conn->prepare("SELECT SUM(prix) AS total_prix FROM Formation WHERE date = :date");
            $requette2->bindParam(':date', $date);
            $requette2->execute();

            // Récupérer le résultat de la somme
            $resultat2 = $requette2->fetch(PDO::FETCH_ASSOC);

            // Ajouter l'entrée dans le tableau final
            $tab[] = [
                "date" => $date,
                "prix" => $resultat2['total_prix'] ?? 0 // Utiliser 0 si aucun prix trouvé
            ];
        }

        return $tab;
    }
    


    public function listeFormation()
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("select * from Formation ORDER BY id ASC");
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function ajout($nom , $desc  , $dure , $date , $prix , $lieu, $image)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("INSERT INTO Formation (Nom , description , dure , date , prix , lieu , image) value (:nom , :desc , :dure , :date , :prix , :lieu , :image)");
        $requette->bindParam(":nom" , $nom);
        $requette->bindParam(":desc" , $desc);
        $requette->bindParam(":dure" , $dure);
        $requette->bindParam(":date" , $date);
        $requette->bindParam(":prix" , $prix);
        $requette->bindParam(":lieu" , $lieu);
        $requette->bindParam(":image" , $image);
        $requette->execute();
        $this->enregistrerHistorique( $conn->lastInsertId() , "ajout");
    }
    public function modifier($id , $nom , $desc  , $dure , $date , $prix , $lieu , $image )
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("UPDATE Formation SET Nom = :nom , description=:desc , dure = :dure , date = :date , prix = :prix , lieu=:lieu, image =:image where id = :id");
        $requette->bindParam(":nom" , $nom);
        $requette->bindParam(":desc" , $desc);
        $requette->bindParam(":dure" , $dure);
        $requette->bindParam(":date" , $date);
        $requette->bindParam(":prix" , $prix);
        $requette->bindParam(":lieu" , $lieu);
        $requette->bindParam(":image" , $image);
        $requette->bindParam(":id" , $id);
        $requette->execute();
        $this->enregistrerHistorique($id , "modifier");




    }
    public function supprimer($id)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("Delete from Formation where id = $id ");
        $requette->execute();
        $this->enregistrerHistorique($id , "supprimer");
    }
    public function existe($id)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("select * from Formation where id =:id");
        $requette->bindParam(":id" , $id);
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function searchAndSortUsers($critere , $valeur) 
    {
        $conn = config :: getConnexion();
        $valeur = "%$valeur%";
        $requette = $conn->prepare("SELECT * FROM Formation WHERE $critere LIKE :valeur ORDER BY $critere ASC");
        $requette->bindParam(":valeur" , $valeur);
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function trie($critere ) 
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("SELECT * FROM Formation ORDER BY $critere ASC");
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    
}
?>