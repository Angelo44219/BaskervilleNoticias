<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css'; ?>" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/estilo_pagina.css" type="text/css">
    <link rel="stylesheet" href="<?php echo 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'; ?>">
    <link rel="preconnect" href="<?php echo 'https://fonts.googleapis.com'; ?>" crossorigin="anonymous">
    <link rel="preconnect" href="<?php echo 'https://fonts.gstatic.com'; ?>" crossorigin="anonymous">
    <link href="<?php echo 'https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap'; ?>" rel="stylesheet">
    <title><?php $this->renderSection('titulo'); ?>&nbsp;|&nbsp;Baskerville noticias</title>
</head>

<body>

    <?php echo $this->include('Layouts/header');?>
    <?php echo $this->renderSection('contenido_sitio');?>
    <?php echo $this->include('Layouts/footer');?>
    <?php echo $this->renderSection('js');?>

</body>

</html>