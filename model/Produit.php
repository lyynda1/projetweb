<?php
	class Produit{
		private $idProduit=null;
		private $nomProduit=null;
		private $prix=null;
        private $description=null;
		private $image = null ;
		private $dateCreation = null ;		
		//// Contructor
		function __construct($nomProduit,$image,$description,$prix,$categorie){
			$this->nomProduit=$nomProduit;
            $this->image=$image;
			$this->description=$description;
			$this->prix=$prix;
			$this->categorie=$categorie;
		}

        /// Getters
		function getidProduit(){
			return $this->idProduit;
		}
		

		function getnomProduit(){
			return $this->nomProduit;
		}
		function getprix(){
			return $this->prix;
		}
		function getdescription(){
			return $this->description;
		}

		function getimage(){
			return $this->image;
		}

		function getcategorie(){
			return $this->categorie;
		}

		
       //// Setters
		function setnomProduit(string $nomProduit){
			$this->nomProduit=$nomProduit;
		}
		function setprix(string $prix){
			$this->prix=$prix;
		}
		function setdescription(string $description){
			$this->description=$description;
		}
		function setcategorie(int $categorie){
			$this->categorie=$categorie;
		}
		function setimage(string $image){
			$this->image=$image;
		}

	}
?>