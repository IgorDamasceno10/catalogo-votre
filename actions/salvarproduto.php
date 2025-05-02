<?php
require_once '../models/Produto.php';

$produto = new Produto();

// Captura os dados enviados pelo formulário
$dados = [
    'nome' => $_POST['nome'],
    'preco' => $_POST['preco'],
    'descricao' => $_POST['descricao'],
    'tem_desconto' => isset($_POST['tem_desconto']) ? $_POST['tem_desconto'] : 0,
    'preco_desconto' => ($_POST['tem_desconto'] == 1 && !empty($_POST['desconto'])) ? $_POST['desconto'] : null,
];

// Verifica se foi enviada uma nova imagem
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    // Gera um nome único para a imagem e move para o diretório de uploads
    $nomeImagem = uniqid() . '_' . $_FILES['imagem']['name'];
    $caminhoDestino = '../uploads/' . $nomeImagem;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoDestino);
    $dados['imagem'] = $nomeImagem;
} else {
    // Se não enviou nova imagem, mantém a imagem atual (caso esteja editando)
    $dados['imagem'] = $_POST['imagem_atual'] ?? null;
}

// Verifica se é edição ou novo cadastro (caso tenha um ID, é edição)
$id = $_POST['id'] ?? null;

// Salva os dados (novo ou atualizado)
$produto->salvar($dados, $id);

// Redireciona de volta para a página principal
header('Location: ../public/index.php');
exit;
