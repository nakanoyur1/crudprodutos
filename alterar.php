<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produto = $_POST['id_produto'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    foreach ($_SESSION['produtos'] as &$produto) {
        if ($produto['id'] == $id_produto) {
            $produto['nome'] = $nome;
            $produto['preco'] = $preco;
        }
    }
}

header('Location: listarproduto.php');
?>
