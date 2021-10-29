<?php

class NFT{
	//Attributs
	private $_nom;
	private $_createur;
	private $_crypto;
	private $_dateDeCreation;
	private $_categorie;
	private $_prix;
	
	//Constructeur
	public function __construct($nom, $createur, $crypto, $dateDeCreation, $categorie, $prix){
		$this->_nom=$nom;
		$this->_createur=$createur;
		$this->_crypto=$crypto;
		$this->_dateDeCreation=$dateDeCreation;
		$this->_categorie=$categorie;
		$this->_prix=$prix;
	}
	
	public function setNom($nom){
		$this->_nom=$nom;
	}
	public function setCreateur($createur){
		$this->_createur=$createur;
	}
	public function setCrypto($crypto){
		$this->_crypto=$crypto;
	}
	public function setDateDeCreation($dateDeCreation){
		$this->_dateDeCreation=$dateDeCreation;
	}
	public function setCategorie($categorie){
		$this->_categorie=$categorie;
	}
	public function setPrix($prix){
		$this->_prix=$prix;
	}
	
	public function getNom(){
		return $this->_nom;
	}
	public function getCreateur(){
		return $this->_createur;
	}
	public function getCrypto(){
		return $this->_crypto;
	}
	public function getDateDeCreation(){
		return $this->_dateDeCreation;
	}
	public function getCategorie(){
		return $this->_categorie;
	}
	public function getPrix(){
		return $this->_prix;
	}
}
