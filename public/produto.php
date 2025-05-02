<?php
require_once '../controllers/ProdutoController.php';

// Obtém o ID do produto da URL, se existir
$id = $_GET['id'] ?? null;
$controller = new ProdutoController();

// Busca o produto no banco de dados usando o ID
$produto = $controller->buscar($id);

// Verifica se o produto existe, caso contrário, exibe uma mensagem e encerra o processo
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
      <!-- Logo da empresa -->
      <a href="index.php">
        <img src="/Catalogo/uploads/Votre (1) 1.png" alt="Logo">
      </a>
    </div>
    <!-- Barra de pesquisa -->
    <input type="text" placeholder="Busque aqui">
  </div>
</header>

<nav>
  <ul>
    <!-- Menu de categorias -->
    <li><a href="em-breve.php">categoria 1</a></li>
    <li><a href="em-breve.php">categoria 2</a></li>
    <li><a href="em-breve.php">categoria 3</a></li>
    <li><a href="em-breve.php">categoria 4</a></li>
    <li><a href="em-breve.php">categoria 5</a></li>
    <li><a href="em-breve.php">categoria 6</a></li>
    <li><a href="em-breve.php">categoria 7</a></li>
    <li><a href="em-breve.php">categoria 8</a></li>
  </ul>
</nav>

<section class="breadcrumb">
  <!-- Caminho de navegação (breadcrumb) para facilitar o retorno -->
  <p>home | categoria 1</p>
</section>

<section class="produto-detalhe">
  <div class="produto-detalhe-container">

    <div class="produto-imagem">
      <!-- Exibe a imagem do produto -->
      <img src="../uploads/<?= $produto['imagem'] ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
    </div>

    <div class="produto-info">
      <!-- Exibe o nome do produto -->
      <h1><?= htmlspecialchars($produto['nome']) ?></h1>

      <!-- Exibe o preço com desconto, se aplicável -->
      <?php if ($produto['tem_desconto'] == 1 && isset($produto['preco_desconto'])): ?>
        <p class="preco-antigo">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
        <p class="preco-atual">R$ <?= number_format($produto['preco_desconto'], 2, ',', '.') ?></p>
      <?php else: ?>
        <p class="preco-atual">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
      <?php endif; ?>

      <!-- Controle de quantidade -->
      <div class="quantidade">
        <button>-</button>
        <input type="number" value="1">
        <button>+</button>
      </div>

      <!-- Botão para adicionar ao carrinho -->
      <a href="em-breve.php">
     <button class="btn-comprar">Colocar no Carrinho</button>
      </a>

      <!-- Exibe o valor do frete (aqui representado como R$XX,00) -->
      <p class="frete">🚚 Frete: R$XX,00</p>

      <!-- Exibe informações de desconto, se houver -->
      <?php if ($produto['tem_desconto'] == 1): ?>
        <div class="desconto">
          <p>Na compra de 3 Produtos Receba:</p>
          <p class="desconto-porcentagem"><?= $produto['desconto'] ?>%</p>
          <p>De Desconto</p>
        </div>
      <?php endif; ?>

      <!-- Exibe a descrição do produto -->
      <h2>Descrição do Produto</h2>
      <p class="descricao">
        <?= nl2br(htmlspecialchars($produto['descricao'])) ?>
      </p>

      <!-- Link para editar o produto -->
      <a href="cadastro.php?id=<?= $produto['id'] ?>">Editar</a>
    </div>

  </div>
</section>

<footer>
  <div class="footer-grid">
    <!-- Categorias no rodapé -->
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

    <!-- Logo da empresa no rodapé -->
    <div class="footer-logo">
      <img src="/Catalogo/uploads/Votre (1) 1.png" alt="Logo">
    </div>
  </div>
</footer>

</body>
</html>
