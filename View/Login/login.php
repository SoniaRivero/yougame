<?php 
  headerTienda($data);
?>

<div class="container loginresena">
    <div class="row">

        <div class="col-md-6 form-container border-end">
            <h2 class="titulos">Registro</h2>
            <form id="register" name="register" method="post">
                <input type="hidden" name="register" value="1"> 
                <div class="mb-3">
                    <label for="txtNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="txtNombre" name="txtNombre" required>
                </div>
                <div class="mb-3">
                    <label for="txtApellido" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="txtApellido" name="txtApellido" required>
                </div>
                <div class="mb-3">
                    <label for="txtTelf" class="form-label">Teléfono</label>
                    <input type="number" class="form-control" id="txtTelf" name="txtTelf" required> 
                </div>
                <div class="mb-3">
                    <label for="txtCorreo" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required>
                </div>
                <div class="mb-3">
                    <label for="txtDireccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" required>
                </div>
                <div class="mb-3">
                    <label for="txtPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" required>
                </div>
                <button id="btnForm" type="submit" class="btn cerrarsesion w-100">Registrarse</button>
            </form>
        </div>

        <div class="col-md-6 form-container">
            <h2 class="titulos">Iniciar Sesión</h2>
            <form id="login" name="login" method="post">
                <input type="hidden" name="login" value="1"> 
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="loginEmail" name="loginEmail" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                </div>
                <button type="submit" class="btn cerrarsesion w-100">Iniciar Sesión</button>
            </form>
        </div>

    </div>
</div>

<?php 
  footerTienda($data);
?>
