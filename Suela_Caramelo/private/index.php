<html>
    <head>
        <title>CMD Suela Caramelo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="Styles/index.css">
        <link rel="stylesheet" href="Styles/noticias.css">
        <link rel="stylesheet" href="Styles/listanoticias.css">
        <link rel="stylesheet" href="Styles/literarios.css">
        <link rel="stylesheet" href="Styles/general.css">
        <link rel="stylesheet" href="Styles/administrador.css">
        <link rel="stylesheet" href="Styles/publicidad.css">
        <link rel="stylesheet" href="Styles/periodista.css">
        <script type="text/javascript" src="validador.js"></script>
        <script type="text/javascript" src="manejador.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
        <script type="text/javascript" src="../jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="navegacion.js"></script>
    
    </head>
    <body>
        
        <header>
            <h1>administrador de contenidos </h1>
            <a href="../index.php">Cerrar Sesión</a>
        </header>
        
        <aside>
            <ul>
                <li><a href="?pag=1">noticias</a></li>
                <li><a href="?pag=2">literarios</a></li>
                <li><a href="?pag=3">general</a></li>
            </ul>
        </aside>
        
        <div class="contenido">
            
            <?php
            
                error_reporting(E_ALL ^ E_NOTICE);
                            
                $pag = $_GET['pag'];
            
                switch ($pag){
                    case 1:
                        include 'lista.html';
                        break;
                        
                    case 2:
                        include 'lista.html';
                        break;
                        
                    case 3:
                        include 'general.php';
                        break;
                    
                    case 4:
                        include 'publicidad.html';
                        break;
                        
                    case 5:
                        include 'periodista.html';
                        break;
                    
                    case 6:
                        include 'noticias.html';
                        break;
                    
                    default:
                        include 'lista.html';
                        break;
                }            
            ?>
            
        </div>
        
        <footer>
            
            <h4>by ilogic</h4>
            
        </footer>
        
    </body>
</html>