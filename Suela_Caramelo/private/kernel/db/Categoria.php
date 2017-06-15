<?php 

class Categoria {
	//Primary Key
	private $oidcategoria;
	//Atributes
	private $nombre;
	private $link;
	//Foreign Key
	private $listcategorianoticia;

	//Construct
	public function __CONSTRUCT(){
		$this -> listcategorianoticia = new ArrayObject();
	}
	
	//Set-Get Methods
	public function getoidcategoria(){
		return $this -> oidcategoria;
	}
	public function setoidcategoria($oidc){
		$this -> oidcategoria = $oidc;
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

	public function getlistcategorianoticia(){
		return $this -> listcategorianoticia;
	}
	public function addlistcategorianoticia($cn){
		$this -> listcategorianoticia -> append($cn);
	}
}

?>