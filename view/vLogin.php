<header>
    <h1>Login Logoff Multicapa</h1>
</header>
<main>
    <form name="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <fieldset>
            <legend>Inicia sesión aquí</legend>
        <br>
            <div>
                <label for="codUsuario">Nombre de usuario: </label>
                <input type="text" name="codUsuario">
            </div>
        <br>
            <div>
                <label for="password">Contraseña: </label>
                <input type="password" name="password">
            </div>
        <br>
            <div>
                <button type="submit" name="iniciarSesion">Iniciar Sesión</button>
            </div>
        </fieldset>
    </form>
</main>