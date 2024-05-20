<?php echo $this->extend('usuarios/index_editor'); ?>
<?php echo $this->section('contenido'); ?>


<div class="container">
    <h2 class="mb-4 mt-2">Noticias publicadas</h2>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($noticias as $noticia) : ?>
            <div class="col">
                <div class="card">
                    <img src="<?php echo base_url('uploads/') ?><?= $noticia->imagen ?>" alt="<?= $noticia->titulo ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $noticia->titulo; ?></h5>
                        <p class="card-text"><?= $noticia->descripcion; ?></p>
                        <p class="card-text"><?= $noticia->nombre_categoria; ?></p>
                        <p class="text-primary"><?= $noticia->estado; ?></p>
                        <p class="text-muted"><?= $noticia->fecha; ?></p>
                        <a href="<?= base_url('noticias/' . $noticia->id); ?>" class="btn btn-primary">Leer más</a>
                        <a href="<?= base_url('seguimiento/ver_seguimiento/' . $noticia->id); ?>" class="btn btn-warning">Seguimiento</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php echo $this->endSection(); ?>