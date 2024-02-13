<?php
session_start();

$con = new mysqli('mysql_db', 'root', 'root', 'projeto');
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['respostas'])) {
    $nome = $_POST['txtNome'];
    $sobrenome = $_POST['txtSobrenome'];
    $email = $_POST['txtEmail'];

    // Inserir usuário
    $stmt = $con->prepare("INSERT INTO tbusu (nome, sobrenome, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $sobrenome, $email);
    if (!$stmt->execute()) {
        echo "Erro ao inserir usuário: " . $stmt->error;
        $stmt->close();
        $con->close();
        exit;
    }
    $id_usuario = $stmt->insert_id;
    $stmt->close();
    
// Verifica se as perguntas já foram inseridas para evitar duplicação
$checkQuery = "SELECT COUNT(*) as total FROM avaliacoes"; // Ajuste para a tabela correta
$checkResult = $con->query($checkQuery);
if ($checkResult) {
    $row = $checkResult->fetch_assoc();
    if ($row['total'] == 0) {

        // Array de perguntas
        $ask = [
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
        ];

        $insertQuery = "INSERT INTO avaliacoes (id_usuario, ask_0, ask_1, ask_2, ask_3, ask_4, ask_5, ask_6, ask_7) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($insertQuery);
        if ($stmt === false) {
            die("Erro ao preparar a inserção: " . $con->error);
        }

        $id_usuario = 1; // corrigir para pegar o id mais recente // linha de duvida 
        $stmt->bind_param("issssssss", $id_usuario, $ask_[0], $ask_[1], $ask_[2], $ask_[3], $ask_[4], $ask_[5], $ask_[6], $ask_[7]);
        $stmt->execute();

        echo "<script>alert('asks inseridas com sucesso.');</script>";
    }
} else {
    die("Erro ao executar a consulta: " . $con->error);
}


    // Processar respostas
    foreach ($_POST['respostas'] as $campo => $valor) {
        // O nome do campo já está preparado para corresponder às colunas da tabela `avaliacoes`
        $stmt = $con->prepare("INSERT INTO avaliacoes (id_usuario, $campo) VALUES (?, ?)");
        if (!$stmt) {
            die("Erro ao preparar a inserção: " . $con->error);
        }
        $stmt->bind_param("ii", $id_usuario, $valor);
        if (!$stmt->execute()) {
            echo "Erro ao inserir avaliação: " . $stmt->error;
        }
        $stmt->close();
    }
    echo "Respostas salvas com sucesso.";
} else {
    echo "Dados do formulário não foram recebidos corretamente.";
}

$con->close();
?>
