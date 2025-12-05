
<?php

session_start();
if (!empty($_SESSION)){
    header("Location: pages/private/dashboard.php");
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

    <?php include "pages/components/header.php" ?>
    <main>
        <?php

        if (isset($_GET['msg'])) {
        $msg = strval($_GET["msg"]);

            if ($msg == "error02"){

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<i class='bi bi-x-circle'></i> Usuario ou senha incorretos";
                echo "</div>";

            };

            
            if ($msg == "error03"){

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<i class='bi bi-x-circle'></i> Usuario ou senha não preenchidos";
                echo "</div>";

            };
        }
        
        ?>
        <div class="mx-5 p-5">
            <div class="card bg-black">
                <hr class="text-light">
                <div class="card-header text-center">
                    <h1>Faça sua denuncia de bullyng</h1>
                </div>
                <div class="card-body">
                    <h5 class="text-danger ms-3">Atenção: Não é necessario que o nome ou turma sejam preenchidos!</h5>
                    <form action="backend/relatar.php" method="POST">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Nome</span>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Turma</span>
                            <input type="text" class="form-control" id="turma" name="turma">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Relato</span>
                            <input type="text" class="form-control" id="relato" name="relato">
                        </div>
                        <hr class="text-light">
                        <h5 class="text-warning ms-3">Não se preocupe, essas infomações não serão vistas por alunos e a própria direção ira tomar as devidas providencias</h5>
                        <div id="alert_place">
                            <?php
                            
                            if (isset($_GET['msg'])) {
                                $msg = strval($_GET["msg"]);

                                if ($msg == "success"){
 
                                    echo "<div class='alert alert-success' role='alert'>";
                                    echo "<i class='bi bi-check-circle'></i> Seu relato foi enviado com sucesso";
                                    echo "</div>";

                                };

                                if ($msg == "error01"){
 
                                    echo "<div class='alert alert-danger' role='alert'>";
                                    echo "<i class='bi bi-exclamation-circle'></i> O campo 'relato' deve ser preenchido";
                                    echo "</div>";

                                };

                            };

                            ?>
                        </div>
                        <div class="d-flex justify-content-end">
                            <input class="btn btn-outline-success" type="submit" id="submit" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    
    <!-- footer -->

    <?php include "pages/components/footer.php"?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>