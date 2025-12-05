
<!-- navbarr -->

<nav class="position-relative navbar bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img class="rounded-5 me-3" src="assets/IMG/icon.jpg" alt="Paula Feres" width="70" >
            <span>E.E.B Profª Maria Paula Feres</span>
        </a>
    
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar..." aria-label="Search"/>
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" href="#navbarr-collapse" >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarr-collapse">
            <div class="navbar-nav">
                <hr class="text-light">
                <a class="nav-link active text-danger" aria-current="page" href="#"><i class="bi bi-exclamation-diamond"></i>Denunciar Bullying</a>
                <hr class="text-light">
                <button type="button" class="text-success nav-link text-start" data-bs-toggle="modal" data-bs-target="#logginModal"><i class="bi bi-box-arrow-in-right"></i> Loggin</button>
                <hr class="text-light">
            </div>
        </div>
    </div>
</nav>

<!-- modal loggin -->

<div class="modal fade" id="logginModal" tabindex="-1" aria-labelledby="logginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success"" id="logginModalLabel">
                    <i class="bi bi-info-circle"></i> Loggin
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="backend/loggin.php" method="POST">

                <div class="input-group mb-3">
                    <span class="input-group-text">Usuario</span>
                    <input type="text" class="form-control" id="usuario" name="usuario">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Senha</span>
                    <input type="text" class="form-control" id="senha" name="senha">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">
                        Fechar
                    </button>
                    <button type="submit" class="btn btn-outline-success">
                        Confirmar
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>