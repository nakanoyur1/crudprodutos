<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Produto</title>
</head>
<body>
    <h1>Cadastrar Produto</h1>
    <form action="criar.php" method="post">
        <label for="id_produto">ID do Produto:</label><br>
        <input type="text" id="id_produto" name="id_produto"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="preco">Preço:</label><br>
        <input type="text" id="preco" name="preco"><br>
        <input type="submit" value="Cadastrar">
    </form>
    <button onclick="window.location.href='index.html'">Voltar ao Menu</button>
</body>
</html>

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    $produto = array('id' => $id_produto, 'nome' => $nome, 'preco' => $preco);

    array_push($_SESSION['produtos'], $produto);
}
?>
