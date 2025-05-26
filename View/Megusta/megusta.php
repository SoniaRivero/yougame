<?php 

  headerTienda($data);

 ?>

<div class="fondotitulo">
  
<h3 class="titulos3">ME GUSTA</h3>

</div>

<div class="container mt-5">
  
  <ul class="list-group">

   <?php if (!empty($_SESSION['megusta'])):
            foreach ($_SESSION['megusta'] as $producto): ?>
   <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <img src="<?php echo media(); ?>/productos/<?php echo $producto['idproducto']; ?>.webp" class="img-fluid rounded-start w-25" alt="<?php echo $producto['nombre']; ?>">
                    <h5 class="titulos4"><?php echo $producto['nombre']; ?></h5>
                </div>
                <div class="text-end">
                    <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> <i class="fa-solid fa-cart-shopping"></i></a>

                    <button class="btn btn-sm ms-3 btncuerpo" data-id="<?php echo $producto['idproducto']; ?>" onclick="eliminarProductomg(<?php echo $producto['idproducto']; ?>)">
                 <i class="fa-solid fa-trash"></i></button>
                </div>
            </li>


<?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item text-center">No hay productos guardados</li>
        <?php endif; ?>
    
  </ul>
</div>



<div class="row justify-content-end">
<div class="col-md-4">
  <div class="mt-5 p-3 container">
    <div class="text-end"><a href="<?php echo base_url(); ?>" class="btn btn-secondary w-25 mt-3">Volver</a>
    </div>
  </div>
</div>
</div>



<?php 

  footerTienda($data);

 ?>