<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    if (($usuario === 'coordenacao' && $senha === 'coordenacao') || ($usuario === 'tecnicos' && $senha === 'tecnicos')) {
       
        $_SESSION['user'] = $usuario;
        header('Location: comeco.php');
        exit();
    } else {
        echo 'Usuário ou senha inválidos';
    }
} else {
    header('Location: inicial.php');
    exit();
}
?>
