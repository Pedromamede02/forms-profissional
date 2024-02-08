<?php
// Inicia sessão
session_start();

// Conectar ao banco de dados
$con = new mysqli('mysql_db', 'root', 'root', 'projeto');
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Obtém o ID do usuário da sessão
    if(isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];

        // Verifica se os dados do formulário foram enviados corretamente
        $dados_formulario = $_POST['id'];
        if (count($dados_formulario) == 8) { // Verifica se todas as 8 perguntas foram respondidas
            $valido = true;
            // Loop para validar as respostas
            foreach ($dados_formulario as $id_pergunta => $resposta) {
                // Verifica se a resposta está dentro do intervalo de 0 a 10
                if ($resposta < 0 || $resposta > 10) {
                    echo "A resposta para a pergunta $id_pergunta deve estar entre 0 e 10.";
                    $valido = false;
                    break; // Para o loop se encontrar uma resposta inválida
                }
            }
            if ($valido) {
                // Loop para inserir as respostas no banco de dados
                foreach ($dados_formulario as $id_pergunta => $resposta) {
                    // Prepara a inserção
                    $stmt = $con->prepare("INSERT INTO id" . str_pad($id_pergunta, 2, '0', STR_PAD_LEFT) . " (id_usuario, id_pergunta, id" . str_pad($id_pergunta, 2, '0', STR_PAD_LEFT) . ") VALUES (?, ?, ?)");
                    $stmt->bind_param("iii", $id_usuario, $id_pergunta, $resposta);
                    // Executa a inserção
                    if (!$stmt->execute()) {
                        echo "Erro ao salvar resposta para a pergunta $id_pergunta: " . $stmt->error . "<br>";
                    }
                }
                echo "Respostas salvas com sucesso.";
            }
        } else {
            echo "Por favor, responda todas as perguntas.";
        }
    } else {
        echo "ID do usuário não encontrado na sessão.";
    }
} else {
    echo "Os dados do formulário não foram recebidos corretamente.";
}

// Verifica se as perguntas já foram inseridas para evitar duplicação
$checkQuery = "SELECT COUNT(*) as total FROM tbperguntas";
$checkResult = $con->query($checkQuery);
if ($checkResult) {
    $row = $checkResult->fetch_assoc();
    if ($row['total'] == 0) {
        // Prepara a inserção das perguntas no banco de dados
        $insertQuery = "INSERT INTO tbperguntas (texto) VALUES (?)";
        $stmt = $con->prepare($insertQuery);
        if ($stmt === false) {
            die("Erro ao preparar a inserção: " . $con->error);
        }

        // Insere cada pergunta no banco de dados (supondo que $perguntas seja um array de objetos Pergunta)
        foreach ($perguntas as $pergunta) {
            $texto = $pergunta->getTexto();
            $stmt->bind_param("s", $texto);
            $stmt->execute();
        }

        echo "Perguntas inseridas com sucesso.";
    } else {
        echo "Perguntas já estão presentes no banco de dados.";
    }
} else {
    die("Erro ao executar a consulta: " . $con->error);
}

// Fecha a conexão com o banco de dados
$con->close();
?>
