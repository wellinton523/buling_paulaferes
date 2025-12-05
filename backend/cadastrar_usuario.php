<?php
include "config.php";

// Primeiro verifica se os campos foram enviados via POST
if (!isset($_POST["nome"]) || !isset($_POST["senha"]) || !isset($_POST["cpf"])) {
    // Se algum campo obrigatório não foi enviado, redireciona com erro
    if (!isset($_POST["nome"]) || $_POST["nome"] == "") {
        header("Location: ../pages/private/usuarios.php?msg=error1");
    } elseif (!isset($_POST["senha"]) || $_POST["senha"] == "") {
        header("Location: ../pages/private/usuarios.php?msg=error2");
    } elseif (!isset($_POST["cpf"]) || $_POST["cpf"] == "") {
        header("Location: ../pages/private/usuarios.php?msg=error3");
    }
    exit();
}

// Se chegou aqui, os campos obrigatórios existem, então pega os valores
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$telefone = $_POST["telefone"];
$cpf = $_POST["cpf"];
$email = $_POST["email"];

// Agora verifica se os campos obrigatórios não estão vazios
if ($nome == "") {
    header("Location: ../pages/private/usuarios.php?msg=error1");
    exit();
} elseif ($senha == "") {
    header("Location: ../pages/private/usuarios.php?msg=error2");
    exit();
} elseif ($cpf == "") {
    header("Location: ../pages/private/usuarios.php?msg=error3");
    exit();
}

// Tratamento dos campos opcionais
if ($telefone == "") {
    $telefone = "...";
}

if ($email == "") {
    $email = "...";
} else {
    $email = $email . "@gmail.com";
}

// Inserção no banco de dados
$sql = "INSERT INTO usuarios (usuario, senha, telefone, cpf, email, data) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $conexao->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sssss", $nome, $senha, $telefone, $cpf, $email);
    
    if ($stmt->execute()) {
        header("Location: ../pages/private/usuarios.php");
    } else {
        // Se houver erro na execução, você pode adicionar um tratamento aqui
        header("Location: ../pages/private/usuarios.php?msg=error4");
    }
    
    $stmt->close();
} else {
    // Se houver erro no prepare
    header("Location: ../pages/private/usuarios.php?msg=error5");
}

$conexao->close();
?>