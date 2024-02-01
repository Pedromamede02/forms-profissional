<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Avaliação</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function validarFormulario() {
      var soma1 = 0, soma2 = 0;
      for (var k = 1; k <= 8; k++) {
        soma1 += parseInt(document.getElementById('avaliacao1_' + k).value);
        soma2 += parseInt(document.getElementById('avaliacao2_' + k).value);
      }
      if (soma1 !== 10 || soma2 !== 10) {
        alert('A soma das opções de cada parte deve ser igual a 10. Por favor, ajuste suas escolhas.');
        return false;
      }
      return true;
    }

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
  </script>
</head>
<body>
  <header>
  <form id="avaliacaoForm" onsubmit="return validarFormulario()" method="post" action="/forms-profissional/cad-parte1.php">
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
          "My capacity to follow through has to much to do with my personal effectiveness",
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

      <!-- Parte 2 -->
      <h4>2-) Parte</h4>
      <div class="form">
        <?php
        // Perguntas da Parte 2
        $perguntas = [
          "I am not at ease with meetings unless they are well structured and controlled, and generally well conducted",
          "I am inclined to be too generous towards others who have a valid viewpoint that has not been given a proper airing",
          "I tend to talk too much when we get onto new ideas",
          "My objective outlook makes it hard for me to join in readily and enthusiastically with colleagues",
          " I am sometimes seen as abrupt and bossy if there is a need to get something done  ",
          "I find it difficult to lead from the front, perhaps because I am over-responsive to group atmosphere",
          "I am apt to get too caught up in ideas that occur to me and so lose track of what is happening",
          "My colleagues tend to see me as worrying unnecessarily over detail and the possibility that things may go wrong ",
          // Suas perguntas aqui
        ];
        foreach ($perguntas as $indice => $pergunta): ?>
          <p id="comentario2_<?= $indice + 1 ?>"><?= $indice + 1 ?>-) <?= $pergunta ?></p>
          <label for="avaliacao2_<?= $indice + 1 ?>">Escolha um número de 0 a 10:</label>
          <select name="avaliacao2[]" id="avaliacao2_<?= $indice + 1 ?>"></select>
          <input type="hidden" name="comentario2[]" value="<?= $pergunta ?>">
          <br><br>
        <?php endforeach; ?>
      </div>

      <div class="botao">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </header>
</body>
</html>
