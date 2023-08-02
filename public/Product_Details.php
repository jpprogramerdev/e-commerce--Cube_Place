<?php
    require_once "../Config/Conexao.php";

    session_start();
    
    if (isset($_GET['id'])) {
        $productId = $_GET['id'];
        if(isset($_SESSION["idUser"])){
            $idClient = $_SESSION["idUser"];
        }    
        $sql = "SELECT * FROM products WHERE ID_Product = $productId";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
        } else {
            echo "Produto não encontrado.";
            exit();
        }
    } else {
        echo "ID do produto não especificado.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styles/header.css">
    <link rel="stylesheet" href="../Styles/productDetails.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <?php
        echo"<title>Cube Place - ".$product["Name_Product"]."</title>"
    ?>
</head>
<body>
    <header class="header">
        <a href="index.html"><img src="../Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="./public/Produtos.php">Todos</a></li>
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
                <li class="dropdown"><a href=".././Controllers/Loggout.php">Sair da Conta</a> </li>
                <li class="dropdown">
                    <a href="">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="shopping-cart">
                <?php
                    if(isset($_SESSION["idUser"])){
                        $sql = "SELECT COUNT(*) FROM shopping_cart WHERE  Id_Client = $idClient";
                        $result = $conn->query($sql);
                        
                        if ($result) {
                            $row = $result->fetch_assoc();
                            $quantProd = $row["COUNT(*)"];
                            
                            echo "<p class='quant-itens'>" . $quantProd . "</p>" ;
                        } else {
                            echo "Erro na consulta SQL: " . $conn->error;
                        }
                    }
                ?>
                
        </div>
        <div class="img-info">
            <div class="img-product">
                <?php
                    echo "<img src='" .$product["Img_Product"]."'>";
                ?>
            </div>
            <div class="info-product">
                <?php
                    echo "<p class='name-product'>".$product["Name_Product"]."</p>";
                    echo "<p class='price-product'>R$ ".$product["Price_Product"]."</p>";
                    echo"<a href='../Controllers/AddInCart.php?id=$productId'>Adiconar ao carrinho</a>";
                ?>
                <label for="cep_user">Informe seu CEP</label>
                <input type="number" name="cep_user" id="cep_user">
            </div>
        </div>
        <div class="description-product">
            <?php
                echo "<p>".$product["Description_Product"]."</p>";
            ?>
        </div>
    </section>
</body>
</html>