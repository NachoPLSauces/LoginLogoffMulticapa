<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Raúl Núñez Sebastián">
        <link rel="stylesheet" href="webroot/css/estilos.css">
    </head>
    <body>
        <header>
            <div class="title">
                <div class="logo">
                    <img src="../webroot/media/img/logo.png" alt="logo">
                </div>

                <div>
                    <h2><a href="../index.html">Proyecto DAW2</a></h2>
                </div>				
            </div>

            <div class="navegador">
                    <nav>
                            <div>
                                    <a href="#">DAW</a>
                            </div>

                            <div>
                                    <a href="#">DWES</a>
                            </div>

                            <div>
                                    <a href="#">DWEC</a>
                            </div>

                            <div>
                                    <a href="#">DIW</a>
                            </div>
                    </nav>
            </div>
        </header>
        <?php
            require_once $vista;
        ?>
        <footer>
            <div class="enlaces">
                <a href="https://github.com/NachoPLSauces" target="_blank"><img src="../webroot/media/img/github-icon.png" alt="github"></a>
                <a href="http://daw202.ieslossauces.es/" target="_blank"><img src="../webroot/media/img/1and1-icon.png" alt="1n1"></a>
            </div>
            <div class="nombre">
                <h3>Nacho del Prado Losada</h3>
                <h3>ignacio.pralos@educa.jcyl.es</h3>
            </div>
        </footer>
    </body>
</html>

