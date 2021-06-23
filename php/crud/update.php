<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Kariri Food</title>
</head>

<body>

    <!-- Cabeçalho -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <img src="https://kfsoft.info/img/logo2.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
                Kariri Food
            </a>
        </div>
    </nav>
    <br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <main class="container">

        <!-- Código PHP -->
        <?php

        /* Recebendo os dados da Página update.html*/
        $id       = $_POST['id'];
        $cliente  = $_POST['cliente'];
        $bairro   = $_POST['bairro'];
        $endereco = $_POST['endereco'];
        $pedido   = $_POST['pedido'];

        //Página de Conexão com database
        //Dados de conexão local

        /* $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "projetowebcrud"; */


        $servername = "sql204.epizy.com";
        $username   = "epiz_28957921";
        $password   = "PnAs40eYsR";
        $dbname     = "epiz_28957921_projetowebcrud";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql =
                "UPDATE pedidos SET cliente ='$cliente', bairro=' $bairro', endereco ='$endereco', pedido ='$pedido' WHERE id ='$id'";

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " Pedido Atualizado com sucesso";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $conn = null;


        /* Tabela */
        echo "<table style='border: solid 1px black;'>";
        echo "<tr><th>Id</th><th>Cliente</th><th>Bairro</th><th>Endereço</th><th>Pedido</th></tr>";

        class TableRows extends RecursiveIteratorIterator
        {
            function __construct($it)
            {
                parent::__construct($it, self::LEAVES_ONLY);
            }

            function current()
            {
                return "<td style='width:150px;border:1px solid black;'>" . parent::current() . "</td>";
            }

            function beginChildren()
            {
                echo "<tr>";
            }

            function endChildren()
            {
                echo "</tr>" . "\n";
            }
        }

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT id, cliente, bairro, endereco, pedido FROM pedidos");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
                echo $v;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
        echo "</table>";





        ?>

    </main>
</body>

</html>