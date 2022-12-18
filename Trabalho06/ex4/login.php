<?php

function salvaString($string, $arquivo)
{
 $arq = fopen($arquivo, "w");
 fwrite($arq, $string); 
 fclose($arq);
}
function carregaString($arquivo)
{
$arq = fopen($arquivo, "r");
$string = fgets($arq);
fclose($arq);
return $string;
}

$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";
$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

salvaString($email,"email.txt");
salvaString($senhaHash,"senhaHash.txt");

$email = htmlspecialchars($email);
$senha = htmlspecialchars($senhaHash);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
   	<!-- 1: Tag de responsividade -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página de Dados</title>
    
    <!-- 2: Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
<body>

<div class="container">

  <table class="table table-striped">
  <thead>
      <tr>
        <th>Email</th>
        <th>Senha</th>
      </tr>
    </thead>
    
    <tbody>
		<?php

    echo <<<HTML
    <tr>
        <td>$email</td>
        <td>$senha</td>
    </tr>
    HTML;
		?>
    </tbody>
  </table>
  <a href="index.html">Voltar a página inicial</a>
</div>

</body>
</html>