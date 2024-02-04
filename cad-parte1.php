<?php
require_once 'parte1.php';

// Supondo que você já tenha uma conexão ao banco de dados estabelecida em $conn

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = 1; // Obtenha isso dinamicamente, por exemplo, a partir da sessão do usuário

    // Supondo que 'avaliacao1' é um array com as respostas enviadas via POST
    foreach ($_POST['avaliacao1'] as $indice => $resposta) {
        // A variável $indice começa de 0, então adicionamos 1 para corresponder ao id_pergunta esperado
        $id_pergunta = $indice + 1;

        // Prepara a instrução SQL para inserir a resposta na tabela de avaliações
        $stmt = $conn->prepare("INSERT INTO tbavaliacoes (id_usuario, id_pergunta, resposta) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Erro ao preparar a instrução: " . $conn->error);
        }

        // Vincula os valores e executa a instrução
        $stmt->bind_param("iii", $id_usuario, $id_pergunta, $resposta);
        if (!$stmt->execute()) {
            // Em caso de erro, exibe uma mensagem
            echo "Erro ao salvar resposta para a pergunta $id_pergunta: " . $stmt->error . "<br>";
        } else {
            // Em caso de sucesso, exibe uma mensagem
            echo "Resposta para a pergunta $id_pergunta salva com sucesso!<br>";
        }

        // Fecha o statement
        $stmt->close();
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
