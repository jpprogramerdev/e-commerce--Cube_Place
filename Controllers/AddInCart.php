<?php
    require_once "../Config/Conexao.php";
    session_start();

    if(isset($_GET['id']) && isset($_GET['quantity_prod'])){
        $idProd = $_GET['id'];
        $quantity = $_GET['quantity_prod'];
        $quantity == null ? $quantity = 1 : $quantity = $quantity;

        if (!isset($_SESSION["idUser"])) {
            // Redirecionar o usuário para a página de login, caso ele não esteja logado
            header("Location: ../public/Entrar.php");
            exit();
        }

        $idClient = $_SESSION["idUser"];    

        $sql = "INSERT INTO shopping_cart (Id_Client, Id_Product, Quantity) VALUES ('$idClient', '$idProd', '$quantity')";
    
        if(mysqli_query($conn, $sql)){
            header("Location: ../public/Product_Details.php?id=$idProd");
        } else {
            echo "ERROR";
        }
    } else {
        header("Location: ../public/Entrar.php");
        exit();
    }
?>
