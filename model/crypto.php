<?php

class Crypto{
	//Attributs
	private $_nom;
	private $_euro;
	private $_dollar;
	
	//Constructeur
	public function __construct($nom, $euro, $dollar){
		$this->_nom=$nom;
		$this->_euro=$euro;
		$this->_dollar=$dollar;
	}
	
	public function setNom($nom){
		$this->_nom=$nom;
	}
	public function setEuro($euro){
		$this->_euro=$euro;
	}
	public function setDollar($dollar){
		$this->_dollar=$dollar;
	}
	
	public function getNom(){
		return $this->_nom;
	}
	public function getEuro(){
		return $this->_euro;
	}
	public function getDollar(){
		return $this->_dollar;
	}
}
