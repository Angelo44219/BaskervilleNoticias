    <!--Titulo del contenido-->
    <?php echo $this->extend('Layouts/index'); ?>

    <?php echo $this->section('titulo'); ?>
        Inicio
    <?php echo $this->endSection(); ?>
    <?php echo $this->section('contenido_sitio'); ?>
    <!--Contenido de la página dentro de este div si deseas que el menú lateral empuje el contenido de la página hacia la derecha -->
    <div class="contenido" id="contenido">
    </div>
    <?php echo $this->endSection(); ?>