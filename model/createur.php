<?php

class Createur{
	//Attributs
	private $_pseudonyme;
	private $_twitter;
	private $_insta;
	
	//Constructeur
	public function __construct($pseudonyme, $twitter, $insta){
		$this->_pseudonyme=$pseudonyme;
		$this->_twitter=$twitter;
		$this->_insta=$insta;
	}
	
	public function setPseudonyme($pseudonyme){
		$this->_pseudonyme=$pseudonyme;
	}
	public function setTwitter($twitter){
		$this->_twitter=$twitter;
	}
	public function setInsta($insta){
		$this->_insta=$insta;
	}
	
	public function getPseudonyme(){
		return $this->_pseudonyme;
	}
	public function getTwitter(){
		return $this->_twitter;
	}
	public function getInsta(){
		return $this->_insta;
	}
}
