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
        <a href="../index.php"><img src="../Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="./View/Adm/Produtos.php">Todos</a></li>
                <li class="dropdown">
                    <a href="#">Cubos</a>
                    <ul class="dropdown-content">
                        <li><a href="Categoria.php?categoria=2">2x2x2</a></li>
                        <li><a href="Categoria.php?categoria=1">3x3x3</a></li>
                        <li><a href="Categoria.php?categoria=3">4x4x4</a></li>
                        <li><a href="Categoria.php?categoria=4">5x5x5</a></li>
                        <li><a href="Categoria.php?categoria=5">6x6x6</a></li>
                        <li><a href="Categoria.php?categoria=6">7x7x7</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Outros</a>
                    <ul class="dropdown-content">
                        <li><a href="Categoria.php?categoria=7">Skewb</a></li>
                        <li><a href="Categoria.php?categoria=8">Pyraminx</a></li>
                        <li><a href="Categoria.php?categoria=9">Square-1</a></li>
                        <li><a href="Categoria.php?categoria=10">Megaminx</a></li>
                        <li><a href="Categoria.php?categoria=11">Clock</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">Acessórios</a>
                    <ul class="dropdown-content">
                        <li><a href="Categoria.php?categoria=12">Lubrificantes</a></li>
                        <li><a href="Categoria.php?categoria=13">Suportes</a></li>
                        <li><a href="Categoria.php?categoria=14">Bolsa</a></li>
                        <li><a href="Categoria.php?categoria=15">Timer</a></li>
                        <li><a href="Categoria.php?categoria=16">Tapes</a></li>
                        <li><a href="Categoria.php?categoria=17">Cover</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <?php
                        if(isset($_SESSION["idUser"])){
                            echo "<li class='dropdown'><a href='../Controllers/Loggout.php'>Sair da Conta</a></li>";
                        }else{
                            echo "<a href=''>Minha Conta</a>";
                            echo "<ul class='dropdown-content'>";
                                echo "<li><a href='./public/Entrar.php'>Acessar conta</a></li>";
                                echo "<li><a href='./public/Registrar.php'>Criar conta</a></li>";
                            echo "</ul>";
                        }
                    ?>
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
                            }
                        ?>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <section>
        <div class="img-info">
            <div class="img-product">
                <?php
                    echo "<img src='" .$product["Img_Product"]."'>";
                ?>
            </div>
            <div class="info-product">
                <?php
                    echo "<p class='name-product'>".$product["Name_Product"]."</p>";
                    echo "<p class='brand-product'>".$product["Brand_Product"]."</p>";
                    echo "<p class='price-product'>R$ ".$product["Price_Product"]."</p>";
                    echo "<form action='../Controllers/AddInCart.php' method='GET' class='prod-form'>";
                        echo "<label for='quantity_prod'>Quantidade:</label>";
                        echo "<input type='number' name='quantity_prod' id='quantity_prod' value='1' step='1'>";
                        echo "<input type='hidden' name='id' value='$productId'>";
                        echo "<button type='submit' class='link-add-cart' id='btn-cart'>";
                            echo "<div class='add-item-cart'>";
                                echo "<p>Adicionar ao carrinho</p>";
                            echo "</div>";
                        echo "</button>";
                    echo "</form>";
                    echo "<p class='description-title'>Descrição</p>";
                    echo "<p class='description-product'>".$product["Description_Product"]."</p>";
                ?>
            </div>
        </div>
    </section>
    
    <footer class="footer">
        <p>Copyright © 2023 J.P.G. Fernandes - Todos os  direitos  reservados </p>
    </footer>
    <script>
       document.getElementById('btn-cart').addEventListener('click', function(event) {
            <?php
                if (isset($_SESSION["idUser"])) {
                    echo "return";
                } else {
                    echo "event.preventDefault()";
                    echo "window.location.href = '../public/Entrar.php'";
                }
            ?>
        });
    </script>
</body>
</html>