<?php 

class DTONoticia {
	//Primary Key
	public $oidnoticia;
	//Atributes
	public $titulo;
	public $subtitulo;
	public $cuerpo;
	public $resumen;
	public $urlfoto;
	public $fecha;
	public $fechadestacado;
	public $contador;
	//Foreign Key
	public $periodista;
	public $listmultimedia;
}

?>