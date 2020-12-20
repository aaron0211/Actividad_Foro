<?php
require_once ("header.php");
require_once("../sesion.php");
if (isset($_SESSION['nombre'])) {
    echo "<h2 id='bienvenida'>Bienvenid@ \n";
    echo "<i>".$sesion->get('nombre')."</i>";
    echo ", si estás viendo esto has iniciado sesión correctamente</h2><br/>";
    echo "<p id='parrafo'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque non pretium elit, quis consequat libero. 
Maecenas vel interdum sem. Mauris consectetur, nisl sed elementum viverra, diam lorem laoreet lectus, pharetra commodo 
ipsum tortor sed arcu. Curabitur fermentum purus venenatis magna faucibus, eu lacinia turpis interdum. Donec mollis 
vitae turpis luctus fringilla. Cras feugiat viverra sem a congue. Aliquam tincidunt consectetur quam. Sed ornare porttitor 
diam, at gravida nunc elementum nec. Phasellus ut magna at sem auctor malesuada et vel mauris. Donec sit amet massa ac 
augue faucibus venenatis quis eget mauris. Nullam quis justo feugiat, lobortis risus ut, fringilla nisi. Sed id dignissim 
mauris.<br><br>

Phasellus et sapien blandit, maximus diam et, varius tellus. Aliquam cursus augue vel ante fringilla congue. Maecenas 
scelerisque arcu id erat porttitor porttitor. Suspendisse magna sem, consequat at diam rutrum, porta cursus risus. 
Pellentesque varius ante in congue lobortis. Quisque varius vulputate leo nec vehicula. Duis sodales dapibus est eget 
ultrices. Donec facilisis erat est, a pulvinar urna mattis quis. Curabitur non hendrerit sapien. Phasellus placerat nulla 
arcu, at convallis urna auctor vitae. Maecenas condimentum bibendum libero. Curabitur at arcu lectus. Donec euismod, turpis 
vel tempus eleifend, sapien quam sagittis massa, non consectetur nisl quam at mi.<br><br>

Pellentesque aliquam eleifend tellus vel faucibus. Praesent rhoncus luctus bibendum. Integer lorem augue, imperdiet ac 
dictum ut, volutpat ac mauris. Suspendisse sed dignissim odio. In id rhoncus diam. Phasellus tincidunt et odio sit amet 
facilisis. Ut eget blandit est, sed tincidunt dolor. Curabitur molestie mauris non tortor tempor viverra vel et arcu. 
Aenean a augue ut tortor suscipit dictum sed id quam. Pellentesque consequat, sem in lobortis aliquet, nunc lacus venenatis 
turpis, scelerisque fringilla magna sapien ultricies nulla. Nullam at nisl eros. Nunc consectetur ut tellus eget convallis. 
Pellentesque ut mi lobortis, vestibulum augue ut, posuere metus. Phasellus quis.</p><br/>";
    if (isset($_POST['cerrar'])) {
        $sesion->borrarSesion();
    }
    ?><br/>
    <form method="post">
        <input id="cerrar" type="submit" value="Cerrar sesión" name="cerrar">
    </form><?php
}
else {
    echo "Debes iniciar sesión para poder continuar<br/>";
    echo "<p id='link'><a href='../index.php'>Volver a pantalla de inicio de sesión</a></p>";
}
require_once ("footer.php");
?>