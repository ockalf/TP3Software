<?php
    $id = $_GET['idnot'];
    echo '<input type="hidden" id="notid" value="'.$id.'">';
?>

<script>
    
    var id = document.getElementById('notid').value;
    
    cargarnoticia(id);
        
</script>

<section class="noticia" id="noticia" onload="cargarnoticia()">
    
    <div class="volanta">
        <img class="facebook" src="imgs/facebook2.png" alt="">
        <img class="google" src="imgs/google-plus2.png" alt="">
        <img class="twitter" src="imgs/twitter2.png" alt="">
        <img class="print" src="imgs/printer.png" alt="">
    </div>
    
    <p class="fecha" id="fecha"> 13 de diciembre de 1994</p>
 
     <div class="separador">
         
         <div class="1"></div>
         <div class="2"></div>
         <div class="3"></div>
         <div class="4"></div>
         
     </div>
    
    
    <h1 id="titulo"> </h1>
    <h2 id="subtitulo"></h2>
    
    <div class="slider">
        
       <div class="galeria">
           
            <div style="background-image: url(imgs/imagen3.jpg)" alt=""></div>
            <div style="background-image: url(imgs/imagen.jpg)" alt=""></div>
            <div style="background-image: url(imgs/imagen3.jpg)" alt=""></div>
            <div style="background-image: url(imgs/imagen.jpg)" alt=""></div>
          
        

       </div> 
      
        <div class="controls">
            <ul>
                
                <li><img src="imgs/prev.png" alt="" onclick="prev()" ></li>
                <li><div onclick="selectimg(1)"></div></li>
                <li><div onclick="selectimg(2)"></div></li>
                <li><div onclick="selectimg(3)"></div></li>
                <li><div onclick="selectimg(4)"></div></li>
                <li><img src="imgs/next.png" alt="" onclick="next()"></li>
            
            </ul>
            
        </div>
    </div>
    
    <p class="cuerpo" id="cuerpo"> </p>
    
    <h4 id="autor"> </h4>    
</section>

<?php
    include 'aside.html'
?>