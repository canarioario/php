<?php /* Ejercicio 25. Implemente un formulario HTML con los siguientes campos:
- Nombre
- Apellidos
- Biografía
- Email
- Contraseña
- Imagen
*/ ?>
<?php require_once 'includes/header.php'; ?>
<h2>Crear usuarios</h2>
<form action="ej25.php" method="post" autocomplete="off" enctype"multipart/form-data">
        <p>Nombre: <input type="text" id="nombre" name="nombre"></p>
        <p>Apellidos: <input type="text" id="apellidos" name="apellidos"></p>
        <p>Biografia:<textarea name="bio" /> </textarea></p>
        <p>Email: <input type="email" id="email" name="email"></p>
        <p>Numero: <input type="file" id="image" name="image"></p>
        <p>Password: <input type="password" id="password" name="password"></p>
        <input type="submit">

    </form>
    <?php require_once 'includes/footer.php'; ?>