<?php
session_start();

$email = $_SESSION['email'];

require "conexaoMysql.php";
$pdo = mysqlConnect();

if (!isset($_SESSION['email']))
    header("location: ../html/login.html");

//Fazer logout
if (isset($_GET['sair'])) {
    unset($_SESSION['email']);
    header("location: ../html/login.html");
}

try {

  $sql = <<<SQL
  SELECT nome,cpf,hash_senha,telefone
  FROM anunciante
  WHERE anunciante.email = '$email'
  SQL;

  $stmt = $pdo->query($sql);

} 
catch (Exception $e) {
  //error_log($e->getMessage(), 3, 'log.php');
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meus Anúncios</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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

        h3 {
            text-align: center;
            font-size: 25px;
        }

        .container {
            background-color: white;
            padding: 10px;
            border: 1px solid lightgray;
            border-radius: 10px;
            box-shadow: 5px 5px 5px grey;
            margin: 70px auto;
            width: 45vw;
            display: flexbox;
            overflow-x: hidden;
        }
        
        button {
            margin-top: 1rem;
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
            .container{
                width: 70vw;
                overflow-x: hidden;
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

            .container{
                width: 70vw;
                margin: 130px auto;
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
            .container{
                width: 70vw;
                overflow-x: hidden;
                margin: 222px auto;
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
        <h3>Alterar Dados</h3>
        <hr>
        <form action="formAltera.php" method="post">
            <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" name="nome" class="form-control" id="nome" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">CPF</label>
                                <input type="text" name="cpf" class="form-control" id="cpf" required>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Telefone</label>
                                <input type="tel" name="telefone" class="form-control" id="telefone" required>
                            </div>
                            
                            <div class="col-sm-6">
                                <label class="form-label">Senha</label>
                                <input name="senha" type="password" class="form-control" id="senha" required>
                            </div>

                            <div class="col-12">
                            <button type="submit" class="btn btn-secondary">Enviar</button>
                            </div>
            </div>
        </form>
        <hr>
        <h3>Meus Dados</h3>
        <hr>

      <?php
      while ($row = $stmt->fetch()) {

        $nome = $row['nome'];
        $cpf= htmlspecialchars($row['cpf']);
        $telefone = htmlspecialchars($row['telefone']);
        $senha = htmlspecialchars($row['hash_senha']);
        $email = $_SESSION['email'];

        echo <<<HTML
            <strong>Nome: </strong><p>$nome</p>
            <strong>CPF: </strong><p>$cpf</p>
            <strong>Telefone: </strong><p>$telefone</p> 
            <strong>Email: </strong><p>$email</p>
            <strong>Senha: </strong><p>$senha</p>     
        HTML;
      }
      ?>
    </div>

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