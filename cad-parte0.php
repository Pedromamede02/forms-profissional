<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Conexão com o banco de dados
    require_once 'conn.php';

    // Recebendo os dados do formulário
    $nome = $_POST['txtNome'];
    $sobrenome = $_POST['txtSobrenome'];
    $email = $_POST['txtEmail'];

    // Preparando e executando a consulta para inserir os dados na tabela tbusu
    $sql = "INSERT INTO tbusu (nome, sobrenome, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $sobrenome, $email);
    $stmt->execute();

    // Verificar se a inserção foi bem-sucedida
    if ($stmt->affected_rows > 0) {
        // Obtendo o id do usuário inserido
        $id_usuario = $stmt->insert_id;

        // Armazenando o id do usuário na sessão
        $_SESSION['id_usuario'] = $id_usuario;

        // Redirecionar para o formulário de avaliação
        header("Location: parte1.php");
        exit();
    } else {
        // Tratar erro de inserção
        echo "Erro ao inserir os dados do usuário.";
    }
}
?>
