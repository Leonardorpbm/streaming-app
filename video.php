<?php $ligacao_normal = mysqli_connect('localhost', 'root', '', 'streaming');

mysqli_set_charset($ligacao_normal, 'utf8');

$id = $_GET['id'];

$trailer = mysqli_query($ligacao_normal, "SELECT * FROM filmes WHERE id=$id");


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Filmes</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="./css/video.css?v=<?php echo time(); ?>" />
</head>

<body>
  <header>
    <a href="./index.php"><img src="./img/burger.svg" alt="" class="logo"></a>
  </header>

  <video id="bgvid" autoplay controls loop>
    <?php while ($trailers = mysqli_fetch_assoc($trailer)) { ?>
      <source src="./img/<?php echo $trailers['trailer'] ?>" type="video/mp4" data-id="<?php echo $trailers['id'] ?>">
    <?php } ?>
  </video>




  <script type=" application/javascript" src="js/jquery.js">
  </script>
  <script type="application/javascript" src="./script/video.js"></script>



</body>

</html>