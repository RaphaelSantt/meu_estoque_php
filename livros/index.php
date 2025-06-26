<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Livros</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
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
        header h1 { font-size: 2em; }
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .actions {
            text-align: right;
            margin-bottom: 20px;
        }
        .actions a {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .actions a:hover { background-color: #357ABD; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #4a90e2;
            color: white;
        }
        tr:nth-child(even) { background-color: #f0f8ff; }
        .btn {
            background-color: #4a90e2;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            transition: background-color 0.3s;
        }
        .btn:hover { background-color: #357ABD; }
    </style>
</head>
<body>

<header>
    <h1>Gerenciamento de Livros</h1>
</header>

<div class="container">
    <div class="actions">
        <a href="adicionar.php">+ Novo Livro</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Ano</th>
                <th>Estoque</th>
                <th>Editora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT livros.*, editoras.nome AS nome_editora
                    FROM livros
                    LEFT JOIN editoras ON livros.id_editora = editoras.id
                    ORDER BY livros.id";
            $stmt = $pdo->query($sql);
            foreach ($stmt as $linha) {
                echo "<tr>
                        <td>{$linha['id']}</td>
                        <td>{$linha['titulo']}</td>
                        <td>{$linha['autor']}</td>
                        <td>{$linha['ano_publicacao']}</td>
                        <td>{$linha['estoque']}</td>
                        <td>{$linha['nome_editora']}</td>
                        <td>
                            <a class='btn' href='editar.php?id={$linha['id']}'>Editar</a>
                            <a class='btn' href='excluir.php?id={$linha['id']}' onclick='return confirm(\"Deseja excluir?\")'>Excluir</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
