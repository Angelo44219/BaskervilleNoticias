<?php echo $this->extend('usuarios/index_editor'); ?>
<?php echo $this->section('contenido'); ?>


<div class="container">
    <br><br>
    <h3 class="mb-4 mt-2">Noticias Rechazadas</h3>

    <div class="contenido" style="margin-top: 20px;">
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
                        <p class="text-muted"><?= $noticia->motivo; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>

<?php echo $this->endSection(); ?>