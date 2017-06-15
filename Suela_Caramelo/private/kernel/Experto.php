<?php 

require_once 'DB.php';
require_once 'Functions.php';

class Experto {
	
	//Noticia
	function buscarNoticias($cat,$desde,$hasta){
		if ($cat == "") {			
			$raw = DB::buscar("Noticia","1");
		} else {
			$raw = new ArrayObject();

			$lc = DB::buscar("Categoria",
                "nombre = '".$cat."'");
			$ilc = $lc -> getIterator();

			while ($ilc -> valid()){
			    $c = $ilc -> current();
			    $ilc -> next();
			}

			if (!isset($c)){
				return $a = [];
			}

			$lcn = $c -> getlistcategorianoticia();
			$ilcn = $lcn -> getIterator();
			while ($ilcn -> valid()){
			    $cn = $ilcn -> current();
			    $n = $cn -> getnoticia();
			    $raw -> append($n);
			    $ilcn -> next();
			}
		}

		$raw = F::sortDate($raw);
		$iraw = $raw -> getIterator();

		$listnoticia = '{"noticias":[';
		$cont = 1;
		while ($iraw -> valid()){
			$dto = new DTOInicioNoticia();
			$noti = $iraw -> current();
			if (F::between($desde,$cont,$hasta)){
				$dto -> oidnoticia = $noti -> getoidnoticia();
				$dto -> titulo = $noti -> gettitulo();
				$dto -> subtitulo = $noti -> getsubtitulo();
				$dto -> resumen = $noti -> getresumen();
				$dto -> urlfoto = $noti -> geturlfoto();
				$dto -> fecha = $noti -> getfecha();
				$dto -> fechadestacado = $noti -> getfechadestacado();
				$dto -> contador = $noti -> getcontador();

				$listnoticia .=
					json_encode($dto).",";
			}
			$cont++;
			$iraw -> next();
		}

		if (strlen($listnoticia)>15) {
			$listnoticia = substr($listnoticia, 0, -1);
		}
		$listnoticia .= ']}';
		return $listnoticia;
	}

	function abrirNoticia($oidnoticia) {
		//Busqueda de Noticia
		$dtonoticia = new DTONoticia();
		$dtoperiodista = new DTOInicioPeriodista();

		$raw = DB::buscar("Noticia","oidnoticia = ".$oidnoticia);
		$iraw = $raw -> getIterator();

		while ($iraw -> valid()) {
			$noticia = $iraw -> current();
			$iraw -> next();
		}

		if (!isset($noticia)){
			return $a = [];
		}

		//Busqueda y seteo de los datos de DTOPeriodista
		$periodista = $noticia -> getperiodista();

		$dtoperiodista->oidperiodista=$periodista->getoidperiodista();
		$dtoperiodista->nombre=$periodista->getnombre();
		$dtoperiodista->apellido=$periodista->getapellido();
		$dtoperiodista->urlfoto=$periodista->geturlfoto();

		//Busqueda y seteo de los datos de la lista de Multimedia
		$ldtomultimedia = new ArrayObject();

		$lmultimedia = $noticia -> getlistmultimedia();
		$ilmultimedia = $lmultimedia -> getIterator();

		while ($ilmultimedia -> valid()) {
			$dtomultimedia = new DTOMultimedia();

			$multimedia = $ilmultimedia -> current();

			$dtomultimedia->oidmultimedia=$multimedia->getoidmultimedia();
			$dtomultimedia->url=$multimedia->geturl();
			$dtomultimedia->descripcion=$multimedia->getdescripcion();
			$dtomultimedia->tipo=$multimedia->gettipo();
			
			$ldtomultimedia -> append($dtomultimedia);

			$ilmultimedia -> next();
		}


		//Seteo de los datos de DTONoticia
		$dtonoticia->oidnoticia=$noticia->getoidnoticia();
		$dtonoticia->titulo=$noticia->gettitulo();
		$dtonoticia->subtitulo=$noticia->getsubtitulo();
		$dtonoticia->cuerpo=$noticia->getcuerpo();
		$dtonoticia->resumen=$noticia->getresumen();
		$dtonoticia->urlfoto=$noticia->geturlfoto();
		$dtonoticia->fecha=$noticia->getfecha();
		$dtonoticia->fechadestacado=$noticia->getfechadestacado();
		$dtonoticia->contador=$noticia->getcontador();

		$dtonoticia->periodista=$dtoperiodista;
		$dtonoticia->listmultimedia=$ldtomultimedia;

		$jnoticia = json_encode($dtonoticia);

		//Aumentar contador de visitas
		$contador = $noticia->getcontador();
		$noticia -> setcontador($contador+1);
		DB::actualizar($noticia);

		/*
		//Esto es temporal hasta que agregue "Actualizar Noticia"
		$contador = $noticia->getcontador();
		$cont = 0;
		$cont = (int)$contador + 1;
		$sql = "UPDATE Noticia 
			SET contador = ".$cont.
			" WHERE oidnoticia = ".$oidnoticia;

		$conn = DB::conectar();
		$conn->query($sql);
		DB::desconectar($conn);
		*/

		return $jnoticia;
	}

	function crearNoticia($dton){
		$n = new Noticia();
		$n->settitulo($dton->titulo);
		$n->setsubtitulo($dton->subtitulo);
		$n->setcuerpo($dton->cuerpo);
		$n->setresumen($dton->resumen);
		$n->seturlfoto($dton->urlfoto);
		$n->setfecha($dton->fecha);
		$n->setfechadestacado($dton->fechadestacado);
		$n->setcontador($dton->contador);

		$p = new Periodista();
		$p->setoidperiodista($dton->periodista->oidperiodista);
		$n->setperiodista($p);

		$oidn = DB::insertar($n);
		$n->setoidnoticia($oidn);

		$am = $dton->listmultimedia;
		$lm = new ArrayObject();

		foreach ($am as $dtom) {
			$lm->append($dtom);

			$m = new Multimedia();
			$m->seturl($dtom->url);
			$m->setdescripcion($dtom->descripcion);
			$m->settipo($dtom->tipo);
			$m->setnoticia($n);

			DB::insertar($m);
		}
	}

	function actualizarNoticia($dton){
		$n = new Noticia();
		$n->setoidnoticia($dton->oidnoticia);
		$n->settitulo($dton->titulo);
		$n->setsubtitulo($dton->subtitulo);
		$n->setcuerpo($dton->cuerpo);
		$n->setresumen($dton->resumen);
		$n->seturlfoto($dton->urlfoto);
		$n->setfecha($dton->fecha);
		$n->setfechadestacado($dton->fechadestacado);
		$n->setcontador($dton->contador);

		$p = new Periodista();
		$p->setoidperiodista($dton->periodista->oidperiodista);
		$n->setperiodista($p);
		
		$oidn = DB::actualizar($n);
		$n->setoidnoticia($oidn);

		$am = $dton->listmultimedia;
		$lm = new ArrayObject();

		foreach ($am as $dtom) {
			$lm->append($dtom);

			$m = new Multimedia();
			$m->seturl($dtom->url);
			$m->setdescripcion($dtom->descripcion);
			$m->settipo($dtom->tipo);
			$m->setnoticia($n);

			//DB::actualizar($m);
		}
	}


	//Literario
	function buscarLiterarios($desde,$hasta){
		$raw = new ArrayObject();

		$raw = DB::buscar("Literario","1");

		$raw = F::sortDate($raw);
		$iraw = $raw -> getIterator();

		$listliterario = '{"literarios":[';
		$cont = 1;

		while ($iraw -> valid()){
			$lit = $iraw -> current();
			$dto = new DTOInicioLiterario();

			if (F::between($desde,$cont,$hasta)){
				$dto->oidliterario=$lit->getoidliterario();
				$dto->titulo=$lit->gettitulo();
				$dto->contador=$lit->getcontador();
				$dto->autor=$lit->getautor();
				$dto->fecha=$lit->getfecha();

				$listliterario .=
					json_encode($dto).",";
			}

			$cont++;
			$iraw -> next();
		}

		if (strlen($listliterario)>15) {
			$listliterario = substr($listliterario, 0, -1);
		}
		$listliterario .= ']}';
		return $listliterario;
	}

	function abrirLiterario($oidliterario){
		//Busqueda de Literaio
		$raw = DB::buscar("Literario","oidliterario = ".$oidliterario);
		$iraw = $raw->getIterator();

		while ($iraw->valid()){
			$literario = $iraw->current();
			$iraw->next();
		}
		
		if (!isset($literario)){
			return $a = "";
		}

		//Busqueda y seteo de los datos de la lista de Pagina
		$ldtop = new ArrayObject();

		$raw = DB::buscar("Pagina","oidliterario = ".$oidliterario);
		$iraw = $raw->getIterator();
		
		while ($iraw->valid()){
			$pagina = $iraw->current();
			$dtop = new DTOPagina();

			$dtop->oidpagina = $pagina->getoidpagina();
			$dtop->cuerpo = $pagina->getcuerpo();
			$dtop->urlfoto = $pagina->geturlfoto();

			$ldtop->append($dtop);

			$iraw->next();
		}

		//Seteo de los datos de DTOLiterario
		$dtol = new DTOLiterario();

		$dtol->oidliterario = $literario->getoidliterario();
		$dtol->titulo = $literario->gettitulo();
		$dtol->contador = $literario->getcontador();
		$dtol->autor = $literario->getautor();
		$dtol->fecha = $literario->getfecha();
		$dtol->listpagina = $ldtop;

		$jliterario = json_encode($dtol);

		//Aumentar contador de visitas
		//Esto es temporal hasta que agregue "Actualizar Literaio"
		$contador = $literario->getcontador();
		$cont = 0;
		$cont = (int)$contador + 1;
		$sql = "UPDATE Literario 
			SET contador = ".$cont.
			" WHERE oidliterario = ".$oidliterario;

		$conn = DB::conectar();
		$conn->query($sql);
		DB::desconectar($conn);

		return $jliterario;
	}

	function crearLiterario($jliterario){

	}

	function actualizarLiterario($jliterario){

	}

	//Otros
	function login($usuario,$contrasena){
		// Busqueda de Periodista por Usuario y Contraseña
		$raw = DB::buscar(
			"Periodista",
			"usuario = '".$usuario.
			"' AND contrasena = '".$contrasena."'" 
		);
		$iraw = $raw->getIterator();
		while ($iraw->valid()){
			$periodista = $iraw->current();
			$iraw->next();
		}

		if (!isset($periodista)){
			return $a = [];
		}

		// Seteo de DTOPeriodista
		$dtop = new DTOPeriodista();

		$dtop-> oidperiodista = $periodista->getoidperiodista();
		$dtop-> dni = $periodista->getdni();
		$dtop-> nombre = $periodista->getnombre();
		$dtop-> apellido = $periodista->getapellido();
		$dtop-> telefono = $periodista->gettelefono();
		$dtop-> mail = $periodista->getmail();
		$dtop-> usuario = $periodista->getusuario();
		$dtop-> contrasena = $periodista->getcontrasena();
		$dtop-> urlfoto = $periodista->geturlfoto();
		$dtop-> descripcion = $periodista->getdescripcion();

		$jdtop = json_encode($dtop);
		
		return $jdtop;
	}

	function buscar($condicion){
		if ($condicion == "") {			
			$raw = DB::buscar("Noticia","1");
		} else {
			$raw = new ArrayObject();

			$lnoti = DB::buscar("Noticia",
                "titulo LIKE '%".$condicion."%'");
			$ilnoti = $lnoti -> getIterator();

			while ($ilnoti -> valid()){
			    $noti = $ilnoti -> current();
				$raw->append($noti);
			    $ilnoti -> next();
			}
		}

		if (!isset($raw)){
			return $a = [];
		}

		$raw = F::sortDate($raw);
		$iraw = $raw -> getIterator();

		$listnoticia = '{"noticias":[';
		$cont = 1;
		while ($iraw -> valid()){
			$dto = new DTOInicioNoticia();
			$noti = $iraw -> current();
			if (F::between(1,$cont,15)){
				$dto -> oidnoticia = $noti -> getoidnoticia();
				$dto -> titulo = $noti -> gettitulo();
				$dto -> subtitulo = $noti -> getsubtitulo();
				$dto -> resumen = $noti -> getresumen();
				$dto -> urlfoto = $noti -> geturlfoto();
				$dto -> fecha = $noti -> getfecha();
				$dto -> fechadestacado = $noti -> getfechadestacado();
				$dto -> contador = $noti -> getcontador();

				$listnoticia .=
					json_encode($dto).",";
			}
			$cont++;
			$iraw -> next();
		}

		if (strlen($listnoticia)>15) {
			$listnoticia = substr($listnoticia, 0, -1);
		}
		$listnoticia .= ']}';
		return $listnoticia;
	}
}

?>