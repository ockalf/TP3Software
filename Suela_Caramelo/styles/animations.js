$(document).ready(function () {
	
	$('header nav ul li:nth-child(2), header nav>div').mouseover(function (){
        
            $('header nav>div').stop().slideDown(400);
                
        });

    $('header nav ul li:nth-child(2) , header nav>div').mouseout(function (){
            
            $('header nav>div').stop().slideUp(700);    
        });     

    $(window).scroll(function(){
    
             
        if($(window).scrollTop()>=280){
                
            if(document.getElementById('navegador').offsetHeight==0){
                $('nav.nav').stop().slideDown();
            }
        }else{

            $('nav.nav').stop().slideUp();     

        }
            
        var scroll = $(window).scrollTop();       
        
        if(scroll<=280){
            $('header>div img').css('margin-bottom', -(scroll/2)+'px');
            $('header>div img').css('margin-top', scroll/2+'px');

        }
        
        if(scroll<600){
            $('section.nosotros article.der img').css('margin-top', 50+scroll/2.5+'px');
        }
        
    });
    
    $('section.noticia div.volanta img.facebook').mouseover(function(){
        
        $('section.noticia div.separador div.1').css('background-color','#2525ff');
    });
    
    $('section.noticia div.volanta img.google').mouseover(function(){
        
        $('section.noticia div.separador div.2').css('background-color','#ff1e1e');
    });
    
    $('section.noticia div.volanta img.twitter').mouseover(function(){
        
        $('section.noticia div.separador div.3').css('background-color','#00b8f4');
    });
    
    $('section.noticia div.volanta img.print').mouseover(function(){
        
        $('section.noticia div.separador div.4').css('background-color','#00801e');
    });
    
    $('section.noticia div.volanta img.twitter,section.noticia div.volanta img.facebook,section.noticia div.volanta img.google, section.noticia div.volanta img.print').mouseout(function(){
        $('section.noticia div.separador div.4,section.noticia div.separador div.3,section.noticia div.separador div.2,section.noticia div.separador div.1').css('background-color','lightgrey');
    })
    
});

