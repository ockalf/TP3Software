<?php 

require_once 'Experto.php';

$funcion = $_POST['fnc'];
$param = json_decode($_POST['par']);


Interfaz::$funcion($param);

class Interfaz {
	
	//Noticia
	function buscarNoticias($param) {
		$data = Experto::buscarNoticias($param[0],$param[1],$param[2]);
		if (is_string($data)){
			echo $data;
		} else {
			echo '{"noticias":null}';
		}
	}

	function abrirNoticia($oidnoticia) {
		$data = Experto::abrirNoticia($oidnoticia);
		if (is_string($data)){
			echo $data;
		} else {
			echo '{"noticia":null}';
		}
	}

	function crearNoticia($param) {
		Experto::crearNoticia($param);
	}

	function actualizarNoticia($jnoticia) {
		$noticia = json_decode($jnoticia);
		Experto::actualizarNoticia($noticia);
	}

	//Literarios
	function buscarLiterarios($desde,$hasta) {
		$data = Experto::buscarLiterarios($desde,$hasta);
		if (is_string($data)){
			echo $data;
		} else {
			echo '{"literarios":null}';
		}
	}

	function abrirLiterario($oidliterario) {
		$data = Experto::abrirLiterario($oidliterario);
		if (is_string($data)){
			echo $data;
		} else {
			echo '{"literario":null}';
		}
	}

	function crearLiterario($jliterario) {
		Experto::crearLiterario($jliterario);
	}

	function actualizarLiterario($jliterario) {
		Experto::actualizarLiterario($jliterario);
	}

	//Otros
	function login($usuario,$contraseña){
		$data = Experto::login($usuario,$contraseña);
		if (is_string($data)){
			echo $data;
		} else {
			echo '{"periodista":null}';
		}
	}

	function buscar($condicion){
		$data = Experto::buscar($condicion);
		if (is_string($data)){
			echo $data;
		} else {
			echo '{"noticias":null}';
		}
	}
}

?>