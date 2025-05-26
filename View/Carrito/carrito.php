<?php headerTienda($data); ?>

<div class="fondotitulo">
  <h3 class="titulos3">MI CARRITO</h3>
</div>



<div class="container mt-5">
    <h4>Lista de productos</h4>
    <ul class="list-group">
        <?php
        $subtotal = 0; 
        if (!empty($_SESSION['carrito'])):
            foreach ($_SESSION['carrito'] as $producto):
                
                $precio = isset($producto['precio']) ? floatval($producto['precio']) : 0;
                $subtotal += $precio; 
        ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <img src="<?php echo media(); ?>/productos/<?php echo $producto['idproducto']; ?>.webp" class="img-fluid rounded-start w-25" alt="<?php echo $producto['nombre']; ?>">
                    <h5 class="titulos4"><?php echo $producto['nombre']; ?></h5>
                </div>
                <div class="text-end">
                    <span><?php echo moneyFormat($producto['precio']) . "€"; ?></span>

                    <button class="btn btn-sm ms-3 btncuerpo" data-id="<?php echo $producto['idproducto']; ?>" onclick="eliminarProducto(<?php echo $producto['idproducto']; ?>)">
                 <i class="fa-solid fa-trash"></i></button>
                </div>
            </li>
        <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item text-center">No hay productos en el carrito</li>
        <?php endif; ?>
    </ul>

    <!-- Sección de resumen de costos -->
    <div class="row justify-content-end">
        <div class="col-md-4">
            <div class="mt-5 p-3 container">
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Subtotal</span>
                    <span class="fw-bold"><?php echo moneyFormat($subtotal) . " €"; ?></span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <span class="text-success">Gastos de envío</span>
                    <span class="text-success">Gratis</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between">
                    <span class="fw-bold fs-4">Total</span>
                    <span class="fw-bold"><?php echo moneyFormat($subtotal) . " €"; ?></span>
                </div>
                <div class="text-end">
                    <a href="<?php echo base_url(); ?>" class="btn btn-secondary w-25 mt-3">Volver</a>
                    <a href="<?php echo base_url() . '/pago'; ?>" class="btn btn-primary w-50 mt-3 comprar">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</div>




<?php footerTienda($data); ?>
