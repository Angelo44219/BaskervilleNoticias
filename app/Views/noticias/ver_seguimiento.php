<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'; ?>" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo_pagina.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'; ?>">
    <link rel="preconnect" href="<?php echo 'https://fonts.googleapis.com'; ?>" crossorigin="anonymous">
    <link rel="preconnect" href="<?php echo 'https://fonts.gstatic.com'; ?>" crossorigin="anonymous">
    <link href="<?php echo 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap'; ?>" rel="stylesheet">
    <title><?php $this->renderSection('titulo');?>Seguimiento &nbsp;|&nbsp;Baskerville noticias</title>
</head>

<body>
    <div class="container">
        <h1 class="mt-2 mb-4">Seguimiento</h1>

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
                        <th scope="col">Ultima modificacion</th>
                        <th scope="col">Activo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Modificado por</th>
                        <th scope="col">Tipo modificacion</th>
                        <th scope="col">Revertido</th>
                    </tr>
                </thead>
                <tbody>
                    <? $this->renderSection('contenido_seguimiento'); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>