<?php
session_start(); 

if (isset($_SESSION["typeUser"])) {
    session_unset();
    session_destroy();
}

header("Location: ../public/Entrar.php");
exit();
?>
