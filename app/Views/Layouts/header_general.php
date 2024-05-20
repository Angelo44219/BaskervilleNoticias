<nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="<?php echo base_url(); ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <img src="https://fontmeme.com/permalink/240520/3a7b7948bf52563bd9ca7c1ddb1df81f.png" alt="efecto-sombra" border="0" width="280px">
        </a>
        <div class="text-end">
            <?php if (session()->logged_in) { ?>
                <div class="dropdown text-white">
                    <?php if (session()->get('rol') == 'Editor') { ?>
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-workspace"></i>&nbsp;<?php echo session()->get('nombre_usuario'); ?>
                        </a>
                        <ul class="dropdown-menu">
                            <a href="<?php echo base_url() ?>nueva_noticia" id="tab1" class="dropdown-item">Crear Noticia</a>
                            <a href="<?php echo base_url() ?>borradores" id="tab2" class="dropdown-item">Borradores</a>
                            <a href="<?php echo base_url() ?>en_correccion" id="tab6" class="dropdown-item">En correccion</a>
                            <a href="<?php echo base_url() ?>publicadas" id="tab4" class="dropdown-item">Publicadas</a>
                            <a href="<?php echo base_url() ?>desactivadas" id="tab5" class="dropdown-item">Desactivadas</a>
                            <a href="<?php echo base_url() ?>rechazadas" id="tab6" class="dropdown-item">Rechazadas</a>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>cerrar_sesion">Cerrar sesion</a></li>
                        </ul>
                </div>
            <?php } elseif (session()->get('rol') == 'Validador') { ?>
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-workspace"></i>&nbsp;<?php echo session()->get('nombre_usuario'); ?>
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>validar">Validar noticias</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>cerrar_sesion">Cerrar sesion</a></li>
                </ul>
            <?php } else { ?>
                <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-workspace"></i>&nbsp;<?php echo session()->get('nombre_usuario'); ?>
                </a>
                <ul class="dropdown-menu">
                    <a href="<?php echo base_url() ?>nueva_noticia" id="tab1" class="dropdown-item">Crear Noticia</a>
                    <a href="<?php echo base_url() ?>borradores" id="tab2" class="dropdown-item">Borradores</a>
                    <a href="<?php echo base_url() ?>en_correccion" id="tab6" class="dropdown-item">En correccion</a>
                    <a href="<?php echo base_url() ?>publicadas" id="tab4" class="dropdown-item">Publicadas</a>
                    <a href="<?php echo base_url() ?>desactivadas" id="tab5" class="dropdown-item">Desactivadas</a>
                    <a href="<?php echo base_url() ?>rechazadas" id="tab6" class="dropdown-item">Rechazadas</a>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>validar">Validar noticias</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url(); ?>cerrar_sesion">Cerrar sesion</a></li>
                </ul>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="text-end">
            <a class="btn btn-outline-light me-2" href="<?php echo base_url(); ?>iniciar_sesion">Iniciar sesión</button>
                <a class="btn btn-warning" href="<?php echo base_url(); ?>registro">Registrarse</a>
        </div>
    <?php } ?>
    </div>
</nav>
