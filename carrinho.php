<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produto = $_POST['id_produto'];
    $quantidade = $_POST['quantidade'];

    foreach ($_SESSION['produtos'] as $produto) {
        if ($produto['id'] == $id_produto) {
            $item = array(
                'nome' => $produto['nome'],
                'preco' => $produto['preco'],
                'quantidade' => $quantidade,
            );
            $_SESSION['carrinho'][$id_produto] = $item;
        }
    }
}

if (isset($_GET['remover'])) {
    $id_produto = $_GET['remover'];
    unset($_SESSION['carrinho'][$id_produto]);
}

$total = 0;
?>

    <title>Carrinho</title>
</head>
<body>
    <h1>Carrinho</h1>
    <table>
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Preço Unitário</th>
            <th>Total</th>
            <th></th>
        </tr>

        <?php foreach ($_SESSION['carrinho'] as $id_produto => $item): ?>
        <tr>

            <td><?php echo $item["nome"]; ?></td>

            <td><?php echo $item['quantidade']; ?></td>

            <td><?php echo $item['preco']; ?></td>

            <?php $total_item = $item['quantidade'] * $item['preco']; ?>
            <td><?php echo $total_item; ?></td>

            <?php $total += $total_item; ?>

            <td><a href="?remover=<?php echo $id_produto; ?>">Remover</a></td>

        </tr>

        <?php endforeach; ?>

         <tr><td colspan="4">Total: <?php echo $total; ?></td></tr>

    </table>


    <button onclick="window.location.href='listarproduto.php'">Voltar aos Produtos</button>

</body>

</html>


