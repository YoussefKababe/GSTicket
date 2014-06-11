<!doctype html>
<html lang="en" style="margin: 0;padding: 0;">
<head style="margin: 0;padding: 0;">
	<meta charset="UTF-8" style="margin: 0;padding: 0;">
	<title style="margin: 0;padding: 0;">GSTicket</title>
	<style style="margin: 0;padding: 0;">
		* {
			margin: 0;
			padding: 0;
		}

		body {
			background-color: #19AAD7;
			font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
		}

		.wrap {
			width: 450px;
			position: absolute;
			top: 100px;
			left: 50%;
			margin-left: -225px;
		}

		.panel {
			border: 1px solid #ddd;
			background-color: #fff;
			box-shadow: 0 0 200px rgba(255,255,255,0.5), 0 1px 2px rgba(0,0,0,0.3);
		}

		.panel:before {
			content: '';
			position: absolute;
			top: -8px;
			right: -8px;
			bottom: -8px;
			left: -8px;
			background: rgba(0, 0, 0, 0.08);
			z-index: -1;
		}

		.panel-heading {
			background-color: #f5f5f5;
			padding: 10px 15px;
			border-bottom: 1px solid #ddd;
			line-height: 15px;
		}

		.panel-heading h3 {
			font-size: 14px;
		}

		.panel-footer {
			background-color: #f5f5f5;
			padding: 10px 15px;
			font-size: 14px;
			border-top: 1px solid #ddd;
		}

		.panel-body {
			padding: 20px 15px;
			font-size: 14px;
		}

		.panel-footer a {
			display: inline-block;
			font-size: 14px;
			padding: 6px 12px;
			border: 1px solid #ccc;
			color: #000;
			text-decoration: none;
			background-color: #fff;
		}

		.panel-footer a:hover {
			border-color: #adadad;
			background-color: #ebebeb;
		}

		.panel-footer a:active {
			box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
		}

		.panel-footer a.home {
			float: right;
			background-color: #5bc0de;
			border-color: #46b8da;
			color: #fff;
		}

		.panel-footer a.home:hover {
			border-color: #269abc;
			background-color: #39b3d7;
		}

		.panel-footer a.home:active {
			box-shadow: inset 0 3px 5px rgba(0,0,0,.125);
		}

	</style>
</head>
<body style="margin: 0;padding: 0;background-color: #19AAD7;font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;">
	<div class="wrap" style="margin: 0;padding: 0;width: 450px;position: absolute;top: 100px;left: 50%;margin-left: -225px;">
		<div class="panel" style="margin: 0;padding: 0;border: 1px solid #ddd;background-color: #fff;box-shadow: 0 0 200px rgba(255,255,255,0.5), 0 1px 2px rgba(0,0,0,0.3);">
		  <div class="panel-heading" style="margin: 0;padding: 10px 15px;background-color: #f5f5f5;border-bottom: 1px solid #ddd;line-height: 15px;">
		    <h3 class="panel-title" style="margin: 0;padding: 0;font-size: 14px;">GSTicket - Bienvenue <strong>{{ $prenom }} {{ $nom }}</strong></h3>
		  </div>
		  <div class="panel-body" style="margin: 0;padding: 20px 15px;font-size: 14px;">
		    <p style="margin: 0;padding: 0;">
		    	Votre compte GSTicket a été bien crée, vous devez maintenant confirmer votre e-mail et choisir un mot de passe pour pouvoir beneficier de nos services. 
				</p><br>
				<p>
		    	Le lien de confirmation est valide pendant une heure, au cas oû il ne marche plus, vous devez cliquer <a href="{{ URL::to('password/remind') }}">ici</a> afin de commencer de nouveau!
		    </p>
		  </div>
		  <div class="panel-footer" style="margin: 0;padding: 10px 15px;background-color: #f5f5f5;font-size: 14px;border-top: 1px solid #ddd;">
		    <a href="{{ URL::to('password/setpassword', array($token)) }}" style="margin: 0;padding: 6px 12px;display: inline-block;font-size: 14px;border: 1px solid #ccc;color: #000;text-decoration: none;background-color: #fff;">Continuer l'inscription</a>
		    <a class="home" href="{{ url('/') }}" style="margin: 0;padding: 6px 12px;display: inline-block;font-size: 14px;border: 1px solid #ccc;color: #fff;text-decoration: none;background-color: #5bc0de;float: right;border-color: #46b8da;">GSTicket</a>
		  </div>
		</div>
	</div>
</body>
</html>