<?php
    require_once "../../Config/Conexao.php";
    $itemsPerPage = 1;

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $offset = ($page - 1) * $itemsPerPage;
        
    $sqlCount = "SELECT COUNT(*) as total FROM products";
    $resultCount = mysqli_query($conn, $sqlCount);
    $rowCount = mysqli_fetch_assoc($resultCount);
    $totalItems = $rowCount['total'];
        
    $totalPages = ceil($totalItems / $itemsPerPage);
    $sql = "SELECT * FROM products LIMIT $itemsPerPage OFFSET $offset";
    $result = mysqli_query($conn, $sql);

?>