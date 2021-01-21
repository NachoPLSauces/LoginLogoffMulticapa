<main>
    <div class="title">
        <div class="logo">
            <img src="./webroot/media/img/logo.png" alt="logo">
        </div>

        <div>
            <h2><a href="../proyectoDWES/indexProyectoDWES.php">Proyecto DWES</a></h2>
        </div>				
    </div>

    <form name="login" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Iniciar sesión</h2>
            </div>

            <div>
                <label for='usuario'>Usuario </label>
                <input type='text' id='usuario' name='usuario'/>

                <label for='password' >Contraseña </label>
                <input type='password' id="password" name='password'/>

                <span><?php echo $error; ?></span>

                <input class="enviar" type='submit' name='enviar' value='Iniciar sesión' />
            </div>
        </fieldset>
        
        <div class="crearCuenta">
            <p>¿Eres nuevo?</p>
            <input class="enviar" type='submit' name='crear' value='Crea tu cuenta' />
        </div>
    </form>
</main>