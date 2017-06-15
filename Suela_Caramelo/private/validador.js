function validarNot(){
    
    var titulo = document.getElementById('titulo').value;
    var subtitulo = document.getElementById('subtitulo').value;
    var epigrafe = document.getElementById('epigrafe').value;
    var fecha = new Date(document.getElementById('fecha').value);
    var cuerpo = document.getElementById('cuerpo').value;
    var categoria = document.getElementById('categoria').value
    
    var noticia = new Object();
     
    noticia.titulo = titulo;
    noticia.subtitulo = subtitulo;
    noticia.epigrafe = epigrafe;
    noticia.fecha = fecha;
    noticia.cuerpo = cuerpo;
    noticia.categoria = setCategoria(categoria);
    
    var periodista = new object();

    periodista.

    console.log(JSON.stringify(noticia));
    
    var pass = new Array();
    
    pass.push(valtitulo(noticia.titulo));
    pass.push(valsubtitulo(noticia.subtitulo));
    pass.push(valepigrafe(noticia.epigrafe));
    pass.push(valfecha(noticia.fecha));
    
    
    var done = true;
    
    for(var elem in pass){
        
        if(pass[elem] != true){
            alert(`Ha ocurrido el siguiente problema: \n`+pass[elem])
            
            done = false;
        }
        
    }
    
    if(done){
       post("crearNoticia",noticia);
    }
    
}

function setCategoria(cat){
    
    var ret;
    
    switch(cat){

        case '1':
            ret = ["m", "ma"];
            break;
            
        case '2':
            ret = ["m", "mb"];
            break;
            
        case '3':
            ret = ["m", "mc"];
            break;
            
        case '4':
            ret = ["m", "md"];
            break;
            
        case '5':
            ret = ["f", "fa"];
            break;
            
        case '6':
            ret = ["f", "fb"];
            break;
            
        case '7':
            ret = ["s", "n"];
            break;
            
        case '8':
            ret = ["s", "m"];
            break;
            
        case '9':
            ret = ["o", "cm"];
            break;
            
        case '10':
            ret = ["o", "s"];
            break;
                
          }
    
    return ret;

}

function valtitulo(titulo){
       
    if(titulo.length <= 128 && titulo.length > 3){
        return true
    }else{
        return "La longitud del titulo no puede superar los 128 ni ser menor a 3 caracteres"
    }
    
}

function valsubtitulo(subtitulo){
    
    if(subtitulo.length <= 256 && subtitulo.length > 3){
        return true
    }else{
        return "La longitud del subtitulo no puede superar los 256 ni ser menor a 3 caracteres"
    }
    
}

function valepigrafe(epigrafe){
    
    if(epigrafe.length <= 64){
        return true
    }else{
        return "La longitud del epígrafe no puede superar los 64 caracteres"
    }
}

function valfecha(fecha){
       
    if (Object.prototype.toString.call(fecha) == "[object Date]" && fecha.toDateString()!= "Invalid Date"){
        return true;
    }else{
        return "la fecha ingresada no es válida"
    }
    
}

function valcuerpo(cuerpo){
    
    if(cuerpo.length >= 10){
        return true
    }else{
        return "La longitud del cuerpo no puede ser menor a 10 caracteres"
    }
}

function post(funcion, parametros){
    
    console.log('pasa');
    
    $.post("kernel/Interfaz.php",{
            
            fnc: funcion,
            par: JSON.stringify(parametros)
        }
        
    )
}