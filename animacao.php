<?php

$ligacao_normal = mysqli_connect('localhost', 'root', '', 'streaming');

mysqli_set_charset($ligacao_normal, 'utf8');

$todos = mysqli_query($ligacao_normal, "SELECT * FROM filmes");

$animacao_sugestoes = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'animacao_sugestoes'");
$animacao_acao = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'animacao_acao'");
$animacao_drama = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'animacao_drama'");
$animacao_ficcao = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'animacao_ficcao'");
$documentarios_index = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'documentarios'");
$temas_filmes = mysqli_query($ligacao_normal, "SELECT * FROM temas");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./css/lightslider.css">
    <link rel="shortcut icon" href="./img/burger.svg">
    <title>Filmes</title>
</head>

<body>
    <?php while ($teste = mysqli_fetch_assoc($todos)) { ?>
        <div class="info_filmes" data-id="<?php echo $teste['id'] ?>">
            <figure class="imagem_filme">
                <img src="img/<?php echo $teste['foto2'] ?>" alt="">
            </figure>
            <div class="texto">
                <div class="titulo_fechar">

                    <h1><?php echo $teste['titulo'] ?></h1>
                    <figure>
                        <img class="fechar" src="./img/fechar.svg" alt="">
                    </figure>
                </div>
                <div class="ano_idade">
                    <p class="ano"><?php echo $teste['ano'] ?></p>
                    <p class="idade"><?php echo $teste['idade'] ?></p>
                </div>
                <div class="descricao">
                    <p> <?php echo $teste['descricao'] ?></p>
                </div>
                <button class="ver_filme">
                    <a href="./video.php?id=<?php echo $teste['id'] ?>">
                        <p class="botao_ver" data-target-id="<?php echo $teste['id'] ?>">Ver Agora</p>
                    </a>
                </button>
            </div>
        </div>
    <?php } ?>
    <div class="black"></div>

    <div class="container">
        <header>
            <img src="./img/burger.svg" alt="" class="logo">
            <nav>
                <ul class="nav_links">
                    <li><a href="./index.php">Todos</a></li>
                    <li><a href="./filmes.php">Filmes</a></li>
                    <li><a href="./series.php">Séries</a></li>
                    <li><a href="./programastv.php">Programas TV</a></li>
                    <li><a class="active" href="./animacao.php">Animação</a></li>
                </ul>
                <img class="burger" src="./img/burger_responsive.svg" alt="">
            </nav>
        </header>
        <div class="orange">
            <img class="close" src="./img/close.svg" alt="">
            <a class="leo" href="./definicoes.php"><img src="./img/leonardo.png" id="leo"></a>
            <h1>Leonardo Marinheiro</h1>
            <div class="shape">
            </div>
            <div class="library">
                <h1>A tua biblioteca</h1>
                <input type="text" id="search" name="forSearch" placeholder="Pesquisa as tuas séries, filmes...">

                <div class="filters">
                    <?php while ($temas = mysqli_fetch_assoc($temas_filmes)) { ?>
                        <div class="filter">
                            <?php echo $temas['text'] ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="continuar">
                    <h1>Continuar a ver</h1>
                    <img class="continuar_img" src="./img/continuar1.png">
                    <p class="continuar_peaky">Peaky Blinders T1:EP3</p>
                </div>

                <div class="continuar continuar2">
                    <img class="luca-img" src="./img/continuar2.png">
                    <p class="continuar_peaky luca">Luca</p>
                </div>

            </div>
        </div>


        <section id="popular_movies">
            <h2 class="popular_text">Sugestões</h2>

            <ul id="autoWidth" class="cs-hidden">
                <?php while ($sugestoes = mysqli_fetch_assoc($animacao_sugestoes)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $sugestoes['foto1'] ?>" data-target-id="<?php echo $sugestoes['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section id="popular_movies">
            <h2 class="popular_text">Ação</h2>

            <ul id="autoWidth2" class="cs-hidden">
                <?php while ($acao = mysqli_fetch_assoc($animacao_acao)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $acao['foto1'] ?>" data-target-id="<?php echo $acao['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section id=" popular_movies">
            <h2 class="popular_text">Drama</h2>

            <ul id="autoWidth2" class="cs-hidden">
                <?php while ($drama = mysqli_fetch_assoc($animacao_drama)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $drama['foto1'] ?>" data-target-id="<?php echo $drama['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section id="popular_movies">
            <h2 class="popular_text">Ficção Científica</h2>

            <ul id="autoWidth2" class="cs-hidden">
                <?php while ($ficcao = mysqli_fetch_assoc($animacao_ficcao)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $ficcao['foto1'] ?>" data-target-id="<?php echo $ficcao['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>



    </div>

    <script>
        var logo = document.querySelector('.logo');

        logo.addEventListener('click', function() {
            window.location.href = "./index.php";
        })
    </script>


    <script src="./script/JQuery3.3.1.js"></script>
    <script src="./script/lightslider.js"></script>
    <script src="./script/script.js"></script>

</body>

</html>