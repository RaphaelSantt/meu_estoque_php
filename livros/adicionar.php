<?php
include 'conexao.php';
$editoras = $pdo->query("SELECT * FROM editoras")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $estoque = $_POST['estoque'];
    $id_editora = $_POST['id_editora'];

    $stmt = $pdo->prepare("INSERT INTO livros (titulo, autor, ano_publicacao, estoque, id_editora) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$titulo, $autor, $ano, $estoque, $id_editora]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Livro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
        }
        header {
            background-color: #4a90e2;
            padding: 20px;
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input, select {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button, a {
            background-color: #4a90e2;
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            text-align: center;
            font-size: 15px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover, a:hover {
            background-color: #357ABD;
        }
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header><h1>Novo Livro</h1></header>

<div class="container">
    <form method="post">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="number" name="ano" placeholder="Ano de Publicação">
        <input type="number" name="estoque" placeholder="Estoque" min="0">
        <select name="id_editora" required>
            <option value="">Selecione a editora</option>
            <?php foreach ($editoras as $ed): ?>
                <option value="<?= $ed['id'] ?>"><?= $ed['nome'] ?></option>
            <?php endforeach; ?>
        </select>
        <div class="actions">
            <button type="submit">Salvar</button>
            <a href="index.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
