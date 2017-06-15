<section class="general">
    
    
    <?php
        include 'administrador.html';
    ?>
    
    <h3 onclick="margen(0)">Administradores</h3>
    <h3 onclick="margen(100)">Publicidad</h3>
    <h3 onclick="margen(200)">Periodistas</h3>
    <h3 onclick="margen(300)">Contacto</h3>
    
    <div>

        <article class="admin">

            <div>
                <ul>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        Exequiel Fuentes
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        Julian Arccidiacono
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        ejemplo
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        ejemplo 2
                    </li>
                </ul>
            </div>

            <a href="#" id="badm">Nuevo administrador</a>

        </article>

        <article class="public">
        <div>
                <ul>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        coca-cola
                        
                        <input type="checkbox" id="principal" name="pag">
                        <input type="checkbox" id="noticia" name="pag">
                        
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        pepsi
                        
                        <input type="checkbox" id="principal" name="pag">
                        <input type="checkbox" id="noticia" name="pag">
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        adeidas
                        
                        <input type="checkbox" id="principal" name="pag">
                        <input type="checkbox" id="noticia" name="pag">
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        acme
                        
                        <input type="checkbox" id="principal" name="pag">
                        <input type="checkbox" id="noticia" name="pag">
                    </li>
                </ul>
            </div>
            
            <a href="?pag=4">nueva publicidad</a>
            
        </article>
            
        <article class="per">
            <div>
                   <ul>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        Exequiel Fuentes
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        Julian Arccidiacono
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        ejemplo
                    </li>
                    <li>
                        <img src="imgs/cross.png" alt="">
                        ejemplo 2
                    </li>
                </ul>
            </div>
            
            <a href="?pag=5">Registrar Periodista</a>
            
        </article> 

        <article class="contacto">
        
            <div>
                
                <form action="">
                    
                    <h4>Ingrese los siguientes datos:</h4>
                    
                    <label for="direccion">direccion:</label>
                    <input type="text" id="direccion">
                    
                    <label for="telefono">telefono:</label>
                    <input type="text" id="telefono">
                    
                    <label for="celular">celular:</label>
                    <input type="text" id="celular">
                    
                    <label for="email">email:</label>
                    <input type="text" id="email">
                    
                    <a href="#">Actualizar</a>
                    
                </form>
                
            </div>
        
        </article>
    </div>
</section>