<?php 

class Gol {
	//Primary Key
	private $oidgol;
	//Atributes
	private $tiempo;
	//Foreign Key
	private $equipo;
	private $jugador;
	private $partido;
	//Set-Get Methods
	public function getoidgol(){
		return $this -> oidgol;
	}
	public function setoidgol($oidg){
		$this -> oidgol = $oidg;
	}

	public function gettiempo(){
		return $this -> tiempo;
	}
	public function settiempo($t){
		$this -> tiempo = $t;
	}

	public function getequipo(){
		return $this -> equipo;
	}
	public function setequipo($e){
		$this -> equipo = $e;
	}

	public function getjugador(){
		return $this -> jugador;
	}
	public function setjugador($j){
		$this -> jugador = $j;
	}

	public function getpartido(){
		return $this -> partido;
	}
	public function setpartido($p){
		$this -> partido = $p;
	}
}

?>