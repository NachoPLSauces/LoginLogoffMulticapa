<main>
    <form name="editar" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Editar perfil</h2>
            </div>

            <div>
                <label for='usuario'>Usuario </label><br>
                <input class="readonly" type='text' id='usuario' name='usuario' value="<?php echo $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getCodUsuario(); ?>" readonly/>

                <label for='descripcion' >Descripción </label><br>
                <span style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["descripcion"] != null){
                        echo $aErrores['descripcion'];
                    }
                    ?> 
                </span>
                <input type='text' id="descripcion" name='descripcion' value="<?php echo $_SESSION['usuarioDAW202LoginLogoffMulticapa']->getDescUsuario(); ?>"/>
            </div>

            <div>
                <input class="enviar" type="submit" name="editar" value="Aceptar"/>
                <input class="enviar" type="submit" name="cancelar" value="Cancelar"/>
            </div>
        </fieldset>
    </form>
</main>