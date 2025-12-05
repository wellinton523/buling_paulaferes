<?php

session_start();

if(empty($_POST) or (empty($_POST["usuario"]) or (empty($_POST["senha"])))){
    header("Location: ../index.php?msg=error03");
};

include "config.php";

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios WHERE usuario = '{$usuario}' AND senha = '{$senha}'";

$stmt = $conexao->query($sql);

if($stmt->num_rows > 0){
    $_SESSION["usuario"] = $usuario;
    $_SESSION["senha"] = $senha;

    header("Location: ../pages/private/dashboard.php");

}else{
    header("Location: ../index.php?msg=error02");
}

?>