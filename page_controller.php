
<?php

$page = $_GET["page"];

if ($page == "denunciar"){
    header("Location: index.php");
};

if ($page == "denuncias"){
    header("Location: pages/private/denuncias.php");
};


?>
