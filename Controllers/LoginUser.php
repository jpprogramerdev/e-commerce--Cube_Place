<?php
    require_once ".././Config/Conexao.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $emailUser = $_POST["email_user"];
        $passwordUser = $_POST["pwd_user"];

        $sql = "SELECT * FROM users WHERE Email_User='$emailUser' AND Password_User='$passwordUser'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $typeUser = $user["Type_User"];

            if($typeUser == 1){
                echo "Bem vindo " . $user["Name_User"];
            }else if($typeUser == 2){
                echo "Bem vindo " . $user["Name_User"];
            }
        }else{
            header("Location: ../public/Falha_de_login.html");
        }
    }
?>