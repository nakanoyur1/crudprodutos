<?php
session_start();

if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    foreach ($_SESSION['produtos'] as $key => $produto) {
        if ($produto['id'] == $id_produto) {
            unset($_SESSION['produtos'][$key]);
        }
    }
}

header('Location: listarproduto.php');
?>
