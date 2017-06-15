<?php 

class Periodista {
	//Primary Key
	private $oidperiodista;
	//Atributes
	private $dni;
	private $nombre;
	private $apellido;
	private $telefono;
	private $mail;
	private $usuario;
	private $contrasena;
	private $urlfoto;
	private $descripcion;
	//Foreign Key

	//Set-Get Methods
	public function getoidperiodista(){
		return $this -> oidperiodista;
	}
	public function setoidperiodista($oid){
		$this -> oidperiodista = $oid;
	}
	
	public function getdni(){
		return $this -> dni;
	}
	public function setdni($d){
		$this -> dni = $d;
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

	public function gettelefono(){
		return $this -> telefono;
	}
	public function settelefono($tf){
		$this -> telefono = $tf;
	}

	public function getmail(){
		return $this -> mail;
	}
	public function setmail($ml){
		$this -> mail = $ml;
	}

	public function getusuario(){
		return $this -> usuario;
	}
	public function setusuario($us){
		$this -> usuario = $us;
	}

	public function getcontrasena(){
		return $this -> contrasena;
	}
	public function setcontrasena($psw){
		$this -> contrasena = $psw;
	}

	public function geturlfoto(){
		return $this -> urlfoto;
	}
	public function seturlfoto($urlf){
		$this -> urlfoto = $urlf;
	}

	public function getdescripcion(){
		return $this -> descripcion;
	}
	public function setdescripcion($desc){
		$this -> descripcion = $desc;
	}	
}

?>