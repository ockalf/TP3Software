var i = 0;
var nfotos = 4;
var interval = 4000;

$(document).ready(function(){

    
    var slider = setInterval(function(){

        
        if(i<nfotos-1){
            next();
            i++;
        }else{
            restart();
            i =0;
        }


    },interval);

    

    document.getElementsByClassName('slider')[0].addEventListener("mouseover", function(){
        clearInterval(slider);
    })
    
    document.getElementsByClassName('slider')[0].addEventListener("mouseout", function(){
        slider = setInterval(function(){

            if(i<nfotos-1){
                next();
            }else{
                restart();
            }

         },interval)
    })

})


function next(){    
    
    if(i<nfotos-1){
   
        $('section.noticia div.slider div.galeria').animate({
            margin: '0 0 0 -=100%'
        },900);

        i++;
    }else{
        restart();
    }
    
}

function prev(){    

    if(i>0){

        $('section.noticia div.slider div.galeria').animate({
            margin: '0 0 0 +=100%'
        },900);

        i--;
    }else{
        
        console.log(i);
        
        $('section.noticia div.slider div.galeria').animate({

            margin: '0 0 0 -'+(nfotos-1)*100+'%'
            
        },900)
        i=nfotos-1
    }

}

function restart(){
 
    
    $('section.noticia div.slider div.galeria').animate({

        margin: '0 0 0 0%'

    },900);
    
    i=0;
}

function selectimg(num){
    
    $('section.noticia div.slider div.galeria').animate({

        margin: '0 0 0 -'+(num-1)*100+'%'

    },900);
    
    i=num-1;
}