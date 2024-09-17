<?php
session_start();

if (!isset($_SESSION['username']) ) {
    header('Location: comeco.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
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
            text-align: center;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .links-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .link-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px 0;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .link-button:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .link-button:active {
            background-color: #004494;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        <div class="links-container">
            <?php if ($_SESSION['username'] == 'coordenacao'): ?>
                <a href="solicitacao.php" class="link-button">Adicionar Solicitação</a>
            <?php endif; ?>
            <a href="vizualizar_solicitacoes.php" class="link-button">Visualizar todas as solicitações</a>
            <a href="sair.php" class="link-button">Sair</a>
        </div>
    </div>
</body>
</html>

