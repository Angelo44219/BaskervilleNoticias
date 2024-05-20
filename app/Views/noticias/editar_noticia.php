<?php echo $this->extend('usuarios/index_editor'); ?>
<?php echo $this->section('contenido'); ?>

<div class="contenido mb-4">
    <div class="card rounded-0" style="max-width: 700px;">
        <div class="card-header bg-dark text-white">
            Editar Noticia
        </div>

        <?php if (session()->getFlashdata('error') !== null) { ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php } elseif (session()->getFlashdata('msg') !== null) { ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('msg'); ?>
            </div>
        <?php } ?>

        <div class="card-body">

            <form method="post" action="<?php echo base_url('noticias/' . $noticia['id']); ?>" autocomplete="off" enctype="multipart/form-data" id="formulario_noticia">

                <input type="hidden" name="_method" value="put">
                <input type="hidden" name="empleado_id" value="<?= $noticia['id']; ?>">

                <div class="mb-3 mt-3">
                    <label for="titulo" class="form-label" name="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=$noticia['titulo'] ?>">
                </div>
                <div class="mb-4 mt-3">
                    <label for="descripcion" name="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?=$noticia['descripcion']?></textarea>
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

                <div class="mb-4 mt-3">
                    <label for="es_activo" class="form-label">Activar noticia</label>
                    <select class="form-control" id="es_activo" name="es_activo" required>
                        <option value="1" <?= set_select('es_activo', '1'); ?><?php echo ($noticia['estado'] == 1) ? 'selected' : ''; ?>>Activar</option>
                        <option value="0" <?= set_select('es_activo', '0'); ?><?php echo ($noticia['estado'] == 0) ? 'selected' : ''; ?>>Desactivar</option>
                    </select>
                </div>


                <div class="mb-4 mt-3">
                    <label for="estado" class="form-label">Estado de la noticia</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="borrador" <?php echo ($noticia['estado'] == 'borrador') ? 'selected' : ''; ?>>Borrador</option>
                        <option value="validar"  <?php echo ($noticia['estado'] == 'validar') ? 'selected' : ''; ?>>Lista para validar</option>
                    </select>
                </div>

                <div class="mb-4 mt-3">
                    <label for="imagen" class="form-label">Imagen (opcional)</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>
                <br>
                <a href="<?php echo base_url('borradores'); ?>" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="submit" class="btn btn-success">Lista para validar</button>
            </form>
        </div>
    </div>
</div>



<?php echo $this->endSection(); ?>