
var burger = document.querySelector('.burger');
var fechar_responsive = document.querySelector('.close');
var orange = document.querySelector('.orange');

burger.addEventListener('click', function(){
    orange.style.opacity = '1';
    orange.style.zIndex = '99999';
    document.body.style.overflow = 'hidden';
    fechar_responsive.style.opacity = '1';
    fechar_responsive.style.zIndex = '50';
})

fechar_responsive.addEventListener('click', function(){
    orange.style.opacity = '0';
    orange.style.zIndex = '-30';
    document.body.style.overflowY = 'scroll';
    fechar_responsive.style.opacity = '0';
    fechar_responsive.style.zIndex = '-50';
})

//slider
var slideCounter = 1;

setInterval(function(){
    document.getElementById('radio' + slideCounter).checked = true;
    slideCounter++;
    if(slideCounter > 4){
        slideCounter = 1;
    }
}, 5000);

//carrossel

$(document).ready(function() {
    $('#autoWidth, #autoWidth2').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth,').removeClass('cS-hidden');
        } 
    });  
  });


var image_click = document.querySelector('.image_click');
var info_filmes = document.querySelector('.info_filmes');
var div_black = document.querySelector('.black');


$('.botao_ver').click(function(){
    var id = $(this).attr('data-target-id');
    
})


$('.image_click').click(function(){

   

    div_black.style.opacity = '0.8';
    div_black.style.zIndex = '9998';

    document.body.classList.add("stop-scrolling");

    var id = $(this).attr('data-target-id');
    $('[data-id="'+id+'"]').css({'opacity': 1, 'z-index': 9999});
    
});


$('.fechar').click(function(){
    $('.info_filmes').css({'opacity': 0, 'z-index': -10});
    $('.black').css({'opacity': 0, 'z-index': -10});

    document.body.classList.remove("stop-scrolling");
})


