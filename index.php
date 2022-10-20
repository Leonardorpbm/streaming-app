<?php

$ligacao_normal = mysqli_connect('localhost', 'root', '', 'streaming');

mysqli_set_charset($ligacao_normal, 'utf8');

$todos = mysqli_query($ligacao_normal, "SELECT * FROM filmes");
$populares_index = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE popular = 1");
$documentarios_index = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'documentarios'");
$realitys_index = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'reality'");
$familia_index = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE categoria = 'familia'");
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
    <title>Streaming Platform</title>
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
                    <li><a class="active" href="./index.php">Todos</a></li>
                    <li><a href="./filmes.php">Filmes</a></li>
                    <li><a href="./series.php">Séries</a></li>
                    <li><a href="./programastv.php">Programas TV</a></li>
                    <li><a href="./animacao.php">Animação</a></li>
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

        <div class="slider">
            <h2>Recomendados</h2>
            <div class="slides">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">

                <div class="slide first">
                    <a href="./series.php"> <img src="./img/peakyblinders_slideshow.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="./filmes.php"><img src="./img/jumanji_slideshow.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="./filmes.php"><img src="./img/venom_slideshow.png" alt=""></a>
                </div>
                <div class="slide">
                    <a href="./programastv.php"> <img src="./img/toohot_slideshow.png" alt=""></a>
                </div>

                <div class="auto-nav">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>
            <div class="manual-nav">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>

        </div>

        <section id="popular_movies">
            <h2 class="popular_text">Populares</h2>

            <ul id="autoWidth" class="cs-hidden">
                <?php while ($populares = mysqli_fetch_assoc($populares_index)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $populares['foto1'] ?>" data-target-id="<?php echo $populares['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section id="popular_movies">
            <h2 class="popular_text">Documentários</h2>

            <ul id="autoWidth2" class="cs-hidden">
                <?php while ($documentarios = mysqli_fetch_assoc($documentarios_index)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $documentarios['foto1'] ?>" data-target-id="<?php echo $documentarios['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section id=" popular_movies">
            <h2 class="popular_text">Reality Shows</h2>

            <ul id="autoWidth2" class="cs-hidden">
                <?php while ($realitys = mysqli_fetch_assoc($realitys_index)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $realitys['foto1'] ?>" data-target-id="<?php echo $realitys['id'] ?>">
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </section>

        <section id="popular_movies">
            <h2 class="popular_text">Toda a Família</h2>

            <ul id="autoWidth2" class="cs-hidden">
                <?php while ($familia = mysqli_fetch_assoc($familia_index)) { ?>
                    <li class="item-a">
                        <div class="popular_movies_slider">
                            <img class="image_click" src="./img/<?php echo $familia['foto1'] ?>" data-target-id="<?php echo $familia['id'] ?>">
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