<?php
    require_once ".././Config/Conexao.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        $emailUser = $_POST["email_user"];
        $passwordUser = $_POST["pwd_user"];
    
        $sql = "SELECT * FROM users WHERE Email_User='$emailUser'";
        $result = $conn->query($sql);
    
        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $hashedPassword = $user["Password_User"];
    
            if (password_verify($passwordUser, $hashedPassword)) {
                $typeUser = $user["Type_User"];
                $idUser = $user["ID_User"];
                $nameUser = $user["Name_User"];

                session_start();
                $_SESSION["typeUser"] = $typeUser;
                $_SESSION["idUser"] = $idUser;
                $_SESSION["nameUser"] = $nameUser;

                if($typeUser == 1){
                    header("Location: ../View/Adm/Produtos.php");
                }else{
                    header("Location: ../index.php");
                }
            } else {
                header("Location: ../public/Falha_de_login.html");
            }
        } else {

            header("Location: ../public/Falha_de_login.html");
        }
    }
    
?>