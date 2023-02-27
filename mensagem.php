<?php
session_start();

include_once('config.php');

$mensagem = "SELECT * FROM batepapo";
$resultado = mysqli_query($conn, $mensagem);
?>

<div class="texto">
    <?php while($var = mysqli_fetch_assoc($resultado)){?>
        <p><?php echo $var['mensagem'];?></p>
    <?php } ?>
</div>
