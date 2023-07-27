<?php
    session_start();

    if (!isset($_SESSION["typeUser"]) || $_SESSION["typeUser"] != 1) {
        header("Location: ../public/Acesso_negado.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../.././Styles/header.css">
    <title>Cube Place - Produtos</title>
</head>
<body>
    <p>Olá administrador</p>
</body>
</html>