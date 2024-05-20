<?php echo $this->extend('usuarios/index_editor'); ?>
<?php echo $this->section('contenido'); ?>


<div class="container">
    <h2 class="mb-4 mt-2">Noticias Rechazadas</h2>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($noticias as $noticia) : ?>
            <div class="col-sm-4">
                <div class="card">
                    <img src="<?php echo base_url('uploads/') . $noticia->imagen ?>" alt="<?= $noticia->titulo ?>">
                    <div class="card-body text-left nav-link disabled">
                        <h5 class="card-title nav-link disabled"><a href="<?= base_url('noticias/' . $noticia->id); ?>"><?= $noticia->titulo; ?></a></h5>
                        <p class="card-text-muted nav-link disabled"><?= $noticia->descripcion; ?></p>
                        <p class="card-text-muted nav-link disabled"><?= $noticia->nombre_categoria; ?></p>
                        <p class="text-muted"><?= $noticia->estado; ?></p>
                        <p class="text-muted nav-link disabled"><?= $noticia->fecha; ?></p>
                        <p class="text-danger"><?= $noticia->motivo; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?php echo $this->endSection(); ?>