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
    <form id="avaliacaoForm" onsubmit="return validarFormulario()">

      <h2>Avaliação Profissional</h2>

      <!-- Função para adicionar opções ao menu suspenso -->
      <script>
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

      <!-- Adiciona opções para a primeira pergunta -->
      <div class="form">
        <p name="comentario1" id="comentario1">1-) I am apt to show my impatience with those who are obstructing
          progress. </p>
        <label for="avaliacao1">Escolha um número de 0 a 10:</label>
        <select name="avaliacao1" id="avaliacao1"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a segunda pergunta -->
        <p name="comentario2" id="comentario2">2-) Others may criticise me for being too analytical and insufficiently
          intuitive. </p>
        <label for="avaliacao2">Escolha um número de 0 a 10:</label>
        <select name="avaliacao2" id="avaliacao2"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a terceira pergunta -->
        <p name="comentario3" id="comentario3">3-) My desire to ensure that work is properly done can hold up
          proceedings.</p>
        <label for="avaliacao3">Escolha um número de 0 a 10:</label>
        <select name="avaliacao3" id="avaliacao3"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a quarta pergunta -->
        <p name="comentario4" id="comentario4">4-) I tend to get bored rather easily and rely on one or two stimulating
          members to spark me
          off.</p>
        <label for="avaliacao4">Escolha um número de 0 a 10:</label>
        <select name="avaliacao4" id="avaliacao4"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a quinta pergunta -->
        <p name="comentario5" id="comentario5">5-) I find it difficult to get started unless the goals are clear.</p>
        <label for="avaliacao5">Escolha um número de 0 a 10:</label>
        <select name="avaliacao5" id="avaliacao5"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a sexta pergunta -->
        <p name="comentario6" id="comentario6">6-) I am sometimes poor at explaining and clarifying complex points that
          occur to me.</p>
        <label for="avaliacao6">Escolha um número de 0 a 10:</label>
        <select name="avaliacao6" id="avaliacao6"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a sétima pergunta -->
        <p name="comentario7" id="comentario7">7-) I am conscious of demanding from others the things I cannot do
          myself.</p>
        <label for="avaliacao7">Escolha um número de 0 a 10:</label>
        <select name="avaliacao7" id="avaliacao7"></select>
        <br>
        <br>
        <hr>

        <!-- Adiciona opções para a oitava pergunta -->
        <p name="comentario8" id="comentario8">8-) I hesitate to get my points across when I run up against real
          competition.</p>
        <label for="avaliacao8">Escolha um número de 0 a 10:</label>
        <select name="avaliacao8" id="avaliacao8"></select>
        <br>
        <br>
        <hr>
      </div>
      <!-- Função para validar a soma das opções -->
      <script>
        function validarFormulario() {
          var soma = 0;

          for (var k = 1; k <= 8; k++) {
            soma += parseInt(document.getElementById('avaliacao' + k).value);
          }

          if (soma !== 10) { // 8 perguntas * 10 opções = 80
            alert('A soma das opções deve ser igual a 10. Por favor, ajuste suas escolhas.');
            return false;
          }

          return true;
        }
      </script>
      <div class="botao">
        <a href="/Teste-Profissional/fim.html">
          <button type="button" class="butao">next</button>
        </a>
        <input type="submit" value="Enviar">
      </div>

      <script>
        for (var j = 1; j <= 8; j++) {
          adicionarOpcoes('avaliacao' + j);
        }
      </script>

    </form>
  </header>

</body>

</html>