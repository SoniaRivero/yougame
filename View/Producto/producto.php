
<?php 
headerTienda($data); 

?>

<?php if ($data['producto']): ?>
<div class="row row-cols-1 row-cols-md-2 g-3">
    <div class="col-2 espaciadoproductos">
        <img src="<?php echo media(); ?>/productos/<?php echo $data['producto']['idproducto']; ?>.webp" class="card-img-top" alt="<?php echo htmlspecialchars($data['producto']['nombre']); ?>">
    </div>

    <div class="col espaciadoproductos">
        <h3 class="tituloprod"><?php echo htmlspecialchars($data['producto']['nombre']); ?></h3>
        <div><h8>Plataforma: <?php echo htmlspecialchars($data['producto']['plataforma']); ?></h8></div>
        <div><h8>Lanzamiento: 2024</h8></div>

        <div class="border-top espaciobordes"></div>

        <div class="preciosproductos">
            <h3><?php echo htmlspecialchars($data['producto']['precio']); ?>€ 

                <?php if (isset($_SESSION['usuario_id'])): ?>
         <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $data['producto']['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> 
        <i class="fa-solid fa-cart-shopping"></i>
         </a>
         <a href="<?php echo base_url(); ?>/megusta/addProducto/<?php echo $data['producto']['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo">
        <i class="fa-solid fa-heart"></i>
        </a>
<?php endif; ?>
            </h3>
        </div>
        <div class="border-top espaciobordes"></div>

        <p class="espaciobordes"><?php echo nl2br(htmlspecialchars($data['producto']['descripcion'])); ?></p>

    </div>
</div>

<div class="border-top"></div>

<h3 class="tituloprod">RESEÑAS</h3>

<?php if (isset($data['producto']['resena']) && is_array($data['producto']['resena']) && !empty($data['producto']['resena'])): ?>
    
    <?php foreach ($data['producto']['resena'] as $reseña): ?>
        <p><?php echo htmlspecialchars($reseña); ?></p>
    <?php endforeach; ?>
<?php else: ?>
    <p>No hay reseñas para este producto.</p>
<?php endif; ?>

<?php if (isset($_SESSION['usuario_id'])): ?>
<h4>Añadir una Reseña</h4>
<form class="loginresena" action="<?php echo base_url(); ?>/producto/añadirResena" method="POST">
    <input type="hidden" name="idproducto" value="<?php echo $data['producto']['idproducto']; ?>">
    <div class="mb-3">
        <label for="contenido" class="form-label">Reseña</label>
        <textarea name="contenido" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Reseña</button>
</form>
<?php else: ?>
    <p>Debes <a href="<?php echo base_url(); ?>/login">iniciar sesión</a> para añadir una reseña.</p>
<?php endif; ?>

<?php else: ?>
    <p>Producto no encontrado.</p>
<?php endif; ?>


<?php footerTienda($data); ?>