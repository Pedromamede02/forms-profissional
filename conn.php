<?php 
$host = "localhost";
$user = "root";
$pass = "";
$banco = "projeto";

$conn = new mysqli($host, $user, $pass, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

echo "Conexão bem-sucedida";  // Mensagem de depuração, remova isso em um ambiente de produção
?>
