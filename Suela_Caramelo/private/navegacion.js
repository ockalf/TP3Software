function margen(valor){
    
//    $('section.general> div').css('margin-left',-valor+'%');
    $('section.general> div').animate({
        
        'margin-left': -valor+'%'
    }, 400);
}

$(document).ready(function (){
    
    $('section.general article.admin a').click(function (){
        
        $('section.administrador').fadeIn(200);
        
    })
    
    $('section.administrador img').click(function (){
 
        $('section.administrador').fadeOut(200);

    })
})