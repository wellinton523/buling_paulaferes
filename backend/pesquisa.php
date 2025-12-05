<?php

$pesquisa = $_POST["pesquisa"];
$page = $_POST["page"];

if ($pesquisa != ""){
    header("Location: ../pages/private/" . $page . ".php?p=" . $pesquisa . "");
}else{
    header("Location: ../pages/private/" . $page . ".php");
}

?>