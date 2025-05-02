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
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Votre - <?= $produto['nome'] ?></title>
  <link rel="stylesheet" href="css/produto.css">
</head>
<body>

<header>
  <div class="container">
    <div class="logo">
    <img src="/Catalogo/uploads/Votre (1) 1.png" alt="Logo">
    </div>
    <input type="text" placeholder="Busque aqui">
  </div>
</header>

<nav>
  <ul>
    <li><a href="#">categoria 1</a></li>
    <li><a href="#">categoria 2</a></li>
    <li><a href="#">categoria 3</a></li>
    <li><a href="#">categoria 4</a></li>
    <li><a href="#">categoria 5</a></li>
    <li><a href="#">categoria 6</a></li>
    <li><a href="#">categoria 7</a></li>
    <li><a href="#">categoria 8</a></li>
  </ul>
</nav>

<section class="breadcrumb">
  <p>home | categoria 1</p>
</section>

<section class="produto-detalhe">
  <div class="produto-detalhe-container">

    <div class="produto-imagem">
      <img src="../uploads/<?= $produto['imagem'] ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
    </div>

    <div class="produto-info">
      <h1><?= htmlspecialchars($produto['nome']) ?></h1>

      <?php if ($produto['tem_desconto'] == 1 && isset($produto['preco_desconto'])): ?>
        <p class="preco-antigo">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        <p class="preco-atual">R$ <?= number_format($produto['preco_desconto'], 2, ',', '.') ?></p>
      <?php else: ?>
        <p class="preco-atual">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
      <?php endif; ?>

      <div class="quantidade">
        <button>-</button>
        <input type="number" value="1">
        <button>+</button>
      </div>

      <button class="btn-comprar">Colocar no Carrinho</button>

      <p class="frete">🚚 Frete: R$XX,00</p>

      <?php if ($produto['tem_desconto'] == 1): ?>
        <div class="desconto">
          <p>Na compra de 3 Produtos Receba:</p>
          <p class="desconto-porcentagem"><?= $produto['desconto'] ?>%</p>
          <p>De Desconto</p>
        </div>
      <?php endif; ?>

      <h2>Descrição do Produto</h2>
      <p class="descricao">
        <?= nl2br(htmlspecialchars($produto['descricao'])) ?>
      </p>
      
      <a href="cadastro.php?id=<?= $produto['id'] ?>">Editar</a>
    </div>

  </div>
</section>

<footer>
  <div class="footer-grid">
    <div>
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

    <div>
      <h3>Higiene Pessoal</h3>
      <ul>
        <li>Sabonete Maran</li>
        <li>Suave</li>
      </ul>
    </div>

    <div class="footer-logo">
    <img src="/Catalogo/uploads/Votre (1) 1.png" alt="Logo">
    </div>
  </div>
</footer>

</body>
</html>
