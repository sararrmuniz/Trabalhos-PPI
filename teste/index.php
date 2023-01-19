<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro MeuAchado.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
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
    </style>
</head>

<body>
    <?php
    require "conexaoMysql.php";

    $sql = "SELECT nome, codigo FROM categoria;";
    $result = mysqli_query($conn, $sql);
    ?>

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
                                while ($dados = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $dados['codigo'] ?>">
                                        <?php echo $dados['nome'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label for="preco" class="form-label">Preço</label>
                            <input type="number" name="preco" class="form-control" id="preco" min="0" placeholder="R$">
                        </div>

                        <div class="col-sm-3">
                            <label for="data" class="form-label">Data</label>
                            <input type="datetime-local" name="data" class="form-control" id="data">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>