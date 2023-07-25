<?php
    require_once "./Config.php";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>