<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
   	<!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Endereços</title>
    
    <!-- 2: Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<body>

<div class="container">
  
  <h3>Contatos Carregados do Arquivo <i>enderecos.txt</i></h3>

  <table class="table table-striped">
  <thead>
      <tr>
        <th>CEP</th>
        <th>Logradouro</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
      </tr>
    </thead>
    
    <tbody>
		<?php
    require "enderecos.php";
    $arrayEnderecos = carregaEnderecosDeArquivo();	
    if ($arrayEnderecos != NULL)
    {
      foreach ($arrayEnderecos as $endereco)
      {    
        $cep = htmlspecialchars($endereco->cep);
        $logradouro = htmlspecialchars($endereco->logradouro);
        $bairro = htmlspecialchars($endereco->bairro);
        $cidade = htmlspecialchars($endereco->cidade);
        $estado = htmlspecialchars($endereco->estado);

        echo <<<HTML
        <tr>
          <td>$cep</td>
          <td>$logradouro</td>
          <td>$bairro</td>
          <td>$cidade</td>
          <td>$estado</td>
        </tr>
        HTML;
      }
    }		
		?>
    </tbody>
  </table>
  <a href="index.html">Voltar a página inicial</a>
</div>

</body>
</html>