<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro do Professor</title>
</head>
<body>
    <?php
        require_once('conn.php');
        $sql = mysqli_query($conn, "SELECT * FROM tbusu");

        echo "<table>"; // Start the table outside the loop

        while ($linha = mysqli_fetch_array($sql)) {
            $id = $linha['id'];
            $nome = $linha['txtNome'];
            $sobrenom = $linha['txtSobrenom'];
            $email = $linha['txtEmail'];
            $contato = $linha['txtContato'];
            $avaliacao_profissional = $linha['avaliacao_profissional'];

            // Start a table row for each record
            echo "<tr><td>ID: </td><td>$id</td></tr>";

            echo "<tr><td>Nome do Professor: </td><td>$nome</td></tr>";

            echo "<tr><td>Sobrenome do Professor: </td><td>$sobrenom</td></tr>";

            echo "<tr><td>Email do Professor: </td><td>$email</td></tr>";

            echo "<tr><td>Contato do Professor: </td><td>$contato</td></tr>";

            echo "<tr><td>Avaliação Profissional: </td><td>$avaliacao_profissional</td></tr>";
        }

        echo "</table>"; // Close the table outside the loop
    ?>
</body>
</html>
