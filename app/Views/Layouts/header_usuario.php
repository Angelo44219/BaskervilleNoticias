<nav class="navbar navbar-expand-lg sticky-top border-bottom bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="<?php echo base_url(); ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
            <h3><i class="bi bi-newspaper"></i>&nbsp;Baskerville noticias</h3>
        </a>
        <?php if (session()->logged_in) { ?>
            <div class="text-end">
                <div class="dropdown text-white justify-content">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-workspace"></i>&nbsp;<?php echo session()->get('nombre_usuario'); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>usuario">Espacio de trabajo</a></li>
                        <li><a class="dropdown-item" href="<?php echo base_url(); ?>cerrar_sesion">Cerrar sesion</a></li>
                    </ul>
                </div>
            </div>
        <?php } else { ?>
            <div class="text-end">
                <a class="btn btn-outline-light me-2" href="<?php echo base_url(); ?>iniciar_sesion">Iniciar sesión</button>
                    <a class="btn btn-warning" href="<?php echo base_url(); ?>registro">Registrarse</a>
            </div>
        <?php } ?>
    </div>
</nav>