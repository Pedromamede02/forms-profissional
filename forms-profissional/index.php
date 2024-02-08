<?php
// Conectar ao banco de dados
$con = new mysqli('mysql_db', 'root', 'root', 'mysql');

// Verificar a conexão
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Olá, bom dia!</h1>
</body>
</html>
<?php
// Fechar a conexão (opcional, pois é automaticamente fechada ao fim do script)
$con->close();
?>
