<main>
    <form name="borrar" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Borrar cuenta</h2>
            </div>

            <div class="borrarCuenta">
                <p>¿Quieres borrar tu cuenta?</p>

                <input class="enviar" type='submit' name='borrar' value='BORRAR' />
                <input class="enviar" type='submit' name='cancelar' value='CANCELAR' />
            </div>
        </fieldset>
    </form>
</main>