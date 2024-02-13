
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Avaliação</title>
    <link rel="stylesheet" href="style.css">
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        for (var j = 1; j <= 8; j++) {
            adicionarOpcoes('ID_0' + j);
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
                soma += parseInt(document.getElementById('ID_0' + k).value, 10);
            }
            // Verifica se a soma das respostas é exatamente igual a 10
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
                <!-- Pergunta 1 -->
                <div>
                    <p>1-) I am quick to see any advantage of new opportunities and take it</p>
                    <label for="ID_01">Escolha um número de 0 a 10:</label>
                    <select name="ID_01" id="ID_01"></select>
                </div>
                
                <!-- Pergunta 2 -->
                <div>
                    <p>2-) I can work well with a wide range of people</p>
                    <label for="ID_02">Escolha um número de 0 a 10:</label>
                    <select name="ID_02" id="ID_02"></select>
                </div>

              
                
                <!-- Pergunta 3 -->
                <div>
                    <p>3-) I am adaptable to changes.</p>
                    <label for="ID_03">Escolha um número de 0 a 10:</label>
                    <select name="ID_03" id="ID_03"></select>
                </div>

                <!-- Pergunta 4 -->
                <div>
                    <p>4-) I have strong communication skills.</p>
                    <label for="ID_04">Escolha um número de 0 a 10:</label>
                    <select name="ID_04" id="ID_04"></select>
                </div>

                <!-- Pergunta 5 -->
                <div>
                    <p>5-) I am good at problem-solving.</p>
                    <label for="ID_05">Escolha um número de 0 a 10:</label>
                    <select name="ID_05" id="ID_05"></select>
                </div>

                <!-- Pergunta 6 -->
                <div>
                    <p>6-) I work well under pressure.</p>
                    <label for="ID_06">Escolha um número de 0 a 10:</label>
                    <select name="ID_06" id="ID_06"></select>
                </div>

                <!-- Pergunta 7 -->
                <div>
                    <p>7-) I can effectively lead a team.</p>
                    <label for="ID_07">Escolha um número de 0 a 10:</label>
                    <select name="ID_07" id="ID_07"></select>
                </div>

                <!-- Pergunta 8 -->
                <div>
                    <p>8-) I am always eager to learn new skills.</p>
                    <label for="ID_08">Escolha um número de 0 a 10:</label>
                    <select name="ID_08" id="ID_08"></select>
                </div>
            </div>
            <div class="botao">
                <input type="submit" value="Enviar Respostas">
            </div>
        </form>
    </header>
</body>
</html>

        
