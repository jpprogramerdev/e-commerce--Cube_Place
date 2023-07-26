<?php
    require_once ".././Config/Conexao.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameUser = $_POST["name_user"];
        $emailUser = $_POST["email_user"];
        $passowordUser = $_POST["pwd_user"];

        $sql = "INSERT INTO users(Name_User, Email_User, Password_User, Type_User) VALUES('$nameUser','$emailUser','$passowordUser',2)";

        if(mysqli_query($conn,$sql)){
            echo "Cliente inseridos com sucesso";
        }else{
            echo "ERROR";
        }
    }
?>