<?php
$host = 'localhost';
$port = '5432';
$dbname = 'estoque_livros';
$user = 'postgres';         
$senha = '2404';       

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
