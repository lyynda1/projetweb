<?php
	include_once dirname(__FILE__).'/../Config.php';
	include_once dirname(__FILE__).'/../model/Categorie.php';

	class CategorieC {

/////..............................Afficher............................../////
		function AfficherCategorie(){
			$sql="SELECT * FROM Categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

/////..............................Supprimer............................../////
		function SupprimerCategorie($idC){
			$sql="DELETE FROM Categorie WHERE idC=:idC";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idC', $idC);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}


/////..............................Ajouter............................../////
		function AjouterCategorie($Categorie){
			$sql="INSERT INTO Categorie (nomC) 
			VALUES (:nomC)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nomC' => $Categorie->getnomC(),
			]);
						
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
/////..............................Affichage par la cle Primaire............................../////
		function RecupererCategorie($idC){
			$sql="SELECT * from Categorie where idC=$idC";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Categorie=$query->fetch();
				return $Categorie;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
		function ModifierCategorie($Categorie,$idC){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE Categorie SET  NomC = :NomC WHERE idC= :idC');
				$query->execute([
					'NomC' => $Categorie->getNomC(),
					'idC' => $idC
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
    }
	?>
