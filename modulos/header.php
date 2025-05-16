    <header>

    <div>
        <h1>Favicolores, tu app de colores</h1>
        <div>
            <?php if (isset($_SESSION['usuario'])) : ?>
            <span>¡Hola <?= $_SESSION['usuario'] ?>!</span>
            <form action="../logout.php" method="post">
                <button id="btnLogout" type="submit"><i class="fa-solid fa-door-open"></i></button>
            </form>
            <?php endif; ?>

            <!-- IF PARA LOS IDIOMAS -->
            <?php
            $rutaIdioma = "modulos/idioma.php";
            if (isset($_SESSION['usuario'])) {
                $rutaIdioma = "../modulos/idioma.php";
            }
            ?>

            <form action="<?= $rutaIdioma ?>" name="form-idioma" method="post">
                <select name="select-idioma" id="select-idioma">
                    <option value="es">ESP</option>
                    <option value="en">ENG</option>
                    <option value="ca">CAT</option>
                </select>
            </form>
        
        </div>
    </div>
 </header>
