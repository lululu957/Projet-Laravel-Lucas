<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bienvenue sur la plateforme</title>
</head>
<body>
<h2>Bonjour {{ $student->first_name }} {{ $student->last_name }},</h2>
<p>Bienvenue sur la plateforme.</p>
<p>Voici votre mot de passe temporaire : <strong>{{ $password }}</strong></p>
<p>Pensez à le changer dès votre première connexion.</p>
<p>Envoyé à : {{ $student->email }}</p>
<p>À bientôt !</p>
</body>
</html>

