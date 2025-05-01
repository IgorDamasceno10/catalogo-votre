<?php
require_once 'Conexao.php';

class Produto {
    private $pdo;

    public function __construct() {
        $this->pdo = Conexao::conectar();
    }

    public function listarTodos() {
        $stmt = $this->pdo->query("SELECT * FROM produtos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function salvar($dados, $id = null) {
        if ($id) {
            $stmt = $this->pdo->prepare("UPDATE produtos SET nome = ?, preco = ?, descricao = ?, imagem = ? WHERE id = ?");
            return $stmt->execute([$dados['nome'], $dados['preco'], $dados['descricao'], $dados['imagem'], $id]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, preco, descricao, imagem) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$dados['nome'], $dados['preco'], $dados['descricao'], $dados['imagem']]);
        }
    }
}
