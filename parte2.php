<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Avaliação</title>
  <link rel="stylesheet" href="style.css">
  <script>
    window.onload = function() {
      for (var j = 1; j <= 8; j++) {
        adicionarOpcoes('avaliacao1_' + j);
        adicionarOpcoes('avaliacao2_' + j);
      }
    };

    function adicionarOpcoes(selectId) {
      var select = document.getElementById(selectId);
      for (var i = 0; i <= 10; i++) {
        var option = document.createElement('option');
        option.value = i;
        option.text = i;
        select.appendChild(option);
      }
    }

    document.addEventListener("DOMContentLoaded", function() {
      var form = document.getElementById("avaliacaoForm");
      form.addEventListener("submit", function(event) {
        var soma1 = 0, soma2 = 0;
        for (var k = 1; k <= 8; k++) {
          soma1 += parseInt(document.getElementById('avaliacao1_' + k).value);
          soma2 += parseInt(document.getElementById('avaliacao2_' + k).value);
        }
        if (soma1 !== 10 || soma2 !== 10) {
          alert('A soma das opções de cada parte deve ser igual a 10. Por favor, ajuste suas escolhas.');
          event.preventDefault(); // Impede o envio do formulário se a soma não for igual a 10
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
        // Perguntas da Parte 1
        $perguntas = [
          // Suas perguntas 
          "I am quick to see any advantage of new opportunities and take it",
          "I can work well with a wide range of people",
          "Producing ideas is one of my natural assets",
          "I am good at drawing people out whenever I detect that they have something of value to contribute to group objectives",
          "My capacity to follow through has too much to do with my personal effectiveness",
          "I am ready to face temporary unpopularity if it leads to worthwhile results in the end",
          "I can usually sense what is realistic and likely to work",
          "I can offer a reasoned case for alternative courses of action without introducing bias or prejudice",
        ];
        foreach ($perguntas as $indice => $pergunta): ?>
          <p id="comentario1_<?= $indice + 1 ?>"><?= $indice + 1 ?>-) <?= $pergunta ?></p>
          <label for="avaliacao1_<?= $indice + 1 ?>">Escolha um número de 0 a 10:</label>
          <select name="avaliacao1[]" id="avaliacao1_<?= $indice + 1 ?>"></select>
          <input type="hidden" name="comentario1[]" value="<?= $pergunta ?>">
          <br><br>
        <?php endforeach; ?>
      </div>

      <div class="botao">
        <input type="submit">
      </div>
    </form>
  </header>
</body>
</html>
