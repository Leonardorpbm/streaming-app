var menuConta = document.getElementById("menu_conta");
var menuAdesao = document.getElementById("menu_adesao");
var menuDefiniçoes = document.getElementById("menu_definiçoes");
var menuLi = document.getElementsByClassName("menu_li");

menuLi[0].addEventListener("click" , function(){
    
    menuLi[0].classList.add("menu_selecionado");
    menuLi[1].classList.remove("menu_selecionado");
    menuLi[2].classList.remove("menu_selecionado");
    menuConta.style.display = "block";
    menuConta.style.opacity = "1";
    menuAdesao.style.display = "none";
    menuAdesao.style.opacity = "0";
    menuDefiniçoes.style.display = "none";
    menuDefiniçoes.style.opacity = "0";

});

menuLi[1].addEventListener("click" , function(){
    
    menuLi[1].classList.add("menu_selecionado");
    menuLi[0].classList.remove("menu_selecionado");
    menuLi[2].classList.remove("menu_selecionado");
    menuConta.style.display = "none";
    menuConta.style.opacity = "0";
    menuAdesao.style.display = "block";
    menuAdesao.style.opacity = "1";
    menuDefiniçoes.style.display = "none";
    menuDefiniçoes.style.opacity = "0";

});

menuLi[2].addEventListener("click" , function(){
    
    menuLi[2].classList.add("menu_selecionado");
    menuLi[1].classList.remove("menu_selecionado");
    menuLi[0].classList.remove("menu_selecionado");
    menuConta.style.display = "none";
    menuConta.style.opacity = "0";
    menuAdesao.style.display = "none";
    menuAdesao.style.opacity = "0";
    menuDefiniçoes.style.display = "block";
    menuDefiniçoes.style.opacity = "1";

});