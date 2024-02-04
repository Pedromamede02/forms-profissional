<?php
require_once 'parte1.php';
var_dump($perguntas); 
// Supondo que você já tenha uma conexão ao banco de dados estabelecida em $conn

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ID do usuário - substitua isso pelo método correto de obter o ID do usuário autenticado
    $id_usuario = 1; // Exemplo estático, você deve obter isso dinamicamente

    // Prepara a query SQL
    $sql = "INSERT INTO tbAvaliacoes (id_usuario, pergunta1, resposta1, pergunta2, resposta2, pergunta3, resposta3, pergunta4, resposta4, pergunta5, resposta5, pergunta6, resposta6, pergunta7, resposta7, pergunta8, resposta8) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Erro ao preparar a instrução: " . $conn->error);
    }

    // Assume-se que você tenha um array $perguntas contendo os textos das perguntas
    // e que $_POST['respostaX'] contém as respostas submetidas pelo formulário
    $stmt->bind_param("isiiisiiisiiisiii", 
        $id_usuario, 
        $perguntas[0]->getTexto(), $_POST['resposta1'], 
        $perguntas[1]->getTexto(), $_POST['resposta2'], 
        $perguntas[2]->getTexto(), $_POST['resposta3'], 
        $perguntas[3]->getTexto(), $_POST['resposta4'], 
        $perguntas[4]->getTexto(), $_POST['resposta5'], 
        $perguntas[5]->getTexto(), $_POST['resposta6'], 
        $perguntas[6]->getTexto(), $_POST['resposta7'], 
        $perguntas[7]->getTexto(), $_POST['resposta8']
    );

    // Executa a query
    for ($i = 0; $i < count($perguntas); $i++) {
        $resposta = $_POST['resposta' . ($i + 1)]; // Obtém a resposta do formulário

        // Executa a query
        if ($stmt->bind_param("iss", $id_usuario, $perguntas[$i], $resposta) && $stmt->execute()) {
            echo "Resposta para a pergunta " . ($i + 1) . " salva com sucesso!<br>";
        } else {
            echo "Erro ao salvar resposta para a pergunta " . ($i + 1) . ": " . $stmt->error . "<br>";
        }
    }

    // Fecha o statement
    $stmt->close();
}

// Fecha a conexão com o banco de dados
$conn->close();
?>