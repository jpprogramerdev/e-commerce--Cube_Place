<?php
session_start();
require_once "../Config/Conexao.php";

if (isset($_GET['product_id']) && isset($_GET['customer_id'])) {
    $productId = $_GET['product_id'];
    $customerId = $_GET['customer_id'];

    // Check if the product exists in the products table
    $sqlProduct = "SELECT * FROM products WHERE ID_Product = $productId";
    $resultProduct = mysqli_query($conn, $sqlProduct);

    if ($resultProduct && mysqli_num_rows($resultProduct) > 0) {
        // Product found, add to the Shopping_Cart table
        $sqlAddToCart = "INSERT INTO Shopping_Cart (product_id, customer_id) VALUES ($productId, $customerId)";

        if (mysqli_query($conn, $sqlAddToCart)) {
            echo "Produto adicionado ao carrinho com sucesso!";
        } else {
            echo "Erro ao adicionar o produto ao carrinho: " . mysqli_error($conn);
        }
    } else {
        echo "Produto não encontrado.";
    }
} else {
    echo "ID do produto e/ou ID do cliente não especificado.";
}
?>
