<?php
    require_once "../Config/Conexao.php";
    session_start();

    if (isset($_SESSION["idUser"])) {
        $idClient = $_SESSION["idUser"];
        
        $sql = "DELETE FROM shopping_cart WHERE Id_Client = $idClient";

        if(mysqli_query($conn,$sql)){
            header("Location: ../View/Users/ShoppingCart.php");
        }else{
            echo "Erro ao limpar o carrinho";
        }
    }
?>