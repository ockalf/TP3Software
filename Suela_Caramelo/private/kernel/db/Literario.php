<?php 

class Literario {
	//Primary Key
	private $oidliterario;
	//Atributes
	private $titulo;
	private $contador;
	private $autor;
	private $fecha;
	//Foreign Key
	private $listpagina;

	//Construct
	public function __CONSTRUCT(){
		$this -> listpagina = new ArrayObject();
	}
	
	//Set-Get Methods
	public function getoidliterario(){
		return $this -> oidliterario;
	}
	public function setoidliterario($oidl){
		$this -> oidliterario = $oidl;
	}

	public function gettitulo(){
		return $this -> titulo;
	}
	public function settitulo($tt){
		$this -> titulo = $tt;
	}

	public function getcontador(){
		return $this -> contador;
	}
	public function setcontador($con){
		$this -> contador = $con;
	}

	public function getautor(){
		return $this -> autor;
	}
	public function setautor($aut){
		$this -> autor = $aut;
	}

	public function getfecha(){
		return $this -> fecha;
	}
	public function setfecha($fec){
		$this -> fecha = $fec;
	}

	public function getlistpagina(){
		return $this -> listpagina;
	}
	public function addlistpagina($lp){
		$this -> listpagina -> append($lp);
	}
}

?>