<?php
    require_once "../Config/Conexao.php";
    session_start();

    if(isset($_GET['id'])){
        $idProd = $_GET['id'];

        $idClient = $_SESSION["idUser"];    

        $sql = "INSERT INTO shopping_cart(Id_Client, Id_Product, Quantity) VALUES ('$idClient','$idProd',1)";
    
        if(mysqli_query($conn,$sql)){
            header("Location: ../public/Product_Details.php?id=$idProd");
        }else{
            echo "ERROR";
        }
    }
?>