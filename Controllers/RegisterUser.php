<?php
    require_once ".././Config/Conexao.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameUser = $_POST["name_user"];
        $emailUser = $_POST["email_user"];
        $passwordUser = $_POST["pwd_user"];
        $cpfUser = $_POST["CPF_user"];

        $hashedPassword = password_hash($passwordUser, PASSWORD_BCRYPT);

        $sql = "INSERT INTO users(Name_User, Email_User, CPF_User, Password_User, Type_User) VALUES('$nameUser','$emailUser', '$cpfUser', '$hashedPassword', 2)";

        if(mysqli_query($conn,$sql)){
            echo "Cliente inseridos com sucesso";
        }else{
            echo "ERROR";
        }
    }
?>