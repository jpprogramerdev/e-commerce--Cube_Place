<?php
    require_once "../../Config/Conexao.php";
    require_once "../../Controllers/GetProduct.php";


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
    <link rel="stylesheet" href="../.././Styles/editProduct.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <title>Cube Place - Atualizar Produto</title>
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
                <li class="dropdown"><a href="../.././Controllers/Loggout.php">Sair da Conta</a> </li>
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
        <form method="POST" action="../../Controllers/UpdateProduct.php" class="form-order"  enctype="multipart/form-data">
                <span class="titleForm"> Editar produto </span>
                <label class="formModal" for="name">Nome: </label>
                <input type="text" name="name_product" id="name_product" value= "<?php echo $productData["Name_Product"] ?>"required>

                <label for="type_product">Tipo do produto: </label>
                <select name="type_product" id="type_product" required>
                    <option value="1" <?php if($productData['Type_Product'] == 1) echo 'selected'; ?>>3x3x3</option>
                    <option value="2" <?php if($productData['Type_Product'] == 2) echo 'selected'; ?>>2X2X2</option>
                    <option value="3" <?php if($productData['Type_Product'] == 3) echo 'selected'; ?>>4X4X4</option>
                    <option value="4" <?php if($productData['Type_Product'] == 4) echo 'selected'; ?>>5x5x5</option>
                    <option value="5" <?php if($productData['Type_Product'] == 5) echo 'selected'; ?>>6x6x6</option>
                    <option value="6" <?php if($productData['Type_Product'] == 6) echo 'selected'; ?>>7x7x7</option>
                    <option value="7" <?php if($productData['Type_Product'] == 7) echo 'selected'; ?>>Skewb</option>
                    <option value="8" <?php if($productData['Type_Product'] == 8) echo 'selected'; ?>>Pyraminx</option>
                    <option value="9" <?php if($productData['Type_Product'] == 9) echo 'selected'; ?>>Square-1</option>
                    <option value="10" <?php if($productData['Type_Product'] == 10) echo 'selected'; ?>>Megaminx</option>
                    <option value="11" <?php if($productData['Type_Product'] == 11) echo 'selected'; ?>>Clock</option>
                    <option value="12" <?php if($productData['Type_Product'] == 12) echo 'selected'; ?>>Lubrificantes</option>
                    <option value="13" <?php if($productData['Type_Product'] == 13) echo 'selected'; ?>>Suportes</option>
                    <option value="14" <?php if($productData['Type_Product'] == 14) echo 'selected'; ?>>Bolsa</option>
                    <option value="15" <?php if($productData['Type_Product'] == 15) echo 'selected'; ?>>Timer</option>
                    <option value="16" <?php if($productData['Type_Product'] == 16) echo 'selected'; ?>>Tapetes</option>
                    <option value="17" <?php if($productData['Type_Product'] == 17) echo 'selected'; ?>>Cover</option>
                </select>


                <label class="formModal" for="price_product">Preço: </label>
                <input type="number" id="price_product" name="price_product" value= "<?php echo $productData["Price_Product"] ?>"  required>

                <label class="formModal" for="description_product">Descrição: </label>
                <textarea name="description_product" id="description_product" cols="30" rows="10" required><?php echo $productData["Description_Product"]; ?></textarea>
                
                <label for="image_product">Imagem do produto: </label>
                <label for="image_product" class="input-file">Enviar imagem </label>
                <input type="file" name="image_product" id="image_product" accept=".jpg, .jpeg, .png" value= "<?php echo $productData["Img_Product"] ?>"required>

                <label class="formModal" for="quantity_product">Quantidade no estoque: </label>
                <input type="number" id="quantity_product" name="quantity_product" value= "<?php echo $productData["Quantity_Product"] ?>" required>

                <label class="formModal" for="price_product">Marca: </label>
                <input type="text" id="brand_name" name="brand_name" value= "<?php echo $productData["Brand_Product"] ?>" required>
                
                <input type="hidden" name="product_id" value="<?php echo $productData["ID_Product"]; ?>">

                <button type="submit" class="sendData" id="send-data">Enviar</button>
            </form>
        </section>

        <footer class="footer">
            <p>Copyright © 2023 J.P.G. Fernandes - Todos os  direitos  reservados </p>
        </footer>
    </body>
</html>