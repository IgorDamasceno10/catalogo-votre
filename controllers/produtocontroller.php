<?php
require_once __DIR__ . '/../models/Produto.php';

class ProdutoController {
    private $produto;

    public function __construct() {
        $this->produto = new Produto();
    }

    public function listar() {
        return $this->produto->listarTodos();
    }

    public function buscar($id) {
        return $this->produto->buscarPorId($id);
    }
}
