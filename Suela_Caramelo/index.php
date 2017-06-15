<html>
    <head>
        <title>Suela Caramelo</title>
        <link rel="stylesheet" href="styles/index.css">
        <link rel="stylesheet" href="styles/inicio.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/contacto.css">
        <link rel="stylesheet" href="styles/cuento.css">
        <link rel="stylesheet" href="styles/literarios.css">
        <link rel="stylesheet" href="styles/navegador.css">
        <link rel="stylesheet" href="styles/nosotros.css">
        <link rel="stylesheet" href="styles/noticia.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
        <script type="text/javascript" src="jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="styles/animations.js"></script>
        <!--<script type="text/javascript" src="ajaxnav.js"></script>-->
        <script type="text/javascript" src="manejadornoticias.js"></script>
        <script type="text/javascript" src="slider.js"></script>
        <!--<script type="text/javascript" src="carganoticia.js"></script>-->
        <meta charset="utf-8">
        
    </head>
    
    <body>

        <?php 
            include 'navegador.html';
            error_reporting(E_ALL ^ E_NOTICE);


        ?>

        <header>
           
           <div id="cabecera">
               
               <img src="imgs/cabecera.png">
               
           </div>
            <nav>
                <ul>
                    <li><a href="?pag=1">inicio</a></li>
                    <li><a>categorias</a></li>
                    <li><a href="?pag=2">literarios</a></li>
                    <li><a href="?pag=3">nosotros</a></li>
                    <li><a href="?pag=4">contacto</a></li>
                    <li><img src="imgs/search.png" alt="B"></li>
                </ul>
            
                <div>
                    <ul>

                        <li><a href="?pag=7">maculino</a>

                            <ul>

                                    <li><a href="?pag=7">primera a</a></li>


                                    <li><a href="?pag=7">primera b</a></li>


                                    <li><a href="?pag=7">primera c</a></li>


                                    <li><a href="?pag=7">primera d</a></li>

                            </ul>

                        </li>


                        <li><a href="?pag=7">femenino</a>

                             <ul>

                                    <li><a href="?pag=7">primera a</a></li>


                                    <li><a href="?pag=7">primera b</a></li>
                            </ul>


                        </li>

                       <li><a href="?pag=7">selecciones</a>

                             <ul>

                                    <li><a href="?pag=7">mendocinas</a></li>


                                    <li><a href="?pag=7">nacionales</a></li>


                            </ul>

                        </li>
                       
                        <li><a href="?pag=7">copa mendoza</a></li>


 


                        <li><a href="?pag=7">senior</a></li>

                    </ul>
                </div>

            
            </nav>
        </header>        
        
        <div class="center" id="body">

            <?php 

            $pagina = $_GET['pag'];

            switch($pagina){
                    
                case 1:
                     include 'inicio.php';
                break;

                case 2:
                     include 'literarios.html';
                break;

                case 3:
                     include 'nosotros.html';
                break;

                case 4:
                     include 'contacto.html';
                break;

                case 5:
                    include 'noticia.php';
                break;

                case 6:
                    include 'cuento.html';
                break;

                case 7:
                    include 'noticias.html';
                break;

                default:
                    include 'inicio.php';
                break;
            }

             ?>

        </div>
        
        <footer> 
        
            <ul>
                <li><a href="#">masculino</a>
                
                    <ul>
                        <li><a href="?pag=7">primera a</a></li>
                        <li><a href="?pag=7">primera b</a></li>
                        <li><a href="?pag=7">primera c</a></li>
                        <li><a href="?pag=7">primera d</a></li>
                    </ul>
                
                </li>
                <li><a href="?pag=7">femenino</a>
                
                    <ul>
                        <li><a href="?pag=7">primera a</a></li>
                        <li><a href="?pag=7">primera b</a></li>
                    </ul>
                
                </li>
                <li><a href="?pag=7">selecciones</a>
                
                    <ul>
                        <li><a href="?pag=7">mendocinas</a></li>
                        <li><a href="?pag=7">nacionales</a></li>
                    </ul>
                
                </li>
                <li><a href="?pag=7">otras categorias</a>
                
                    <ul>
                        <li><a href="?pag=7">copa mendoza</a></li>
                        <li><a href="?pag=7">senior</a></li>
                    </ul>
                 
                </li>
                <li><a href="?pag=7">navegar</a>
                
                    <ul>
                        <li><a href="?pag=1">inicio</a></li>
                        <li><a href="?pag=2">Literarios</a></li>
                        <li><a href="?pag=3">nosotros</a></li>
                        <li><a href="?pag=4">contacto</a></li>
                    </ul>
                
                </li>
            </ul>
        
            <img src="imgs/pie.png">
            
            <div>
                
                <h2>patrocinadores:</h2>
                
            </div>
            
        
        </footer>
        
    </body> 
    
</html>