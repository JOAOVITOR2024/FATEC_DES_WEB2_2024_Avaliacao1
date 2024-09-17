<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: comeco.php');
    exit();
}

$curso = isset($_GET['curso']) ? htmlspecialchars($_GET['curso']) : ''; 

$file = ($curso == 'DSM' || $curso == 'GE') ? 'solicitacoes.txt' : 'solicitacoes.txt';

if (!file_exists($file)) {
    echo 'Nenhuma solicitação encontrada.';
    exit();
}

$requests = file($file, FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Solicitações </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 16px;
            border-radius: 4px;
            background-color: #f1f1f1;
        }

        a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Solicitações</h1>
        <?php if (!empty($requests)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $index => $request): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($request); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhuma solicitação encontrada.</p>
        <?php endif; ?>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
