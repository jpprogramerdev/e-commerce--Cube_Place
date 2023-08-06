<?php
    require_once "../../Config/Conexao.php";

    if (isset($_SESSION["idUser"])) {
        $idClient = $_SESSION["idUser"];

        $sql = "SELECT c.*, p.Name_Product, p.Img_Product, p.Price_Product 
                FROM shopping_cart c
                JOIN products p ON c.Id_Product = p.ID_Product
                WHERE c.Id_Client = $idClient";
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Usuário não logado.";
    }
?>
