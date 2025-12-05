
<?php

$page = $_GET["page"];

if ($page == "denunciar"){
    header("Location: ../../index.php");
};

if ($page == "denuncias"){
    header("Location: denuncias.php");
};

if ($page == "usuarios"){
    header("Location: usuarios.php");
};

?>
