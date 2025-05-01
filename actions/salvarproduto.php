<?php
require_once '../models/Produto.php';

$produtoModel = new Produto();

$nome = $_POST['nome'] ?? '';
$preco = $_POST['preco'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$id = $_POST['id'] ?? null;

$imagem_nome = null;
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    $imagem_nome = uniqid() . '.' . $extensao;
    move_uploaded_file($_FILES['imagem']['tmp_name'], "../uploads/$imagem_nome");
} else if (isset($_POST['imagem_atual'])) {
    $imagem_nome = $_POST['imagem_atual'];
}

$dados = [
    'nome' => $nome,
    'preco' => $preco,
    'descricao' => $descricao,
    'imagem' => $imagem_nome
];

$produtoModel->salvar($dados, $id);

header('Location: ../public/index.php');
exit;
