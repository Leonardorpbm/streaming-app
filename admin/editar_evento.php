<?php

$ligacao_normal = mysqli_connect('localhost', 'root', '', 'streaming');

mysqli_set_charset($ligacao_normal, 'utf8');

$id = $_GET['id'];

if (count($_POST) > 0) {
    //Guardar em variáveis os valores enviados pelo formulário
    $title = $_POST['titulo'];
    $year = $_POST['ano'];
    $age = $_POST['idade'];
    $description = mysqli_real_escape_string($ligacao_normal, $_POST['descricao']);
    $category = $_POST['categoria'];
    $popular = $_POST['popular'];


    mysqli_query($ligacao_normal, "UPDATE filmes SET titulo = '$title', ano = '$year', idade = '$age', descricao = '$description', categoria = '$category', popular = '$popular' WHERE id = $id");

    //Verificar se foi enviada uma nova imagem
    if ($_FILES['foto1']['error'] == 0) {

        //Guardar numa variável o nome do ficheiro original
        $image1 = $_FILES['foto1']['name'];
        //Guardar numa variável o caminho para o ficheiro temporário
        $temp_file = $_FILES['foto1']['tmp_name'];

        //Mover o ficheiro carregado para a pasta das imagens
        move_uploaded_file($temp_file, '../img/' . $image1);

        mysqli_query($ligacao_normal, "UPDATE filmes SET foto1 = $image1 WHERE id = $id");
    }

    if ($_FILES['foto2']['error'] == 0) {

        //Guardar numa variável o nome do ficheiro original
        $image2 = $_FILES['foto2']['name'];
        //Guardar numa variável o caminho para o ficheiro temporário
        $temp_file = $_FILES['foto2']['tmp_name'];

        //Mover o ficheiro carregado para a pasta das imagens
        move_uploaded_file($temp_file, '../img/' . $image2);

        mysqli_query($ligacao_normal, "UPDATE filmes SET foto2 = $image2 WHERE id = $id");
    }

    if ($_FILES['trailer']['error'] == 0) {

        //Guardar numa variável o nome do ficheiro original
        $trailer = $_FILES['trailer']['name'];
        //Guardar numa variável o caminho para o ficheiro temporário
        $temp_file = $_FILES['trailer']['tmp_name'];

        //Mover o ficheiro carregado para a pasta das imagens
        move_uploaded_file($temp_file, '../img/' . $trailer);

        mysqli_query($ligacao_normal, "UPDATE filmes SET trailer = $trailer WHERE id = $id");
    }
}

$consulta_filmes = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE id=$id");

$filmes = mysqli_fetch_assoc($consulta_filmes);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Administração</title>
    <link type="text/css" rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>" />
    <link type="text/css" rel="stylesheet" href="js/jquery-ui/jquery-ui.min.css" />
</head>

<body>

    <div id="overlay">
        <div id="overlay-content"></div>
    </div>

    <header class="main-header">
        <div class="container">
            <h1>
                <a href="index.php">
                    Gestor de conteúdos
                </a>
            </h1>
        </div>
    </header>

    <div class="container">

        <h2>Editar Conteúdos</h2>

        <form enctype="multipart/form-data" action="" method="post">

            <label>Título</label>
            <input type="text" name="titulo" value="<?php echo $filmes['titulo']; ?>" />

            <label>Ano</label>
            <input type="text" name="ano" value="<?php echo $filmes['ano']; ?>" />

            <label>Idade</label>
            <input type="text" name="idade" value="<?php echo $filmes['idade']; ?>" />

            <label>Descrição</label>
            <textarea name="descricao" class="editor"><?php echo $filmes['descricao']; ?> </textarea>

            <label>Trailer</label>
            <?php if ($filmes['trailer'] != '') { ?>
                <video width="500px" src="../img/<?php echo $filmes['trailer']; ?>" accept="image/*"></video>
            <?php } ?>
            <input type="file" name="trailer" />

            <label>Foto1</label>
            <?php if ($filmes['foto1'] != '') { ?>
                <img src="../img/<?php echo $filmes['foto1']; ?>" accept="image/*">
            <?php } ?>
            <input type="file" name="foto1" />

            <label>Foto2</label>
            <?php if ($filmes['foto2'] != '') { ?>
                <img width="500px" src="../img/<?php echo $filmes['foto2']; ?>" accept="image/*">
            <?php } ?>
            <input type="file" name="foto2" />

            <label>Categoria</label>
            <input type="text" name="categoria" value="<?php echo $filmes['categoria']; ?>" />

            <label>Popular</label>
            <input type="number" name="popular" min="0" max="1" value="<?php echo $filmes['popular']; ?>" />

            <input type="submit" value="Guardar" class="submit-button" />

        </form>

    </div>

    <!-- Anexar ficheiros javascript -->
    <script type="application/javascript" src="js/jquery.js"></script>
    <script type="application/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
    <script type="application/javascript" src="js/script.js"></script>

</body>

</html>