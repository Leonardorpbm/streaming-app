<?php

$ligacao_normal = mysqli_connect('localhost', 'root', '', 'streaming');

mysqli_set_charset($ligacao_normal, 'utf8');

if (count($_POST) > 0) {
    //Guardar em variáveis os valores enviados pelo formulário
    $title = $_POST['titleName'];
    $year = $_POST['yearName'];
    $age = $_POST['ageName'];
    $description = $_POST['descriptionName'];
    $category = $_POST['categoryName'];
    $popular = $_POST['popularName'];

    $trailer = '';
    $image1 = '';
    $image2 = '';

    //Verificar se foi enviada uma nova imagem
    if ($_FILES['image1Name']['error'] == 0) {

        //Guardar numa variável o nome do ficheiro original
        $image1 = $_FILES['image1Name']['name'];
        //Guardar numa variável o caminho para o ficheiro temporário
        $temp_file = $_FILES['image1Name']['tmp_name'];

        //Mover o ficheiro carregado para a pasta das imagens
        move_uploaded_file($temp_file, '../img/' . $image1);
    }

    if ($_FILES['image2Name']['error'] == 0) {

        //Guardar numa variável o nome do ficheiro original
        $image2 = $_FILES['image2Name']['name'];
        //Guardar numa variável o caminho para o ficheiro temporário
        $temp_file = $_FILES['image2Name']['tmp_name'];

        //Mover o ficheiro carregado para a pasta das imagens
        move_uploaded_file($temp_file, '../img/' . $image2);
    }

    if ($_FILES['trailerName']['error'] == 0) {

        //Guardar numa variável o nome do ficheiro original
        $trailer = $_FILES['trailerName']['name'];
        //Guardar numa variável o caminho para o ficheiro temporário
        $temp_file = $_FILES['trailerName']['tmp_name'];

        //Mover o ficheiro carregado para a pasta das imagens
        move_uploaded_file($temp_file, '../img/' . $trailer);
    }

    mysqli_query($ligacao_normal, "INSERT INTO filmes (titulo, ano, idade, descricao, trailer, foto1, foto2, categoria, popular) VALUES ('$title', '$year', '$age', '$description', '$trailer', '$image1', '$image2', '$category', '$popular')");
}


if (isset($_GET['delete_id'])) {
    //Guardar o valor do parâmetro delete_id
    $delete_id = $_GET['delete_id'];
    //Apagar o registo da base de dados
    mysqli_query($ligacao_normal, "DELETE FROM filmes WHERE id = $delete_id");
}

$filmes_streaming = mysqli_query($ligacao_normal, "SELECT * FROM filmes");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Administração</title>
    <link type="text/css" rel="stylesheet" href="css/fontawesome/css/fontawesome-all.min.css" />
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

        <h2>Conteúdo</h2>

        <div class="list">
            <?php while ($filmes = mysqli_fetch_assoc($filmes_streaming)) { ?>
                <div class="list-item">
                    <div class="list-title">
                        <a href="./editar_evento.php?id=<?php echo $filmes['id']; ?>" class="edit-button">
                            <?php echo $filmes['titulo']; ?>
                        </a>
                    </div>

                    <div class="list-edit">
                        <a href="./editar_evento.php?id=<?php echo $filmes['id']; ?>">
                            <i class="fas fa-pen-square"></i>
                        </a>
                    </div>
                    <div class="list-delete">
                        <a href="./index.php?delete_id=<?php echo $filmes['id']; ?>" class="delete-link">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
            <?php } ?>

        </div>

        <div class="item-insert">

            <h2 id="insert-button">Inserir Notícia</h2>

            <form enctype="multipart/form-data" id="insert-form" action="" method="post">

                <label>Título</label>
                <input type="text" name="titleName" />

                <label>Ano</label>
                <input type="text" name="yearName" class="editor" />

                <label>Idade</label>
                <input type="text" class="editor" name="ageName" />

                <label>Decrição</label>
                <textarea name="descriptionName" class="editor"></textarea>

                <label>Trailer</label>
                <input type="file" name="trailerName" />

                <label>Foto1</label>
                <input type="file" name="image1Name" />

                <label>Foto2</label>
                <input type="file" name="image2Name" />

                <label>Categoria</label>
                <input type="text" name="categoryName" />

                <label>Popular</label>
                <input type="number" name="popularName" min="0" max="1" />

                <input type="submit" value="Inserir" class="submit-button" />

            </form>
        </div>



    </div>

    <!-- Ficheiros JS -->
    <script type="application/javascript" src="js/jquery.js"></script>
    <script type="application/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
    <script type="application/javascript" src="js/script.js"></script>



</body>

</html>