<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {
    // Instância da classe Produto, responsável pela manipulação de dados
    private $produto;

    public function __construct() {
        // Cria uma nova instância da classe Produto
        $this->produto = new Produto();
    }

    /**
     * Lista todos os produtos.
     * 
     * @return array
     */
    public function listar() {
        // Chama o método listarTodos da classe Produto
        return $this->produto->listarTodos();
    }

    /**
     * Busca um produto pelo ID.
     * 
     * @param int $id
     * @return array|false
     */
    public function buscar($id) {
        // Chama o método buscarPorId da classe Produto
        return $this->produto->buscarPorId($id);
    }

    /**
     * Salva ou atualiza um produto.
     * 
     * Se o ID for passado, faz um update, caso contrário, insere um novo produto.
     * 
     * @param array $dados
     * @param int|null $id
     * @return bool
     */
    public function salvar($dados, $id = null) {
        // Chama o método salvar da classe Produto
        return $this->produto->salvar($dados, $id);
    }
}
