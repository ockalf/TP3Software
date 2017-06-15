<?php 

class Pagina {
	//Primary Key
	private $oidpagina;
	//Atributes
	private $cuerpo;
	private $urlfoto;
	//Foreign Key
	private $literario;
	
	//Set-Get Methods
	public function getoidpagina(){
		return $this -> oidpagina;
	}
	public function setoidpagina($oidpg){
		$this -> oidpagina = $oidpg;
	}

	public function getcuerpo(){
		return $this -> cuerpo;
	}
	public function setcuerpo($crp){
		$this -> cuerpo = $crp;
	}

	public function geturlfoto(){
		return $this -> urlfoto;
	}
	public function seturlfoto($urlf){
		$this -> urlfoto = $urlf;
	}

	public function getliterario(){
		return $this -> literario;
	}
	public function setliterario($l){
		$this -> literario = $l;
	}
}

?>