<?php include 'conexao.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editoras</title>
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
            max-width: 1000px;
            margin: 0 auto;
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

        .actions a:hover {
            background-color: #357ABD;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }

        table th {
            background-color: #4a90e2;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f0f8ff;
        }

        .btn {
            background-color: #4a90e2;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            margin: 0 3px;
            font-size: 13px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #357ABD;
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5em;
            }

            table, table thead, table tbody, table th, table td, table tr {
                display: block;
            }

            table th {
                display: none;
            }

            table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                width: 45%;
                padding-right: 10px;
                font-weight: bold;
                text-align: left;
            }
        }
    </style>
</head>
<body>

    <header>
        <h1>Gerenciamento de Editoras</h1>
    </header>

    <div class="container">
        <div class="actions">
            <a href="adicionar.php">+ Nova Editora</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM editoras ORDER BY id");
                foreach ($stmt as $linha) {
                    echo "<tr>
                            <td data-label='ID'>{$linha['id']}</td>
                            <td data-label='Nome'>{$linha['nome']}</td>
                            <td data-label='Cidade'>{$linha['cidade']}</td>
                            <td data-label='Estado'>{$linha['estado']}</td>
                            <td data-label='Ações'>
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
