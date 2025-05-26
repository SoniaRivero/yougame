<?php 
headerTienda($data); 

carrouselTienda($data); 


?>

<h2 class="titulos"><?php echo $data['page_title']; ?></h2>

<div class="row row-cols-1 row-cols-md-4 g-3">
    <?php if (!empty($data['productos'])): ?>
        <?php foreach ($data['productos'] as $producto): ?>
            <div class="col espaciadoproductos">
                <div class="card">
                  <a href="<?php echo base_url() . '/producto/producto/' . $producto['idproducto']; ?>">
                    <img src="<?php echo media(); ?>/productos/<?php echo $producto['idproducto']; ?>.webp" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
                  </a>
                    <div class="card-body">
                        <h6 class="card-title"><?php echo htmlspecialchars($producto['nombre']); ?></h6>
                        <h3><?php echo htmlspecialchars($producto['precio']); ?>€

                            <?php if (isset($_SESSION['usuario_id'])): ?>
                            <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> <i class="fa-solid fa-cart-shopping"></i></a>


                      <a href="<?php echo base_url(); ?>/megusta/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"><i class="fa-solid fa-heart"></i></a>

                      <?php endif; ?>
                        </h3>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay categoría seleccionada.</p>
    <?php endif; ?>
</div>

<?php 
footerTienda($data); 
?>
