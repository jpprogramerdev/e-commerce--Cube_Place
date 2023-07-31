<?php
    require_once ".././Config/Conexao.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nameProduct = $_POST[""];
        $priceProduct = $_POST[""];
        $imgProduct = $_POST[""];
        $description = $_POST[""];
        $qtdProduct = $_POST[""];
        $typeProduct = $_POST[""];
    }
?>