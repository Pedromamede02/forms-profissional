<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário de Avaliação</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <br>
    <br>
    <form id="avaliacaoForm" onsubmit="return validarFormulario()" method="post" action="/Teste-Profissional/cad-parte1.php">

      <h2>Avaliação Profissional</h2>
      <h4>1-) Parte</h4>

      <div class="form">
        <?php for ($i = 1; $i <= 8; $i++) : ?>
          <p name="comentario<?= $i ?>" id="comentario<?= $i ?>"> <?= $i ?>-) Pergunta <?= $i ?> aqui.</p>
          <label for="avaliacao<?= $i ?>">Escolha um número de 0 a 10:</label>
          <select name="avaliacao[]" id="avaliacao<?= $i ?>"></select>
          <input type="hidden" name="comentario[]" value="Pergunta <?= $i ?> aqui.">
          <br>
          <br>
          <hr>
        <?php endfor; ?>
      </div>

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

        for (var j = 1; j <= 8; j++) {
          adicionarOpcoes('avaliacao' + j);
        }

        function adicionarOpcoes(selectId) {
          var select = document.getElementById(selectId);

          for (var i = 0; i <= 10; i++) {
            var option = document.createElement('option');
            option.value = i;
            option.text = i;
            select.add(option);
          }
        }
      </script>

      <div class="botao">
        <a href="/Teste-Profissional/parte2.php">
          <button type="button" class="butao">next</button>
        </a>
        <input type="submit" value="Enviar">
      </div>

    </form>
  </header>

</body>

</html>
