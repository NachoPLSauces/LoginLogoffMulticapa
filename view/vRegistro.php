<main>
    <div class="title">
        <div class="logo">
            <img src="./webroot/media/img/logo.png" alt="logo">
        </div>

        <div>
            <h2><a href="../../proyectoDWES/indexProyectoDWES.php">Proyecto DWES</a></h2>
        </div>				
    </div>

    <form name="registro" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Crear cuenta</h2>
            </div>

            <div>
                <label for='usuario'>Usuario </label><br>
                <span style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["usuario"] != null){
                        echo $aErrores['usuario'];
                    }
                    ?> 
                </span>

                <input type='text' id='usuario' name='usuario' value="<?php 
                    //Devuelve el campo nombre si se había introducido correctamente
                    if(isset($_REQUEST['usuario']) && $aErrores["usuario"] == null){
                        echo $_REQUEST['usuario'];
                    }
                ?>"/>

                <label for='descripcion' >Descripción </label><br>
                <span style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["descripcion"] != null){
                        echo $aErrores['descripcion'];
                    }
                    ?> 
                </span>

                <input type='text' id="descripcion" name='descripcion' value="<?php 
                    //Devuelve el campo nombre si se había introducido correctamente
                    if(isset($_REQUEST['descripcion']) && $aErrores["descripcion"] == null){
                        echo $_REQUEST['descripcion'];
                    }
                ?>"/>

                <label for='password' >Contraseña </label><br>
                <span style="color:red">
                    <?php
                    //Imprime el error en el caso de que se introduzca mal el nombre
                    if($aErrores["password"] != null){
                        echo $aErrores['password'];
                    }
                    ?> 
                </span>

                <input type='password' id="password" name='password' value="<?php 
                    //Devuelve el campo nombre si se había introducido correctamente
                    if(isset($_REQUEST['password']) && $aErrores["password"] == null){
                        echo $_REQUEST['password'];
                    }
                ?>"/>

                <input class="enviar" type='submit' name='enviar' value='Crear cuenta' />

                <input class="enviar" type='submit' name='cancelar' value='Cancelar' />
            </div>
        </fieldset>
    </form>
</main>