<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
    exit('Usuário não identificado. Por favor, volte e preencha o primeiro formulário.');
}

require_once 'conn.php';

$id_usuario = $_SESSION['id_usuario'];
$avaliacoes = $_POST['avaliacao'];

// Certifique-se de que exatamente 8 avaliações foram recebidas
if (count($avaliacoes) == 8) {
    $sql = "INSERT INTO Avaliacoes (id_usuario, avaliacao1, avaliacao2, avaliacao3, avaliacao4, avaliacao5, avaliacao6, avaliacao7, avaliacao8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        exit('Erro ao preparar a consulta: ' . $conn->error);
    }

    $stmt->bind_param("iiiiiiiii", $id_usuario, ...$avaliacoes);

    if ($stmt->execute()) {
        echo "Avaliações inseridas com sucesso.<br>";
        echo "<a href='parte2.php'>Ir para a próxima parte</a>";
    } else {
        echo "Erro ao inserir avaliações: " . $stmt->error;
    }

    $stmt->close();
} else {
    exit('Número incorreto de avaliações recebidas.');
}
?>
