<?php

session_start();
if (empty($_SESSION)){
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncias de bullying Paula Feres</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <!-- Header - navbar -->

    <?php include "../components/header_adm.php" ?>

    <!-- conteudo da pagina -->

    <main>
        <div class="mx-5 p-5">
            <div class="card bg-black">
                <hr class="text-light">
                <div class="card-header text-center">
                    <h1><strong>Dashboard</strong></h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body bg-danger text-center rounded-3 d-grid gap-3">
                                    <hr>
                                    <div class="row">
                                        <h2>Denuncias Totais</h2>
                                        <?php
                                            include "../../backend/config.php";

                                            
                                            $sql = "SELECT * from relatos";
                                            $result = $conexao->query($sql);

                                            echo"<h3>" . $result->num_rows . "</h3>";
                                        ?>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <h2>Denuncias Hoje</h2>
                                        <?php

                                            $data_hoje = date('Y-m-d');
                                            $sql_d = "SELECT * FROM relatos WHERE DATE(data) = '$data_hoje'";
                                            $result_d = $conexao->query($sql_d);

                                            echo "<h3>" . $result_d->num_rows . "</h3>";
                                        ?>
                                    </div>
                                    <hr>


                                </div>
                            </div>
                            <div class="row p-3">

                                <a class="btn btn-outline-danger" href="denuncias.php">Ver Denuncias</a>
                                
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    
    <!-- footer -->

    <?php include "../components/footer.php"?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>