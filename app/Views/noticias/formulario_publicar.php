<?php echo $this->extend('usuarios/index_validador'); ?>
<?php echo $this->section('contenido'); ?>
<?php echo $this->section('titulo'); ?>
    Publicar noticia
<?php echo $this->endSection(); ?>
<div class="contenido">
    <div class="card rounded-0" style="max-width: 600px;">
        <div class="card-header bg-primary text-white">
            Publicar noticia
        </div>
        <div class="card-body">

            <form method="post" action="<?php echo base_url('noticias/publicar/' . $noticia['id']); ?>" autocomplete="off" enctype="multipart/form-data">

                <fieldset disabled>
                    <div class="mb-3 mt-3">
                        <label for="titulo" class="form-label" name="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $noticia['titulo'] ?>">
                    </div>
                    <div class="mb-4 mt-3">
                        <label for="descripcion" name="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= $noticia['descripcion'] ?></textarea>
                    </div>
                    <div class="mb-4 mt-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <!-- Aquí debes llenar las opciones con las categorías de tu base de datos -->
                            <option value="">Selecciona una categoría</option>
                            <?php foreach ($categorias as $categoria) : ?>

                                <option value="<?= $categoria['id'] ?>" <?php echo ($categoria['id'] == $noticia['categoria_id']) ? 'selected' : ''; ?>><?= $categoria['nombre'] ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>
                </fieldset>
                
                <select class="form-control" id="estado" name="estado" required>
                    <option value="">Seleccionar</option>
                    <option value="publicada">Publicar noticia</option>
                </select>

                <br><br>
                <button type="submit" class="btn btn-primary">Publicar noticia</button>
                <a href="<?php echo base_url('validar'); ?>" class="btn btn-secondary">Regresar</a>

            </form>
        </div>
    </div>
</div>



<?php echo $this->endSection(); ?>