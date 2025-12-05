
<!-- navbarr -->

<nav class="position-relative navbar bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="rounded-5 me-3" src="../../assets/IMG/icon.jpg" alt="Paula Feres" width="70" >
            <span>E.E.B Profª Maria Paula Feres</span>
        </a>
        
        <div class="text-light fs-5 ">
            <strong>
                <span class="text-success">usuario:</span>
                <?php
                echo"<span class='text-success'>" . $_SESSION["usuario"] . "</span>"
                ?>
            </strong>
        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" href="#navbarr-collapse" >
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        
        <div class="collapse navbar-collapse" id="navbarr-collapse">
            <div class="navbar-nav">
                <hr class="text-light">
                <a class="nav-link" aria-current="page" href="page_controller.php?page=denuncias">Denuncias de Bullying</a>
                <hr class="text-light">
                <a class="nav-link" aria-current="page" href="page_controller.php?page=denunciar">Dashboard</a>
                <a class="nav-link" aria-current="page" href="page_controller.php?page=usuarios">Usuarios</a>
                <hr class="text-light">
                <button type="button" class="text-danger nav-link text-start" data-bs-toggle="modal" data-bs-target="#loggoutModal"><i class="bi bi-box-arrow-left"></i> Sair</button>
                <button type="button" class="text-warning nav-link text-start" data-bs-toggle="modal" data-bs-target="#supportModal"><i class="bi bi-question-diamond"></i> Suporte</button>
                <hr class="text-light">
            </div>
        </div>
    </div>
</nav>

<!-- modal suporte -->

<div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-warning"" id="supportModalLabel">
                    <i class="bi bi-info-circle"></i> Informações de Suporte
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    Para qualquer dúvida ou problema, entre em contato conosco através
                    dos canais abaixo.
                </p>
                <ul class="list-unstyled">
                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        <strong>E-mail:</strong> studiowayless@gmail.com
                    </li>
                    <li>
                        <i class="bi bi-person"></i>
                        <strong>E-mail Pessoal:</strong> wellint5x@gmail.com
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill"></i>
                        <strong>Telefone Pessoal:</strong> (47) 99999-1129
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- modal loggout -->

<div class="modal fade" id="loggoutModal" tabindex="-1" aria-labelledby="loggoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger"" id="loggoutModalLabel">
                    <i class="bi bi-info-circle"></i> Sair
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h3 class="text-danger">Você tem certeza dessa ação?</h3>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                        Fechar
                    </button>
                    <a href="../../backend/logout.php" class="btn btn-outline-success">
                        Confirmar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>