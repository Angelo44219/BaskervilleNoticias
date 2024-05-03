<?php echo $this->extend('Layouts/principal'); ?>
<?php echo $this->section('titulo'); ?>
Iniciar sesion
<?php echo $this->endSection(); ?>
<?php echo $this->section('contenido_sitio'); ?>
<div class="container">
    <div class="contenido" id="contenido">
        <form id="loginForm">
            <label for="username">Nombre de usuario:</label><br>
            <input type="text" id="username" name="username"><br>
            <div id="usernameError" class="error"></div>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password"><br>
            <div id="passwordError" class="error"></div>
            <input type="submit" value="Iniciar sesión">
        </form>
    </div>
</div>
<?php echo $this->endSection(); ?>