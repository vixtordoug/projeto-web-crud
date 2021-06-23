<?php

/* $cliente  = $_POST['cliente'];
$bairro   = $_POST['bairro'];
$endereco = $_POST['endereco'];
$pedido   = $_POST['pedido']; */


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
  VALUES ('Victor', 'Vila Santo Antonio', 'Av. Paulo Maurício', 'Pizza de Frango')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Pedido cadastrado com sucesso!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>