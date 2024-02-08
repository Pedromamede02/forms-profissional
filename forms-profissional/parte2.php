<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Assessment</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <form id="avaliacaoForm" method="post" action="/forms-profissional/forms-profissional/parte2.php">
      <h2>Professional Assessment</h2>

      <!-- Perguntas 9 a 16 -->
      <?php
      // Perguntas da Parte 2
      $asks = [
          "Pergunta 9",
          "Pergunta 10",
          "Pergunta 11",
          "Pergunta 12",
          "Pergunta 13",
          "Pergunta 14",
          "Pergunta 15",
          "Pergunta 16"
      ];

      foreach ($asks as $indice => $question): ?>
        <div class="pergunta">
            <p id="comentario1_<?= $indice + 9 ?>"><?= $indice + 9 ?>-) <?= $question ?></p>
            <input type="hidden" name="id_pergunta[]" value="<?= $indice + 9 ?>">
            <label for="ID_<?= $indice + 9 ?>">Choose a number from 0 to 10:</label>
            <select name="ID[]" id="ID_<?= $indice + 9 ?>"></select>
            <input type="hidden" name="comentario1[]" value="<?= $question ?>">
        </div>
        <br>
      <?php endforeach; ?>

      <div class="botao">
          <input type="submit" value="Next">
      </div>
    </form>
  </header>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      for (var j = 9; j <= 16; j++) {
          adicionarOpcoes('ID_' + j);
      }

      var form = document.getElementById("avaliacaoForm");
      form.addEventListener("submit", function(event) {
          var soma = 0;
          for (var k = 9; k <= 16; k++) {
              soma += parseInt(document.getElementById('ID_' + k).value, 10);
          }
          // Aqui você pode querer ajustar a condição de validação conforme necessário
          if (soma !== 10) {
              alert('A soma das opções deve ser igual a 10. Por favor, ajuste suas escolhas.');
              event.preventDefault(); // Impede o envio do formulário
          }
      });
    });

    function adicionarOpcoes(selectId) {
      var select = document.getElementById(selectId);
      for (var i = 0; i <= 10; i++) {
        var option = document.createElement('option');
        option.value = i;
        option.text = i;
        select.appendChild(option);
      }
    }
  </script>
</body>
</html>
