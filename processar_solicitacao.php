<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] != 'coordenacao') {
    header('Location: comeco.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : '';
    $laboratorio = isset($_POST['laboratorio']) ? trim($_POST['laboratorio']) : '';
    $prazo = isset($_POST['prazo']) ? trim($_POST['prazo']) : '';
    $curso = isset($_POST['curso']) ? trim($_POST['curso']) : '';

    if (empty($descricao) || empty($laboratorio) || empty($prazo) || empty($curso)) {
        echo 'Todos os campos devem ser preenchidos.';
        exit();
    }

    $filename = '';
    if ($curso == 'DSM') {
        $filename = 'solicitacoes.txt';
    } elseif ($curso == 'GE') {
        $filename = 'solicitacoes.txt';
    } else {
        echo 'Curso não reconhecido.';
        exit();
    }

    if (!is_writable($filename)) {
        echo 'Não é possível gravar no arquivo.';
        exit();
    }
    $request = "$laboratorio | $prazo | $descricao | $curso\n";

    if (file_put_contents($filename, $request, FILE_APPEND) === false) {
        echo 'Não foi possível salvar a solicitação.';
        exit();
    }

    echo 'Cadastro salvo com sucesso!';
} else {
    echo 'Método de solicitação inválido.';
    exit();
}
?>
