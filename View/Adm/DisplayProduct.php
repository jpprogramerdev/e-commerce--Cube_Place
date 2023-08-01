<?php
            require_once "../.././Config/Conexao.php";
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

            
            while ($row = mysqli_fetch_assoc($result)) {
                echo"<p>".$row["Name_Product"]."</p>";
                echo"<img src='../".$row["Img_Product"]."'>";
                echo"<p>".$row["Price_Product"]."</p>";
                echo"<p>".$row["Description_Product"]."</p>";
            }

            for ($i = 1; $i <= $totalPages; $i++) {
                echo "<a href='Produtos.php?page=$i'>$i</a> ";
            }
?>