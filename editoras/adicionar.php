<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $stmt = $pdo->prepare("INSERT INTO editoras (nome, cidade, estado) VALUES (?, ?, ?)");
    $stmt->execute([$nome, $cidade, $estado]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Nova Editora</title>
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
        input {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button, a {
            background-color: #4a90e2;
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            text-align: center;
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
    <header><h1>Nova Editora</h1></header>
    <div class="container">
        <form method="post">
            <input type="text" name="nome" placeholder="Nome da editora" required>
            <input type="text" name="cidade" placeholder="Cidade" required>
            <input type="text" name="estado" placeholder="Estado (UF)" required maxlength="2">
            <div class="actions">
                <button type="submit">Salvar</button>
                <a href="index.php">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
