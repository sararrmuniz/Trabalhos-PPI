<?php

function salvaString($string, $arquivo)
{
 $arq = fopen($arquivo, "w");
 fwrite($arq, $string); 
 fclose($arq);
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página de Confirmação</title>
</head>

<body>
	<?php
        echo <<<HTML
        <div>
            <h2>Dados confirmados com sucesso!</h2>
        </div>
        HTML;
	?>
</body>
</html>