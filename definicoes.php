<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Menu</title>
    <link type="text/css" rel="stylesheet" href="./css/definicoes.css?v=<?php echo time(); ?>" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <a href="./index.php"><img src="./img/burger.svg" alt="" class="logo"></a>

    </header>

    <div id="menu_container">

        <div class="menu">
            <ul>
                <li class="menu_li menu_selecionado">Conta</li>
                <li class="menu_li">Adesão</li>
                <li class="menu_li">Definições</li>
            </ul>
        </div>

        <div id="menu_conta" class="menu_alterar">
            <div class="perfil">
                <figure>
                    <img src="img/paula_perfil.png" alt="foto_perfil">
                </figure>
                <p>Paula Marioneta</p>
            </div>
            <form class="formulario">
                <label id="primeiro_espaço" for="fname">Email:</label><br>
                <input type="text" id="fname" name="name"><br>

                <label id="segundo_espaço" for="fname">Password:</label><br>
                <input type="email" id="femail" name="password"><br>

                <label id="terceiro_espaço" for="fname">Telemóvel:</label><br>
                <input type="text" id="fphone" name="phone"><br>

            </form>

            <button class="editar_botao">
                Editar
            </button>

        </div>

        <div id="menu_adesao" class="menu_alterar">

            <div class="perfil">
                <figure>
                    <img src="img/paula_perfil.png" alt="foto_perfil">
                </figure>
                <p>Paula Marioneta</p>
            </div>

            <div class="plano_container">
                <p>Plano: Básico, 4.99$</p>
                <button class="alterar_botao">
                    Alterar Plano
                </button>
            </div>

            <div class="plano_container">
                <p>Método de Pagamento: •••• •••• •••• 4241</p>
                <button class="alterar_botao">
                    Editar
                </button>
                <button class="alterar_botao">
                    Novo Método
                </button>
            </div>

            <button class="cancelar_botao">
                Cancelar Adesão
            </button>

        </div>


        <div id="menu_definiçoes" class="menu_alterar">

            <div class="perfil">
                <figure>
                    <img src="img/paula_perfil.png" alt="foto_perfil">
                </figure>
                <p>Paula Marioneta</p>
            </div>

            <div class="definiçoes_container">
                <a href="">Perfis</a>
            </div>

            <div class="definiçoes_container">
                <a href="">Gerir Dispositivos com acesso à conta</a>
            </div>

            <div class="definiçoes_container">
                <a href="">Histórico de Visualização</a>
            </div>

            <button class="cancelar_botao">
                Terminar Sessão
            </button>

        </div>



    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="./script/definicoes.js"></script>

</body>

</html>