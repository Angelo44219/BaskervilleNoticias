<header class="p-3 text-bg-dark sticky">
    <div class="container">

        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <label for="btn-menu" onclick="openNav()">
                <i class="bi bi-list"></i>
            </label>&nbsp;&nbsp;

            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h3><i class="bi bi-newspaper"></i>Baskerville noticias</h3>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 nav-links">
                <h5><a href="#" class="nav-link">Últimas noticias</a></h5>
                <h5><a href="#" class="nav-link">Deportes</a></h5>
                <h5><a href="#" class="nav-link">Economia</a></h5>
                <h5><a href="#" class="nav-link">Tecnologia</a></h5>
            </ul>

            <div class="text-end">
                <a class="btn btn-outline-light me-2" href="<?php echo base_url('Layouts/usuarios/iniciar_sesion'); ?>">Iniciar sesión</button>
                <a class="btn btn-warning" href="<?php echo base_url('Layouts/usuarios/registro'); ?>">Registrarse</a>
            </div>
        </div>
    </div>
</header>

<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a href="#">Ultimas Noticias</a>
    <a href="#">Deportes</a>
    <a href="#">Economia</a>
    <a href="#">Tecnologia</a>
</div>