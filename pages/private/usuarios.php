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
        <?php
        if (isset($_GET['msg'])) {
        $msg = strval($_GET["msg"]);

            if ($msg == "error1"){

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<i class='bi bi-x-circle'></i> O campo nome deve ser preenchido";
                echo "</div>";

            };

            
            if ($msg == "error2"){

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<i class='bi bi-x-circle'></i> O campo senha deve ser preenchido";
                echo "</div>";

            };

            if ($msg == "error3"){

                echo "<div class='alert alert-danger' role='alert'>";
                echo "<i class='bi bi-x-circle'></i> O campo CPF deve ser preenchido";
                echo "</div>";

            };
        }
        
        ?>
        <div class="mx-5 p-5">
            <div class="card bg-black">
                <hr class="text-light">
                <div class="card-header text-center">
                    <h1><strong>Cadastrar Usuario</strong></h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="../../backend/cadastrar_usuario.php" method="POST">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nome:</span>
                                    <input type="text" class="form-control" name="nome" id="nome">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">senha:</span>
                                    <input type="text" class="form-control" name="senha" id="senha">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">CPF:</span>
                                    <input type="text" class="form-control" name="cpf" id="cpf" maxlength="14"">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Telefone:</span>
                                    <input type="text" class="form-control" name="telefone" id="telefone" maxlength="15"">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Email:</span>
                                    <input type="text" class="form-control" name="email" id="email">
                                    <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                </div>
                                <div class=" d-flex justify-content-end">
                                    <button class="btn btn-outline-success" type="submit">Cadastrar</button>
                                </div>

                            </form>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h3>Usuarios Cadastrados</h3>
                                </div>
                                <div class="card-body">
                                    <form class="d-flex" action="../../backend/pesquisa.php" method="POST">
                                        <input class="form-control me-2" type="search" placeholder="pesquisar" name="pesquisa" id="pesquisa"/>
                                        <input type="hidden" name="page" id="page" value="usuarios">
                                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                                    </form>
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>nome</th>
                                                <th>telefone</th>
                                                <th>ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                include "../../backend/config.php";
                                            
                                                if(isset($_GET["p"])){
                                                    $p = $_GET["p"];

                                                    $sql = "SELECT * FROM Usuarios WHERE usuario LIKE '%$p%'";
                                                    $stmt = $conexao->query($sql);

                                                    if ($stmt->num_rows > 0){
                                                        while($row = $stmt->fetch_assoc()){
                                                            if ($row["usuario"] != "weto"){
                                                                echo "<tr>";
                                                                echo "<td>" . $row["id"] . "</td>";
                                                                echo "<td>" . $row["usuario"] . "</td>";
                                                                echo "<td>" . $row["telefone"] . "</td>";
                                                                echo "<td><button type='button' class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#modalRelato" . $row["id"] . "'><i class='bi bi-eye'></i> Ver</button></td>";
                                                                echo "<tr>";

                                                                echo "
                                                                    <!-- Modal -->
                                                                    <div class='modal fade' id='modalRelato" . $row["id"] . "' tabindex='-1' aria-labelledby='modalLabel" . $row["id"] . "' aria-hidden='true'>
                                                                        <div class='modal-dialog modal-lg'>
                                                                            <div class='modal-content'>
                                                                                <div class='modal-header'>
                                                                                    <h5 class='modal-title' id='modalLabel" . $row["id"] . "'>Detalhes do Usuario #" . $row["id"] . "</h5>
                                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                                </div>
                                                                                <div class='modal-body'>
                                                                                    <div class='row'>
                                                                                        <div class='col-md-6'>
                                                                                            <p><strong>ID:</strong> " . $row["id"] . "</p>
                                                                                            <p><strong>Nome:</strong> " . $row["usuario"] . "</p>
                                                                                            <p><strong>CPF:</strong> " . $row["cpf"] . "</p>
                                                                                            <p><strong>Telefone:</strong> " . $row["telefone"] . "</p>
                                                                                            <p><strong>Email:</strong> " . $row["email"] . "</p>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class='modal-footer'>
                                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                                                                                    <a href='../../backend/deletar.php?id=" . $row["id"] . "&page=usuarios&table=usuarios' class='btn btn-danger'>
                                                                                        <i class='bi bi-x-circle'></i> Excluir usuario
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    ";
                                                            }
                                                        }
                                                    }else{
                                                        echo "<tr><td colspan='4' class='text-center'>Nenhuma usuario cadastrado com esse nome</td></tr>";
                                                    }

                                                }else{
                                                    $sql = "SELECT * from usuarios";
                                                    $resultado = $conexao->query($sql);

                                                    if($resultado->num_rows > 0){
                                                        
                                                        while($row = $resultado->fetch_assoc()){
                                                            if ($row["usuario"] != "weto"){
                                                                echo "<tr>";
                                                                echo "<td>" . $row["id"] . "</td>";
                                                                echo "<td>" . $row["usuario"] . "</td>";
                                                                echo "<td>" . $row["telefone"] . "</td>";
                                                                echo "<td><button type='button' class='btn btn-info btn-sm' data-bs-toggle='modal' data-bs-target='#modalRelato" . $row["id"] . "'><i class='bi bi-eye'></i> Ver</button></td>";
                                                                echo "<tr>";

                                                                echo "
                                                                    <!-- Modal -->
                                                                    <div class='modal fade' id='modalRelato" . $row["id"] . "' tabindex='-1' aria-labelledby='modalLabel" . $row["id"] . "' aria-hidden='true'>
                                                                        <div class='modal-dialog modal-lg'>
                                                                            <div class='modal-content'>
                                                                                <div class='modal-header'>
                                                                                    <h5 class='modal-title' id='modalLabel" . $row["id"] . "'>Detalhes do Usuario #" . $row["id"] . "</h5>
                                                                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                                                </div>
                                                                                <div class='modal-body'>
                                                                                    <div class='row'>
                                                                                        <div class='col-md-6'>
                                                                                            <p><strong>ID:</strong> " . $row["id"] . "</p>
                                                                                            <p><strong>Nome:</strong> " . $row["usuario"] . "</p>
                                                                                            <p><strong>CPF:</strong> " . $row["cpf"] . "</p>
                                                                                            <p><strong>Telefone:</strong> " . $row["telefone"] . "</p>
                                                                                            <p><strong>Email:</strong> " . $row["email"] . "</p>
                                                                                            <p><strong>Data:</strong> " . $row["data"] . "</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class='modal-footer'>
                                                                                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                                                                                    <a href='../../backend/deletar.php?id=" . $row["id"] . "&page=usuarios&table=usuarios' class='btn btn-danger'>
                                                                                        <i class='bi bi-x-circle'></i> Excluir Usuario
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    ";
                                                            }
                                                        }
                                                    }
                                                }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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

<script>
// Função para formatar CPF
function formatarCPF(cpf) {
    // Remove tudo que não é número
    cpf = cpf.replace(/\D/g, '');
    
    // Aplica a formatação
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2');
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    
    return cpf;
}

// Função para formatar telefone
function formatarTelefone(telefone) {
    // Remove tudo que não é número
    telefone = telefone.replace(/\D/g, '');
    
    // Aplica a formatação baseada no tamanho
    if (telefone.length === 11) {
        // Formato para celular: (00) 00000-0000
        telefone = telefone.replace(/(\d{2})(\d)/, '($1) $2');
        telefone = telefone.replace(/(\d{5})(\d{4})/, '$1-$2');
    } else if (telefone.length === 10) {
        // Formato para telefone fixo: (00) 0000-0000
        telefone = telefone.replace(/(\d{2})(\d)/, '($1) $2');
        telefone = telefone.replace(/(\d{4})(\d{4})/, '$1-$2');
    } else {
        // Se não tiver tamanho suficiente, retorna sem formatação
        return telefone;
    }
    
    return telefone;
}

// Event listeners para os campos
document.addEventListener('DOMContentLoaded', function() {
    const cpfInput = document.getElementById('cpf');
    const telefoneInput = document.getElementById('telefone');
    
    // Formata CPF enquanto digita
    cpfInput.addEventListener('input', function() {
        this.value = formatarCPF(this.value);
    });
    
    // Formata telefone enquanto digita
    telefoneInput.addEventListener('input', function() {
        this.value = formatarTelefone(this.value);
    });
    
    // Permite apenas números e formatação para CPF
    cpfInput.addEventListener('keypress', function(e) {
        const char = String.fromCharCode(e.keyCode || e.which);
        if (!/\d/.test(char) && char !== '.' && char !== '-') {
            e.preventDefault();
        }
    });
    
    // Permite apenas números e formatação para telefone
    telefoneInput.addEventListener('keypress', function(e) {
        const char = String.fromCharCode(e.keyCode || e.which);
        if (!/\d/.test(char) && char !== '(' && char !== ')' && char !== ' ' && char !== '-') {
            e.preventDefault();
        }
    });
});
</script>

</html>