<?php
include 'conexao.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM livros WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
?>
