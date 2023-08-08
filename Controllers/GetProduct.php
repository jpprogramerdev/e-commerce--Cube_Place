<?php
     if (isset($_GET['id'])) {
        $productId = $_GET['id'];
    
        $sql = "SELECT * FROM products WHERE ID_Product = $productId";
        $result = mysqli_query($conn, $sql);
    
        if ($result && mysqli_num_rows($result) > 0) {
            $productData = mysqli_fetch_assoc($result);
        }
    
    }
?>