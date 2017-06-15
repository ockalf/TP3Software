<?php 

class Contacto {
	//Primary Key
	private $oidcontacto;
	//Atributes
	private $telefono;
	private $direccion;
	private $celular;
	private $mail;
	//Foreign Key
	
	//Set-Get Methods
	public function getoidcontacto(){
		return $this -> oidcontacto;
	}
	public function setoidcontacto($oidc){
		$this -> oidcontacto = $oidc;
	}

	public function gettelefono(){
		return $this -> telefono;
	}
	public function settelefono($tel){
		$this -> telefono = $tel;
	}

	public function getdireccion(){
		return $this -> direccion;
	}
	public function setdireccion($dir){
		$this -> direccion = $dir;
	}

	public function getcelular(){
		return $this -> celular;
	}
	public function setcelular($cel){
		$this -> celular = $cel;
	}

	public function getmail(){
		return $this -> mail;
	}
	public function setmail($ml){
		$this -> mail = $ml;
	}
}

?>