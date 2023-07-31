<?php
    session_start();

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
    <link rel="stylesheet" href="../.././Styles/windowsModal.css">
    <title>Cube Place - Produtos</title>
</head>
<body>
    <header class="header">
        <a href="index.html"><img src="./Images/logo-example.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="">Todos</a></li>
                <li class="dropdown"><a href="./DisplayUsers.php">Tabela de clientes</a></li> 
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
                        <li><a href="../.././public/Entrar.php">Acessar conta</a></li>
                        <li><a href="../.././public/Registrar.php">Criar conta</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
   
    <button class='add-product' type='button' id='add_product'>Adicionar produto</button>
    <!--Janela modal do formulário para adicionar produto//Modal window of the form to add product-->

    <div class="modal" id="modal">
        <div class="modal-content">
            <span id="closeModal" class="modalClose">&times;</span>
            <form method="POST" action="../../Controllers/GetProduct.php" class="form-order"  enctype="multipart/form-data">
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
                <textarea name="description_product" id="description_product" cols="30" rows="20" required></textarea>
                
                <label for="image_product">Imagem do produto: </label>
                <label for="image_product" class="input-file">Enviar imagem </label>
                <input type="file" name="image_product" id="image_product" accept=".jpg, .jpeg, .png" required>

                <label class="formModal" for="quantity_product">Quantidade no estoque: </label>
                <input type="number" id="quantity_product" name="quantity_product" required>

                <button type="submit" class="sendData" id="send-data">Enviar</button>
            </form>
        </div>
    </div>

    <script src= "../.././Scripts/windowsModal.js"></script>
    <script src="../.././Scripts/AlertSucess.js"></script>
</body>
</html>