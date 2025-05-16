<form action="login.php" method="post">
                <fieldset>
                    <h1>Iniciar sesion</h1>
                    <div>
                        <label for="usuario">Nombre:</label>
                        <input type="text" name="usuario" id="usuario" minlength="4" maxlength="15">
                        <p class="condiciones-input">Mínimo 4 caracteres / Máximo 15</p>
                        <p id="errorUsuario"></p>
                    </div>
                    <div>
                        <label for="password">Contraseña:</label>
                        <input type="password" name="password" id="password" minlength="4" maxlength="10">
                        <p class="condiciones-input">Mínimo 4 caracteres / Máximo 10</p>
                        <p id="errorPassword"></p>
                    </div>
                    <div class="div-enlaces">
                        <!-- CON ESTE HREF LE VAMOS A INDICAR QUE:
                         dentro de index.php, enviamos esto -> ?formulario=crear-usuario 
                         lo que se va a enviar es -> $_GET['formulario'] = crear-usuario 
                         Entonces lo que nos llevará es a un formulario 'crear-usuario' sin salir del HTML, ni recargar toda la pagina-->
                    <p>No tienes cuenta?<a href="index.php?formulario=crear-usuario">  crear cuenta</a></p>
                    <a href="index.php?formulario=reset">No recuerdo la contraseña</a>
                    </div>

                    <div class="botones">
                        <button type="submit"> Enviar datos </button>
                        <button type="reset"> Borrar datos </button>
                    </div>


                </fieldset>
            </form>