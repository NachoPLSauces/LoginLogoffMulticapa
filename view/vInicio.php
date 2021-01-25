<main>
    <form name="inicio" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Bienvenido <?php echo $descripcionUsuario; ?>
                </h2>
            </div>

            <div>
                <p>
                    <?php if($numConexiones == 1){
                        echo 'Es tu primera conexión';
                    } 
                    else{ 
                        echo "Número de conexiones: ".$numConexiones;
                    } ?>
                </p>
                <?php if(!empty($_SESSION['fechaHoraUltimaConexionAnterior'])){?>
                
                <p>Última conexión: <?php echo date("d-m-Y H:i:s", $_SESSION['fechaHoraUltimaConexionAnterior']); ?></p>
                <?php } ?>
            </div>

            <div>
                <input class="enviar" type="submit" name="editar" value="Editar cuenta"/>
                <input class="enviar" type="submit" name="borrar" value="Borrar cuenta"/>
                <input class="enviar" type="submit" name="salir" value="Salir"/>
            </div>
        </fieldset>
    </form>
</main>