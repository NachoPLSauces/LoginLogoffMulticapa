<main>
    <form name="inicio" action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <fieldset>
            <div>
                <h2>Bienvenido <?php echo $descripcionUsuario; ?>
                </h2>
            </div>

            <div>
                <p>Número de conexiones: <?php echo $numConexiones; ?></p>
                <?php if(!empty($_SESSION['fechaHoraUltimaConexionAnterior'])){?>
                <p>Última conexión: <?php echo date("d-m-Y H:i:s", $_SESSION['fechaHoraUltimaConexionAnterior']); ?></p>
                <?php } ?>
            </div>

            <div>
                <input class="enviar" type="submit" name="salir" value="Salir"/>
            </div>
        </fieldset>
    </form>
</main>
