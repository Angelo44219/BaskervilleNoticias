<?php echo $this->extend('Layouts/index'); ?>
<?php echo $this->section('titulo'); ?>
Iniciar sesion
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>
<div class="container">

    <div class="contenido" id="contenido">

        <form style="width: 26rem;" method="post" action="<?php echo base_url('iniciar_sesion/autenticar')?>">
            <h2 class="col-sm-12">Iniciar sesion</h2>
            <br><br>
            <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>
            <!-- Name input -->
            <div class="col">
                <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                <div class="input-group">
                    <div class="input-group-text">@</div>
                    <input type="text" class="form-control text-center" name="usuario" id="inlineFormInputGroupUsername" placeholder="Ingrese su usuario" value="<?=set_value('usuario') ?>"/>
                </div>
                <label class="form-label" for="usuario">Usuario</label>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="form4Example2" name="password" class="form-control text-center" placeholder="Ingrese su contraseña" required/>
                <label class="form-label" for="form4Example2">Contraseña</label>
            </div>

            <!-- Submit button -->
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4 border-radius: 0px;">Iniciar sesion</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p><a href="<?php echo base_url(); ?>registro">Crear una nueva cuenta</a></p>
            </div>
        </form>

    </div>

</div>

</div>
<?php echo $this->endSection(); ?>