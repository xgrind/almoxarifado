<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= site_url() ?>">Requisição</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAlmoxarifado" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Almoxarifado
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarAlmoxarifado">
                        <li><a class="dropdown-item" href="<?= site_url('almoxarifados') ?>">Listar</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('almoxarifados/novo') ?>">Cadastrar</a></li>                        
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarGrupo" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Grupo
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarGrupo">
                        <li><a class="dropdown-item" href="<?= site_url('grupos') ?>">Listar</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('grupos/novo') ?>">Cadastrar</a></li>                        
                    </ul>
                </li>               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAlmoxarifado" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Produto
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarAlmoxarifado">
                        <li><a class="dropdown-item" href="<?= site_url('produtos') ?>">Listar</a></li>
                        <li><a class="dropdown-item" href="<?= site_url('produtos/novo') ?>">Cadastrar</a></li>                        
                    </ul>
                </li>
            </ul>          
        </div>
    </div>
</nav>