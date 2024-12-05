<?php
	include_once dirname(__FILE__).'/../Config.php';
	include_once dirname(__FILE__).'/../model/Produit.php';

	class ProduitC {

/////..............................Afficher............................../////
		function AfficherProduits(){
			$sql="SELECT * FROM Produit";
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
		function SupprimerProduit($idProduit){
			$sql="DELETE FROM Produit WHERE idProduit=:idProduit";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':idProduit', $idProduit);   
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}


/////..............................Ajouter............................../////
		function AjouterProduit($idProduit){
			$sql="INSERT INTO Produit (nomProduit,image,description,prix,categorie) 
			VALUES (:nomProduit,:image,:description,:prix,:categorie)";
			
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'nomProduit' => $idProduit->getnomProduit(),
					'image' => $idProduit->getimage(),
					'description' => $idProduit->getdescription(),
                    'prix' => $idProduit->getprix(),
					'categorie' => $idProduit->getcategorie()
			]);
						
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
/////..............................Affichage par la cle Primaire............................../////
		function RecupererProduit($idProduit){
			$sql="SELECT * from Produit where idProduit=$idProduit";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Produit=$query->fetch();
				return $Produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

/////..............................Update............................../////
		function ModifierProduit($Produit,$idProduit){
			try {
				$db = config::getConnexion();
		$query = $db->prepare('UPDATE Produit SET  nomProduit = :nomProduit , image = :image , description = :description , prix = :prix , categorie = :categorie  WHERE idProduit= :idProduit');
				$query->execute([
					'nomProduit' => $Produit->getnomProduit(),
					'image' => $Produit->getimage(),
					'description' => $Produit->getdescription(),
					'prix' => $Produit->getprix(),
					'categorie' => $Produit->getcategorie(),
					'idProduit' => $idProduit
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}


		function RechercheCat($categorie){
			$sql="SELECT * from produit where categorie=$categorie";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}


        } 
	?>
