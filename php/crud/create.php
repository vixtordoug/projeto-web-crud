<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Kariri Food</title>
</head>

<body>

    <!-- Cabeçalho -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.html">
                <img src="https://kfsoft.info/img/logo2.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                Kariri Food
            </a>
        </div>
    </nav>
    <br>

        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->

    <!-- Código PHP -->
<?php

$cliente  = $_POST['cliente'];
$bairro   = $_POST['bairro'];
$endereco = $_POST['endereco'];
$pedido   = $_POST['pedido'];


//Página de Conexão com database
//Dados de conexão local

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "projetowebcrud";


//Dados de conexão InfinityFree
/* $servername = "sql204.epizy.com";
$username   = "epiz_28925354";
$password   = "";
$dbname     = ""; */


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO pedidos (cliente, bairro, endereco, pedido)
  VALUES ('$cliente', '$bairro', '$endereco', '$pedido')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Pedido cadastrado com sucesso!";
} catch(PDOException $e) {
  echo $sql . "<br><br>" . $e->getMessage();
}

$conn = null;
?>

<br>

<main class="container">

        <!-- Create Pedido -->
        <a class="btn btn-primary" href="create.html" role="button">Realizar Pedido</a>
        <br><br>

        <!-- Delete Pedido -->
        <a class="btn btn-primary" href="php/crud/delete.php" role="button">Deletar Pedido</a>
        <br><br>

        <!-- Update Pedido -->
        <a class="btn btn-primary" href="php/crud/update.php" role="button">Alterar Pedido</a>
        <br><br>

        <!-- Read Pedido -->
        <a class="btn btn-primary" href="php/crud/read.php" role="button">Vizualizar Pedidos</a>
        <br><br>

    </main>

</body>

</html>