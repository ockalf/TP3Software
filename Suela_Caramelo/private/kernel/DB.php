<?php

require_once 'Conection.php';
require_once 'db_class.php';

class DB {

	public function buscar($tabla,$condicion){
		// This function returns a list of db-type-object.
        $oid = strtolower($tabla);
		$conn = DB::conectar();
		$sql = "SELECT * 
			FROM ".$tabla
			." WHERE activo = 1 AND ".$condicion
            ." ORDER BY oid".$oid." DESC";
		$data = $conn->query($sql);
		DB::desconectar($conn);

		switch ($tabla) {
			case "Periodista":
				$result = DB::bdb_periodista($data);
				break;
			
			case "Noticia":
				$result = DB::bdb_noticia($data);
				break;

			case "Multimedia":
				$result = DB::bdb_multimedia($data);
				break;

			case "Partido":
				$result = DB::bdb_partido($data);
				break;

			case "Gol":
				$result = DB::bdb_gol($data);
				break;

			case "Equipo":
				$result = DB::bdb_equipo($data);
				break;

			case "Jugador":
				$result = DB::bdb_jugador($data);
				break;

			case "Contacto":
				$result = DB::bdb_contacto($data);
				break;

            case "Patrocinador":
                $result = DB::bdb_patrocinador($data);
                break;

			case "Categoria":
				$result = DB::bdb_categoria($data);
				break;

            case "CategoriaNoticia":
                $result = DB::bdb_categorianoticia($data);
                break;

            case "Literario":
                $result = DB::bdb_literario($data);
                break;

            case "Pagina":
                $result = DB::bdb_pagina($data);
                break;

			default:
				# code...
				break;
		}
		
		return $result;
	}

	public function actualizar($obj){

		// This function inserts data into SCDB
        $conn = DB::conectar();
        
        $tabla = get_class($obj);        
        
        switch ($tabla) {
            case "Periodista":
                $sql = DB::adb_periodista($obj);
                break;
            
            case "Noticia":
                $sql = DB::adb_noticia($obj);
                break;

            case "Multimedia":
                $sql = DB::adb_multimedia($obj);
                break;

            case "Partido":
                $sql = DB::adb_partido($obj);
                break;

            case "Gol":
                $sql = DB::adb_gol($obj);
                break;

            case "Equipo":
                $sql = DB::adb_equipo($obj);
                break;

            case "Jugador":
                $sql = DB::adb_jugador($obj);
                break;

            case "Contacto":
                $sql = DB::adb_contacto($obj);
                break;

            case "Patrocinador":
                $sql = DB::adb_patrocinador($obj);
                break;

            case "Categoria":
                $sql = DB::adb_categoria($obj);
                break;

            case "CategoriaNoticia":
                $sql = DB::adb_categorianoticia($obj);
                break;

            case "Literario":
                $sql = DB::adb_literario($obj);
                break;

            case "Pagina":
                $sql = DB::adb_pagina($obj);
                break;

            default:
                # code...
                break;
        }

        $conn->query($sql);
        $conn -> insert_id;
        DB::desconectar($conn);
	}

    public function eliminar($obj){

		// This function inserts data into SCDB
        $conn = DB::conectar();
        
        $tabla = get_class($obj);        
        
        switch ($tabla) {
            case "Periodista":
                $sql = DB::edb_periodista($obj);
                break;
            
            case "Noticia":
                $sql = DB::edb_noticia($obj);
                break;

            case "Multimedia":
                $sql = DB::edb_multimedia($obj);
                break;

            case "Partido":
                $sql = DB::edb_partido($obj);
                break;

            case "Gol":
                $sql = DB::edb_gol($obj);
                break;

            case "Equipo":
                $sql = DB::edb_equipo($obj);
                break;

            case "Jugador":
                $sql = DB::edb_jugador($obj);
                break;

            case "Contacto":
                $sql = DB::edb_contacto($obj);
                break;

            case "Patrocinador":
                $sql = DB::edb_patrocinador($obj);
                break;

            case "Categoria":
                $sql = DB::edb_categoria($obj);
                break;

            case "CategoriaNoticia":
                $sql = DB::edb_categorianoticia($obj);
                break;

            case "Literario":
                $sql = DB::edb_literario($obj);
                break;

            case "Pagina":
                $sql = DB::edb_pagina($obj);
                break;

            default:
                # code...
                break;
        }

        $conn->query($sql);
        $conn -> insert_id;
        DB::desconectar($conn);
	}

	public function insertar($obj){
        // This function inserts data into SCDB
        $conn = DB::conectar();
        
        $tabla = get_class($obj);        

        switch ($tabla) {
            case "Periodista":
                $sql = DB::idb_periodista($obj);
                break;
            
            case "Noticia":
                $sql = DB::idb_noticia($obj);
                break;

            case "Multimedia":
                $sql = DB::idb_multimedia($obj);
                break;

            case "Partido":
                $sql = DB::idb_partido($obj);
                break;

            case "Gol":
                $sql = DB::idb_gol($obj);
                break;

            case "Equipo":
                $sql = DB::idb_equipo($obj);
                break;

            case "Jugador":
                $sql = DB::idb_jugador($obj);
                break;

            case "Contacto":
                $sql = DB::idb_contacto($obj);
                break;

            case "Patrocinador":
                $sql = DB::idb_patrocinador($obj);
                break;

            case "Categoria":
                $sql = DB::idb_categoria($obj);
                break;

            case "CategoriaNoticia":
                $sql = DB::idb_categorianoticia($obj);
                break;

            case "Literario":
                $sql = DB::idb_literario($obj);
                break;

            case "Pagina":
                $sql = DB::idb_pagina($obj);
                break;

            default:
                # code...
                break;
        }

        $conn->query($sql);
        $id = $conn -> insert_id;
        DB::desconectar($conn);

        return $id;
	}

	public function conectar(){
		// This function returns an object whith the connection
		$conection = new Conection();
		$s = $conection->getservername();
		$u = $conection->getusername();
		$p = $conection->getpassword();
		$d = $conection->getdbname();
		$conn = new mysqli($s,$u,$p,$d);
        $conn -> set_charset("utf8");
		return $conn;
	}

	public function desconectar($conn){
		// This function recives a connection-object to disconnect
		$conn -> close();
	}

	/* 
	-------------------------------------
	   Switch -> Buscar_Functions    
	-------------------------------------
	*/

	public function bdb_periodista ($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data->fetch_assoc()) {
    			// Create a new Periodista-object
    			$periodista = new Periodista();

    			// Sets each attribute
    			$periodista -> setoidperiodista($row["oidperiodista"]);
    			$periodista -> setdni($row["dni"]);
    			$periodista -> setnombre($row["nombre"]);
    			$periodista -> setapellido($row["apellido"]);
    			$periodista -> settelefono($row["telefono"]);
    			$periodista -> setmail($row["mail"]);
    			$periodista -> setusuario($row["usuario"]);
    			$periodista -> setcontrasena($row["contrasena"]);
    			$periodista -> seturlfoto($row["urlfoto"]);
    			$periodista -> setdescripcion($row["descripcion"]);

    			// Adds the Periodista-object to the ListObject that will be returned
    			$listobject -> append($periodista);
    		}
    	}

		return $listobject;
	}

	public function bdb_noticia($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data->fetch_assoc()) {
    			// Create a new Noticia-object
    			$noticia = new Noticia();

    			// Sets each attribute
    			$noticia -> setoidnoticia($row["oidnoticia"]);
    			$noticia -> settitulo($row["titulo"]);
    			$noticia -> setsubtitulo($row["subtitulo"]);
    			$noticia -> setcuerpo($row["cuerpo"]);
    			$noticia -> setresumen($row["resumen"]);
    			$noticia -> seturlfoto($row["urlfoto"]);
                $noticia -> setfecha($row["fecha"]);
    			$noticia -> setfechadestacado($row["fechadestacado"]);
    			$noticia -> setcontador($row["contador"]);

    			$lo_periodista = DB::buscar("Periodista","oidperiodista = ".$row["oidperiodista"]);
    			$ilo_periodista = $lo_periodista -> getIterator();
    			while($ilo_periodista -> valid()){
    				$periodista = $ilo_periodista -> current();
    				$noticia -> setperiodista($periodista);
    				$ilo_periodista -> next();
    			};

    			$lo_partido = DB::buscar("Partido","oidpartido = ".$row["oidpartido"]);
    			$ilo_partido = $lo_partido -> getIterator();
    			while($ilo_partido -> valid()){
    				$partido = $ilo_partido -> current();
    				$noticia -> setpartido($partido);
    				$ilo_partido -> next();
    			};

    			$lo_multimedia = DB::buscar("Multimedia","oidnoticia = ".$row["oidnoticia"]);
    			$ilo_multimedia = $lo_multimedia -> getIterator();
    			while($ilo_multimedia -> valid()){
    				$multimedia = $ilo_multimedia -> current();
    				$noticia -> addlistmultimedia($multimedia);
    				$ilo_multimedia -> next();
    			};

    			// Adds the Noticia-object to the ListObject that will be returned
    			$listobject -> append($noticia);
    		}
    	}

		return $listobject;
	}

	public function bdb_multimedia($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data->fetch_assoc()) {
    			// Create a new Multimedia-object
    			$multimeda = new Multimedia();

    			// Sets each attribute
    			$multimeda -> setoidmultimedia($row["oidmultimedia"]);
    			$multimeda -> seturl($row["url"]);
    			$multimeda -> setdescripcion($row["descripcion"]);
    			$multimeda -> settipo($row["tipo"]);

    			// Adds the Multimedia-object to the ListObject that will be returned
    			$listobject -> append($multimeda);
    		}
    	}

		return $listobject;
	}

	public function bdb_gol($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data -> fetch_assoc()) {
    			// Create a new Gol-object
    			$gol = new Gol();

    			// Sets each attribute
    			$gol -> setoidgol($row["oidgol"]);
    			$gol -> settiempo($row["tiempo"]);

    			$lo_equipo = DB::buscar("Equipo","oidequipo = ".$row["oidequipo"]);
    			$ilo_equipo = $lo_equipo -> getIterator();
    			while($ilo_equipo -> valid()){
    				$equipo = $ilo_equipo -> current();
    				$gol -> setequipo($equipo);
    				$ilo_equipo -> next();
    			};

    			$lo_jugador = DB::buscar("Jugador","oidjugador = ".$row["oidjugador"]);
    			$ilo_jugador = $lo_jugador -> getIterator();
    			while($ilo_jugador -> valid()){
    				$jugador = $ilo_jugador -> current();
    				$gol -> setjugador($jugador);
    				$ilo_jugador -> next();
    			};

    			// Adds the Gol-object to the ListObject that will be returned
    			$listobject -> append($gol);
    		}
    	}

		return $listobject;
	}

	public function bdb_equipo($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data -> fetch_assoc()) {
    			// Create a new Equipo-object
    			$equipo = new Equipo();

    			// Sets each attribute
    			$equipo -> setoidequipo($row["oidequipo"]);
    			$equipo -> setnombre($row["nombre"]);
    			$equipo -> seturlescudo($row["urlescudo"]);
    			$equipo -> setlugar($row["lugar"]);

    			$lo_jugador = DB::buscar("Jugador","oidequipo = ".$row["oidequipo"]);
    			$ilo_jugador = $lo_jugador -> getIterator();
    			while($ilo_jugador -> valid()){
    				$jugador = $ilo_jugador -> current();
    				$equipo -> addlistjugador($jugador);
    				$ilo_jugador -> next();
    			};

    			// Adds the Equipo-object to the ListObject that will be returned
    			$listobject -> append($equipo);
    		}
    	}

		return $listobject;
	}

	public function bdb_jugador($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data -> fetch_assoc()) {
    			// Create a new Jugador-object
    			$jugador = new Jugador();

    			// Sets each attribute
    			$jugador -> setoidjugador($row["oidjugador"]);
    			$jugador -> setnombre($row["nombre"]);
    			$jugador -> setapellido($row["apellido"]);
    			$jugador -> setnumero($row["numero"]);
                
    			// Adds the Jugador-object to the ListObject that will be returned
    			$listobject -> append($jugador);
    		}
    	}

		return $listobject;
	}

	public function bdb_partido($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data->fetch_assoc()) {
    			// Create a new Partido-object
    			$partido = new Partido();

    			// Sets each attribute
    			$partido -> setoidpartido($row["oidpartido"]);
    			$partido -> setfecha($row["fecha"]);

    			$lo_local = DB::buscar("Equipo","oidequipo = ".$row["oidlocal"]);
    			$ilo_local = $lo_local -> getIterator();
    			while($ilo_local -> valid()){
    				$local = $ilo_local -> current();
    				$partido -> setlocal($local);
    				$ilo_local -> next();
    			};

    			$lo_visitante = DB::buscar("Equipo","oidequipo = ".$row["oidvisitante"]);
    			$ilo_visitante = $lo_visitante -> getIterator();
    			while($ilo_visitante -> valid()){
    				$visitante = $ilo_visitante -> current();
    				$partido -> setvisitante($visitante);
    				$ilo_visitante -> next();
    			};

    			$lo_gol = DB::buscar("Gol","oidpartido = ".$row["oidpartido"]);
    			$ilo_gol = $lo_gol -> getIterator();
    			while($ilo_gol -> valid()){
    				$gol = $ilo_gol -> current();
    				$partido -> addlistgol($gol);
    				$ilo_gol -> next();
    			};

    			// Adds the Partido-object to the ListObject that will be returned
    			$listobject -> append($partido);
    		}
    	}

		return $listobject;
	}

	public function bdb_contacto($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data->fetch_assoc()) {
    			// Create a new Contacto-object
    			$contacto = new Contacto();

    			// Sets each attribute
    			$contacto -> setoidcontacto($row["oidcontacto"]);
    			$contacto -> settelefono($row["telefono"]);
    			$contacto -> setdireccion($row["direccion"]);
    			$contacto -> setcelular($row["celular"]);
    			$contacto -> setmail($row["mail"]);

    			// Adds the Contacto-object to the ListObject that will be returned
    			$listobject -> append($contacto);
    		}
    	}

		return $listobject;
	}

	public function bdb_patrocinador($data){
		$listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

		// Test for empty search
		if ($data->num_rows > 0) {
    		// Acquire data of each row
    		while($row = $data->fetch_assoc()) {
    			// Create a new Patrocinador-object
    			$patrocinador = new Patrocinador();

    			// Sets each attribute
    			$patrocinador -> setoidpatrocinador($row["oidpatrocinador"]);
    			$patrocinador -> seturlanuncio1($row["urlanuncio1"]);
    			$patrocinador -> seturlanuncio2($row["urlanuncio2"]);
    			$patrocinador -> seturlanuncio3($row["urlanuncio3"]);
    			$patrocinador -> seturllogo($row["urllogo"]);
    			$patrocinador -> setnombre($row["nombre"]);
    			$patrocinador -> setlink($row["link"]);

    			// Adds the Patrocinador-object to the ListObject that will be returned
    			$listobject -> append($patrocinador);
    		}
    	}

		return $listobject;
	}

    public function bdb_categoria($data){
        $listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

        // Test for empty search
        if ($data->num_rows > 0) {
            // Acquire data of each row
            while($row = $data->fetch_assoc()) {
                // Create a new Categoria-object
                $categoria = new Categoria();

                // Sets each attribute
                $categoria -> setoidcategoria($row["oidcategoria"]);
                $categoria -> setnombre($row["nombre"]);
                $categoria -> setlink($row["link"]);

                $lo_cn = DB::buscar("CategoriaNoticia","oidcategoria = ".$row["oidcategoria"]);
                $ilo_cn = $lo_cn -> getIterator();
                while($ilo_cn -> valid()){
                    $cn = $ilo_cn -> current();
                    $categoria -> addlistcategorianoticia($cn);
                    $ilo_cn -> next();
                };

                // Adds the Categoria-object to the ListObject that will be returned
                $listobject -> append($categoria);
            }
        }

        return $listobject;
    }

    public function bdb_categorianoticia($data){
        $listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

        // Test for empty search
        if ($data->num_rows > 0) {
            // Acquire data of each row
            while($row = $data->fetch_assoc()) {
                // Create a new CategoriaNoticia-object
                $cn = new CategoriaNoticia();

                // Sets each attribute
                $cn -> setoidcategorianoticia($row["oidcategorianoticia"]);

                $lo_noticia = DB::buscar("Noticia","oidnoticia = ".$row["oidnoticia"]);
                $ilo_noticia = $lo_noticia -> getIterator();
                while($ilo_noticia -> valid()){
                    $noticia = $ilo_noticia -> current();
                    $cn -> setnoticia($noticia);
                    $ilo_noticia -> next();
                }

                // Adds the CategoriaNoticia-object to the ListObject that will be returned
                $listobject -> append($cn);
            }
        }

        return $listobject;
    }

    public function bdb_literario($data){
        $listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

        // Test for empty search
        if ($data->num_rows > 0) {
            // Acquire data of each row
            while($row = $data->fetch_assoc()) {
                // Create a new Literario-object
                $literario = new Literario();

                // Sets each attribute
                $literario -> setoidliterario($row["oidliterario"]);
                $literario -> settitulo($row["titulo"]);
                $literario -> setcontador($row["contador"]);
                $literario -> setautor($row["autor"]);
                $literario -> setfecha($row["fecha"]);

                $lo_pagina = DB::buscar("Pagina","oidliterario = ".$row["oidliterario"]);
                $ilo_pagina = $lo_pagina -> getIterator();
                while($ilo_pagina -> valid()){
                    $pagina = $ilo_pagina -> current();
                    $literario -> addlistpagina($pagina);
                    $ilo_pagina -> next();
                };

                // Adds the Literario-object to the ListObject that will be returned
                $listobject -> append($literario);
            }
        }

        return $listobject;
    }

    public function bdb_pagina($data){
        $listobject = new ArrayObject();

        // Test if result of DB search was empty
        if (!is_object($data)){
            return $listobject;
        }

        // Test for empty search
        if ($data->num_rows > 0) {
            // Acquire data of each row
            while($row = $data->fetch_assoc()) {
                // Create a new Pagina-object
                $pagina = new Pagina();

                // Sets each attribute
                $pagina -> setoidpagina($row["oidpagina"]);
                $pagina -> setcuerpo($row["cuerpo"]);
                $pagina -> seturlfoto($row["urlfoto"]);

                // Adds the Pagina-object to the ListObject that will be returned
                $listobject -> append($pagina);
            }
        }

        return $listobject;
    }

    /*
    -------------------------------------
        Switch -> Insertar_Functions
    -------------------------------------
    */

    public function idb_periodista($obj){
        $dni = $obj -> getdni();
        $nombre = $obj -> getnombre();
        $apellido = $obj -> getapellido();
        $telefono = $obj -> gettelefono();
        $mail = $obj -> getmail();
        $usuario = $obj -> getusuario();
        $contrasena = $obj -> getcontrasena();
        $urlfoto = $obj -> geturlfoto();
        $descripcion = $obj -> getdescripcion();

        $sql = "
            INSERT INTO Periodista (
                dni,
                nombre,
                apellido,
                telefono,
                mail,
                usuario,
                contrasena,
                urlfoto,
                descripcion
            ) 
            VALUES (
                '".$dni."',
                '".$nombre."',
                '".$apellido."',
                '".$telefono."',
                '".$mail."',
                '".$usuario."',
                '".$contrasena."',
                '".$urlfoto."',
                '".$descripcion."'
            )";

        return $sql;
    }

    public function idb_noticia($obj){
        $titulo = $obj -> gettitulo();
        $subtitulo = $obj -> getsubtitulo();
        $cuerpo = $obj -> getcuerpo();
        $resumen = $obj -> getresumen();
        $urlfoto = $obj -> geturlfoto();
        $fecha = $obj -> getfecha();
        $fechadestacado = $obj -> getfechadestacado();
        $contador = $obj -> getcontador();
        $oidperiodista = $obj->getperiodista()->getoidperiodista();

        $sql = "
            INSERT INTO Noticia ( 
                titulo,
                subtitulo,
                cuerpo,
                resumen,
                urlfoto,
                fecha,
                fechadestacado,
                contador,
                oidperiodista
            ) 
            VALUES (
                '".$titulo."',
                '".$subtitulo."',
                '".$cuerpo."',
                '".$resumen."',
                '".$urlfoto."',
                '".$fecha."',
                '".$fechadestacado."',
                '".$contador."',
                '".$oidperiodista."'
            )";

        return $sql;
    }

    public function idb_multimedia($obj){
        $url = $obj -> geturl();
        $descripcion = $obj -> getdescripcion();
        $tipo = $obj -> gettipo();
        $oidnoticia = $obj -> getnoticia() -> getoidnoticia();

        $sql = "
            INSERT INTO Multimedia ( 
                url,
                descripcion,
                tipo,
                oidnoticia
            ) 
            VALUES (
                '".$url."',
                '".$descripcion."',
                '".$tipo."',
                '".$oidnoticia."'
            )";

        return $sql;
    }

    public function idb_partido($obj){
        $fecha = $obj -> getfecha();
        $oidlocal = $obj -> getlocal() -> getoidnoticia();
        $oidvisitante = $obj -> getvisitante() -> getoidnoticia();

        $sql = "
            INSERT INTO Partido ( 
            	fecha,
            	oidlocal,
            	oidvisitante
            ) 
            VALUES (
                '".$fecha."',
                '".$oidlocal."',
                '".$oidvisitante."'
            )";
        echo $fecha;
        return $sql;
    }

    public function idb_gol($obj){
        $tiempo = $obj -> gettiempo();
        $oidequipo = $obj -> getequipo() -> getoidequipo();
        $oidjugador = $obj -> getjugador() -> getoidjugador();
        $oidpartido = $obj -> getpartido() -> getoidpartido();

        $sql = "
            INSERT INTO Gol ( 
            	tiempo,
            	oidequipo,
            	oidjugador,
            	oidpartido
            ) 
            VALUES (
                '".$tiempo."',
                '".$oidequipo."',
                '".$oidjugador."',
                '".$oidpartido."'
            )";
            
        return $sql;
    }

    public function idb_equipo($obj){
        $nombre = $obj -> getnombre();
        $urlescudo = $obj -> geturlescudo();
        $lugar = $obj -> getlugar();

        $sql = "
            INSERT INTO Equipo ( 
                nombre,
                urlescudo,
                lugar
            ) 
            VALUES (
                '".$nombre."',
                '".$urlescudo."',
                '".$lugar."'
            )";
        
        return $sql;
    }

    public function idb_jugador($obj){
        $nombre = $obj -> getnombre();
        $apellido = $obj -> getapellido();
        $numero = $obj -> getnumero();
        $oidequipo = $obj->getequipo()->getoidequipo();

        $sql = "
            INSERT INTO Jugador ( 
                nombre,
                apellido,
                numero,
                oidequipo
            ) 
            VALUES (
                '".$nombre."',
                '".$apellido."',
                '".$numero."',
                '".$oidequipo."'
            )";

        return $sql;
    }

    public function idb_contacto($obj){
        $telefono = $obj -> gettelefono();
        $direccion = $obj -> getdireccion();
        $celular = $obj -> getcelular();
        $mail = $obj -> getmail();

        $sql = "
            INSERT INTO Contacto (
                telefono,
                direccion,
                celular,
                mail
            ) 
            VALUES (
                '".$telefono."',
                '".$direccion."',
                '".$celular."',
                '".$mail."'
            )";

        return $sql;
    }

    public function idb_patrocinador($obj){
        $urlanuncio1 = $obj -> geturlanuncio1();
        $urlanuncio2 = $obj -> geturlanuncio2();
        $urlanuncio3 = $obj -> geturlanuncio3();
        $urllogo = $obj -> geturllogo();
        $nombre = $obj -> getnombre();
        $link = $obj -> getlink();

        $sql = "
            INSERT INTO Patrocinador (
                urlanuncio1,
                urlanuncio2,
                urlanuncio3,
                urllogo,
                nombre,
                link
            ) 
            VALUES (
                '".$urlanuncio1."',
                '".$urlanuncio2."',
                '".$urlanuncio3."',
                '".$urllogo."',
                '".$nombre."',
                '".$link."'
            )";

        return $sql;
    }

    public function idb_categoria($obj){
        $nombre = $obj -> getnombre();
        $link = $obj -> getlink();

        $sql = "
            INSERT INTO Categoria ( 
                nombre,
                link
            ) 
            VALUES (
                '".$nombre."',
                '".$link."'
            )";

        return $sql;
    }

    public function idb_categorianoticia($obj){
        $oidnoticia = $obj->getnoticia()->getoidnoticia();
        $oidcategoria = $obj->getcategoria()->getoidcategoria();

        $sql = "
            INSERT INTO CategoriaNoticia ( 
                oidnoticia,
                oidcategoria
            ) 
            VALUES (
                '".$oidnoticia."',
                '".$oidcategoria."'
            )";

        return $sql;
    }

    public function idb_literario($obj){
        $titulo = $obj -> gettitulo();
        $contador = $obj -> getcontador();
        $autor = $obj -> getautor();
        $fecha = $obj -> getfecha();

        $sql = "
            INSERT INTO Literario (
                titulo,
                contador,
                autor,
                fecha
            ) 
            VALUES (
                '".$titulo."',
                '".$contador."',
                '".$autor."',
                '".$fecha."'
            )";

        return $sql;
    }

    public function idb_pagina($obj){
        $cuerpo = $obj -> getcuerpo();
        $urlfoto = $obj -> geturlfoto();
        $oidliterario = $obj->getliterario()->getoidliterario();

        $sql = "
            INSERT INTO Pagina (
                cuerpo,
                urlfoto,
                oidliterario
            ) 
            VALUES (
                '".$cuerpo."',
                '".$urlfoto."',
                '".$oidliterario."'
            )";

        return $sql;
    }

    /*
    -------------------------------------
        Switch -> Actualizar_Functions
    -------------------------------------
    */

    public function adb_periodista($obj){
        $oid = $obj -> getoidperiodista();
        $dni = $obj -> getdni();
        $nombre = $obj -> getnombre();
        $apellido = $obj -> getapellido();
        $telefono = $obj -> gettelefono();
        $mail = $obj -> getmail();
        $usuario = $obj -> getusuario();
        $contrasena = $obj -> getcontrasena();
        $urlfoto = $obj -> geturlfoto();
        $descripcion = $obj -> getdescripcion();

        $sql = "UPDATE Periodista SET 
                dni = '".$dni."',
                nombre = '".$nombre."',
                apellido = '".$apellido."',
                telefono = '".$telefono."',
                mail = '".$mail."',
                usuario = '".$usuario."',
                contrasena = '".$contrasena."',
                urlfoto = '".$urlfoto."',
                descripcion = '".$descripcion."'
                WHERE oidperiodista = '".$oid."'
            ";

        return $sql;
    }

    public function adb_noticia($obj){
        $oid = $obj -> getoidnoticia();
        $titulo = $obj -> gettitulo();
        $subtitulo = $obj -> getsubtitulo();
        $cuerpo = $obj -> getcuerpo();
        $resumen = $obj -> getresumen();
        $fecha = $obj -> getfecha();
        $fechadestacado = $obj -> getfechadestacado();
        $contador = $obj -> getcontador();
        $oidperiodista = $obj->getperiodista()->getoidperiodista();

        $sql = "UPDATE Noticia SET 
                titulo = '".$titulo."',
                subtitulo = '".$subtitulo."',
                cuerpo = '".$cuerpo."',
                resumen = '".$resumen."',
                fecha = '".$fecha."',
                fechadestacado = '".$fechadestacado."',
                contador = '".$contador."',
                oidperiodista = '".$oidperiodista."'
                WHERE oidnoticia = '".$oid."'
            ";

        return $sql;
    }

    public function adb_multimedia($obj){
        $oid = $obj -> getoidmultimedia();
        $url = $obj -> geturl();
        $descripcion = $obj -> getdescripcion();
        $tipo = $obj -> gettipo();
        $oidnoticia = $obj -> getnoticia() -> getoidnoticia();

        $sql = "UPDATE Multimedia SET 
                url = '".$url."',
                descripcion = '".$descripcion."',
                tipo = '".$tipo."',
                oidnoticia = '".$oidnoticia."'
                WHERE oidmultimedia = '".$oid."'
            ";
        
        return $sql;
    }

    public function adb_partido($obj){
        $oid = $obj -> getoidpartido();
        $fecha = $obj -> getfecha();
        $oidlocal = $obj -> getlocal() -> getoidnoticia();
        $oidvisitante = $obj -> getvisitante() -> getoidnoticia();

        $sql = "UPDATE Partido SET 
            	fecha = '".$fecha."',
            	oidlocal = '".$oidlocal."',
            	oidvisitante = '".$oidvisitante."' 
                WHERE oidpartido = '".$oid."'  
            ";
        
        return $sql;
    }

    public function adb_gol($obj){
        $oid = $obj -> getoidgol();
        $tiempo = $obj -> gettiempo();
        $oidequipo = $obj -> getequipo() -> getoidequipo();
        $oidjugador = $obj -> getjugador() -> getoidjugador();
        $oidpartido = $obj -> getpartido() -> getoidpartido();

        $sql = "UPDATE Gol SET 
            	tiempo = '".$tiempo."',
            	oidequipo = '".$oidequipo."',
            	oidjugador = '".$oidjugador."',
            	oidpartido = '".$oidpartido."' 
                WHERE oidgol = '".$oid."'  
            ";

        return $sql;
    }

    public function adb_equipo($obj){
        $oid = $obj -> getoidequipo();
        $nombre = $obj -> getnombre();
        $urlescudo = $obj -> geturlescudo();
        $lugar = $obj -> getlugar();

        $sql = "UPDATE Equipo SET 
                nombre = '".$nombre."',
                urlescudo = '".$urlescudo."',
                lugar = '".$lugar."' 
                WHERE oidequipo = '".$oid."'  
            ";
        
        return $sql;
    }

    public function adb_jugador($obj){
        $oid = $obj -> getoidjugador();
        $nombre = $obj -> getnombre();
        $apellido = $obj -> getapellido();
        $numero = $obj -> getnumero();
        $oidequipo = $obj->getequipo()->getoidequipo();

        $sql = "UPDATE Jugador SET 
                nombre = '".$nombre."',
                apellido = '".$apellido."',
                numero = '".$numero."',
                oidequipo = '".$oidequipo."' 
                WHERE oidjugador = '".$oid."'  
            ";

        return $sql;
    }

    public function adb_contacto($obj){
        $oid = $obj -> getoidcontacto();
        $telefono = $obj -> gettelefono();
        $direccion = $obj -> getdireccion();
        $celular = $obj -> getcelular();
        $mail = $obj -> getmail();

        $sql = "UPDATE Contacto SET
                telefono = '".$telefono."',
                direccion = '".$direccion."',
                celular = '".$celular."',
                mail = '".$mail."' 
                WHERE oidcontacto = '".$oid."' 
            ";

        return $sql;
    }

    public function adb_patrocinador($obj){
        $oid = $obj -> getoidpatrocinador();
        $urlanuncio1 = $obj -> geturlanuncio1();
        $urlanuncio2 = $obj -> geturlanuncio2();
        $urlanuncio3 = $obj -> geturlanuncio3();
        $urllogo = $obj -> geturllogo();
        $nombre = $obj -> getnombre();
        $link = $obj -> getlink();

        $sql = "UPDATE Patrocinador SET
                urlanuncio1 = '".$urlanuncio1."',
                urlanuncio2 = '".$urlanuncio2."',
                urlanuncio3 = '".$urlanuncio3."',
                urllogo = '".$urllogo."',
                nombre = '".$nombre."',
                link = '".$link."' 
                WHERE oidpatrocinador = '".$oid."' 
            ";

        return $sql;
    }

    public function adb_categoria($obj){
        $oid = $obj -> getoidcategoria();
        $nombre = $obj -> getnombre();
        $link = $obj -> getlink();

        $sql = "UPDATE Categoria SET 
                nombre = '".$nombre."',
                link = '".$link."' 
                WHERE oidcategoria = '".$oid."' 
            ";

        return $sql;
    }

    public function adb_categorianoticia($obj){
        $oid = $obj -> getoidcategorianoticia();
        $oidnoticia = $obj->getnoticia()->getoidnoticia();
        $oidcategoria = $obj->getcategoria()->getoidcategoria();

        $sql = "UPDATE CategoriaNoticia SET 
                oidnoticia = '".$oidnoticia."',
                oidcategoria = '".$oidcategoria."'' 
                WHERE oidcategorianoticia = '".$oid."' 
            ";

        return $sql;
    }

    public function adb_literario($obj){
        $oid = $obj -> getoidliterario();
        $titulo = $obj -> gettitulo();
        $contador = $obj -> getcontador();
        $autor = $obj -> getautor();
        $fecha = $obj -> getfecha();

        $sql = "UPDATE Literario SET
                titulo = '".$titulo."',
                contador = '".$contador."',
                autor = '".$autor."',
                fecha = '".$fecha."'' 
                WHERE oidliterario = '".$oid."' 
            ";

        return $sql;
    }

    public function adb_pagina($obj){
        $oid = $obj -> getoidpagina();
        $cuerpo = $obj -> getcuerpo();
        $urlfoto = $obj -> geturlfoto();
        $oidliterario = $obj->getliterario()->getoidliterario();

        $sql = "UPDATE Pagina SET
                cuerpo = '".$cuerpo."',
                urlfoto = '".$urlfoto."',
                oidliterario = '".$oidliterario."' 
                WHERE oidpagina = '".$oid."' 
            ";

        return $sql;
    }

    /*
    -------------------------------------
        Switch -> Eliminar_Functions
    -------------------------------------
    */


    public function edb_periodista($obj){
        $oid = $obj -> getoidperiodista();

        $sql = "UPDATE Periodista SET 
                activo = '0' 
                WHERE oidperiodista = '".$oid."'
            ";

        return $sql;
    }

    public function edb_noticia($obj){
        $oid = $obj -> getoidnoticia();

        $sql = "UPDATE Noticia SET 
                activo = '0' 
                WHERE oidnoticia = '".$oid."'
            ";

        return $sql;
    }

    public function edb_multimedia($obj){
        $oid = $obj -> getoidmultimedia();

        $sql = "UPDATE Multimedia SET 
                activo = '0' 
                WHERE oidmultimedia = '".$oid."'
            ";
        
        return $sql;
    }

    public function edb_partido($obj){
        $oid = $obj -> getoidpartido();

        $sql = "UPDATE Partido SET 
                activo = '0' 
                WHERE oidpartido = '".$oid."'  
            ";
        
        return $sql;
    }

    public function edb_gol($obj){
        $oid = $obj -> getoidgol();

        $sql = "UPDATE Gol SET
                activo = '0' 
                WHERE oidgol = '".$oid."'  
            ";

        return $sql;
    }

    public function edb_equipo($obj){
        $oid = $obj -> getoidequipo();

        $sql = "UPDATE Equipo SET 
                activo = '0' 
                WHERE oidequipo = '".$oid."'  
            ";
        
        return $sql;
    }

    public function edb_jugador($obj){
        $oid = $obj -> getoidjugador();

        $sql = "UPDATE Jugador SET 
                activo = '0' 
                WHERE oidjugador = '".$oid."'  
            ";

        return $sql;
    }

    public function edb_contacto($obj){
        $oid = $obj -> getoidcontacto();

        $sql = "UPDATE Contacto SET 
                activo = '0' 
                WHERE oidcontacto = '".$oid."' 
            ";

        return $sql;
    }

    public function edb_patrocinador($obj){
        $oid = $obj -> getoidpatrocinador();

        $sql = "UPDATE Patrocinador SET 
                activo = '0' 
                WHERE oidpatrocinador = '".$oid."' 
            ";

        return $sql;
    }

    public function edb_categoria($obj){
        $oid = $obj -> getoidcategoria();

        $sql = "UPDATE Categoria SET 
                activo = '0' 
                WHERE oidcategoria = '".$oid."' 
            ";

        return $sql;
    }

    public function edb_categorianoticia($obj){
        $oid = $obj -> getoidcategorianoticia();

        $sql = "UPDATE CategoriaNoticia SET 
                activo = '0' 
                WHERE oidcategorianoticia = '".$oid."' 
            ";

        return $sql;
    }

    public function edb_literario($obj){
        $oid = $obj -> getoidliterario();

        $sql = "UPDATE Literario SET 
                activo = '0' 
                WHERE oidliterario = '".$oid."' 
            ";

        return $sql;
    }

    public function edb_pagina($obj){
        $oid = $obj -> getoidpagina();

        $sql = "UPDATE Pagina SET 
                activo = '0' 
                WHERE oidpagina = '".$oid."' 
            ";

        return $sql;
    }
}

?>