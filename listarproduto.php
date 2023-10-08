<?php
session_start();

$produtos = isset($_SESSION['produtos']) ? $_SESSION['produtos'] : array();

$_SESSION['carrinho'] = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Loja</title>
</head>
<body>
    <h1>Produtos</h1>
    <table class="table">
        <tr>
            <th>id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th></th>
        </tr>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <form action="carrinho.php" method="post">
             <td><?php echo $produto['id']; ?></td>
            <td><?php echo $produto['nome']; ?></td>
            <td><?php echo $produto['preco']; ?></td>
                <td>
                    <input type="hidden" name="id_produto" value="<?php echo $produto['id']; ?>">
                    <input type="number" name="quantidade" min="1" max="99" value="1">
                   <button type="submit" class="btn btn-success">Adicionar ao carrinho</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
      <button onclick="window.location.href='index.html'" class="btn btn-primary">Voltar ao Menu</button>
</body>
</html>

