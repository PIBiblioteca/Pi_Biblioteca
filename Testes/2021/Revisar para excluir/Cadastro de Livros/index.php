<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliofateca - Cadastro de Livros</title>
</head>
<body>
    <form method="post" action="processa.php">
        Curso<br>
        <input type="text" name="curso" maxlength="40" required autofocus><br>
        Nome do Livro<br>
        <input type="text" name="titulo" maxlength="40" required><br>
        Quantidade<br>
        <input type="number" name="quantidade" maxlength="4" required><br>
        <br>

        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

</body>
</html>