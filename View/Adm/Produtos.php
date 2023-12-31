<?php
    require_once "../../Config/Conexao.php";

    session_start();
    $idClient = $_SESSION["idUser"];
    if (!isset($_SESSION["typeUser"]) || $_SESSION["typeUser"] != 1) {
        header("Location: ../../public/Produtos.php");
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
    <link rel="stylesheet" href="../.././Styles/windowsModal.css">
    <link rel="stylesheet" href="../.././Styles/product.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <title>Cube Place - Todo os produtos</title>
</head>
<body>
    <header class="header">
        <a href="../../index.php"><img src="../.././Images/logo-cube-place.png" alt="Logo"></a>
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
                <li class="dropdown"><a href="../../Controllers/Loggout.php">Sair da Conta</a> </li>
                <li class="dropdown">
                    <a href="../Users/ShoppingCart.php">
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
        <div class="btn-add-prod">
            <button class='add-product' type='button' id='add_product'>+</button>
        </div>

        <div class="container-product">
            <?php
                require_once "DisplayProduct.php";
                
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $productId = $row["ID_Product"];
                        echo"<div class='product'>";
                            echo"<div class='icon-edit'>";
                                echo "<a href='AtualizarProduto.php?id=$productId'><i class='fas fa-edit'></i></a>";
                                echo "<a name='btn-trash'class='trash-item' data-product-id='$productId'><i class='fa-solid fa-trash'></i></a>";
                            echo"</div>";
                            echo"<a href='../../public/product_details.php?id=$productId'>";
                                echo"<p class='title-product'>".$row["Name_Product"]."</p>";
                                echo"<img src='../".$row["Img_Product"]."'>";
                                echo"<p class='subtitle-price'>A partir de</p>";
                                echo"<p class='price-product'>R$".$row["Price_Product"]."</p>";
                            echo"</a>";
                        echo"</div>";
                    }
                }else{
                    echo"<p class='title-product'>Nenhum produto disponível</p>";
                }
            ?>
        </div>
    </section>
    

    <div class="link-pages">
        <?php 
            require_once "DisplayProduct.php";
            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='Produtos.php?page=$i'>$i</a> ";
            }
        ?>
    </div>

    <footer class="footer">
        <p>Copyright © 2023 J.P.G. Fernandes - Todos os  direitos  reservados </p>
    </footer>

    <!--Janela modal do formulário para adicionar produto//Modal window of the form to add product-->
    <div class="modal" id="modal">
        <div class="modal-content">
            <span id="closeModal" class="modalClose">&times;</span>
            <form method="POST" action="../../Controllers/SetProduct.php" class="form-order"  enctype="multipart/form-data">
                <span class="titleForm"> Adicionar produto </span>
                <label class="formModal" for="name">Nome: </label>
                <input type="text" name="name_product" id="name_product" required>

                <label for="type_product">Tipo do produto: </label>
                <select name="type_product" id="type_product" required>
                    <option value="1">3x3x3</option>
                    <option value="2">2X2X2</option>
                    <option value="3">4X4X4</option>
                    <option value="4">5x5x5</option>
                    <option value="5">6x6x6</option>
                    <option value="6">7x7x7</option>
                    <option value="7">Skewb</option>
                    <option value="8">Pyraminx</option>
                    <option value="9">Square-1</option>
                    <option value="10">Megaminx</option>
                    <option value="11">Clock</option>
                    <option value="12">Lubrificantes</option>
                    <option value="13">Suportes</option>
                    <option value="14">Bolsa</option>
                    <option value="15">Timer</option>
                    <option value="16">Tapetes</option>
                    <option value="17">Cover</option>
                </select>

                <label class="formModal" for="price_product">Preço: </label>
                <input type="number" id="price_product" name="price_product" required>

                <label class="formModal" for="description_product">Descrição: </label>
                <textarea name="description_product" id="description_product" cols="30" rows="10" required></textarea>
                
                <label for="image_product">Imagem do produto: </label>
                <label for="image_product" class="input-file">Enviar imagem </label>
                <input type="file" name="image_product" id="image_product" accept=".jpg, .jpeg, .png" required>

                <label class="formModal" for="quantity_product">Quantidade no estoque: </label>
                <input type="number" id="quantity_product" name="quantity_product" required>

                <label class="formModal" for="price_product">Marca: </label>
                <input type="text" id="brand_name" name="brand_name" required>

                <button type="submit" class="sendData" id="send-data">Enviar</button>
            </form>
        </div>
    </div>

    <script src= "../.././Scripts/windowsModal.js"></script>
    <script src="../.././Scripts/AlertSucess.js"></script>

    <script>
       const deleteButtons = document.querySelectorAll('[name="btn-trash"]');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                let productId = this.getAttribute('data-product-id');
                let btnConfirm = confirm("Deseja realmente deletar o produto?");
                if (btnConfirm) {
                    window.location.href = `../../Controllers/DeleteProduct.php?id=${productId}`;
                }
            });
        });
    </script>
</body>
</html>