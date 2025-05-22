<form name="formInsert">
                <fieldset>
                    <h2>Indícanos tu color preferido</h2>
                    <!-- SEGURIDAD PHP --AÑADIDOS -->
                    <!-- SEGURIDAD PHP -- Mandamos Token de sesión e idUsuario -->
                    <input type="hidden" name="sessionToken" value="<?= $_SESSION ['sessionToken']?>">
                    <input type="hidden" name="idUsuario" value="<?= $_SESSION['idUsuario']?>">
                    <!-- SEGURIDAD PHP -- HoneyPot -->
                    <input type="text" name="web" style="display:none">

                    <div>
                        <label for="usuario">Tu nombre:</label>
                        <input type="text" name="usuario" id="usuario">
                        <p id="errorUsuario"></p>

                    </div>
                    <div>
                        <label for="color">Tu color:</label>
                        <!-- ESTE CODIGO ES PARA HACERLO CON LA RESOLUCION DE FERRAN, CON UN ARRAY DE COLORES -->
                        <input type="text" name="color" id="color">
                        <p id="errorColor"></p>


                    </div>
                    <div class="botoncitos">
                        <button type="submit" class="enviar">ENVIAR</button>
                        <button type="reset" class="reset">RESET</button>
                    </div>

                </fieldset>
            </form>