<?php echo $this->extend('usuarios/index_validador');?>
<?php echo $this->section('titulo');?>
    Seguimiento
<?php echo $this->endSection();?>
<?php echo $this->section('contenido');?>

<div class="container">
    <h3 class="mt-2 mb-4">Seguimiento de la Noticia </h3>

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
                    <th scope="col">Noticia</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Categoría</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Ultimo cambio</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">Tipo modificacion</th>
                    <th scope="col">Revertido</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seguimientos as $seguimiento) : ?>
                    <tr>
                        <td><?= $seguimiento->id ?></td>
                        <td><?= $seguimiento->id_noticia ?></td>
                        <td><?= $seguimiento->id_usuario ?></td>
                        <td><?= $seguimiento->titulo_seg ?></td>
                        <td><?= $seguimiento->descripcion_seg ?></td>
                        <td><?= $seguimiento->activo_seg ?></td>
                        <td><?= $seguimiento->estado_seg ?></td>
                        <td><?= $seguimiento->id_categoria_seg ?></td>
                        <td><?= $seguimiento->imagen_seg ?></td>
                        <td><?= $seguimiento->fecha_modificacion ?></td>
                        <td><?= $seguimiento->usuario_modificacion ?></td>
                        <td><?= $seguimiento->tipo_modificacion ?></td>
                        <td><?= $seguimiento->revertido ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br><br>
    </div>
</div>

    
<?php echo $this->endSection();?>