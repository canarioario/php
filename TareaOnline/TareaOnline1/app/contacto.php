<?php require 'includes/header.php';  // require_ once para incluilo una sola vez?>
<?php echo $variable;?>
<p>Contacta con nosotros.</p>
<form>
<input type="text" name="nombre" />
<input type="email" name="email" />
<input type="submit" name="enviar" />
</form>
<?php require 'includes/footer.php'; ?>