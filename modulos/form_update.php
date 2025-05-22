<form action="update.php" method="post" id="form_update">
                <fieldset>
                    <h2>Modifica tus datos</h2>
                    <!-- VAMOS A AÑADIR UN INPUT OCULTO QUE NOS DARÁ EL idColor (aqui llamado id) PARA USARLO EN EL UPDATE -->
                    <input type="text" name="id" id="id" value="<?=$_GET['id']?>" hidden>
                    <div>
                        <label for="usuario">Tu nombre:</label>
                        <input type="text" name="usuario" id="usuario" value="<?=$_GET['usuario']?>">

                    </div>
                    <div>
                        <label for="color">Tu color:</label>
                        <!-- ESTE CODIGO ES PARA HACERLO CON LA RESOLUCION DE FERRAN, CON UN ARRAY DE COLORES -->
                        <input type="text" name="color" id="color" value="<?=$colorTraducido?>">


                        <!-- <select name="color" id="color">
                        <option value="yellow" style="background-color: yellow;">Amarillo</option>
                        <option value="lightskyblue" style="background-color: lightskyblue;">Azul Claro</option>   
                        <option value="blue" style="background-color: blue; color: white;">Azul Oscuro</option>
                        <option value="white">Blanco</option>
                        <option value="gray" style="background-color: gray;">Gris</option>
                        <option value="black" style="background-color: black; color: white;">Negro</option>
                        <option value="red" style="background-color: red; color: white;">Rojo</option>
                        <option value="pink" style="background-color: pink; ">Rosa</option>
                        <option value="greenyellow" style="background-color: greenyellow;">Verde Claro</option>
                        <option value="green" style="background-color: green; color: white;">Verde Oscuro</option>
                        <option value="purple" style="background-color: purple; color: white;">Violeta</option>
                        </select> -->
                    </div>
                    <div class="botoncitos">
                        <button type="submit" class="enviar">ENVIAR</button>
                        <button type="reset" class="reset"><a href="indexcopy.php">CANCELAR</a></button>
                    </div>

                </fieldset>
            </form>
