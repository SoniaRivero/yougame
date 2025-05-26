<?php 
headerTienda($data); 
carrouselTienda($data); 
?>

<h2 class="titulos">CONSOLAS</h2>
<div class="margen row row-cols-1 row-cols-md-4 g-3">
    <?php foreach ($data['productosPorCategoria']['consolas'] as $producto): ?>
        <div class="col">
            <div class="card">
                <a href="<?php echo base_url() . '/producto/producto/' . $producto['idproducto']; ?>">
                <img src="<?php echo media() . '/productos/' . $producto['idproducto'] . '.webp'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </a>
                <div class="card-body">
                    <h6 class="card-title"><?php echo $producto['nombre']; ?></h6>
                    <h3><?php echo $producto['precio']; ?>€

                        <?php if (isset($_SESSION['usuario_id'])): ?>

                       <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> <i class="fa-solid fa-cart-shopping"></i></a>


                      <a href="<?php echo base_url(); ?>/megusta/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"><i class="fa-solid fa-heart"></i></a>

                      <?php endif; ?>



                    </h3>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="col vertodo">
        <a class="btn btn-primary btnvertodo" href="<?php echo base_url(); ?>/Categorias/categorias/consolas" role="button">Ver todo -></a>
    </div>
</div>

<div class="border-top"></div>

<h2 class="titulos">VIDEOJUEGOS</h2>
<h4 class="titulos2">Playstation 5</h4>
<div class="margen row row-cols-1 row-cols-md-4 g-3">
    <?php foreach ($data['productosPorCategoria']['videojuegos_play5'] as $producto): ?>
        <div class="col">
            <div class="card">
                <a href="<?php echo base_url() . '/producto/producto/' . $producto['idproducto']; ?>">
                <img src="<?php echo media() . '/productos/' . $producto['idproducto'] . '.webp'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </a>
                <div class="card-body">
                    <h6 class="card-title"><?php echo $producto['nombre']; ?></h6>
                    <h3><?php echo $producto['precio']; ?>€



                         <?php if (isset($_SESSION['usuario_id'])): ?>

                       <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> <i class="fa-solid fa-cart-shopping"></i></a>


                      <a href="<?php echo base_url(); ?>/megusta/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"><i class="fa-solid fa-heart"></i></a>

                      <?php endif; ?>

                    </h3>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="col vertodo">
        <a class="btn btn-primary btnvertodo" href="<?php echo base_url(); ?>/Categorias/categorias/videojuegos_play5" role="button">Ver todo -></a>
    </div>
</div>

<div class="border-top"></div>

<h4 class="titulos2">Xbox</h4>
<div class="margen row row-cols-1 row-cols-md-4 g-3">
    <?php foreach ($data['productosPorCategoria']['videojuegos_xbox'] as $producto): ?>
        <div class="col">
            <div class="card">
                <a href="<?php echo base_url() . '/producto/producto/' . $producto['idproducto']; ?>">
                <img src="<?php echo media() . '/productos/' . $producto['idproducto'] . '.webp'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </a>
                <div class="card-body">
                    <h6 class="card-title"><?php echo $producto['nombre']; ?></h6>
                    <h3><?php echo $producto['precio']; ?>€



                         <?php if (isset($_SESSION['usuario_id'])): ?>

                       <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> <i class="fa-solid fa-cart-shopping"></i></a>


                      <a href="<?php echo base_url(); ?>/megusta/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"><i class="fa-solid fa-heart"></i></a>

                      <?php endif; ?>
                      
                    </h3>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="col vertodo">
        <a class="btn btn-primary btnvertodo" href="<?php echo base_url(); ?>/Categorias/categorias/videojuegos_xbox" role="button">Ver todo -></a>
    </div>
</div>

<div class="border-top"></div>

<h4 class="titulos2">PC</h4>
<div class="margen row row-cols-1 row-cols-md-4 g-3">
    <?php foreach ($data['productosPorCategoria']['videojuegos_pc'] as $producto): ?>
        <div class="col">
            <div class="card">
                <a href="<?php echo base_url() . '/producto/producto/' . $producto['idproducto']; ?>">
                <img src="<?php echo media() . '/productos/' . $producto['idproducto'] . '.webp'; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($producto['nombre']); ?>">
            </a>
                <div class="card-body">
                    <h6 class="card-title"><?php echo $producto['nombre']; ?></h6>
                    <h3><?php echo $producto['precio']; ?>€



                        <?php if (isset($_SESSION['usuario_id'])): ?>

                       <a href="<?php echo base_url(); ?>/carrito/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"> <i class="fa-solid fa-cart-shopping"></i></a>


                      <a href="<?php echo base_url(); ?>/megusta/addProducto/<?php echo $producto['idproducto']; ?>" class="btn btn-sm btn-outline-secondary btncuerpo"><i class="fa-solid fa-heart"></i></a>

                      <?php endif; ?>

                      
                    </h3>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="col vertodo">
        <a class="btn btn-primary btnvertodo" href="<?php echo base_url(); ?>/Categorias/categorias/videojuegos_pc" role="button">Ver todo -></a>
    </div>
</div>

<?php 
footerTienda($data); 
?>

