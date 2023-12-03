
<?php

require_once('conn.php');

$nome = $_POST['txtNome'];
$sobrenom = $_POST['txtSobrenom'];
$email = $_POST['txtEmail'];
$contato = $_POST['txtContato'];

$insere = mysqli_query($conn, "INSERT INTO tbusu(nome,sobrenom,email,contato) VALUES ('$nome', '$sobrenom', '$email', '$contato')") or die(mysqli_error($conn));



if (mysqli_affected_rows($conn) != 0) {
    echo "
       <META HTTP-EQUIV=REFRESH CONTENT='0;URL=parte0.php'>
       <script type=\"text/javascript\">
       alert(\"Formulario cadastrada com sucesso.\");
       </script>
    ";
} else {
    echo "
      <META HTTP-EQUIV=REFRESH CONTENT='0;URL=parte0.php'>
      <script type=\"text/javascript\">
      alert(\"Erro ao cadastrar Formulario.\");
      </script>
    ";
}

require_once('conn.php');

// Validar e sanitizar os dados
$id_usuario = $_POST['id_usuario'];
$comentarios = $_POST['comentario'];
$avaliacoes = $_POST['avaliacao'];

// Verificar se os arrays têm a mesma quantidade de elementos
if (count($comentarios) !== count($avaliacoes) || count($comentarios) !== 8) {
    echo "Erro: O número de comentários e avaliações não corresponde ou não há 8 avaliações.";
    exit();
}

// Iniciar a transação
mysqli_begin_transaction($conn);

try {
    // Preparar a consulta SQL com Prepared Statement
    $sql = "INSERT INTO avaliacao_profissional (comentario, avaliacao, id_usuario) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        throw new Exception("Erro ao preparar a declaração: " . mysqli_error($conn));
    }

    // Iterar sobre os valores e executar a consulta para cada conjunto
    for ($i = 0; $i < count($avaliacoes); $i++) {
        $comentario = mysqli_real_escape_string($conn, $comentarios[$i]);
        $avaliacao = intval($avaliacoes[$i]);

        // Associar parâmetros e executar a consulta para o conjunto atual
        mysqli_stmt_bind_param($stmt, "sii", $comentario, $avaliacao, $id_usuario);
        $result = mysqli_stmt_execute($stmt);

        // Verificar se pelo menos uma linha foi afetada
        if (!$result || mysqli_affected_rows($conn) <= 0) {
            throw new Exception("Erro ao cadastrar o formulário: " . mysqli_error($conn));
        }
    }

    // Se chegou até aqui, commita a transação
    mysqli_commit($conn);

    echo "
        <META HTTP-EQUIV=REFRESH CONTENT='0;URL=parte0.php'>
        <script type=\"text/javascript\">
            alert(\"Formulário cadastrado com sucesso.\");
        </script>
    ";
} catch (Exception $e) {
    // Se houve algum erro, rollback na transação
    mysqli_rollback($conn);

    echo "
        <META HTTP-EQUIV=REFRESH CONTENT='0;URL=parte0.php'>
        <script type=\"text/javascript\">
            alert(\"Erro ao cadastrar o formulário: " . $e->getMessage() . "\");
        </script>
    ";
}

// Fechar a declaração preparada
if ($stmt) {
    mysqli_stmt_close($stmt);
}

// Fechar a conexão
mysqli_close($conn);


?>

