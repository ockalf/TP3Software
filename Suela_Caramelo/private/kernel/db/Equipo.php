<?php 

class Equipo {
	//Primary Key
	private $oidequipo;
	//Atributes
	private $nombre;
	private $urlescudo;
	private $lugar;
	//Foreign Key
	private $listjugador;

	//Construct
	public function __CONSTRUCT(){
		$this -> listjugador = new ArrayObject();
	}
	
	//Set-Get Methods
	public function getoidequipo(){
		return $this -> oidequipo;
	}
	public function setoidequipo($oide){
		$this -> oidequipo = $oide;
	}

	public function getnombre(){
		return $this -> nombre;
	}
	public function setnombre($nom){
		$this -> nombre = $nom;
	}

	public function geturlescudo(){
		return $this -> urlescudo;
	}
	public function seturlescudo($urle){
		$this -> urlescudo = $urle;
	}

	public function getlugar(){
		return $this -> lugar;
	}
	public function setlugar($lu){
		$this -> lugar = $lu;
	}

	public function getlistjugador(){
		return $this -> listjugador;
	}
	public function addlistjugador($j){
		$this -> listjugador -> append($j);
	}
}

?>