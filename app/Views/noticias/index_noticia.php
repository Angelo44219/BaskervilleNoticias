<?php echo $this->extend('Layouts/index'); ?>
<?php echo $this->section('titulo'); ?>
Inicio
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>
<div class="container mt-3">

    <div id="ultimas_noticias" style="padding:10px;margin-top:20px;height:1200px;">
        <h1 class="mb-3">Ultimas Noticias</h1>
        <br><hr>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <br>
            <?php foreach ($noticias as $noticia) : ?>

                <div class="col">
                    <div class="card">
                        <a href="<?php echo base_url('noticias/' . $noticia['id']); ?>">
                            <img class="card-img-top" src="<?php echo base_url('uploads/' . $noticia['imagen']) ?>" alt="<?= $noticia['titulo'] ?>">
                        </a>
                        <div class="card-body text-left">
                            <h5 class="card-title"><a href="<?= base_url('noticias/' . $noticia['id']); ?>"><?= $noticia['titulo'] ?></a></h5>
                            <p class="card-text"><?= $noticia['descripcion'] ?></p>
                            <p class="card-text"><?= $noticia['nombre_categoria'] ?></p>
                            <p class="text-muted"><?= $noticia['fecha_publicacion'] ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>