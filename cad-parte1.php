<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    exit('Usuário não identificado. Por favor, volte e preencha o primeiro formulário.');
}

if (!isset($_POST['avaliacao1']) || !is_array($_POST['avaliacao1']) || 
    !isset($_POST['avaliacao2']) || !is_array($_POST['avaliacao2'])) {
    exit('Dados de avaliação não recebidos corretamente.');
}

require_once 'conn.php';

$id_usuario = $_SESSION['id_usuario'];
$avaliacoes1 = $_POST['avaliacao1'];
$avaliacoes2 = $_POST['avaliacao2'];

// Verifique se exatamente 8 avaliações foram recebidas de cada parte
if (count($avaliacoes1) !== 8 || count($avaliacoes2) !== 8) {
    exit('Número incorreto de avaliações recebidas.');
}

// Combine as duas partes em um único array
$avaliacoes = array_merge($avaliacoes1, $avaliacoes2);

$sql = "INSERT INTO Avaliacoes (id_usuario, avaliacao1, avaliacao2, avaliacao3, avaliacao4, avaliacao5, avaliacao6, avaliacao7, avaliacao8, avaliacao9, avaliacao10, avaliacao11, avaliacao12, avaliacao13, avaliacao14, avaliacao15, avaliacao16) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    exit('Erro ao preparar a consulta: ' . $conn->error);
}

$stmt->bind_param("iiiiiiiiiiiiiiiii", $id_usuario, ...$avaliacoes);

if ($stmt->execute()) {
    echo "Avaliações inseridas com sucesso.<br>";
} else {
    echo "Erro ao inserir avaliações: " . $stmt->error;
}

$stmt->close();
$conn->close(); // Fecha a conexão com o banco de dados
?>
