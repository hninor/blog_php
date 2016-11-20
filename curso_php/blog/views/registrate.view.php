<?php require 'header.php'; ?>

    <div class="contenedor">
          <div class="post">

                    <h2 class="titulo">Registrate</h2>
                    <hr>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulario-registro" name="login">
                        <div class="form-group">
                            <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
                        </div>
                        <br>
                        <div class="form-group">
                            <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
                        </div>
                        <br>
                        <div class="form-group">
                            <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir Contraseña">
                            <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
                        </div>

                        <?php if (!empty($errores)): ?>
                            <div class="error">
                                <ul>
                                    <?php echo $errores; ?>
                                </ul>
                            </div>
                        <?php endif ?>

                    </form>

                    <p class="texto-registrate">
                        ¿Ya tienes cuenta?
                        <br>
                        <a href="login.php">Iniciar sesión</a>
                    </p>

        </div>
    </div>

<?php require 'footer.php'; ?>