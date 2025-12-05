<?php

include "config.php";

$nome = $_POST["nome"];
$turma = $_POST["turma"];
$relato = $_POST["relato"];

if ($nome == ""){
    $nome = "anonimo";
};

if ($turma == ""){
    $turma = "não informado";
};

if ($relato == ""){
    header("Location: ../index.php?msg=error01");
}else{
    $sql = "INSERT INTO relatos (nome, turma, relato, data) VALUES (?,?,?, NOW())";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $turma, $relato);

    if ($stmt->execute()) {
        header("Location: ../index.php?msg=success");
    }

}


$stmt->close();
$conexao->close();
?>