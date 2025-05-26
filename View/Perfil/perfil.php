<?php 

headerTienda($data);

?>

<div class="fondotitulo">
    <h3 class="titulos3">MI PERFIL</h3>
</div>

<h2 class="titulos3"><?php echo $data['usuario']['nombre'] . ' ' . $data['usuario']['apellidos']; ?></h2>

<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <img src="<?php echo media(); ?>/user.jpeg" class="img-fluid rounded-start" alt="...">
            
            <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                <input type="file" name="photo" accept="image/*" required>
                <button type="submit" class="btn cerrarsesion">Añadir Foto</button>
            </form>
        </div>
        <div class="col">
            <h6 class="perfildatos">TELÉFONO</h6>
            <p><?php echo $data['usuario']['telefono']; ?></p>
            <div class="border-top"></div>

            <h6 class="perfildatos">MAIL</h6>
            <p><?php echo $data['usuario']['email']; ?></p>
            <div class="border-top"></div>

            <h6 class="perfildatos">DIRECCIÓN</h6>
            <p><?php echo $data['usuario']['direccion']; ?></p>
        </div>
    </div>
</div>

<div class="text-end">
    <a href="<?php echo base_url(); ?>/login/logout" class="btn cerrarsesion">Cerrar sesión</a>
</div>


<?php 

footerTienda($data);

?>
