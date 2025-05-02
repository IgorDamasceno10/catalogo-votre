<?php
require_once '../models/Produto.php';

$produto = new Produto();

// Captura os dados do formulário
$dados = [
    'nome' => $_POST['nome'],
    'preco' => $_POST['preco'],
    'descricao' => $_POST['descricao'],
    'tem_desconto' => isset($_POST['tem_desconto']) ? $_POST['tem_desconto'] : 0,
    'preco_desconto' => ($_POST['tem_desconto'] == 1 && !empty($_POST['desconto'])) ? $_POST['desconto'] : null,
];

// Verifica se foi enviada uma nova imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $nomeImagem = uniqid() . '_' . $_FILES['imagem']['name'];
    $caminhoDestino = '../uploads/' . $nomeImagem;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino);
    $dados['imagem'] = $nomeImagem;
} else {
    // Se estiver editando e não enviou nova imagem, mantém a imagem atual
    $dados['imagem'] = $_POST['imagem_atual'] ?? null;
}

// Verifica se é edição ou novo cadastro
$id = $_POST['id'] ?? null;

$produto->salvar($dados, $id);

// Redireciona para index.php após salvar
header('Location: ../public/index.php');
exit;
