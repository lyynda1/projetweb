<?php

require "../../Config.php" ;
class ContenueC
{
    public function listeContenue()
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("select * from Contenue ORDER BY id ASC");
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function listeContForm($id)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("select * from Contenue where id_formation = $id");
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function supprimer($id)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("Delete from Contenue where id = $id ");
        $requette->execute();
    }
    public function ajout($path , $description , $id_formation)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("INSERT INTO Contenue (path , description , id_formation) value (:path , :description , :id_formation)");
        $requette->bindParam(":path" , $path);
        $requette->bindParam(":description" , $description);
        $requette->bindParam(":id_formation" , $id_formation);
        $requette->execute();
    }
    public function existe($id)
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("select * from Contenue where id =:id");
        $requette->bindParam(":id" , $id);
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function modifier($id , $Path , $Description  , $ID_Formation  )
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("UPDATE Contenue SET path = :Path , description=:Description , ID_Formation = :ID_Formation  where id = :id");
        $requette->bindParam(":Path" , $Path);
        $requette->bindParam(":Description" , $Description);
        $requette->bindParam(":ID_Formation" , $ID_Formation);
        $requette->bindParam(":id" , $id);
        $requette->execute();
    }
    public function searchAndSortUsers($critere , $valeur) 
    {
        $conn = config :: getConnexion();
        $valeur = "%$valeur%";
        $requette = $conn->prepare("SELECT * FROM Contenue WHERE $critere LIKE :valeur ORDER BY $critere ASC");
        $requette->bindParam(":valeur" , $valeur);
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
    public function trie($critere ) 
    {
        $conn = config :: getConnexion();
        $requette = $conn->prepare("SELECT * FROM Contenue ORDER BY $critere ASC");
        $requette->execute();
        $resultats = $requette->fetchAll(PDO::FETCH_ASSOC);
        return $resultats ;
    }
}


?>