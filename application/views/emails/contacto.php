<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Shazam Comics</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div style="border: 1px solid #eaeaea;background: #fbfbfb;display: inline-block;height: auto;padding: 20px;width: 80%;">

	<div style="width: 100%;">

	<p style="margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 18px;">
	  <b>FORMULARIO DE CONTACTO CON FECHA <?= $fecha;?></b><br />
	</p>
	<p style="margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;">
		<b>Datos del Formulario</b><br>

		<span style="font-size: 14px;">Nombre: <?= $nombre; ?></span><br>
        <span style="font-size: 14px;">Email: <?= $email; ?></span><br>
        <span style="font-size: 14px;">Fono: <?= $fono; ?></span><br>
        <span style="font-size: 14px;">Mensaje: <?= $comentario; ?></span><br>

		Saludos!<br>
		Equipo Shazam Comics
	</p>
	</div>
</div>
</body>
</html>