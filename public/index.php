<?php
require_once '../controllers/ProdutoController.php';

$controller = new ProdutoController();
$produtos = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Votre - Página Inicial</title>
    <link rel="stylesheet" href="/CatalogoProdutos/frontend/css/index.css">
</head>
<body>
<header>
    <div class="top-bar">
        <div class="logo">
            <img src="/CatalogoProdutos/frontend/imagens/Votre (1) 1.png" alt="Logo">
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Busque aqui">
            <button type="submit">🔍</button>
        </div>
    </div>
    <nav class="menu">
        <ul>
            <li><a href="#">Limpeza</a></li>
            <li><a href="#">Higiene Pessoal</a></li>
            <li><a href="#">Categoria 3</a></li>
            <li><a href="#">Categoria 4</a></li>
            <li><a href="#">Categoria 5</a></li>
            <li><a href="#">Categoria 6</a></li>
            <li><a href="#">Categoria 7</a></li>
            <li><a href="#">Categoria 8</a></li>
            <li><a href="cadastro.php" class="cadastrar-produto-link">+ Cadastrar Produto</a></li>
        </ul>
    </nav>
</header>

<section class="banner">
    <div class="banner-container">
        <div class="banner-slide">
            <img src="/CatalogoProdutos/frontend/imagens/1 2.png" alt="Banner 1" class="active">
            <img src="/CatalogoProdutos/frontend/imagens/2 1.png" alt="Banner 2">
            <img src="/CatalogoProdutos/frontend/imagens/Lorem Ipsum Dolor. 2 (1).png" alt="Banner 3">
        </div>
        <div class="banner-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</section>

<main class="produtos-section">
    <section class="produtos mais-vendidos">
        <h2>Mais vendidos</h2>
        <div class="produtos-grid">
            <?php foreach ($produtos as $produto): ?>
                <a href="produto.php?id=<?= $produto['id'] ?>" class="produto-link">
                    <div class="produto-item">
                        <img src="../uploads/<?= $produto['imagem'] ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
                        <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                        <p><?= htmlspecialchars($produto['descricao'] ?? 'Sem descrição') ?></p>
                        <p class="preco">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="produtos com-descontos">
        <h2>Com Descontos</h2>
        <div class="produtos-grid">
            <?php foreach ($produtos as $produto): ?>
                <?php if (!empty($produto['preco_desconto'])): ?>
                    <a href="produto.php?id=<?= $produto['id'] ?>" class="produto-link">
                        <div class="produto-item">
                            <img src="../uploads/<?= $produto['imagem'] ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
                            <h3><?= htmlspecialchars($produto['nome']) ?></h3>
                            <p><?= htmlspecialchars($produto['descricao'] ?? 'Sem descrição') ?></p>
                            <p class="preco desconto">
                                <span class="preco-antigo">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></span>
                                R$ <?= number_format($produto['preco_desconto'], 2, ',', '.') ?>
                            </p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<footer>
    <div class="footer-grid">
        <div class="footer-column">
            <h3>Limpeza</h3>
            <ul>
                <li>Alvejante</li>
                <li>Lava Louças</li>
                <li>Água Sanitária</li>
                <li>Sabão</li>
                <li>Escovas</li>
                <li>Vassouras</li>
                <li>Lava Roupas</li>
            </ul>
        </div>
        <div class="footer-column">
            <h3>Higiene Pessoal</h3>
            <ul>
                <li>Sabonete Maran</li>
                <li>Suave</li>
            </ul>
        </div>
        <div class="footer-logo">
            <img src="/CatalogoProdutos/frontend/imagens/Votre (1) 1.png" alt="Logo Footer">
        </div>
    </div>
</footer>

<script src="/CatalogoProdutos/frontend/js/index.js"></script>
</body>
</html>
