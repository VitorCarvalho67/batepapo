<?php
session_start();

include_once('config.php');

if(isset($_POST['submit']) && !empty($_POST['text'])){
    $texto = $_POST['text'];
    $sql = "INSERT INTO batepapo (mensagem) VALUES ('$texto')";

    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bate papo</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="cubo-box">
        <div class="cubo">
        <div class="face1" id="face"></div>
        <div class="face2" id="face"></div>
        <div class="face3" id="face"></div>
        <div class="face4" id="face"></div>
        <div class="face5" id="face"></div>
        <div class="face6" id="face"></div>
        </div>
    </div>
    
    <div class="conteudo">
        <main class="mensagem">

        </main>
        <form action="" method="POST">
            <input type="text" id="text" name="text">
            <input type="submit" value="enviar" name="submit" id="submit">
        </form>
    </div>

</body>
<script src="script/script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="jquery-3.6.1.min.js"></script>
<script>
$(document).ready(function() {
    $.ajax({
        url: './mensagem.php',
        method: 'post',
        data: 'text=',
        success:function(e) {
            $('.mensagem').html(e);
            addMessage();
        }
    });
});

function addMessage() {
    const messagesDiv = document.querySelector('.mensagem');
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}
</script>
</html>