<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube Place</title>
    <link rel="stylesheet" href=".././Styles/header.css">
    <link rel="stylesheet" href=".././Styles/form.css">
</head>
<body>
<header class="header">
        <a href="index.html"><img src=".././Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="">Todos</a></li>
                <li class="dropdown">
                    <a href="#">Cubos</a>
                    <ul class="dropdown-content">
                        <li><a href="">2x2x2</a></li>
                        <li><a href="">3x3x3</a></li>
                        <li><a href="">4x4x4</a></li>
                        <li><a href="">5x5x5</a></li>
                        <li><a href="">6x6x6</a></li>
                        <li><a href="">7x7x7</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Outros</a>
                    <ul class="dropdown-content">
                        <li><a href="">Skewb</a></li>
                        <li><a href="">Pyraminx</a></li>
                        <li><a href="">Square-1</a></li>
                        <li><a href="">Megaminx</a></li>
                        <li><a href="">Clock</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">Acessórios</a>
                    <ul class="dropdown-content">
                        <li><a href="">Lubrificantes</a></li>
                        <li><a href="">Suportes</a></li>
                        <li><a href="">Bolsa</a></li>
                        <li><a href="">Timer</a></li>
                        <li><a href="">Tapes</a></li>
                        <li><a href="">Cover</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="">Minha Conta</a>
                    <ul class="dropdown-content">
                        <li><a href="./Entrar.php">Acessar conta</a></li>
                        <li><a href="./Registrar.php">Criar conta</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>


    <section>
        <p class="title-form">Registre-se</p>
        <form action=".././Controllers/RegisterUser.php" method="post">
            <label for="name_user">Nome: </label>
            <input type="text" name="name_user" id="name_user" class="input-form">

            <label for="email_user">Email: </label>
            <input type="email" name="email_user" id="email_user" class="input-form">

            <label for="email_user">CPF: </label>
            <input type="number" name="CPF_user" id="CPF_user" class="input-form">

            <label for="pwd_user">Senha: </label>
            <input type="password" name="pwd_user" id="pwd_user" class="input-form">

            <label for="pwd_user">Confirmar senha: </label>
            <input type="password" name="pwd_user_confirm" id="pwd_user_confirm" class="input-form">

            <button type="submit">Entrar</button>
        </form>
    </section>

    <script src=".././Scripts/verifyPassword.js"></script>
    <script src=".././Scripts/verifyCPF.js"></script>
</body>
</html>