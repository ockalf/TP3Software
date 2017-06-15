function cargarnoticias(){

    var param = ["",1,15];
    
    $.post("private/kernel/Interfaz.php",
    {
        fnc: "buscarNoticias",
        par: JSON.stringify(param)
    },
    function(data, status){
        
        console.log('data: '+data);
        
        var not = JSON.parse(data);

        document.getElementById('destacados').innerHTML = " ";

        for (var i =0; i<3;i++){
            
            cargardestacados(not.noticias[0].titulo, not.noticias[0].subtitulo, not.noticias[0].resumen, not.noticias[0].oidnoticia);

            if(i==0){
                
                document.getElementById('destacados').innerHTML += '  <div class="publicidad1"></div>';

            }

            if(i==2){
                
                document.getElementById('destacados').innerHTML += '  <div class="publicidad2"></div>';

            }

            not.noticias.splice(0,1);
        }

        document.getElementById('col1').innerHTML = " ";
        document.getElementById('col2').innerHTML = " ";
        document.getElementById('col3').innerHTML = " ";

        cargarcolumnas(not);
        
    }
)};

function cargardestacados(titulo, subtitulo, resumen,id){

    var destacados;

    var contenido=" ";

    contenido = `

            <article id="`+id+`" onclick="selectnoticia(`+id+`)">
                <h2>`+ titulo +`</h2>              
                <img src="imgs/tigre.jpg" alt="">
                <div>
                    <img src="imgs/facebook2.png" alt="f">
                    <img src="imgs/google-plus2.png" alt="g">
                    <img src="imgs/twitter2.png" alt="t">
                </div>
                
                <p>`+ resumen +`</p>
            </article>

            `;

    document.getElementById('destacados').innerHTML += contenido;
}

function cargarcolumnas(not) {
    

    var col1 =" ";
    var col2 =" ";
    var col3 =" ";
    var select= 1;

    for (i in not.noticias){
        switch (select) {

            case 1:
                col1+= `<article onclick="selectnoticia(`+ not.noticias[i].oidnoticia+`)">
                            <img src="imgs/tigre.jpg" alt="">
                            <div>
                                <img src="imgs/facebook2.png" alt="f">
                                <img src="imgs/google-plus2.png" alt="g">
                                <img src="imgs/twitter2.png" alt="t">
                            </div>
                            <h2>`+ not.noticias[i].titulo +`</h2>
                            <p>`+not.noticias[i].resumen+`</p>
                        </article>`;

                select++;
            break;
         
            case 2:
                col2+= `<article>
                            <img src="imgs/tigre.jpg" alt="">
                            <div>
                                <img src="imgs/facebook2.png" alt="f">
                                <img src="imgs/google-plus2.png" alt="g">
                                <img src="imgs/twitter2.png" alt="t">
                            </div>
                            <h2>`+ not.noticias[i].titulo +`</h2>
                            <p>`+not.noticias[i].resumen+`</p>
                        </article>`;

                select++;
            break;

            case 3:
                col3+= `<article>
                            <img src="imgs/tigre.jpg" alt="">
                            <div>
                                <img src="imgs/facebook2.png" alt="f">
                                <img src="imgs/google-plus2.png" alt="g">
                                <img src="imgs/twitter2.png" alt="t">
                            </div>
                            <h2>`+ not.noticias[i].titulo +`</h2>
                            <p>`+not.noticias[i].resumen+`</p>
                        </article>`;
                select=1;
            break
        }  
    }
     
        document.getElementById('col1').innerHTML += col1;
        document.getElementById('col2').innerHTML += col2;
        document.getElementById('col3').innerHTML += col3;
}

function selectnoticia(id){
    
    window.location.assign("?pag=5&idnot="+id)
    
}

function cargarnoticia(id){

    $.post("private/kernel/Interfaz.php",{
       fnc: "abrirNoticia",
       par: JSON.stringify(id)
    }, function(data, status){
    
        console.log(data);
        var not = JSON.parse(data);
        document.getElementById('titulo').innerHTML = not.titulo;
        document.getElementById('subtitulo').innerHTML = not.subtitulo;
        document.getElementById('fecha').innerHTML = not.fecha;
        document.getElementById('autor').innerHTML = not.periodista.nombre + " "+ not.periodista.apellido;
        document.getElementById('cuerpo').innerHTML = not.cuerpo;

        
    })
    
}