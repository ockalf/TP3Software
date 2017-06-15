<?php 

class Jugador {
	//Primary Key
	private $oidjugador;
	//Atributes
	private $nombre;
	private $apellido;
	private $numero;
	//Foreign Key
	private $equipo;
	
	//Set-Get Methods
	public function getoidjugador(){
		return $this -> oidjugador;
	}
	public function setoidjugador($oidj){
		$this -> oidjugador = $oidj;
	}

	public function getnombre(){
		return $this -> nombre;
	}
	public function setnombre($nom){
		$this -> nombre = $nom;
	}

	public function getapellido(){
		return $this -> apellido;
	}
	public function setapellido($ap){
		$this -> apellido = $ap;
	}

	public function getnumero(){
		return $this -> numero;
	}
	public function setnumero($nro){
		$this -> numero = $nro;
	}

	public function getequipo(){
		return $this -> equipo;
	}
	public function setequipo($e){
		$this -> equipo = $e;
	}
}

?>