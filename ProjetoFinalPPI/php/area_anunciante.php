<?php
session_start();

if (!isset($_SESSION['email']))
    header("location: ../html/login.html");

//Fazer logout
if (isset($_GET['sair'])) {
    unset($_SESSION['email']);
    header("location: ../html/login.html");
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/area_anunciante.css">
    <title>Área do Anunciate</title>

</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <a><img src="../images/logo3.png" alt="logo"></a>
                <h1>MeuAchado.com</h1>
            </div>
            <div class="nav-list">
                <ul>
                    <li class="nav-item"><a href="area_anunciante.php" class="nav-link">Área do Anunciante</a></li>
                    <li class="nav-item"><a href="cria_anuncio.php" class="nav-link">Criar Anúncio</a></li>
                    <li class="nav-item"><a href="mostrar_anuncios.php" class="nav-link">Meus Anúncios</a></li>
                    <li class="nav-item"><a href="mensagens.php" class="nav-link">Mensagens</a></li>
                    <li class="nav-item"><a href="altera_dados.php" class="nav-link">Meus Dados</a></li>
                    <li class="nav-item"><a href="area_anunciante.php?sair=true" class="nav-link"> Sair</a></li>
                </ul>
            </div>

            <div class="move">
                <button onclick="mostraMenu()" class="mobile-menu-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16"
                        class="mobile-menu-icon">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                    </svg>
                </button>
            </div>

        </nav>
        <div class="mobile-menu">
            <ul>
                <li class="nav-item"><a href="area_anunciante.php" class="nav-link">Área do Anunciante</a></li>
                <li class="nav-item"><a href="cria_anuncio.php" class="nav-link">Criar Anúncio</a></li>
                <li class="nav-item"><a href="mostrar_anuncios.php" class="nav-link">Meus Anúncios</a></li>
                <li class="nav-item"><a href="mensagens.php" class="nav-link">Mensagens</a></li>
                <li class="nav-item"><a href="altera_dados.php" class="nav-link">Meus Dados</a></li>
                <li class="nav-item"><a href="area_anunciante.php?sair=true" class="nav-link"> Sair</a></li>
            </ul>
        </div>
    </header>

    <main>
        <div class=container2>
            <h2>Seja bem-vindo(a) a Área do Anunciante!</h2>
            <p>Escolha uma das opções abaixo para começar:</p>
            <div>
                <a href="cria_anuncio.php" class="opcoes">Criar Anúncio</a>
                <a href="mostrar_anuncios.php" class="opcoes">Meus Anúncios</a>
                <a href="mensagens.php" class="opcoes">Mensagens</a>
                <a href="altera_dados.php" class="opcoes">Meus Dados</a>
            </div>
        </div>

    </main>

    <footer>
        <img src="../images/icones.png" alt="Icones" width="150" height="50">
    </footer>

    <script>
        function mostraMenu() {
            let menuMobile = document.querySelector('.mobile-menu');
            if (menuMobile.classList.contains('open')) {
                menuMobile.classList.remove('open');
            } else {
                menuMobile.classList.add('open');
            }
        }
    </script>
</body>

</html>