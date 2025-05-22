<form action="reset_password.php" method="post">
                <fieldset>
                    <h2>Reestablecer contraseña</h2>
                    <div>
                        <label for="usuario">Introduce tu user o email:</label>
                        <input type="text" name="usuario" id="usuario" minlength="4" maxlength="15">
                        <p class="condiciones-input">Mínimo 4 caracteres / Máximo 50</p>
                        <p id="errorReset"></p>
                    </div>

                    <div class="div-enlaces">
                    <a href="index.php?formulario=login">Ya he recordado la contraseña</a>                    
                    <!-- CON ESTE HREF LE VAMOS A INDICAR QUE:
                         dentro de index.php, enviamos esto -> ?formulario=crear-usuario 
                         lo que se va a enviar es -> $_GET['formulario'] = crear-usuario 
                         Entonces lo que nos llevará es a un formulario 'crear-usuario' sin salir del HTML, ni recargar toda la pagina-->
                    <p>No tienes cuenta?<a href="index.php?formulario=crear-usuario">  crear cuenta</a></p>
                    </div>

                    <div class="botones">
                        <button type="submit"> Enviar datos </button>
                        <button type="reset"> Borrar datos </button>
                    </div>


                </fieldset>
            </form>