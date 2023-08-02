<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././Styles/header.css">
    <link rel="stylesheet" href=".././Styles/windowsModal.css">
    <link rel="stylesheet" href=".././Styles/product.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <title>Cube Place - Produtos</title>
</head>
<body>
    <header class="header">
        <a href="../index.php"><img src=".././Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="">Todos</a></li>
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
                <li class="dropdown">
                    <a href="">Minha Conta</a>
                    <ul class="dropdown-content">
                        <li><a href="./Entrar.php">Acessar conta</a></li>
                        <li><a href="./Registrar.php">Criar conta</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="">
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
        <div class="container-product">
            <?php
                require_once "DisplayProduct.php";
                while ($row = mysqli_fetch_assoc($result)) {
                    $productId = $row["ID_Product"];
                    echo"<div class='product'>";
                        echo"<a href='product_details.php?id=$productId'>";
                            echo"<p class='title-product'>".$row["Name_Product"]."</p>";
                            echo"<img src='".$row["Img_Product"]."'>";
                            echo"<p class='subtitle-price'>A partir de</p>";
                            echo"<p class='price-product'>R$".$row["Price_Product"]."</p>";
                        echo"</a>";
                    echo"</div>";
                }
            ?>
            ?>
        </div>
        <div class="link-pages">
            <?php 
                require_once "DisplayProduct.php";
                for ($i = 1; $i <= $totalPages; $i++) {
                        echo "<a href='Produtos.php?page=$i'>$i</a> ";
                }
            ?>
        </div>
    </section>
</body>
</html>