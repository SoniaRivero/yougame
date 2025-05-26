
<?php

$isLoggedIn = isset($_SESSION['usuario_id']); 
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $data['page_tag']; ?></title>
      <link rel="stylesheet" href="<?php echo assets(); ?>/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?php echo assets(); ?>/css/estilos.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
      <script src="https://kit.fontawesome.com/db63c1f915.js" crossorigin="anonymous"></script>
  </head>
  <body>
  <header>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid colornav">
    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo media(); ?>/logo.png" alt="Logo" style="width: 250px;" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link textonav" href="http://localhost/yougame/Categorias/categorias/consolas">CONSOLAS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle textonav" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            VIDEOJUEGOS
          </a>
          <ul class="dropdown-menu colornav">
            <li><a class="dropdown-item listanav" href="http://localhost/yougame/Categorias/categorias/videojuegos_play5">Playstation 5</a></li>
            <li><a class="dropdown-item listanav" href="http://localhost/yougame/Categorias/categorias/videojuegos_xbox">Xbox</a></li>
            <li><a class="dropdown-item listanav" href="http://localhost/yougame/Categorias/categorias/videojuegos_pc">PC</a></li>
          </ul>
        </li>

      </ul>
      <form class="d-flex" role="search" action="<?php echo base_url(); ?>/buscar" method="GET">
    <input class="form-control me-2" type="search" name="search_query" placeholder="Search" aria-label="Search" required>
    <button class="btn btn-outline-success btnnav" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
</form>


    </div>

    <form class="justify-content-end">
    <a href="<?php echo $isLoggedIn ? base_url() . '/perfil' : base_url() . '/login'; ?>" class="btn btn-sm btn-outline-secondary btnnav" type="button">
        <i class="fa-solid fa-user"></i>
    </a>
    <a href="<?php echo $isLoggedIn ? base_url() . '/carrito' : base_url() . '/login'; ?>" class="btn btn-sm btn-outline-secondary btnnav" type="button">
        <i class="fa-solid fa-cart-shopping"></i>
    </a>
    <a href="<?php echo $isLoggedIn ? base_url() . '/megusta' : base_url() . '/login'; ?>" class="btn btn-sm btn-outline-secondary btnnav" type="button">
        <i class="fa-solid fa-heart"></i>
    </a>
</form>


  </div>
</nav>

</header>
<div class="main-content">