<?php echo $this->extend('Layouts/index'); ?>
<?php echo $this->section('titulo'); ?>
<?= $noticias['titulo'] ?>
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>

<div class="container">
    <br>

    <div class="row align-items-center">
        
        <h4 class="bolder mb-3">
            <?php switch ($noticias['categoria_id']) {
                case 1:
                    echo 'Deportes';
                    break;
                case 2:
                    echo 'Entretenimiento';
                    break;
                case 3:
                    echo 'Tecnologia';
                    break;
                case 4:
                    echo 'Economia';
                    break;
                case 5:
                    echo 'Policial';
                    break;
                case 6:
                    echo 'Política';
                    break;
                case 7:
                    echo 'Clima';
                    break;
                case 8:
                    echo 'Loteria';
                    break;
                case 9:
                    echo 'El mundo';
                    break;
            }  ?>
        </h4>
        <br>
        <hr>
        <div class="col-md-12">
            <img src="<?php echo base_url('uploads/') . $noticias['imagen']; ?>" alt="<?= $noticias['titulo'] ?>" class="img-fluid" alt="Imagen de la noticia" style="max-width: 960px; "><br><br>
        </div>
        <br><hr>
        <div class="col-md-12 align-items-center justify-content-center">
            <h1 class="mb-4 font-weight:500;"><?= $noticias['titulo'] ?></h1>
            <p class="lead"><?= $noticias['descripcion'] ?></p>

            <?php if ($noticias['fecha_publicacion'] == null) { ?>
                <p><small class="text-muted"><?php echo 'Creado el: ' . $noticias['fecha'] ?></small></p>
            <?php } else { ?>
                <p><small class="text-muted"><?php echo 'Publicado el: ' . $noticias['fecha_publicacion'] ?></small></p>
            <?php } ?>

        </div>
    </div>
</div>
<?php echo $this->endSection(); ?>