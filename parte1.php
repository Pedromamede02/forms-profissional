<?php
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
    new Pergunta(0, "I am quick to see any advantage of new opportunities and take it"),
    new Pergunta(1, "I can work well with a wide range of people"),
    new Pergunta(2, "Producing ideas is one of my natural assets"),
    new Pergunta(3, "I am good at drawing people out whenever I detect that they have something of value to contribute to group objectives"),
    new Pergunta(4, "My capacity to follow through has too much to do with my personal effectiveness"),
    new Pergunta(5, "I am ready to face temporary unpopularity if it leads to worthwhile results in the end"),
    new Pergunta(6, "I can usually sense what is realistic and likely to work"),
    new Pergunta(7, "I can offer a reasoned case for alternative courses of action without introducing bias or prejudice"),
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Avaliação</title>
  <link rel="stylesheet" href="style.css">
  <script>

    document.addEventListener("DOMContentLoaded", function() {
    // Adiciona opções de resposta a cada seleção de avaliação
    for (var j = 1; j <= 8; j++) {
        adicionarOpcoes('avaliacao1_' + j);
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

    var form = document.getElementById("avaliacaoForm");
    form.addEventListener("submit", function(event) {
        var soma = 0;
        for (var k = 1; k <= 8; k++) {
            soma += parseInt(document.getElementById('avaliacao1_' + k).value, 10);
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
    <form id="avaliacaoForm" method="post" action="/forms-profissional/parte2.php">
      <h2>Avaliação Profissional</h2>
      
      <!-- Parte 1 -->
      <h4>1-) Parte</h4>
      <div class="form">
        <?php
        foreach ($perguntas as $pergunta): ?>
          <p id="comentario1_<?= $pergunta->getId() + 1 ?>"><?= $pergunta->getId() + 1 ?>-) <?= $pergunta->getTexto() ?></p>
          <label for="avaliacao1_<?= $pergunta->getId() + 1 ?>">Escolha um número de 0 a 10:</label>
          <select name="avaliacao1[]" id="avaliacao1_<?= $pergunta->getId() + 1 ?>"></select>
          <input type="hidden" name="comentario1[]" value="<?= $pergunta->getTexto() ?>">
          <br><br>
        <?php endforeach; ?>
      </div>

      <div class="botao">
        <input type="submit" id="submitButton">
      </div>
    </form>
  </header>
</body>
</html>
