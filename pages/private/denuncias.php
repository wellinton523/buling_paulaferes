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
    <title>Denuncias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>

    <!-- header administrador -->

    <?php include "../components/header_adm.php" ?>

    <!-- area principal -->

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
            <div class="card bg-black" style="min-height: 45vh;">
                <hr class="text-light">
                <div class="card-header text-center">
                    <h1>Denuncias existentes</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>nome</th>
                                <th>turma</th>
                                <th>data</th>
                                <th>relato</th>
                                <th>ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                include "../../backend/config.php";

                                
                                $sql = "SELECT * from relatos";
                                $resultado = $conexao->query($sql);

                                if($resultado->num_rows > 0){
                                    
                                    while($linha = $resultado->fetch_assoc()){
                                        echo "<tr>";
                                        echo "<td>" . $linha["id"] . "</td>";
                                        echo "<td>" . $linha["nome"] . "</td>";
                                        echo "<td>" . $linha["turma"] . "</td>";
                                        echo "<td>" . $linha["data"] . "</td>";
                                        echo "<td>" . substr($linha["relato"], 0, 50) . "...</td>";
                                        echo "<td>
                                                <button type='button' class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#modalRelato" . $linha["id"] . "'>
                                                    <i class='bi bi-eye'></i> Ver
                                                </button>
                                                <a href='../../backend/deletar.php?id=" . $linha["id"] . "&page=denuncias&table=relatos' class='btn btn-danger btn-sm'> 
                                                    <i class='bi bi-x-circle'></i> Excluir
                                                </a>
                                            </td>";
                                        echo "</tr>";

                                        // Modal para cada relato
                                        echo "
                                        <!-- Modal -->
                                        <div class='modal fade' id='modalRelato" . $linha["id"] . "' tabindex='-1' aria-labelledby='modalLabel" . $linha["id"] . "' aria-hidden='true'>
                                            <div class='modal-dialog modal-lg'>
                                                <div class='modal-content'>
                                                    <div class='modal-header'>
                                                        <h5 class='modal-title' id='modalLabel" . $linha["id"] . "'>Detalhes do Relato #" . $linha["id"] . "</h5>
                                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                    </div>
                                                    <div class='modal-body'>
                                                        <div class='row'>
                                                            <div class='col-md-6'>
                                                                <p><strong>ID:</strong> " . $linha["id"] . "</p>
                                                                <p><strong>Nome:</strong> " . $linha["nome"] . "</p>
                                                                <p><strong>Turma:</strong> " . $linha["turma"] . "</p>
                                                            </div>
                                                            <div class='col-md-6'>
                                                                <p><strong>Data:</strong> " . $linha["data"] . "</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class='row'>
                                                            <div class='col-12'>
                                                                <p><strong>Relato Completo:</strong></p>
                                                                <div class='border p-3 bg-light rounded'>
                                                                    " . nl2br(htmlspecialchars($linha["relato"])) . "
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                                                        <a href='../../backend/deletar.php?id=" . $linha["id"] . "&page=denuncias&table=relatos' class='btn btn-danger'>
                                                            <i class='bi bi-x-circle'></i> Excluir Relato
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        ";
                                    }
                                }else{
                                    echo "<tr><td colspan='6' class='text-center'>Nenhuma relato cadastrado</td></tr>";
                                }
                                
                                $conexao->close();
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>

    <!-- footer -->

    <?php include "../components/footer.php" ?>
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</html>