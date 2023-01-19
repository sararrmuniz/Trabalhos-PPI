<?php

require "conexaoMysql.php";

// Resgata os dados do anunciante
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$dataHora = $_POST["data"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$categoria = $_POST["categoria"];

$sql = "INSERT INTO anuncio (titulo, descricao, preco, dataHora, 
  cep, bairro, cidade, estado, codCategoria) VALUES( $titulo, $descricao, $preco, $dataHora,
  $cep, $bairro, $cidade, $estado $categoria)";

$result = mysqli_query($conn, $sql);

if ($result == true) {
  ?>
  <h1>Anuncio enviado com sucesso!</h1>
  <?php
} else {
  ?>

  <h1>Erro!</h1>
  <?php
}
?>