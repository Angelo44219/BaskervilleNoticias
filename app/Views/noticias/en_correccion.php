<?php echo $this->extend('usuarios/index_editor'); ?>
<?php echo $this->section('contenido'); ?>


<div class="container">
    <h2 class="mb-4 mt-2">Noticias en correccion</h2>
    <hr>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($noticias as $noticia) : ?>
            <div class="col-sm-4">
                <div class="card">
                    <img src="<?php echo base_url('uploads/') . $noticia->imagen ?>" alt="<?= $noticia->titulo ?>">
                    <div class="card-body text-left">
                        <h5 class="card-title"><a href="<?= base_url('noticias/' . $noticia->id); ?>"><?= $noticia->titulo; ?></a></h5>
                        <p class="card-text"><?= $noticia->descripcion; ?></p>
                        <p class="card-text"><?= $noticia->nombre_categoria; ?></p>
                        <p class="text-primary"><?= $noticia->estado; ?></p>
                        <p class="text-muted"><?= $noticia->fecha; ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('editar_noticia/edit/' . $noticia->id); ?>" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php echo $this->endSection(); ?>