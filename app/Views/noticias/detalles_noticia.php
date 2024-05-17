<?php echo $this->extend('Layouts/index'); ?>
<?php echo $this->section('titulo'); ?>
<?= $noticias['titulo'] ?>
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>

<div class="container">


    <div class="row align-items-center vh-100">
        <div class="col-md-6">
            <img src="<?php echo base_url('uploads/') . $noticias['imagen']; ?>" alt="<?= $noticias['titulo'] ?>" class="img-fluid" alt="Imagen de la noticia">
        </div>
        <div class="col-md-6">
            <h1 class="mb-4"><?= $noticias['titulo'] ?></h1>
            <p class="lead"><?= $noticias['descripcion'] ?></p>
            <p class="bold"><?php echo $noticias['categoria_id'];?></p>
            <p><small class="text-muted"><?php echo 'Publicado el: '.$noticias['fecha_publicacion']?></small></p>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>