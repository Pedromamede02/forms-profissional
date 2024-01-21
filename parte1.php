<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Avaliação</title>
  <link rel="stylesheet" href="style.css">
  <script>
    function validarFormulario() {
      var soma = 0;
      for (var k = 1; k <= 8; k++) {
        soma += parseInt(document.getElementById('avaliacao' + k).value);
      }
      if (soma !== 10) {
        alert('A soma das opções deve ser igual a 10. Por favor, ajuste suas escolhas.');
        return false;
      }
      return true;
    }

    window.onload = function() {
      for (var j = 1; j <= 8; j++) {
        adicionarOpcoes('avaliacao' + j);
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
      <h4>1-) Parte</h4>

      <div class="form">
        <?php 
        $perguntas = [
          "Qual é a sua cor favorita?",
          "Qual é o seu hobby preferido?",
          "Qual é o seu filme favorito?",
          "Qual é o seu filme favorito?",
          "Qual é o seu filme favorito?",
          "Qual é o seu filme favorito?",
          "Qual é o seu filme favorito?",
          "Qual é o seu filme favorito?",
          // Adicione outras perguntas conforme necessário
        ];
        foreach ($perguntas as $indice => $pergunta): ?>
          <p id="comentario<?= $indice + 1 ?>"><?= $indice + 1 ?>-) <?= $pergunta ?></p>
          <label for="avaliacao<?= $indice + 1 ?>">Escolha um número de 0 a 10:</label>
          <select name="avaliacao[]" id="avaliacao<?= $indice + 1 ?>"></select>
          <br><br>
          <hr>
        <?php endforeach; ?>
      </div>

      <div class="botao">
        <input type="submit" value="Enviar">
      </div>
    </form>
  </header>
</body>
</html>
