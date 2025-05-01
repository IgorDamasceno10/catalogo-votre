<?php
require_once '../controllers/ProdutoController.php';

$id = $_GET['id'] ?? null;
$produto = null;

if ($id) {
    $controller = new ProdutoController();
    $produto = $controller->buscar($id);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Votre - <?= $produto ? 'Editar Produto' : 'Cadastro de Produto' ?></title>
  <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

<header>
  <div class="container">
    <div class="logo">
      <img src="imagens/Votre (1) 1.png" alt="Logo Votre">
    </div>
    <input type="text" placeholder="Busque aqui">
  </div>
</header>

<main class="cadastro-produto">
  <div class="cadastro-container">

    <div class="logo-cadastro">
      <img src="imagens/Votre - comercial 1.png" alt="Logo Votre">
    </div>

    <h1><?= $produto ? 'Editar Produto' : 'Cadastrar Produto' ?></h1>

    <form action="../actions/salvarProduto.php" method="POST" enctype="multipart/form-data">
      <?php if ($produto): ?>
        <input type="hidden" name="id" value="<?= $produto['id'] ?>">
        <input type="hidden" name="imagem_atual" value="<?= $produto['imagem'] ?>">
      <?php endif; ?>

      <div class="form-grid">
        <div class="form-group">
          <label>Nome do produto:</label>
          <input type="text" name="nome" placeholder="Digite o nome aqui" required value="<?= htmlspecialchars($produto['nome'] ?? '') ?>">
        </div>

        <div class="form-group">
          <label>Preço:</label>
          <input type="number" step="0.01" name="preco" placeholder="Digite o preço" required value="<?= htmlspecialchars($produto['preco'] ?? '') ?>">
        </div>

        <div class="form-group">
          <label>Descrição:</label>
          <textarea name="descricao" required placeholder="Digite a Descrição do seu produto"><?= htmlspecialchars($produto['descricao'] ?? '') ?></textarea>
        </div>

        <div class="form-group full">
          <label>Imagem:</label><br>
          <?php if ($produto && $produto['imagem']): ?>
            <img src="../uploads/<?= $produto['imagem'] ?>" width="100"><br>
          <?php endif; ?>
          <input type="file" name="imagem">
        </div>
      </div>

      <button type="submit" class="btn-cadastrar"><?= $produto ? 'Salvar Alterações' : 'Cadastrar' ?></button>
    </form>

  </div>
</main>

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
      <img src="imagens/Votre (1) 1.png" alt="Logo Footer">
    </div>
  </div>
</footer>

</body>
</html>
