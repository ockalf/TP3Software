<?php 

class Patrocinador {
	//Primary Key
	private $oidpatrocinador;
	//Atributes
	private $urlanuncio1;
	private $urlanuncio2;
	private $urlanuncio3;
	private $urllogo;
	private $nombre;
	private $link;
	//Foreign Key
	
	//Set-Get Methods
	public function getoidpatrocinador(){
		return $this -> oidpatrocinador;
	}
	public function setoidpatrocinador($oidp){
		$this -> oidpatrocinador = $oidp;
	}

	public function geturlanuncio1(){
		return $this -> urlanuncio1;
	}
	public function seturlanuncio1($urp1){
		$this -> urlanuncio1 = $urp1;
	}

	public function geturlanuncio2(){
		return $this -> urlanuncio2;
	}
	public function seturlanuncio2($urp2){
		$this -> urlanuncio2 = $urp2;
	}

	public function geturlanuncio3(){
		return $this -> urlanuncio3;
	}
	public function seturlanuncio3($urp3){
		$this -> urlanuncio3 = $urp3;
	}

	public function geturllogo(){
		return $this -> urllogo;
	}
	public function seturllogo($url){
		$this -> urllogo = $url;
	}

	public function getnombre(){
		return $this -> nombre;
	}
	public function setnombre($nom){
		$this -> nombre = $nom;
	}

	public function getlink(){
		return $this -> link;
	}
	public function setlink($lnk){
		$this -> link = $lnk;
	}
}

?>