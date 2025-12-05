<?php

    include "config.php";

    $id = intval($_GET['id']);
    $table = strval($_GET['table']);
    $page = strval($_GET['page']);

    $sql = "DELETE FROM $table WHERE id = $id";

    $stmt = $conexao->prepare($sql);

    if ($stmt->execute()) {
        header("Location: ../pages/private/" . $page . ".php");
    }

    $stmt->close();
    $conexao->close();
?>