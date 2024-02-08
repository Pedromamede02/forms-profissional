<?php
// Conectar ao banco de dados
$con = new mysqli('mysql_db', 'root', 'root', 'projeto');
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

// Verifica se as perguntas já foram inseridas para evitar duplicação
$checkQuery = "SELECT COUNT(*) as total FROM tbperguntas";
$checkResult = $con->query($checkQuery);
if ($checkResult) {
    $row = $checkResult->fetch_assoc();
    if ($row['total'] == 0) {
        // Array de perguntas
        $perguntas = [
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            "I am quick to see any advantage of new opportunities and take it",
            "I can work well with a wide range of people",
            // Adicione mais perguntas conforme necessário
        ];

        $insertQuery = "INSERT INTO tbperguntas (texto) VALUES (?)";
        $stmt = $con->prepare($insertQuery);
        if ($stmt === false) {
            die("Erro ao preparar a inserção: " . $con->error);
        }

        foreach ($perguntas as $texto) {
            $stmt->bind_param("s", $texto);
            $stmt->execute();
        }

        echo "<script>alert('Perguntas inseridas com sucesso.');</script>";
    }
} else {
    die("Erro ao executar a consulta: " . $con->error);
}

// Fecha a conexão com o banco de dados
$con->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Avaliação</title>
    <link rel="stylesheet" href="style.css">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Adiciona opções de resposta a cada seleção de avaliação
            for (var j = 1; j <= 8; j++) {
                adicionarOpcoes('id_' + j);
            }

            
            function adicionarOpcoes(selectId) {
                var select = document.getElementById(selectId);
                for (var i = 0; i <= 10; i++) {
                    var option = document.createElement('option');
                    option.value = i;
                    option.text = i;
                    select.appendChild(option);
                }
            }

            var form = document.getElementById("idForm");
            form.addEventListener("submit", function(event) {
                var soma = 0;
                // Calcula a soma dos valores selecionados
                for (var k = 1; k <= 8; k++) {
                    soma += parseInt(document.getElementById('id_' + k).value, 10);
                }
                // Verifica se a soma das respostas é exatamente 10
                if (soma !== 10) {
                    alert('A soma das opções de todas as perguntas deve ser igual a 10. Por favor, ajuste suas escolhas.');
                    event.preventDefault(); // Impede o envio do formulário
                }
            });
        });
    </script>
</head>
<body>
    <header>
        <form id="idForm" method="post" action="cad-parte1.php">
            <h2>Avaliação Profissional</h2>
            <div class="form">
                <!-- Exemplo para a pergunta 1 -->
                <!-- Certifique-se de que cada pergunta tenha um texto único -->
                <div>
                    <p>1-) I am quick to see any advantage of new opportunities and take it</p>
                    <label for="id_1">Escolha um número de 0 a 10:</label>
                    <select name="id[1]" id="id_1"></select>
                </div>
                <!-- Repita os blocos acima para cada pergunta, alterando os IDs/nomes conforme necessário -->
                <!-- Exemplo para a pergunta 2 -->
                <div>
                    <p>2-) I can work well with a wide range of people</p>
                    <label for="id_2">Escolha um número de 0 a 10:</label>
                    <select name="id[2]" id="id_2"></select>
                </div>
                <!-- Adicione mais perguntas conforme necessário -->
                <div>
                    <p>3-) I can work well with a wide range of people</p>
                    <label for="id_3">Escolha um número de 0 a 10:</label>
                    <select name="id[3]" id="id_3"></select>
                </div>
                <div>
                    <p>4-) I can work well with a wide range of people</p>
                    <label for="id_4">Escolha um número de 0 a 10:</label>
                    <select name="id[4]" id="id_4"></select>
                </div>
                <div>
                    <p>5-) I can work well with a wide range of people</p>
                    <label for="id_5">Escolha um número de 0 a 10:</label>
                    <select name="id[5]" id="id_5"></select>
                </div>
                <div>
                    <p>6-) I can work well with a wide range of people</p>
                    <label for="id_6">Escolha um número de 0 a 10:</label>
                    <select name="id[6]" id="id_6"></select>
                </div>
                <div>
                    <p>7-) I can work well with a wide range of people</p>
                    <label for="id_7">Escolha um número de 0 a 10:</label>
                    <select name="id[7]" id="id_7"></select>
                </div>
                <div>
                    <p>8-) I can work well with a wide range of people</p>
                    <label for="id_8">Escolha um número de 0 a 10:</label>
                    <select name="id[8]" id="id_8"></select>
                </div>
            </div>
            <div class="botao">
                <input type="submit" value="Enviar Respostas">
            </div>
        </form>
    </header>
</body>
</html>