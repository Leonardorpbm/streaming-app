<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "streaming";




$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {

    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username='" . $username . "' AND password='" . $password . "'";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "Nuno Palma") {


        header("location:index.php");
    } else {
        $error =  "username or password incorrect";
    }
}





?>









<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Filmes</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/signup.css?v=<?php echo time(); ?>">
</head>

<body>
    <header>
        <a href="./index.php"><img src="./img/burger.svg" alt="" class="logo"></a>
    </header>

    <div class="iniciar">

        <div class="conta">

            <h1>Criar Conta</h1>

            <div class="nome">



                <div class="proprio">
                    <label>NOME PRÓPRIO</label>
                    <br><br>
                    <input id="form" type="text" name="username" placeholder="Escreva o seu nome" required>
                </div>
                <br>



                <form class="apelido_box" action="#" method="POST">
                    <br>
                    <div>
                        <label class="apelido">APELIDO</label>
                        <br><br>
                        <input id="form" class="apelido" type="text" name="username" placeholder="Escreva o seu apelido" required>
                    </div>
                    <br>
                </form>



            </div>





            <br><br>


            <div class="mail">
                <form action="#" method="POST">


                    <br>
                    <div>
                        <label> E-MAIL</label>
                        <br><br>
                        <input id="form_mail" type="text" name="username" placeholder="Exemplo@gmail.com" required>
                    </div>
                    <br>


            </div>

            <br>


            <div class="mail">


                <br>
                <div>
                    <label> PASSWORD</label>
                    <br><br>
                    <input id="form_mail" type="password" name="password" placeholder="Password" required>
                </div>
                <br>




            </div>
            <br>
            <div>

                <button id="botao" type="submit">CRIAR CONTA</button>
            </div>

            </form>


        </div>




        <div class="linha"></div>




        <div class="entrar">

            <h1>Entrar</h1>


            <div class="mail">

                <form id="bem" action="#" method="POST">
                    <br>
                    <div>
                        <label> NOME DE UTILIZADOR</label>
                        <br><br>
                        <input id="form_mail" type="text" name="username" placeholder="Nuno Palma" required>
                    </div>
                    <br>

            </div>


            <br>


            <div class="mail">


                <br>
                <div>
                    <label> PASSWORD</label>
                    <br><br>
                    <input id="form_mail" type="password" name="password" placeholder="melhorprofessor" required>
                </div>
                <br>




            </div>
            <br>
            <?php if (isset($error)) { ?>
                <div class="error">
                    Nome de utilizador ou password inválidos.
                </div>
            <?php } ?>
            <div>

                <button id="botao" type="submit">ENTRAR</button>
                <br>
            </div>
            </form>




        </div>







    </div>


</body>

</html>