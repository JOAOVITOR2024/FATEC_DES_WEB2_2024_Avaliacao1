<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] != 'coordenacao') {
    header('Location: comeco.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Solicitação</title>
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
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 600px;
        }
        h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        textarea, input, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Adicionar Solicitação</h1>
        <form action="processar_solicitacao.php" method="post">
            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" required></textarea>
            <label for="laboratorio">Laboratório:</label>
            <select id="laboratorio" name="laboratorio" required>
                <option value="Laboratorio1">Laboratório 1</option>
                <option value="Laboratorio2">Laboratório 2</option>
                <option value="Laboratorio3">Laboratório 3</option>
            </select>
            <label for="prazo">Prazo:</label>
            <input type="date" id="prazo" name="prazo" required>
            <label for="curso">Curso Atendido:</label>
            <select id="curso" name="curso" required>
                <option value="DSM">DSM</option>
                <option value="GE">GE</option>
            </select>
            <button type="submit">Enviar Solicitação</button>
        </form>
    </div>
</body>
</html>

