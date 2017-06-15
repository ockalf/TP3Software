<?php 

class Partido {
	//Primary Key
	private $oidpartido;
	//Atributes
	private $fecha;
	//Foreign Key
	private $local;
	private $visitante;
	private $listgol;

	//Construct
	public function __CONSTRUCT(){
		$this -> listgol = new ArrayObject();
	}
	
	//Set-Get Methods
	public function getoidpartido(){
		return $this -> oidpartido;
	}
	public function setoidpartido($oidp){
		$this -> oidpartido = $oidp;
	}

	public function getfecha(){
		return $this -> fecha;
	}
	public function setfecha($fch){
		$this -> fecha = $fch;
	}

	public function getlocal(){
		return $this -> local;
	}
	public function setlocal($l){
		$this -> local = $l;
	}

	public function getvisitante(){
		return $this -> visitante;
	}
	public function setvisitante($v){
		$this -> visitante = $v;
	}

	public function getlistgol(){
		return $this -> listgol;
	}
	public function addlistgol($g){
		$this -> listgol -> append($g);
	}
}

?>