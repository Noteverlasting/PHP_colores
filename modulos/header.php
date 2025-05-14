    <header>
            <div class="nombreUser">
            <p>
                Hola <span><?= $_SESSION['usuario'] ?></span> ! Qué tal?
            </p>
        </div>
        <div><h1>Nuestros colores preferidos</h1></div>
        <?php 
        if ($_SESSION['usuario']) : ?>
        <form action="../logout.php" method="post">
            <button type="submit" class="btnLogout"> Cerrar sesion
                <i class="fa-solid fa-door-open" style="color: red;"></i>
            </button>
        </form>
        <?php else : ?>
        <form action="acceder.php" method="post">
            <button type="submit"> Acceder</button>
        </form>
        <?php endif ?>
    </header>

<!-- AÑADIMOS LOS ESTILOS QUE TENEMOS EN style.css PARA QUE SEAN UNIVERSALES CUANDO SE USE ESTE HEADER -->
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

h1 {
    text-align: center;
    padding: 2rem 0;
}

header {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    max-width: 100%;
    padding: 1rem 2rem;

}

.nombreUser {
    width: 100%;
    display: flex;
    justify-content: end;

    span {
        font-weight: 700;
        color: rgb(109, 1, 77);
    }
}

header button {
    background-color: transparent;
    border: 1px dotted red;
    color: red;
    font-size: 1.2rem;
    cursor: pointer;
}
    </style>