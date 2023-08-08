<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cube Place - Entrar</title>
    <link rel="stylesheet" href=".././Styles/header.css">
    <link rel="stylesheet" href=".././Styles/form.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
</head>
<body>
<header class="header">
        <a href="../index.php"><img src=".././Images/logo-cube-place.png" alt="Logo"></a>
        <nav class="menu-header">
            <ul>
                <li class="dropdown"><a href="./View/Adm/Produtos.php">Todos</a></li>
                <li class="dropdown">
                    <a href="#">Cubos</a>
                    <ul class="dropdown-content">
                        <li><a href="Categoria.php?categoria=2">2x2x2</a></li>
                        <li><a href="Categoria.php?categoria=1">3x3x3</a></li>
                        <li><a href="Categoria.php?categoria=3">4x4x4</a></li>
                        <li><a href="Categoria.php?categoria=4">5x5x5</a></li>
                        <li><a href="Categoria.php?categoria=5">6x6x6</a></li>
                        <li><a href="Categoria.php?categoria=6">7x7x7</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#">Outros</a>
                    <ul class="dropdown-content">
                        <li><a href="Categoria.php?categoria=7">Skewb</a></li>
                        <li><a href="Categoria.php?categoria=8">Pyraminx</a></li>
                        <li><a href="Categoria.php?categoria=9">Square-1</a></li>
                        <li><a href="Categoria.php?categoria=10">Megaminx</a></li>
                        <li><a href="Categoria.php?categoria=11">Clock</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="">Acessórios</a>
                    <ul class="dropdown-content">
                        <li><a href="Categoria.php?categoria=12">Lubrificantes</a></li>
                        <li><a href="Categoria.php?categoria=13">Suportes</a></li>
                        <li><a href="Categoria.php?categoria=14">Bolsa</a></li>
                        <li><a href="Categoria.php?categoria=15">Timer</a></li>
                        <li><a href="Categoria.php?categoria=16">Tapes</a></li>
                        <li><a href="Categoria.php?categoria=17">Cover</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="">Minha conta</a>
                    <ul class='dropdown-content'>
                        <li><a href='Entrar.php'>Acessar conta</a></li>
                        <li><a href='Registrar.php'>Criar conta</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>


    <section>
        <p class="title-form">Identifique-se</p>
        <form action=".././Controllers/LoginUser.php" method="post">
            <label for="email_user">Email: </label>
            <input type="email" name="email_user" id="email_user" class="input-form">

            <label for="pwd_user">Senha: </label>
            <input type="password" name="pwd_user" id="pwd_user" class="input-form">

            <button type="submit">Entrar</button>
        </form>
    </section>

    <footer class="footer">
            <p>Copyright © 2023 João Pedro Gerotto Fernandes - Todos os  direitos  reservados </p>
    </footer>
</body>
</html>