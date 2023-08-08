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
    <link rel="stylesheet" href="../../Styles/payment.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">

</head>
<body>
    <header class="header">
        <a href="../../index.php"><img src="../../Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="./View/Adm/Produtos.php">Todos</a></li>
                <li class="dropdown">
                    <a href="#">Cubos</a>
                    <ul class="dropdown-content">
                        <li><a href="../../public/Categoria.php?categoria=2">2x2x2</a></li>
                        <li><a href="../../public/Categoria.php?categoria=1">3x3x3</a></li>
                        <li><a href="../../public/Categoria.php?categoria=3">4x4x4</a></li>
                        <li><a href="../../public/Categoria.php?categoria=4">5x5x5</a></li>
                        <li><a href="../../public/Categoria.php?categoria=5">6x6x6</a></li>
                        <li><a href="../../public/Categoria.php?categoria=6">7x7x7</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Outros</a>
                    <ul class="dropdown-content">
                        <li><a href="../../public/Categoria.php?categoria=7">Skewb</a></li>
                        <li><a href="../../public/Categoria.php?categoria=8">Pyraminx</a></li>
                        <li><a href="../../public/Categoria.php?categoria=9">Square-1</a></li>
                        <li><a href="../../public/Categoria.php?categoria=10">Megaminx</a></li>
                        <li><a href="../../public/Categoria.php?categoria=11">Clock</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">Acessórios</a>
                    <ul class="dropdown-content">
                        <li><a href="../../public/Categoria.php?categoria=12">Lubrificantes</a></li>
                        <li><a href="../../public/Categoria.php?categoria=13">Suportes</a></li>
                        <li><a href="../../public/Categoria.php?categoria=14">Bolsa</a></li>
                        <li><a href="../../public/Categoria.php?categoria=15">Timer</a></li>
                        <li><a href="../../public/Categoria.php?categoria=16">Tapes</a></li>
                        <li><a href="../../public/Categoria.php?categoria=17">Cover</a></li>
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
        <div class="payment-area">
            <?php
                require_once "../../Controllers/DisplayCart.php";
                $totalShopping = 0.00;
                $totalProductsText = "<div class='container-products'>";
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $productPrice = $row["Price_Product"];
                        $productName = $row["Name_Product"];
                        $productQuantity = $row["Quantity"];
                        $totalShopping += $productPrice * $productQuantity;
                        $totalProductsText .= "<p class='text-prod'>" .$productName . "             x" .$productQuantity ."</p>";
                    }
                    $totalProductsText .= "</div>";
                }
            ?>

            <div class="container-payment">
                <?php
                    $totalFormat = number_format($totalShopping, 2, ',', '.'); 
                    echo "<div class='price-cart'><p>Valor total: <br>R$" . $totalFormat . "</p></div>"; 
                ?>

                <div class="grp-radio-btn">
                    <p>Selecione a sua opção de pagamento</p>
                    <input type="radio" name="payment" id="pay-card">
                    <label for="pay-card">Cartão de crédito</label>
                    <br>
                    
                    <input type="radio" name="payment" id="pay-boleto">
                    <label for="pay-boleto">Boleto</label>
                    <br>
                    
                    <input type="radio" name="payment" id="pay-pix">
                    <label for="pay-pix">Pix</label>
                    <br>
                </div>

                <div class="products-text">
                    <p class="products-title">Itens</p>
                    <?php
                        echo $totalProductsText;
                    ?>
                </div>

                <div class='complete-purchase'>
                    <a href='../../Controllers/CleanCart.php'>Concluir compra</a>
                </div>;
            </div>
        </div>
    </section>
    <footer class="footer">
            <p>Copyright © 2023 João Pedro Gerotto Fernandes - Todos os  direitos  reservados </p>
    </footer>
</body>
</html>