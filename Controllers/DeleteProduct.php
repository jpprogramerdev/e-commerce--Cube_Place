<?php
    require_once "../Config/Conexao.php";

    if (isset($_GET['id'])) {
        $productId = $_GET['id'];

       
        $sql = "DELETE FROM products WHERE ID_Product = $productId";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../View/Adm/Produtos.php");
            exit();
        } else {
            echo "Erro ao excluir o produto: " . mysqli_error($conn);
        }
    }
?>
