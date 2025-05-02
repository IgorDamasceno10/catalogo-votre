<?php
require_once 'Conexao.php';

/**
 * Classe que representa um produto no sistema.
 * Aqui são realizadas as operações de CRUD para os produtos.
 */
class Produto {
    private $pdo;

    public function __construct() {
        // Estabelece a conexão com o banco de dados
        $this->pdo = Conexao::conectar();
    }

    /**
     * Lista todos os produtos cadastrados.
     * @return array
     */
    public function listarTodos() {
        // Busca todos os produtos e ordena pela coluna ID de forma decrescente
        $stmt = $this->pdo->query("SELECT * FROM produtos ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Busca um produto pelo seu ID.
     * @param int $id
     * @return array|false
     */
    public function buscarPorId($id) {
        // Prepara a consulta para pegar um produto específico pelo ID
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Salva ou atualiza as informações de um produto.
     * Se o ID for passado, faz um UPDATE. Caso contrário, faz um INSERT.
     * @param array $dados
     * @param int|null $id
     * @return bool
     */
    public function salvar($dados, $id = null) {
        if ($id) {
            // Se o produto já tem ID, atualiza as informações
            $stmt = $this->pdo->prepare("UPDATE produtos SET nome = ?, preco = ?, descricao = ?, imagem = ?, tem_desconto = ?, preco_desconto = ? WHERE id = ?");
            return $stmt->execute([
                $dados['nome'],
                $dados['preco'],
                $dados['descricao'],
                $dados['imagem'],
                $dados['tem_desconto'],
                $dados['preco_desconto'],
                $id
            ]);
        } else {
            // Se não tem ID, é um novo produto, então faz um INSERT
            $stmt = $this->pdo->prepare("INSERT INTO produtos (nome, preco, descricao, imagem, tem_desconto, preco_desconto) VALUES (?, ?, ?, ?, ?, ?)");
            return $stmt->execute([
                $dados['nome'],
                $dados['preco'],
                $dados['descricao'],
                $dados['imagem'],
                $dados['tem_desconto'],
                $dados['preco_desconto']
            ]);
        }
    }
}
