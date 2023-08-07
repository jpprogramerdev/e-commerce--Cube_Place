<?php
    require_once "../../Config/Conexao.php";

    session_start();
    $idClient = null;
    $nameUser = null;
    if (isset($_SESSION["typeUser"])) {
        $idClient =  $_SESSION["idUser"];
        $nameUser = $_SESSION["nameUser"];
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube Place</title>
    <link rel="stylesheet" href="../../Styles/header.css">
    <link rel="stylesheet" href="../../Styles/cart.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">

</head>
<body>
    <header class="header">
        <a href="../../index.php"><img src="../../Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="../../public/Produtos.php">Todos</a></li>
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
                    <?php
                        if(isset($_SESSION["idUser"])){
                            echo "<li class='dropdown'><a href='../../Controllers/Loggout.php'>Sair da Conta</a></li>";
                        }else{
                            echo "<a href=''>Minha Conta</a>";
                            echo "<ul class='dropdown-content'>";
                                echo "<li><a href='../../public/Entrar.php'>Acessar conta</a></li>";
                                echo "<li><a href='../../public/Registrar.php'>Criar conta</a></li>";
                            echo "</ul>";
                        }
                    ?>
                </li>
                <li class="dropdown">
                    <a href="">
                        <i class="fas fa-shopping-cart"></i>
                        <?php
                            if(isset($_SESSION["idUser"])){
                                $sql = "SELECT COUNT(*) FROM shopping_cart WHERE Id_Client = $idClient";
                                $result = $conn->query($sql);
                                
                             
                                    $row = $result->fetch_assoc();
                                    $quantProd = $row["COUNT(*)"];
                                    
                                    echo  $quantProd ;
                    
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
                echo "<div class='total-products'>";
                    require_once "../../Controllers/DisplayCart.php";
                    $totalShopping = 0.00;
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $productId = $row["Id_Product"];
                            $productName = $row["Name_Product"];
                            $productImg = $row["Img_Product"];
                            $productPrice = $row["Price_Product"];
                            $productQuantity = $row["Quantity"];
            
                            echo "<div class='product'>";
                                echo "<img src='../" . $productImg . "' alt='Product Image'>";
                                echo "<div class='info-cart-product'>";
                                    echo "<p class='title-product'>" . $productName . "</p>";
                                    echo "<p class='price-product'>R$" . $productPrice . "</p>";
                                    echo "<p class='quantity-product'>Quantidade: " . $productQuantity . "</p>";
                                echo "</div>"; 
                            echo "</div>";
                            $totalShopping += $productPrice * $productQuantity;
                        }
                        $totalFormat = number_format($totalShopping, 2, ',', '.');
                        echo "</div>";
                        echo "<div class='total-cart'>";
                            echo "<p class='total-price'>Total: R$". $totalFormat ."</p>";
                            echo "<div class='grp-btn'>";
                                echo "<div class='complete-purchase'>";
                                    echo "<a href='PayShopping.php'>Concluir compra</a>";
                                echo "</div>";
                                echo "<div class='btn-clear-cart'>";
                                    echo "<a href='#' id='clearBtn'>Limpar carrinho</a>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                } else {
                    echo "<p class='total-price'>Nenhum produto no carrinho.</p>";
                }
            ?> 
    </section>
    <script src="../../Scripts/AlertClearCart.js"></script>
</body>
</html>