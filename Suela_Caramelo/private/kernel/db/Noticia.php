<?php 

class Noticia {
	//Primary Key
	private $oidnoticia;
	//Atributes
	private $titulo;
	private $subtitulo;
	private $cuerpo;
	private $resumen;
	private $urlfoto;
	private $fecha;
	private $fechadestacado;
	private $contador;
	//Foreign Key
	private $periodista;
	private $partido;
	private $listmultimedia;

	//Construct
	public function __CONSTRUCT(){
		$this -> listmultimedia = new ArrayObject();
	}

	//Set-Get Methods
	public function getoidnoticia(){
		return $this -> oidnoticia;
	}
	public function setoidnoticia($oidn){
		$this -> oidnoticia = $oidn;
	}

	public function gettitulo(){
		return $this -> titulo;
	}
	public function settitulo($tit){
		$this -> titulo = $tit;
	}

	public function getsubtitulo(){
		return $this -> subtitulo;
	}
	public function setsubtitulo($sub){
		$this -> subtitulo = $sub;
	}

	public function getcuerpo(){
		return $this -> cuerpo;
	}
	public function setcuerpo($crp){
		$this -> cuerpo = $crp;
	}

	public function getresumen(){
		return $this -> resumen;
	}
	public function setresumen($res){
		$this -> resumen = $res;
	}

	public function geturlfoto(){
		return $this -> urlfoto;
	}
	public function seturlfoto($uf){
		$this -> urlfoto = $uf;
	}

	public function getfecha(){
		return $this -> fecha;
	}
	public function setfecha($fch){
		$this -> fecha = $fch;
	}

	public function getfechadestacado(){
		return $this -> fechadestacado;
	}
	public function setfechadestacado($fchd){
		$this -> fechadestacado = $fchd;
	}

	public function getcontador(){
		return $this -> contador;
	}
	public function setcontador($cont){
		$this -> contador = $cont;
	}

	public function getperiodista(){
		return $this -> periodista;
	}
	public function setperiodista($p){
		$this -> periodista = $p;
	}

	public function getpartido(){
		return $this -> partido;
	}
	public function setpartido($p){
		$this -> partido = $p;
	}

	public function getlistmultimedia(){
		return $this -> listmultimedia;
	}
	public function addlistmultimedia($m){
		$this -> listmultimedia -> append($m);
	}
}

?>