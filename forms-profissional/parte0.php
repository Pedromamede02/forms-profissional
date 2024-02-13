
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
    <form id="avaliacaoForm" onsubmit="return validarFormulario()" method="post" action="/cad-parte0.php">

      <h2>Avaliação Profissional</h2>
      <br>
      <label>
        Nome: <input type="text" name="txtNome" placeholder="Digite seu Nome:" required>
      </label>
      <br>
      <br>
      <label>
        Sobrenome: <input type="text" name="txtSobrenome" placeholder="Digite seu Sobrenome" required>
      </label>
      <br>
      <br>
      <label>
        E-mail: <input type="email" name="txtEmail" placeholder="Digite seu E-mail:" required>
      </label>
      <br>
      <br>
      <div class="botao">

        <input type="submit" value="Enviar">
      </div>

       


    </form>
</body>

</html>