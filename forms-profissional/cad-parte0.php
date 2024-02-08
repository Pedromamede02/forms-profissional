<?php
// Inicia sessão
session_start();

// Conectar ao banco de dados
$con = new mysqli('mysql_db', 'root', 'root', 'projeto');

// Verificar a conexão
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebendo os dados do formulário
    $nome = $_POST['txtNome']; // Nome do usuário
    $sobrenome = $_POST['txtSobrenome']; // Sobrenome do usuário
    $email = $_POST['txtEmail']; // Email do usuário

    // Preparando a consulta para inserir os dados na tabela tbusu
    $sql = "INSERT INTO tbusu(nome, sobrenome, email) VALUES (?, ?, ?)";
    $stmt = $con->prepare($sql);
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $con->error);
    }

    // Vincula os parâmetros ao comando SQL e executa
    $stmt->bind_param("sss", $nome, $sobrenome, $email);

    if ($stmt->execute()) {
        // Verifica se a inserção foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // Obtendo o id do usuário inserido
            $id_usuario = $stmt->insert_id;

            // Armazenando o id do usuário na sessão
            $_SESSION['id_usuario'] = $id_usuario;

            // Redirecionar para o formulário de avaliação
            header("Location: parte1.php");
            exit;
        } else {
            echo "Erro ao inserir os dados do usuário.";
        }
    } else {
        echo "Erro ao executar a inserção: " . $stmt->error;
    }
    // Fecha a declaração preparada
    $stmt->close();
}
// Fecha a conexão com o banco de dados
$con->close();
?>
