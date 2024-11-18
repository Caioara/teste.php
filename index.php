<!DOCTYPE html>
<html lang="pt/br">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Envio de Emails com PHPMailer</h1>
    <form method="post" action="enviar_email.php">
        <label for="txtDestinatario">Destinatario:</label><br />
        <input type="text" name="textDestinatario" /><br /><br />
        <label for="txtAssunto">Assunto:</label><br />
        <input type="text" name="txtAssunto" /><br /><br />
        <label for="txtMensagem">Mensagem:</label><br />
        <textarea name="txtMensagem"></textarea><br /><br />
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
