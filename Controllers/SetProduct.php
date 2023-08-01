<?php
    require_once ".././Config/Conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameProduct = $_POST["name_product"];
        $typeProduct = $_POST["type_product"];
        $priceProduct = $_POST["price_product"];
        $descriptionProduct = $_POST["description_product"];
        $qtdProduct = $_POST["quantity_product"];
        $brandProduct = $_POST["brand_name"];
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

        $sql = "INSERT INTO products(Name_Product, Img_Product, Price_Product, Description_Product,Brand_Product, Quantity_Product, Type_Product) VALUES ('$nameProduct', '$pathImg', '$priceProduct', '$descriptionProduct', '$brandProduct', '$qtdProduct', '$typeProduct')";

        if (mysqli_query($conn, $sql)) {
            header("Location: .././View/Adm/Produtos.php?success=true");
            exit();
        } else {
            echo "Falha ao inserir o produto: " . mysqli_error($conn);
        }
    }
?>