<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
   	<!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Produtos</title>
    
    <!-- 2: Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<body>

<div class="container">
  
  <h3>Lista de Produtos</h3>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Número Sequencial</th>
        <th>Nome do Produto</th>
        <th>Descrição</th>
      </tr>
    </thead>
    
    <tbody>
		<?php

$produto = array();
   $produto[] = "Celular";
   $produto[] = "TV";
   $produto[] = "Notebook";
   $produto[] = "Luminária";
   $produto[] = "Tablet";
   $produto[] = "Tênis";
   $produto[] = "Geladeira";
   $produto[] = "Fogão";
   $produto[] = "Microondas";
   $produto[] = "Lava-Louça";

$descricao = array();
   $descricao[] = "Ultra rápido";
   $descricao[] = "Imagem Full HD";
   $descricao[] = "Alta perfarmance";
   $descricao[] = "Vintage fábricada em 1920";
   $descricao[] = "Wi-Fi 64GB Android 11.0 Câm. 8MP + Selfie 5MP";
   $descricao[] = "Confortável e resistênte";
   $descricao[] = "Freezer com Dispenser de Água Platinum 400L";
   $descricao[] = "6 Bocas Branco Automático";
   $descricao[] = "31L Prata com Painel Touch On Glass";
   $descricao[] = "8 Serviços Inox";


    $qde = $_GET["qde"];

  
    for($i=0; $i<$qde; $i++){
      $rand = rand(0, 9);
      echo <<<HTML
      <tr>
        <td>$i</td>
        <td>$produto[$rand]</td>
        <td>$descricao[$rand]</td>
      </tr>
      HTML;
    }

		?>
    </tbody>
  </table>
</div>

</body>
</html>