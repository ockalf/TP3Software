<?php 

class Multimedia {
	//Primary Key
	private $oidmultimedia;
	//Atributes
	private $url;
	private $descripcion;
	private $tipo;
	//Foreign Key
	private $noticia;
	
	//Set-Get Methods
	public function getoidmultimedia(){
		return $this -> oidmultimedia;
	}
	public function setoidmultimedia($oidm){
		$this -> oidmultimedia = $oidm;
	}

	public function geturl(){
		return $this -> url;
	}
	public function seturl($ur){
		$this -> url = $ur;
	}

	public function getdescripcion(){
		return $this -> descripcion;
	}
	public function setdescripcion($desc){
		$this -> descripcion = $desc;
	}

	public function gettipo(){
		return $this -> tipo;
	}
	public function settipo($tp){
		$this -> tipo = $tp;
	}

	public function getnoticia(){
		return $this -> noticia;
	}
	public function setnoticia($n){
		$this -> noticia = $n;
	}
}

?>