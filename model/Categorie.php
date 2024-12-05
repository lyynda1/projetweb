<?php
	class Categorie{
		private $idC=null;
		private $nomC=null;
	
		//// Contructor
		function __construct($nomC){
			$this->nomC=$nomC;
		}

        /// Getters
		function getidC(){
			return $this->idC;
		}
		

		function getnomC(){
			return $this->nomC;
		}
			
       //// Setters
		function setnomC(string $nomC){
			$this->nomC=$nomC;
		}


	}
?>