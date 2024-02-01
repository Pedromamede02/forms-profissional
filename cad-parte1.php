<?php
session_start();

// Verifique se o usuário está autenticado
if (!isset($_SESSION['id_usuario'])) {
    die('Usuário não identificado. Por favor, volte e preencha o primeiro formulário.');
}

// Verifique se os dados de avaliação foram recebidos corretamente
if (!isset($_POST['avaliacao1'], $_POST['avaliacao2']) || 
    !is_array($_POST['avaliacao1']) || !is_array($_POST['avaliacao2']) ||
    count($_POST['avaliacao1']) !== 8 || count($_POST['avaliacao2']) !== 8) {
    die('Dados de avaliação não recebidos corretamente.');
}

require_once 'conn.php'; // Certifique-se de que o arquivo 'conn.php' existe

$id_usuario = $_SESSION['id_usuario'];
$avaliacoes1 = $_POST['avaliacao1'];
$avaliacoes2 = $_POST['avaliacao2'];

// Supondo que a tabela Avaliacoes2 exista e esteja configurada para receber avaliacoes de 9 a 16
// Insere avaliações de 1 a 8 na tabela Avaliacoes
$sql1 = "INSERT INTO Avaliacoes (id_usuario, avaliacao1, avaliacao2, avaliacao3, avaliacao4, avaliacao5, avaliacao6, avaliacao7, avaliacao8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt1 = $conn->prepare($sql1);
if ($stmt1 === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

// Supondo que as avaliações sejam números inteiros
$types1 = str_repeat('i', 9); // 1 para id_usuario e 8 para avaliações
$stmt1->bind_param($types1, $id_usuario, ...$avaliacoes1);

if (!$stmt1->execute()) {
    echo "Erro ao inserir avaliações 1-8: " . $stmt1->error;
}

$stmt1->close();

// Insere avaliações de 9 a 16 na tabela Avaliacoes2
$sql2 = "INSERT INTO Avaliacoes2 (id_usuario, avaliacao9, avaliacao10, avaliacao11, avaliacao12, avaliacao13, avaliacao14, avaliacao15, avaliacao16) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);
if ($stmt2 === false) {
    die('Erro ao preparar a consulta: ' . $conn->error);
}

$types2 = str_repeat('i', 9); // 1 para id_usuario e 8 para avaliações
$stmt2->bind_param($types2, $id_usuario, ...$avaliacoes2);

if (!$stmt2->execute()) {
    echo "Erro ao inserir avaliações 9-16: " . $stmt2->error;
}

$stmt2->close();
$conn->close(); // Fecha a conexão com o banco de dados
?>
