<?php 

class CategoriaNoticia {
	//Primary Key
	private $oidcategorianoticia;
	//Atributes
	//Foreign Key
	private $categoria;
	private $noticia;
	
	//Set-Get Methods
	public function getoidcategorianoticia(){
		return $this -> oidcategorianoticia;
	}
	public function setoidcategorianoticia($oidcn){
		$this -> oidcategorianoticia = $oidcn;
	}

	public function getnoticia(){
		return $this -> noticia;
	}
	public function setnoticia($n){
		$this -> noticia = $n;
	}

	public function getcategoria(){
		return $this -> categoria;
	}
	public function setcategoria($c){
		$this -> categoria = $c;
	}
}

?>