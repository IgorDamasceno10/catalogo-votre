<?php
require_once '../controllers/ProdutoController.php';

$id = $_GET['id'] ?? null;
$controller = new ProdutoController();
$produto = $controller->buscar($id);

if (!$produto) {
    echo "Produto não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $produto['nome'] ?></title>
</head>
<body>
    <h1><?= $produto['nome'] ?></h1>
    <img src="../uploads/<?= $produto['imagem'] ?>" width="300"><br>
    <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
    <p><strong>Descrição:</strong><br> <?= nl2br($produto['descricao']) ?></p>
    <a href="cadastro.php?id=<?= $produto['id'] ?>">Editar</a>
    <br><a href="index.php">Voltar</a>
</body>
</html>
