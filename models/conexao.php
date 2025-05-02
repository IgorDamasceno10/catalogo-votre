<?php
class Conexao {
    /**
     * Estabelece a conexão com o banco de dados.
     * 
     * @return PDO
     */
    public static function conectar() {
        // Informações de conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'catalogo';
        $user = 'root';
        $pass = '';

        try {
            // Tentativa de conectar ao banco usando PDO
            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        } catch (PDOException $e) {
            // Caso ocorra um erro, exibe uma mensagem e encerra o script
            die("Erro na conexão com o banco: " . $e->getMessage());
        }
    }
}
