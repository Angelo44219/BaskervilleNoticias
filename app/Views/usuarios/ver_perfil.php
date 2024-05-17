<?php echo $this->extend('Layouts/index'); ?>
<?php echo $this->section('titulo'); ?>
Espacio de trabajo
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>
<div class="container" style="margin-top:50px;">

    <div class="navbar_tabs">
        <a href="#crear_noticia">Crear Noticia</a>
        <a href="#datos">Datos</a>
        <a href="#mas">Mas</a>
    </div>

    <div id="crear_noticia" style="padding:10px;margin-top:20px;height:1200px;">
        <h1>Ultimas Noticias</h1>
        <p>Algun texto.</p>
        <p>Algun texto.</p>
    </div>
</div>
<?php echo $this->endSection(); ?>