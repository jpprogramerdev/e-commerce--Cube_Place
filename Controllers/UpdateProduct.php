<?php
require_once "../Config/Conexao.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST["product_id"];
    $name = $_POST["name_product"];
    $type = $_POST["type_product"];
    $price = $_POST["price_product"];
    $description = $_POST["description_product"];
    $quantity = $_POST["quantity_product"];
    $brand = $_POST["brand_name"];
    $pathImg = "";

    if (isset($_FILES["image_product"]) && $_FILES["image_product"]["error"] === UPLOAD_ERR_OK) {
        $targetDir = ".././Images/Uploads/";
        $targetFile = $targetDir . basename($_FILES["image_product"]["name"]);

        if (move_uploaded_file($_FILES["image_product"]["tmp_name"], $targetFile)) {
            $pathImg = $targetFile;
        } else {
            echo "Ocorreu um erro ao mover o arquivo.";
        }
    }



    $sql = "UPDATE products SET Name_Product = '$name', Type_Product = $type, Price_Product = $price, Description_Product = '$description', Quantity_Product = $quantity, Brand_Product = '$brand', Img_Product = '$pathImg' WHERE ID_Product = $productId";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../View/Adm/Produtos.php");
        exit();
    } else {
        echo "Erro ao atualizar o produto: " . mysqli_error($conn);
    }
}
?>
