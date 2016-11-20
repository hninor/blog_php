<?php require 'header.php'; ?>

<div class="contenedor">
    <div class="post">
        <article>
            <h2 class="titulo">Iniciar Sesión</h2>
            <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="password" name="password" placeholder="Contraseña">
                <input type="submit" value="Iniciar Sesión">
                <?php if (!empty($errores)): ?>
                    <div class="error">
                        <ul>
                            <?php echo $errores; ?>
                        </ul>
                    </div>
                <?php endif ?>
            </form>
            <br>
            <p class="texto-registrate">
                ¿No tienes cuenta?
                <br>
                <a href="registrate.php">Registrate</a>
            </p>

        </article>
    </div>

</div>

<?php require 'footer.php'; ?>