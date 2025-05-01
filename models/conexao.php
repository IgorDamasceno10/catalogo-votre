<?php
class Conexao {
    public static function conectar() {
        $host = 'localhost';
        $dbname = 'catalogo';
        $user = 'root';
        $pass = '';

        try {
            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
