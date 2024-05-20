<?php echo $this->extend('usuarios/index_validador'); ?>
<?php echo $this->section('contenido'); ?>

<div class="container">
    <h1 class="mt-2 mb-4">Noticias Listas para Validar</h1>

    <style>
        .small-font {
            font-size: 0.8rem;
        }
    </style>

    <div class="table-responsive">
        <table class="table table-striped small-font text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Editor</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">publicacion</th>
                    <th scope="col">expiracion</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($noticias as $noticia) : ?>
                    <tr>
                        <td><?= $noticia->id ?></td>
                        <td><?= $noticia->editor_id ?></td>
                        <td><?= $noticia->titulo ?></td>
                        <td><?= $noticia->descripcion ?></td>
                        <td><?= $noticia->fecha ?></td>
                        <td><?= $noticia->noticia_activa ?></td>
                        <td><?= $noticia->estado ?></td>
                        <td><?= $noticia->categoria_id ?></td>
                        <td><?= $noticia->imagen ?></td>
                        <td><?= $noticia->fecha_publicacion ?></td>
                        <td><?= $noticia->fecha_expiracion ?></td>
                        <br>
                        <td><a class="btn btn-danger small-font" href="<?php echo base_url('rechazar/rechazar_noticia/'.$noticia->id)?>">Rechazar</a></td>
                        <td><a class="btn btn-primary small-font" href="<?php echo base_url('publicar/publicar_noticia/'.$noticia->id)?>">Publicar</a></td>
                        <td><a class="btn btn-success small-font" href="<?php echo base_url('corregir/corregir_noticia/'.$noticia->id)?>">Corregir</a></td>
                        <td><a href="<?= base_url('seguimiento/ver_seguimiento/' . $noticia->id); ?>" class="btn btn-warning small-font">Seguimiento</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php echo $this->endSection(); ?>
