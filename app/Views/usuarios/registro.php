<?php echo $this->extend('Layouts/index'); ?>
<?php echo $this->section('titulo'); ?>
Registrarse
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>
<div class="container">

    <div class="contenido" id="contenido">
        <form action="<?= base_url('registro/crear'); ?>" method="post">
            <h2 class="col-sm-12">Registrarse</h2>
            <br><br>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <?php if (isset($validation)) {
                echo "<div class='alert alert-danger'>" . $validation->listErrors() . "</div>";
            }
            ?>
            <br><br>
            <div class="row mb-4">
                <div class="col">
                    <label class="visually-hidden" for="inlineFormInputGroupUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-text">@</div>
                        <input type="text" class="form-control text-center" name="usuario" id="inlineFormInputGroupUsername" placeholder="Ingrese un nombre de usuario" value="<?= set_value('usuario') ?>" />
                    </div>
                    <label class=" form-label" for="usuario">Usuario</label>
                </div>
                <div class="col">
                    <div data-mdb-input-init class="form-outline">
                        <input type="text" name="nombre_completo" id="nombre_completo" class="form-control text-center" placeholder="Ingrese su nombre y apellido" value="<?= set_value('nombre_completo') ?>" />
                        <label class=" form-label" for="nombre_completo">Nombre completo</label>
                    </div>
                </div>
            </div>

            <!-- Email input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control text-center" placeholder="Ingrese su correo electronico" value="<?= set_value('email') ?>" />
                <label class=" form-label" for="email">Correo electronico</label>
            </div>

            <!--Rol input-->
            <div class="form-outline mb-4 text-center">
                <select class="form-select text-center" id="rol" name="rol" aria-label="Floating label select example">
                    <option value="Editor">Editor</option>
                    <option value="Validador">Validador</option>
                    <option value="ambos">Ambos</option>
                </select>
                <label for="floatingSelect">Seleccione su rol</label>
            </div>

            <!-- Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="password" id="password" class="form-control text-center" placeholder="Ingrese una contraseña" value="<?= set_value('password') ?>" />
                <label class=" form-label text-left" for="password">Contraseña</label>
            </div>

            <!-- Confirmar Password input -->
            <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" name="c_password" id="c_password" class="form-control text-center" placeholder="Repita la contraseña" />
                <label class="form-label" for="c_password">Confirme su contraseña</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" name="condiciones" value="" id="condiciones" required />
                <label class="form-check-label" for="condiciones">
                    Aceptar terminos y condiciones
                </label>
            </div>

            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Crear cuenta</button>

            <br><br>
            <!-- Register buttons -->
            <div class="text-center">
                <p><a href="<?php echo base_url(); ?>iniciar_sesion">Ya tengo una cuenta existente</a></p>
            </div>
        </form>

    </div>

</div>
<?php echo $this->endSection(); ?>