<?php
include 'conexao.php';

$id = $_GET['id'];
$livro = $pdo->prepare("SELECT * FROM livros WHERE id = ?");
$livro->execute([$id]);
$livro = $livro->fetch();

$editoras = $pdo->query("SELECT * FROM editoras")->fetchAll();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $estoque = $_POST['estoque'];
    $id_editora = $_POST['id_editora'];

    $stmt = $pdo->prepare("UPDATE livros SET titulo = ?, autor = ?, ano_publicacao = ?, estoque = ?, id_editora = ? WHERE id = ?");
    $stmt->execute([$titulo, $autor, $ano, $estoque, $id_editora, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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
        header h1 {
            font-size: 2em;
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

<header><h1>Editar Livro</h1></header>

<div class="container">
    <form method="post">
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>
        <input type="number" name="ano" value="<?= htmlspecialchars($livro['ano_publicacao']) ?>">
        <input type="number" name="estoque" value="<?= htmlspecialchars($livro['estoque']) ?>">
        <select name="id_editora" required>
            <?php foreach ($editoras as $ed): ?>
                <option value="<?= $ed['id'] ?>" <?= $livro['id_editora'] == $ed['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($ed['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="actions">
            <button type="submit">Atualizar</button>
            <a href="index.php">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
