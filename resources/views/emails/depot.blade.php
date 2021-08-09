<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="background: #e5e5e5; padding: 30px;" >

<div style="max-width: 320px; margin: 0 auto; padding: 20px; background: #fff;">
	<h3>Gestion de stage </h3>
	<p>
		Bonjour,  {{ $responsable->nom }}  {{ $responsable->prenom }}<br>
		Nous venons vous faire part que l'étudiant {{ $user->name  }} a fait un dépôt de stage.
	</p>
</div>

</body>
</html>