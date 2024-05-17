<?php echo $this->extend('usuarios/index_editor'); ?>
<?php echo $this->section('contenido'); ?>



<div class="contenido">
    <div class="card rounded-0" style="max-width: 700px;">
        <div class="card-header">
            Crear Noticia
        </div>

        <?php if (session()->getFlashdata('error') !== null) { ?>
            <br>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
            <br>
        <?php }elseif(session()->getFlashdata('msg')!== null){?>
            <br>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('msg'); ?>
            </div>
            <br>
        <?php }?>

        <div class="card-body">

            <form method="post" action="<?php echo base_url('noticias'); ?>" autocomplete="off" enctype="multipart/form-data" id="formulario_noticia">


                <div class="mb-3 mt-3">
                    <label for="titulo" class="form-label" name="titulo">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="<?=set_value('titulo') ?>">
                </div>
                <div class="mb-4 mt-3">
                    <label for="descripcion" name="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?=set_value('descripcion')?></textarea>
                </div>
                <div class="mb-4 mt-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <!-- Aquí debes llenar las opciones con las categorías de tu base de datos -->
                        <option value="">Selecciona una categoría</option>
                        <?php foreach ($categorias as $categoria) : ?>

                            <option value="<?= $categoria['id'] ?>" <?= set_select('categoria',$categoria['id']); ?>><?= $categoria['nombre'] ?></option>

                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-4 mt-3">
                    <label for="es_activo" class="form-label">Activar noticia</label>
                    <select class="form-control" id="es_activo" name="es_activo" required>
                        <option value="1"  <?= set_select('es_activo', '1'); ?>>Activar</option>
                        <option value="0"  <?= set_select('es_activo', '0'); ?>>Desactivar</option>
                    </select>
                </div>


                <div class="mb-4 mt-3">
                    <label for="estado" class="form-label">Estado de la noticia</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="borrador"  <?= set_select('estado', 'borrador'); ?>>Borrador</option>
                        <option value="validar"   <?= set_select('estado', 'validar'); ?>>Lista para validar</option>
                    </select>
                </div>

                <div class="mb-4 mt-3">
                    <label for="imagen" class="form-label">Imagen (opcional)</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" value="<?=set_value('imagen')?>">
                </div>
                <br>
                <a href="<?php echo base_url('usuario'); ?>" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>



<?php echo $this->endSection(); ?>