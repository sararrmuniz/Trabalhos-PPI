<?php

require "enderecos.php";

// coleta os dados do formulário
$cep = $_POST["cep"] ?? "";
$logradouro = $_POST["logradouro"] ?? "";
$bairro = $_POST["bairro"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

// cria um novo Endereco e acrescenta no arquivo de texto
$novoEndereco = new Endereco($cep, $logradouro, $bairro, $cidade, $estado);
$novoEndereco->AddToFile("enderecos.txt");

// redireciona o navegador para a página de listagem de enderecos
header("location: listaEnderecos.php");

?>
