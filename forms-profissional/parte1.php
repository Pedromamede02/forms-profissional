<?php
// Conectar ao banco de dados
$con = new mysqli('mysql_db', 'root', 'root', 'projeto'); // Alterado para 'localhost' e banco de dados 'projeto'

// Verificar a conexão
if ($con->connect_error) {
    die("Conexão falhou: " . $con->connect_error);
}

class Pergunta {
    private $id;
    private $texto;

    public function __construct($id, $texto) {
        $this->id = $id;
        $this->texto = $texto;
    }

    public function getId() {
        return $this->id;
    }

    public function getTexto() {
        return $this->texto;
    }
}

$perguntas = [
new Pergunta(1, "I am quick to see any advantage of new opportunities and take it"),
new Pergunta(2, "I can work well with a wide range of people"),
new Pergunta(3, "Producing ideas is one of my natural assets"),
new Pergunta(4, "I am good at drawing people out whenever I detect that they have something of value to contribute to group objectives"),
new Pergunta(5, "My capacity to follow through has too much to do with my personal effectiveness"),
new Pergunta(6, "I am ready to face temporary unpopularity if it leads to worthwhile results in the end"),
new Pergunta(7, "I can usually sense what is realistic and likely to work"),
new Pergunta(8, "I can offer a reasoned case for alternative courses of action without introducing bias or prejudice"),]; // Define $perguntas como um array vazio para garantir que está definido

// Verifica se as perguntas já foram inseridas para evitar duplicação
$checkQuery = "SELECT COUNT(*) as total FROM tbperguntas";
$checkResult = $con->query($checkQuery);
if($checkResult) {
    $row = $checkResult->fetch_assoc();
      if($row['total'] == 0) {
        // Definição da classe Pergunta
        class Pergunta {
            private $id;
            private $texto;
    
            public function __construct($id, $texto) {
                $this->id = $id;
                $this->texto = $texto;
            }
    
            public function getId() {
                return $this->id;
            }
    
            public function getTexto() {
                return $this->texto;
            }
        }
        // Aqui você inseriria as perguntas no banco de dados
        // A lógica para definir $perguntas e inseri-las no banco de dados viria aqui
    }
} else {
    die("Erro ao executar a consulta: " . $con->error);
}

// Não é necessário reconectar ou fechar a conexão aqui
?><!DOCTYPE html>
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
        <!-- Geração dinâmica dos campos de perguntas -->
        <!-- Certifique-se de que a conexão com o banco de dados esteja correta e disponível aqui -->
        <?php
        // Suponha que $perguntas esteja disponível e contém as perguntas a serem exibidas
        foreach ($perguntas as $pergunta): ?>
          <div>
            <p><?= $pergunta->getId() ?>-) <?= $pergunta->getTexto() ?></p>
            <label for="id_<?= $pergunta->getId() ?>">Escolha um número de 0 a 10:</label>
            <select name="id[<?= $pergunta->getId() ?>]" id="id_<?= $pergunta->getId() ?>"></select>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="botao">
        <input type="submit" value="Enviar Respostas">
      </div>
    </form>
  </header>
</body>
</html>