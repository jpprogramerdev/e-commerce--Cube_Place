<?php
    require_once "../../Config/Conexao.php";

    session_start();
    $idClient = $_SESSION["idUser"];
    if (!isset($_SESSION["typeUser"]) || $_SESSION["typeUser"] != 1) {
        header("Location: ../public/Acesso_negado.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../.././Styles/header.css">
    <link rel="stylesheet" href="../.././Styles/tableUser.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <title>Cube Place - Produtos</title>
</head>
<body>
    <header class="header">
        <a href="../../index.php"><img src="../.././Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="./Produtos.php">Todos</a></li>
                <li class="dropdown">
                    <a href="#">Cubos</a>
                    <ul class="dropdown-content">
                        <li><a href="">2x2x2</a></li>
                        <li><a href="">3x3x3</a></li>
                        <li><a href="">4x4x4</a></li>
                        <li><a href="">5x5x5</a></li>
                        <li><a href="">6x6x6</a></li>
                        <li><a href="">7x7x7</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Outros</a>
                    <ul class="dropdown-content">
                        <li><a href="">Skewb</a></li>
                        <li><a href="">Pyraminx</a></li>
                        <li><a href="">Square-1</a></li>
                        <li><a href="">Megaminx</a></li>
                        <li><a href="">Clock</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">Acessórios</a>
                    <ul class="dropdown-content">
                        <li><a href="">Lubrificantes</a></li>
                        <li><a href="">Suportes</a></li>
                        <li><a href="">Bolsa</a></li>
                        <li><a href="">Timer</a></li>
                        <li><a href="">Tapes</a></li>
                        <li><a href="">Cover</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="../.././Controllers/Loggout.php">Sair da Conta</a> </li>
                <li class="dropdown">
                    <a href="../View/Users/ShoppingCart.php">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                            if(isset($_SESSION["idUser"])){
                                $sql = "SELECT COUNT(*) FROM shopping_cart WHERE  Id_Client = $idClient";
                                $result = $conn->query($sql);
                                
                                if ($result) {
                                    $row = $result->fetch_assoc();
                                    $quantProd = $row["COUNT(*)"];
                                    
                                    echo  $quantProd ;
                                } else {
                                    echo 0;
                                }
                            }else{
                                echo 0;
                            }
                        ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <section>
        <?php
            require_once "../.././Config/Conexao.php";

            $sql = "SELECT * FROM users WHERE Type_User = 2";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo"<div class ='tableArea'>";
                echo'<table class="tableUsers">';
                echo"<tr>";
                echo"<th>Nome</th>";
                echo"<th>Email</th>";
                echo"</tr>";
                

                while($row = $result->fetch_assoc()){
                    echo"<tr>";
                    echo"<td>".$row["Name_User"]."</td>";
                    echo"<td>".$row["Email_User"]."</td>";
                    echo"</tr>";
                }
                echo"</table>";
                echo"</div>";
            }
        ?>
    </section>
</body>
</html>