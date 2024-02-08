<?php
// Corrigindo o nome do banco de dados na conexão e a variável de conexão
$con = new mysqli('mysql_db', 'root','root','mysql');

// Ajuste 'projeto' para o nome correto do seu banco de dados

// Verificar a conexão
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

// Removido 'require_once 'parte1.php';', pois parece não ser relevante para este trecho de código

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aqui, você deveria ter uma lógica para obter o id_usuario de forma dinâmica, talvez da sessão do usuário logado
    $id_usuario = 1; // Este valor é apenas um exemplo. Substitua pela lógica apropriada para obter o id do usuário

    // Certifique-se de que 'avaliacao1' é o nome correto dos campos de avaliação enviados pelo seu formulário
    foreach ($_POST['avaliacao1'] as $indice => $resposta) {
        // A variável $indice pode ser usada diretamente se as perguntas no formulário começarem de 1 e forem sequenciais
        $id_pergunta = $indice + 1; // Ajuste conforme necessário para corresponder aos IDs das perguntas no banco de dados

        // Corrige a preparação do SQL para inserir na tabela correta, assumindo que seja 'respostas' conforme o esquema ajustado
        $stmt = $con->prepare("INSERT INTO respostas (id_usuario, id_pergunta, avaliacao) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Erro ao preparar a instrução: " . $con->error);
        }

        // Vincula os valores e executa a instrução
        $stmt->bind_param("iii", $id_usuario, $id_pergunta, $resposta);
        if (!$stmt->execute()) {
            echo "Erro ao salvar resposta para a pergunta $id_pergunta: " . $stmt->error . "<br>";
        } else {
            echo "Resposta para a pergunta $id_pergunta salva com sucesso!<br>";
        }

        // Fecha o statement
        $stmt->close();
    }
}

// Fecha a conexão com o banco de dados
$con->close();
?>
