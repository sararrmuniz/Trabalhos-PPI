<?php
session_start();

require "conexaoMysql.php";
$pdo = mysqlConnect();


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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Anúncio</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
            margin: auto;
            background-color: plum;
            overflow-x: hidden;
        }

        .container {
            margin-top: 60px;
            margin-bottom: 60px;
        }

        button {
            margin-top: 1rem;
        }

        fieldset {
            padding: 1rem;
            border: 0.5 solid gray;
            background-color: #eee;
        }

        legend {
            background-color: #23232e;
            color: #fff;
            padding: 3px 8px;
        }

        header {
            width: 100vw;
            background: #23232e;
        }

        .nav-bar {
            display: flex;
            justify-content: space-between;
            padding: 1.5rem;
        }

        .logo img {
            width: 100px;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo h1 {
            font-size: 25px;
            color: whitesmoke;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .nav-item a:hover {
            cursor: pointer;
            opacity: 0.8;
            color: white;
        }

        .nav-list {
            display: flex;
            align-items: center;
        }

        .nav-list ul {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        .nav-item {
            margin: 0 10px;
        }

        .nav-link {
            text-decoration: none;
            font-size: 1.15rem;
            color: #fff;
            font-weight: 400;
        }

        .opcoes:link,
        .opcoe:visited,
        .opcoe:active {
            text-align: center;
            color: #555;
            text-decoration: none;
            display: block;
            margin-bottom: 1em;
            background-color: #eee;
            border: 0.5px solid lightgray;
            padding: 10px;
            margin: 5px auto;
            width: 80%;
        }

        .opcoes:hover {
            background-color: #dedede;
        }

        .mobile-menu-icon {
            cursor: pointer;
            color: whitesmoke;
            background: transparent;
            font-size: 30px;
            border: none;
            width: 37px;
            height: 38px;
            margin-top: 10px;
            display: none;
        }

        .mobile-menu {
            display: none;
        }

        .move {
            display: flex;
            justify-content: left;
        }

        footer {
            background-color: #23232e;
            text-align: center;
            margin: auto;
            padding: 5px;
            width: 100%;
        }

        /*Responsividade para celulares*/
        @media all AND (max-width: 600px) {
            .logo h1 {
                font-size: 22px;
            }

            .nav-bar {
                padding: 1.5rem;
            }

            .nav-item {
                display: none;
            }

            .mobile-menu-icon {
                display: block;
            }

            .mobile-menu ul {
                display: flex;
                flex-direction: column;
                text-align: center;
                padding-bottom: 1rem;
            }

            .mobile-menu .nav-item {
                display: block;
                padding-top: 1.2rem;
            }

            .mobile-menu {
                width: 100%;
            }

            .open {
                display: block;
            }
        }

        /*Responsividade para ipad*/
        @media all AND (min-width: 700px) and (max-width: 820px) {
            .logo h1 {
                font-size: 30px;
            }

            .logo img {
                width: 110px;
            }

            .nav-bar {
                padding: 1.5rem;
            }

            .nav-item {
                display: none;
            }

            .mobile-menu-icon {
                display: block;
            }

            .mobile-menu ul {
                display: flex;
                flex-direction: column;
                text-align: center;
                padding-bottom: 1rem;
            }

            .mobile-menu .nav-item {
                display: block;
                padding-top: 1.2rem;
            }

            .mobile-menu {
                width: 100%;
            }

            .open {
                display: block;
            }

            .container {
                height: 85vh;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 auto;
            }
        }

        /*Responsividade para Surface Pro 7*/
        @media all AND (min-width: 912px) and (max-width: 1000px) {
            .logo h1 {
                font-size: 30px;
            }

            .logo img {
                width: 110px;
            }

            .nav-bar {
                padding: 1.5rem;
            }

            .nav-item {
                display: none;
            }

            .mobile-menu-icon {
                display: block;
            }

            .mobile-menu ul {
                display: flex;
                flex-direction: column;
                text-align: center;
                padding-bottom: 1rem;
            }

            .mobile-menu .nav-item {
                display: block;
                padding-top: 1.2rem;
            }

            .mobile-menu {
                width: 100%;
            }

            .open {
                display: block;
            }
        }

        /*Responsividade para Galaxy Fold*/
        @media all AND (max-width: 280px) {
            .logo img {
                width: 70px;
            }

            .logo h1 {
                font-size: 18px;
            }

            .mobile-menu-icon {
                width: 32px;
                height: 32px;
                margin-top: 5px;
            }

            .nav-bar {
                padding: 10px;
            }
        }
    </style>

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
                    <li class="nav-item"><a href="cria_anuncio.php?sair=true" class="nav-link"> Sair</a></li>
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
                <li class="nav-item"><a href="cria_anuncio.php?sair=true" class="nav-link"> Sair</a></li>
            </ul>
        </div>
    </header>

    <div class="container">

        <main>
            <form action="formAnuncio.php" method="POST">

                <fieldset>
                    <legend>Dados do Anúncio</legend>

                    <div class="row g-3">
                        <!-- titulo e descricao -->
                        <div class="col-sm-4">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" name="titulo" class="form-control" id="titulo">
                        </div>

                        <div class="col-sm-4">
                            <label class="form-label">Categoria</label>
                            <select name="categoria" class="form-select" id="categoria">
                                <option value="" selected>Selecione</option>
                                <?php
                                $select = $pdo->prepare("SELECT nome FROM categoria ORDER BY nome ASC");
                                $select->execute();
                                $fetchAll = $select->fetchAll();
                                foreach ($fetchAll as $categorias) {
                                    echo '<option value="' . $categorias['codigo'] . '">' . $categorias['nome'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <label for="preco" class="form-label">Preço</label>
                            <input type="number" name="preco" class="form-control" id="preco" min="0" placeholder="R$">
                        </div>

                        <div class="col-sm-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="datetime-local" name="data" class="form-control" id="data">
                        </div>
                        <div class="col-sm-3">
                            <label for="foto" class="form-label">Foto do Produto</label>
                            <input type="file" accept=".png, .jpg, .jpeg" name="foto" class="form-control" id="foto">
                        </div>
                        <div class="col-sm-6">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" rows="" cols="" class="form-control"></textarea>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Dados de Endereço</legend>

                        <div class="row g-3">
                            <!-- CEP e endereço -->
                            <div class="col-sm-6">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" name="cep" class="form-control" id="cep">
                            </div>
                            <div class="col-sm-6">
                                <label for="estado" class="form-label">Estado</label>
                                <input type="text" name="estado" class="form-control" id="estado">
                            </div>

                            <!-- Bairro e cidade -->
                            <div class="col-sm-6">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" name="bairro" class="form-control" id="bairro">
                            </div>
                            <div class="col-sm-6">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" name="cidade" class="form-control" id="cidade">
                            </div>
                        </div>
                    </fieldset>

                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">Publicar</button>
                    </div>
            </form>
        </main>
    </div>
    <footer>
        <img src="../images/icones.png" alt="Icones" width="150" height="50">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <script src="../js/custom.js"></script>

</body>

</html>