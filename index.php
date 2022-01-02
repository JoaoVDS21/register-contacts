<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastra Contatos</title>
    <link rel="stylesheet" href="css/style.css">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="controles/script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <main id="container">
        <div id="header-main">
            <h1>Cadastra Contatos</h1>
            <button id="btn-cadastro">Adicionar novo</button>
        </div>
        <div id="conteudo"></div>
    </main>
    <form action="" method="POST" id="form-control" class="form-control hide" onsubmit="return false;">
        <span id="btn-fechar">x</span>
        <div id="header-form">
            <p>ADICIONAR CONTATO</p>
        </div>
        <div class="input-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" required>
        </div>
        <div class="input-group">
            <label for="numero">Número: </label>
            <input type="text" id="numero" required>
        </div>
        <div class="input-group">
            <label for="email">E-mail:</label>
            <input type="text" id="email" required>
        </div>
        <input type="submit" id="enviar" value="Enviar">
    </form>
    <div id="back-overlay" class="hide"></div>

</body>
</html>